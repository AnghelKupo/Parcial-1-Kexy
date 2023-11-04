<?php 
session_start();
require_once '../Models/User.php';

if( !isset($_SESSION['user']) ) {
    /* echo 'Acceso denegado, serás redirigido en 3 segundos...';
    header('refresh:3;url=login.php');
    exit; */
}

/* $user = unserialize( $_SESSION['user'] ); */
$user = new User();
$user->setRole('admin');
$user->setName('Flavio');
$user->setLastName('Sánchez');

if( $user->getRole() != 'admin') {
    header('refresh:0;url=dashboard.php');
    exit();
}

$titulo = 'Nuvas entradas';
require_once '../Templates/header.php'; 

$foto = null;
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
            <tr class="bg-purple-200 bg-opacity-50 backdrop-blur-lg">
                <td class="border-8 border-purple-500 p-2 text-start">12/05/2020</td>
                <td class="border-8 border-purple-500 p-2 text-start" contenteditable="true">Hacer la tarea</td>
                <td class="border-8 border-purple-500 p-2 text-start" contenteditable="true">Flavio Sánchez</td>
                <td class="border-8 border-purple-500 p-2 text-start">
                    <button class="w-8 h-8 text-slate-100 font-bold bg-gradient-to-r from-purple-500 to-cyan-500 text-lg rounded-full">E</button>
                </td>
            </tr>
        </table>

    </section>

</main>


<?php
require '../Templates/footer.php'; 
?>