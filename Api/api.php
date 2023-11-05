<?php
require_once '../Repositories/NoteRepository.php';
require_once '../Repositories/UserRepository.php';

$noteRepository = new NoteRepository();
$userRepository = new userRepository();

function responseJSON($status, $json): void {
    http_response_code($status);
    echo json_encode($json);
    exit;
}

if( isset($_GET['eliminar_nota']) ) {
    $id_note = $_GET['eliminar_nota'];
    
    if($noteRepository->deleteNoteById($id_note)) {
        responseJSON(200, ['msg' => 'Eliminador correctamente']);
    }

    responseJSON(404, ['msg' => 'No se pudo']);
}

if( isset($_GET['actualizar_user']) ) {
    $id_user = $_GET['actualizar_user'];        
    $data = [
        'name' => $_GET['name'],
        'last_name' => $_GET['last_name'],
        'email' => $_GET['email']
    ];

    
    
    if($userRepository->updateUserById($id_user, $data)) {  
        responseJSON(200, ['msg' => 'Actualizado bien']);
    }

    responseJSON(404, ['msg' => 'No se pudo']);
}


if(isset( $_GET['delete_user']) ) {
    $id_user = $_GET['delete_user'];        
    if($userRepository->deleteUserById($id_user)) {
        responseJSON(200, ['msg' => 'Eliminador correctamente']);
    }

    responseJSON(404, ['msg' => 'No se pudo']);
}