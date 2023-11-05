<?php 

require_once '../Models/User.php';

if( isset($_GET['login']) ) { 
    
}


$titulo = 'Login';
require '../Templates/header.php'; 
?>


<form action="./?login=" method="post">
    
</form>


<?php
require '../Templates/footer.php'; 
?>

<div class="flex justify-center items-center h-screen">
    <section class=" w-[600.00px] h-[550.00px] shadow-lg border-1  rounded-[60px]      bg-opacity-[0.5px] bg-purple-300  border-[1px] border-white backdrop-blur-[4px]">
        <button class="m-[30px] w-[70.00px] h-[50.00px] block px-4 py-2 bg-purple-400 rounded-[30px] "><img src="" alt=""></button>
        <p class="mx-[60px] mt[20px] text-purple-800  font-normal"> Nos alegra tenerte de nuevo</p>

        <div class=" flex flex-col text-center justify-center items-center " >
            <h2 class="mt-[50px] text-center text-purple-400 text-4xl font-light tracking-[5.08px]">INICIAR SESIÓN</h2>
            <input type="email" placeholder="Ingrese el email" class="mt-8 w-96 items-center rounded-3xl pl-3 py-3 outline-none focus:ring-1 focus:ring-purple-800 transition-shadow delay-200 text-purple-800 bg-opacity-40 bg-stone-50">
            <input type="password" placeholder="Ingrese la contraseña" class="mt-8 w-96 items-center rounded-3xl pl-3 py-3 outline-none focus:ring-1 focus:ring-purple-800 transition-shadow delay-200 text-purple-800 bg-opacity-40 bg-stone-50">
            <button class="mt-[40px] tracking-[3px] block px-4 py-2 text-slate-100 font-regular bg-gradient-to-r from-purple-400 to-teal-200 text-lg rounded-3xl">INICIAR</button>
            <a href="register.php" class="mt-[35px] text-purple-500 text-md underline">¿No tienes cuenta? Registrate Aquí</a>
        </div> 
    </section>
</div>