<?php 
session_start();
require_once '../Models/User.php';
require_once '../Models/Note.php';

if( !isset($_SESSION['user']) ) { }

$user = new User();
$user->setRole('admin');

$edicionMode = false;

$currentNote = null;

if( isset($_GET['editar']) ) {
    $edicionMode = true;
    $id_note = $_GET['editar'];
    $currentNote = new Note();
    $currentNote->setTitle('Hacer la tarea');

}

if( isset($_GET['do_edicion']) ) {

}

if( isset($_GET['agregar']) ) {

}


if( $user->getRole() == 'admin') {
    header('refresh:0;url=dashboard.php');
    exit();
}


$titulo = 'Tus notas';
require_once '../Templates/header.php'; 

$foto = null;
$nombre = $user->getName() . ' ' . $user->getLastName();
$rol = $user->getRole();
$link = 2;
require_once '../Templates/sidebar.php'
?>


<main class="ml-[224px] p-4 flex justify-center" style="width: calc(100vw - 224px);">

    <form 
        action="<?= ($edicionMode) ? './dashboard-agregar-editar.php?do_edicion=' : './dashboard-agregar-editar.php?agregar=' ?>" 
        class="bg-purple-300 bg-opacity-40 border-2 border-fuchsia-100 backdrop-blur-xl p-4 rounded-3xl w-[800px]" 
        method="post">

        <h2 class="text-purple-950 text-center text-xl">
            <?= ($edicionMode) ? 'Modificar: '.$currentNote->getTitle() : 'Agregar nueva nota' ?>
        </h2>

        <input 
            type="text" 
            name="title" 
            placeholder="Titulo de la tarea" 
            class="rounded-3xl pl-3 py-3 outline-none focus:ring-1 focus:ring-purple-600 transition-shadow delay-200 text-purple-950 w-full mb-4">
        
        <textarea 
            name="description" 
            placeholder="Descripción de la tarea"
            class="rounded-3xl pl-3 py-3 outline-none focus:ring-1 focus:ring-purple-600 transition-shadow delay-200 text-purple-950 h-44 w-full resize-none content-none">
        </textarea>

        <button class="block px-4 py-2 text-slate-100 font-bold bg-gradient-to-r from-purple-500 to-cyan-500 text-lg rounded-3xl mx-auto" type="submit">
            <?= ($edicionMode) ? 'Guardar cambios' : 'Agregar' ?>
        </button>

    </form>

</main>


<?php
require '../Templates/footer.php'; 
?>