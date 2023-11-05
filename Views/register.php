<?php 
    require_once '../Repositories/UserRepository.php';
    require_once '../Controllers/AuthController.php';

    $authController = new AuthController();
    $userRepository = new UserRepository();

    if(isset($_GET["register"])){
        if(isset($_POST['email'])&& isset($_POST['pass'])&& isset($_POST['name'])&& isset($_POST['last_name']))
        {
            $resultArray = array(
                'email' => $_POST['email'],
                'pass'=> $_POST['pass'],
                'name'=> $_POST['name'],
                'last_name'=> $_POST['last_name'],
            );
        }

        $authController->register($resultArray);
    }

/*insertPic */


$titulo = 'Registro';
require '../Templates/header.php'; 
?>
    

<!-- Aqui en medio va el html -->


<?php
require '../Templates/footer.php'; 
?>

<form action="./register.php?register=" method="post" >
    <div class="flex justify-center items-center h-screen">
        <section class=" w-[600.00px] h-[550.00px] shadow-lg border-1  rounded-[60px]      bg-opacity-[0.5px] bg-purple-300  border-[1px] border-white backdrop-blur-[4px]">
            <div class="relative">
                <a href="../index.php" class="absolute mx-[30px] mt-[20px] w-[60.00px] h-[40.00px] block px-4 py-2 bg-purple-400 rounded-[30px] "></a>
                <img src="../Public./arrow-icon.png" alt="" class="absolute w-[40px] h-[40px]  mx-[35px] mt-[20px]">
            </div>
            
            <div class="w-full h-full flex flex-col  justify-center items-center " >
                <h2 class="mt-[2rem] text-center text-purple-400 text-3xl font-light tracking-[5.08px]">REGISTRARSE</h2>
                <?php 
                    if(isset($_GET['msj'])) {

                        echo "<h1 class='mt-[2rem] text-center text-purple-900 text-xl font-light tracking-[5.08px]'>" . $_GET['msj'] . "</h1>";
                    }
                ?>
                <img src="../Public/perfil.jpg" alt="Foto de Perfil" class="rounded-full w-[20%] h-[20%] border-purple-300 border-4 shadow-lg" >
                <input type="email" placeholder="ejemplo@email.com" name="email" class="h-[40px] text-center mt-3 w-96 items-center rounded-3xl pl-3 py-3 outline-none focus:ring-1 focus:ring-purple-800 transition-shadow delay-200 text-purple-800 bg-opacity-40 bg-stone-50">
                <input type="password" placeholder="contraseña" name="pass" class="text-center h-[40px] mt-3 w-96 items-center rounded-3xl pl-3 py-3 outline-none focus:ring-1 focus:ring-purple-800 transition-shadow delay-200 text-purple-800 bg-opacity-40 bg-stone-50">
                <input type="text" placeholder="Nombre" name="name" class="text-center h-[40px] mt-3 w-96 items-center rounded-3xl pl-3 py-3 outline-none focus:ring-1 focus:ring-purple-800 transition-shadow delay-200 text-purple-800 bg-opacity-40 bg-stone-50">
                <input type="text"placeholder="Apellido" name="last_name" class="text-center h-[40px] mt-3 w-96 items-center rounded-3xl pl-3 py-3 outline-none focus:ring-1 focus:ring-purple-800 transition-shadow delay-200 text-purple-800 bg-opacity-40 bg-stone-50">

                <button class="mt-[20px] tracking-[3px] block px-4 py-2 text-slate-100 font-regular bg-gradient-to-r from-purple-400 to-teal-200 text-lg rounded-3xl">INGRESAR</button>
                <a href="login.php" class="mt-[35px] text-purple-500 text-md underline">Ya tienes cuenta? Inicia Sesión Aquí</a>
            </div> 
        </section>
    </div>
</form>

