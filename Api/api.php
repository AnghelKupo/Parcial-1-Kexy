<?php
require_once '../Repositories/NoteRepository.php';
$noteRepository = new NoteRepository();

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