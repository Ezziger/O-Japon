function editing(commentaire, id) {
  const formAdd = document.getElementById('formAdd');
  const content = document.getElementById(`comment`);
  content.innerHTML = `
  <form method="post" action="{{ route('commentaires.update') }}">
  <div class="form-group">

      <input type="textarea" class="form-control" name="commentaire" value="${commentaire}">
      <input type="hidden" name="commentaire_id" value="${id}" />
  </div>
  <div class="form-group">
      <input id="" type="submit" class="btn btn-success" value="Mettre à jour" />
  </div>
</form>`

const formEdit = document.getElementById('formEdit');
formEdit.style.display = "block"

formAdd.style.display = "none"


}


/* 
 content.innerHTML = `${commentaire}`

*/
function canceling(commentaire) {
  const content = document.getElementById(`comForm`);
  content.innerHTML = `<p>${commentaire}</p>`
}