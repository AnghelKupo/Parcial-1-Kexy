<?php 

require_once '../Models/User.php';
require_once '../Controllers/AuthController.php';
$authController = new AuthController();

if( isset($_GET['login']) ) { 
    if (isset($_POST['email']) && isset($_POST['pass'])) {

        $email = $_POST['email'];
        $pass = $_POST['pass'];
        
        if (!empty($email) && !empty($pass)) {
            $authController->login($email, $pass);

        }

    } else {
        echo 'No enviaste los campos';
        header("refresh:5; Location: ../Views/login.php");

    }
}



$titulo = 'Login';
require '../Templates/header.php'; 
?>

<main>
    <form action="./login.php?login=" method="post" class=" flex flex-col justify-center items-center h-screen">
        <section class=" w-[600.00px] h-[550.00px] shadow-lg border-1  rounded-[60px] bg-opacity-[0.5px] bg-purple-300  border-[1px] border-white backdrop-blur-[4px]">
            <div class="relative">
                <a href="../index.php"  class="absolute mx-[30px] mt-[20px] w-[60.00px] h-[40.00px] block px-4 py-2 bg-purple-400 rounded-[30px] "></a>
                <img src="../Public./arrow-icon.png" alt="" class="absolute w-[40px] h-[40px]  mx-[35px] mt-[20px]">
            </div>

            <div class="flex flex-col justify-center items-center  mt-11">
                <p class="text-purple-800 font-normal text-md"> Nos alegra tenerte de nuevo</p>
                <h2 class="mt-[50px] text-center text-purple-400 text-4xl font-light tracking-[5.08px]">INICIAR SESIÓN</h2>
                <?php 
                    if(isset($_GET['msj'])) {
                                echo "<h1 class = 'mt-[2rem] text-center text-purple-900 text-xl font-light tracking-[5.08px]'>" . $_GET['msj'] . "</h1>";
                    }
                ?>
                <input type="email" name="email" placeholder="Ingrese el email" class="mt-8 w-96 items-center rounded-3xl pl-3 py-3 outline-none focus:ring-1 focus:ring-purple-800 transition-shadow delay-200 text-purple-800 bg-opacity-40 bg-stone-50">
                <input type="password" name="pass" placeholder="Ingrese la contraseña" class="mt-8 w-96 items-center rounded-3xl pl-3 py-3 outline-none focus:ring-1 focus:ring-purple-800 transition-shadow delay-200 text-purple-800 bg-opacity-40 bg-stone-50">
                <button class="mt-[40px] tracking-[3px] block px-4 py-2 text-slate-100 font-regular bg-gradient-to-r from-purple-400 to-teal-200 text-lg rounded-3xl">INICIAR</button>
                <a href="register.php" class="mt-[35px] text-purple-500 text-md underline">¿No tienes cuenta? Registrate Aquí</a>
            </div>
            
        </section>
    </form>
</main>



<?php
require '../Templates/footer.php'; 
?>

