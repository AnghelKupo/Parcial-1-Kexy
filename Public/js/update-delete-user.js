function deleteUser(id_user) {
    fetch('../Api/api.php?delete_user='+id_user)
        .then(r => r.json())
        .then(d => {
            console.log(d);
            location.reload();
        });
}

function updateUser(id_user) {
    _name = document.getElementById(id_user+'-name').textContent;
    last_name = document.getElementById(id_user+'-last_name').textContent;
    email =document.getElementById(id_user+'-email').textContent;
    fetch(`../Api/api.php?actualizar_user=${id_user}&name=${_name}&last_name=${last_name}&email=${email}`)
        .then(r => r.json())
        .then(d => {
            console.log(d);
            location.reload();
        });
}