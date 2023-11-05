<?php 
    session_start();
    require_once '../Models/User.php';
    require_once '../Repositories/UserRepository.php';
    require_once '../Repositories/NoteRepository.php';
    require_once '../Controllers/AuthController.php';

    if( !isset($_SESSION['user']) ) {
        echo 'Acceso denegado, serás redirigido en 3 segundos...';
        header('refresh:3;url=login.php');
        exit;
    }

    $user = unserialize( $_SESSION['user'] );

    $userRepository = new UserRepository();
    $noteRepository = new NoteRepository();

    $titulo = 'Tus notas';
    require_once '../Templates/header.php'; 

    $foto = $user->getPic();
    $nombre = $user->getName(). ' ' . $user->getLastName();
    $rol = $user->getRole();
    $link = 1;
    require_once '../Templates/sidebar.php'
?>


<main class="ml-[224px] p-4 flex justify-center" style="width: calc(100vw - 224px);">
    <?php if($user->getRole() == 'admin') { ?>
        
        <section class="bg-purple-300 bg-opacity-40 border-2 border-fuchsia-100 backdrop-blur-xl p-4 rounded-3xl">
            <h2 class="text-xl text-purple-950">Usuarios</h2>
            <table>
                <tr class="bg-purple-500  ">
                    <th class="border-8 border-purple-500 p-2 text-start text-white">Foto</th>
                    <th class="border-8 border-purple-500 p-2 text-start text-white">Nombre <span class="text-cyan-500">Editable</span></th>
                    <th class="border-8 border-purple-500 p-2 text-start text-white">Apellido <span class="text-cyan-500">Editable</span></th>
                    <th class="border-8 border-purple-500 p-2 text-start text-white">Email <span class="text-cyan-500">Editable</span></th>
                    <th class="border-8 border-purple-500 p-2 text-start text-white">Número de notas</th>
                    <th class="border-8 border-purple-500 p-2 text-start text-white">Acciones</th>
                </tr>
                <?php
                $users = $userRepository->getAll();

                foreach( $users as $user ) {
                    echo "<tr class='bg-purple-200  bg-opacity-50 backdrop-blur-lg'>";
                    echo "<td class='border-8  border-purple-500 p-2 text-start'>";
                    if(!is_null($user->getPic())) { 
                        echo "<img src='data:image/jpeg;base64,". base64_encode($user->getPic()) ."' alt='Perfil' class='rounded-full w-12 h-12 ring-purple-400 ring-8'>";
                    } else { 
                        echo "<img src='../Public/perfil.jpg' alt='Perfil' class='rounded-full w-12 h-12 ring-purple-400 ring-8'>";
                    }
                    echo "</td>";

                    $editable = $user->getRole() != 'admin';

                    echo "<td id='".$user->getIdUser()."-name'  class='border-8 border-purple-500 p-2 text-start' contenteditable>".$user->getName()."</td>";
                    echo "<td id='".$user->getIdUser()."-last_name' class='border-8 border-purple-500 p-2 text-start' contenteditable>".$user->getLastName()."</td>";
                    echo "<td id='".$user->getIdUser()."-email' class='border-8 border-purple-500 p-2 text-start' contenteditable>".$user->getEmail()."</td>";

                    $notes = $noteRepository->getAllByUserId( $user->getIdUser() );
                    echo "<td class='border-8 border-purple-500 p-2 text-start'>".count($notes)."</td>";

                    echo "<td class='border-8 border-purple-500 p-2 text-start'>";

                    if($editable) {
                        $id = $user->getIdUser();
                        echo "<button onclick='updateUser($id)' class='w-8 h-8 text-slate-100 font-bold bg-gradient-to-r from-purple-500 to-cyan-500 text-lg rounded-full'>🖊</button>";
                        echo "<button onclick='deleteUser($id)'  class='w-8 h-8 text-slate-100 font-bold ml-2 bg-gradient-to-r from-purple-500 to-cyan-500 text-lg rounded-full'>🗑</button>";
                    }
                    echo "</td>";
                    echo "</tr>";
                }
                ?>
            </table>

        </section>

    <?php } else { ?>

        <section class="bg-purple-300 bg-opacity-40 border-2 border-fuchsia-100 backdrop-blur-[26px] p-4 rounded-3xl">

            <h2 class="text-xl text-purple-950">Notas</h2>   
            <table>
                <tr class="bg-purple-500">
                    <th class="border-8 border-purple-500 p-2 text-start text-white">Fecha</th>
                    <th class="border-8 border-purple-500 p-2 text-start text-white">Titulo</th>
                    <th class="border-8 border-purple-500 p-2 text-start text-white">Contenido</th>
                    <th class="border-8 border-purple-500 p-2 text-start text-white">Acciones</th>
                </tr>
                <?php
                $notes = $noteRepository->getAllByUserId( $user->getIdUser() );
                foreach( $notes as $note ) {

                    echo "<tr class='bg-purple-200 bg-opacity-50 backdrop-blur-lg'>";
                    echo "<td class='border-8 border-purple-500 p-2 text-start'>".$note->getDate()."</td>";
                    echo "<td class='border-8 border-purple-500 p-2 text-start'>".$note->getTitle()."</td>";
                    echo "<td class='border-8 border-purple-500 p-2 text-start'>".$note->getDescription()."</td>";
                    echo "<td class='border-8 border-purple-500 p-2 text-start'>";
                    echo "<button class='w-8 h-8 text-slate-100 font-bold bg-gradient-to-r from-purple-500 to-cyan-500 text-lg rounded-full'><a href='./dashboard-agregar-editar.php?editar=".$note->getId()."'>🖊</a></button>";
                    echo "<button class='w-8 h-8 text-slate-100 font-bold bg-gradient-to-r from-purple-500 to-cyan-500 text-lg rounded-full'>🗑</button>";
                    echo "</td>";
                    echo "</tr>";
                }
                
                ?>
            </table>

        </section>

    <?php } ?>
</main>

<script src="../Public/js/update-delete-user.js"></script>

<?php
require '../Templates/footer.php'; 
?>