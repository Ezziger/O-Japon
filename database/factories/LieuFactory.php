<?php

namespace Database\Factories;

use App\Models\Lieu;
use Illuminate\Database\Eloquent\Factories\Factory;

class LieuFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Lieu::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
                'image' =>$this->faker->image(),
                'alt_image'=>$this->faker->alt_image(),
                'nom'=>$this->faker->nom(),
                'description'=>$this->faker->description(),
                'prix'=>$this->faker->prix(),
                'map'=>$this->faker->map(),
                'user_id'=>$this->faker->image(),
                'categorie_id'=>$this->faker->image(),
                'region_id'=>$this->faker->image(),
        ];
    }
}
