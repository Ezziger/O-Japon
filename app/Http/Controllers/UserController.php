<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Lieu;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules\Password;
use Illuminate\Support\Facades\Gate;


class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (Gate::allows('isAdmin') == true) {
            $users = User::all();
            return view('user.index', compact('users'));
        } else {
            return abort(403, 'Action non autorisée.');
        }
    }
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(User $user)
    {
        $lieux = Lieu::where('user_id', $user->id)
                                    ->latest()
                                    ->paginate(2);
        return view('user.show', compact('user', 'lieux'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $user)
    {
        $majUser = $request->validate([
            'pseudo' => 'required|string|min:3|max:30',
            'email' => 'required|string|min:5|max:40',
        ]);

        $majUser = $request->except('_token', '_method');

        $user->update($majUser);
        return redirect()->route('user.show', $user)
             ->with('success', 'Vos données personnelles ont bien été mises à jour !');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
        $user->delete();
        return redirect()->route('login')
                         ->with('success', 'Votre compte a bien été supprimé !');
    }

    /*********** MISE A JOUR DU MOT DE PASSE **********/

    public function update_password(Request $request, User $user) {

        $request->validate([
            'oldPassword' => 'required',
            'newPassword' => 'required|confirmed|max:25',
                Password::min(8)
                    ->mixedCase()
                    ->letters()
                    ->numbers()
                    ->symbols()
        ]);

        if (Hash::check($request->input('oldPassword'), $user->password)) {
            if($request->input('oldPassword') !== $request->input('newPassword')) {
                $user->password = Hash::make($request->input('newPassword'));
                $user->save();
                return redirect()->route('profil')
                                 ->with('message', 'Votre profil a bien été mis à jour !');
            } else {
                return redirect()->back()->withErrors(['Attention !', 'ancien et nouveau mot de passe identiques !']);
            }
        } else {
            return redirect()->back()->withErrors(['Attention !', 'mot de passe incorrect !']);
        }
    }
}
