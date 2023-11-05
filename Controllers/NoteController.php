<?php
require_once '../Repositories/NoteRepository.php';
require_once '../Models/Note.php';
require_once '../Models/User.php';

class NoteController {

    public function postNote($user_id, $data) {
        $noteRepository = new NoteRepository();
        
        if($noteRepository->insertNoteByUserId($user_id, $data)) {
            header('refresh:0;url=dashboard.php');
            exit;
        }
        
        $error = 'Algo salió mal al insertar una nueva nota';
        header("refresh:0,url=dashboard-agregar-editar.php?error=$error");
        exit;
    }

    public function getNote($user_id, $note_id) {
        $noteRepository = new NoteRepository();
        $notesByUser = $noteRepository->getAllByUserId($user_id);
        $note = $noteRepository->getNoteById($note_id);

        foreach($notesByUser as $noteUser) {
            if( $noteUser->getId() ==  $note->getId() ) {
                return $note;
            }
        }

        header("refresh:0,url=dashboard.php");
        exit;
    }  


    public function updateNote($id_note, $data) {
        $noteRepository = new NoteRepository();

        if($noteRepository->updateNoteById($id_note, $data)) {
            header('refresh:0;url=dashboard.php');
            exit;
        }
        
        $error = 'Algo salió mal al modificar la nota';
        header("refresh:0,url=dashboard-agregar-editar.php?error=$error");
        exit;
    }
}