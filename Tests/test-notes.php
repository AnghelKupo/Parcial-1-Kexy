<?php
require_once '../Models/Note.php';
require_once '../Models/User.php';
require_once '../Repositories/NoteRepository.php';

$nr = new NoteRepository();

// echo var_dump( $nr->getAll() );

echo var_dump( $nr->getNoteById(5) );

// echo var_dump( $nr->getAllByUserId(1) );

/* echo $nr->insertNoteByUserId(1, [
    'title' => 'Jugar PZ',
    'description' => 'Hace tiempo que no juego así que tengo que jugar',
]);  */

/* echo $nr->updateNoteById(5, [
    'title' => 'Ya no se jugará PZ',
    'description' => 'Lastimosamente ya no hay tiempo para juegar, una pena',
]);  */

// echo $nr->deleteNoteById(5);
    