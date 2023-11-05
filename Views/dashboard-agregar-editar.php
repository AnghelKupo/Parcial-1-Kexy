<?php 
    session_start();
    require_once '../Models/User.php';
    require_once '../Models/Note.php';
    require_once '../Controllers/NoteController.php';
    require_once '../Repositories/NoteRepository.php';
    require_once '../Controllers/AuthController.php';


    if( !isset($_SESSION['user']) ) {
        echo 'Acceso denegado, serás redirigido en 3 segundos...';
        header('refresh:3;url=login.php');
        exit;
    }

    $user = unserialize( $_SESSION['user'] );


    $noteController = new NoteController();

    $edicionMode = false;

    $currentNote = null;

    if( isset($_GET['editar']) ) {
        $edicionMode = true;
        $id_note = $_GET['editar'];
        $currentNote = $noteController->getNote($user->getIdUser(), $id_note);
    }

    if( isset($_GET['do_edicion']) ) {
        $id_note = $_POST['id_note'];
        $data = [
            'title' => $_POST['title'],
            'description' => $_POST['description'],
        ];
        $noteController->updateNote($id_note, $data);
    }

    if( isset($_GET['agregar']) ) {
        
        $data = [
            'title' => $_POST['title'],
            'description' => $_POST['description'],
        ];
        $noteController->postNote($user->getIdUser(), $data);
    }


    if( $user->getRole() == 'admin') {
        header('refresh:0;url=dashboard.php');
        exit();
    }


    $titulo = 'Tus notas';
    require_once '../Templates/header.php'; 
    $foto = $user->getPic();
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

        <h2 class=" text-purple-950 text-center text-xl">
            <?= ($edicionMode) ? 'Modificar: '.$currentNote->getTitle() : 'Agregar nueva nota' ?>
        </h2>

        <input 
            type="text" 
            name="title" 
            required
            value="<?= ($currentNote) ? $currentNote->getTitle() : '' ?>"
            placeholder="Titulo de la tarea" 
            class="rounded-3xl pl-3 py-3 outline-none focus:ring-1 focus:ring-purple-600 transition-shadow delay-200 text-purple-950 w-full mb-4">
        
        <textarea 
            name="description" 
            placeholder="Descripción de la tarea"
            required
            class="rounded-3xl pl-3 py-3 outline-none focus:ring-1 focus:ring-purple-600 transition-shadow delay-200 text-purple-950 h-44 w-full resize-none content-none"><?= ($currentNote) ? $currentNote->getDescription() : '' ?></textarea>

        <input 
            type="number" 
            name="id_note" 
            hidden value="<?= ($currentNote) ? $currentNote->getId() : '' ?>">

        <button class="block px-4 py-2 text-slate-100 text-lg rounded-3xl mx-auto mt-[40px] tracking-[3px] block px-4 py-2 text-slate-100 font-regular bg-gradient-to-r from-purple-400 to-teal-200 text-lg rounded-3xl" type="submit">
            <?= ($edicionMode) ? 'Guardar cambios' : 'Agregar' ?>
        </button>

    </form>

</main>



<?php
require '../Templates/footer.php'; 
?>