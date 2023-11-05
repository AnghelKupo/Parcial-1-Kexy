<?php 
    session_start();
    require_once '../Models/User.php';
    require_once '../Models/Note.php';
    require_once '../Repositories/NoteRepository.php';
    require_once '../Controllers/AuthController.php';

    // =========================

    if( !isset($_SESSION['user']) ) {
        echo 'Acceso denegado, serás redirigido en 3 segundos...';
        header('refresh:3;url=login.php');
        exit; 
    }

    $user = unserialize( $_SESSION['user'] );


    // =========================

    if( $user->getRole() != 'admin') {
        header('refresh:0;url=dashboard.php');
        exit();
    }

    $titulo = 'Nuvas entradas';
    require_once '../Templates/header.php'; 

    $foto =$user->getPic();
    $nombre = $user->getName() . ' ' . $user->getLastName();
    $rol = $user->getRole();
    $link = 2;
    require_once '../Templates/sidebar.php'
?>


<main class="ml-[224px] p-4 flex justify-center" style="width: calc(100vw - 224px);">

    <section class="bg-purple-300 bg-opacity-40 border-2 border-fuchsia-100 backdrop-blur-xl p-4 rounded-3xl">
        <h2 class="text-xl text-purple-950">Todas las entradas</h2>
        <table>
            <tr class="bg-purple-500">
                <th class="border-8 border-purple-500 p-2 text-start">Fecha</th>
                <th class="border-8 border-purple-500 p-2 text-start">Titulo</th>
                <th class="border-8 border-purple-500 p-2 text-start">Propietario</th>
                <th class="border-8 border-purple-500 p-2 text-start">Acciones</th>
            </tr>
            <?php
            $noteRepository = new NoteRepository();
            $notes = $noteRepository->getAll();
            foreach( $notes as $note ) {
                echo "<tr class='bg-purple-200 bg-opacity-50 backdrop-blur-lg'>";
                echo "<td class='border-8 border-purple-500 p-2 text-start'>".$note->getDate()."</td>";
                echo "<td class='border-8 border-purple-500 p-2 text-start'>".$note->getTitle()."</td>";
                echo "<td class='border-8 border-purple-500 p-2 text-start'>".$note->getUser()->getName().' '.$note->getUser()->getLastName()."</td>";
                echo "<td class='border-8 border-purple-500 p-2 text-start'>";
                echo "<button onclick='deleteNote(".$note->getId().")' class='w-8 h-8 text-slate-100 font-bold bg-gradient-to-r from-purple-500 to-cyan-500 text-lg rounded-full'>🗑</button>";
                echo "</td>";
                echo "</tr>";
            }
            ?>
        </table>

    </section>

</main>

<script src="../Public/js/delete-note.js"></script>

<?php
require '../Templates/footer.php'; 
?>