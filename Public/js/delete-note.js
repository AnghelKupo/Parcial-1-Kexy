function deleteNote(id_note) {
    fetch('../Api/api.php?eliminar_nota='+id_note)
        .then(resp => resp.json())
        .then(data => {
            console.log(data);
            location.reload();
        });
}