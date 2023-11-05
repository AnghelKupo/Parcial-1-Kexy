<?php 
    session_start();
    require_once '../Models/User.php';
    require_once '../Controllers/AuthController.php';
    $authController = new AuthController();


    if( !isset($_SESSION['user']) ) {
        echo 'Acceso denegado, serás redirigido en 3 segundos...';
        header('refresh:3;url=login.php');
        exit;
    }    

    $user = unserialize( $_SESSION['user'] ); 

    if( isset($_GET['editar_datos']) ) {
        if(isset($_POST['name'])&& isset($_POST['last_name'])&& isset($_POST['email'])){

            $resultArray = array(
                'name'=> $_POST['name'],
                'last_name'=> $_POST['last_name'],                
                'email' => $_POST['email'],
            );

            $authController->update($user->getIdUser(), $resultArray);
        }
    }

    if (isset($_GET['editar_foto']))    
        {
            if (isset($_FILES['pic']))
            {
                $archivo_tmp = $_FILES['pic']['tmp_name'];
                $resultArray = array(
                    'pic' =>file_get_contents($archivo_tmp)
                );
                $authController->pic($user->getIdUser(), $resultArray);
            }
        }

    $titulo = 'Configurar datos';
    require_once '../Templates/header.php'; 

    $foto = $user->getPic();
    $nombre = $user->getName() . ' ' . $user->getLastName();
    $rol = $user->getRole();
    $link = 3;
    require_once '../Templates/sidebar.php'
?>


<main class="flex-col ml-[224px] p-4 flex justify-center" style="width: calc(100vw - 224px);">

    <div class="bg-purple-300 bg-opacity-40 border-2 border-fuchsia-100 backdrop-blur-xl p-4 rounded-3xl w-[800px]">   
        <form enctype="multipart/form-data" action="./dashboard-config.php?editar_foto=" class="" method="post">
            <input type="file" name="pic" id="">
            <button class="block px-4 py-2 text-slate-100 font-bold bg-gradient-to-r from-purple-500 to-cyan-500 text-lg rounded-3xl mx-auto" type="submit">Subir foto</button>
        </form>

        <form action="./dashboard-config.php?editar_datos="  method="post">
        
            <h2 class="text-purple-950 text-center text-xl">Datos personales</h2>

            <input 
                type="text" 
                name="name" 
                placeholder="Nombre" 
                value="<?= $user->getName() ?>"
                class="rounded-3xl pl-3 py-3 outline-none focus:ring-1 focus:ring-purple-600 transition-shadow delay-200 text-purple-950 w-full mb-4">

            <input 
                type="text" 
                name="last_name" 
                placeholder="Apellido" 
                value="<?= $user->getLastName() ?>"
                class="rounded-3xl pl-3 py-3 outline-none focus:ring-1 focus:ring-purple-600 transition-shadow delay-200 text-purple-950 w-full mb-4">

            <input 
                type="email" 
                name="email" 
                placeholder="Email" 
                value="<?= $user->getEmail() ?>"
                class="rounded-3xl pl-3 py-3 outline-none focus:ring-1 focus:ring-purple-600 transition-shadow delay-200 text-purple-950 w-full mb-4">

            <button  class="block px-4 py-2 text-slate-100 font-bold bg-gradient-to-r from-purple-500 to-cyan-500 text-lg rounded-3xl mx-auto" type="submit">
                Guardar cambios
            </button>
        
        </form>
    </div>

</main>

<?php
require '../Templates/footer.php'; 
?>