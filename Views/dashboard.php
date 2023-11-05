<?php 
    session_start();
    require_once '../Models/User.php';

    if( !isset($_SESSION['user']) ) {
        echo 'Acceso denegado, serás redirigido en 3 segundos...';
        header('refresh:3;url=login.php');
        exit;
    }

    $user = unserialize( $_SESSION['user'] );



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
                <tr class="bg-purple-500">
                    <th class="border-8 border-purple-500 p-2 text-start">Foto</th>
                    <th class="border-8 border-purple-500 p-2 text-start">Nombre <span class="text-cyan-500">Editable</span></th>
                    <th class="border-8 border-purple-500 p-2 text-start">Apellido <span class="text-cyan-500">Editable</span></th>
                    <th class="border-8 border-purple-500 p-2 text-start">Número de notas</th>
                    <th class="border-8 border-purple-500 p-2 text-start">Acciones</th>
                </tr>
                <?php
                

                ?>
                <tr class="bg-purple-200 bg-opacity-50 backdrop-blur-lg">
                    <td class="border-8 border-purple-500 p-2 text-start">
                        <img src="../Public/perfil.jpg" alt="user" class="w-8 h-8 rounded-full">
                    </td>
                    <td class="border-8 border-purple-500 p-2 text-start" contenteditable="true">Flavio</td>
                    <td class="border-8 border-purple-500 p-2 text-start" contenteditable="true">Sánchez</td>
                    <td class="border-8 border-purple-500 p-2 text-start">20</td>
                    <td class="border-8 border-purple-500 p-2 text-start">
                        <button class="w-8 h-8 text-slate-100 font-bold bg-gradient-to-r from-purple-500 to-cyan-500 text-lg rounded-full">M</button>
                        <button class="w-8 h-8 text-slate-100 font-bold bg-gradient-to-r from-purple-500 to-cyan-500 text-lg rounded-full">E</button>
                    </td>
                </tr>
            </table>

        </section>

    <?php } else { ?>

        <section class="bg-purple-300 bg-opacity-40 border-2 border-fuchsia-100 backdrop-blur-xl p-4 rounded-3xl">

            <h2 class="text-xl text-purple-950">Notas</h2>   
            <table>
                <tr class="bg-purple-500">
                    <th class="border-8 border-purple-500 p-2 text-start">Fecha</th>
                    <th class="border-8 border-purple-500 p-2 text-start">Titulo</th>
                    <th class="border-8 border-purple-500 p-2 text-start">Contenido</th>
                    <th class="border-8 border-purple-500 p-2 text-start">Acciones</th>
                </tr>
                <tr class="bg-purple-200 bg-opacity-50 backdrop-blur-lg">
                    <td class="border-8 border-purple-500 p-2 text-start">02/11/2020</td>
                    <td class="border-8 border-purple-500 p-2 text-start">Hacer la tarea</td>
                    <td class="border-8 border-purple-500 p-2 text-start">Lorem, ipsum dolor sit amet consectetur adipisicing elit. Dolorem quod eius blanditiis iste similique repellendus in, nesciunt eum perspiciatis dicta?</td>
                    <td class="border-8 border-purple-500 p-2 text-start">
                        <button class="w-8 h-8 text-slate-100 font-bold bg-gradient-to-r from-purple-500 to-cyan-500 text-lg rounded-full">M</button>
                        <button class="w-8 h-8 text-slate-100 font-bold bg-gradient-to-r from-purple-500 to-cyan-500 text-lg rounded-full">E</button>
                    </td>
                </tr>
            </table>

        </section>

    <?php } ?>
</main>


<?php
require '../Templates/footer.php'; 
?>