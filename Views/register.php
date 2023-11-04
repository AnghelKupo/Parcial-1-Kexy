<?php 




$titulo = 'Registro';
require '../Templates/header.php'; 
?>
    

<!-- Aqui en medio va el html -->


<?php
require '../Templates/footer.php'; 
?>

<div class="flex justify-center items-center h-screen">
    <section class=" w-[600.00px] h-[550.00px] shadow-lg border-1  rounded-[60px]      bg-opacity-[0.5px] bg-purple-300  border-[1px] border-white backdrop-blur-[4px]">
        <div class="relative">
            <button class="absolute mx-[30px] mt-[20px] w-[60.00px] h-[40.00px] block px-4 py-2 bg-purple-400 rounded-[30px] "></button>
            <img src="../Public./arrow-icon.png" alt="" class="absolute w-[40px] h-[40px]  mx-[35px] mt-[20px]">
        </div>
        
        <div class="w-full h-full flex flex-col  justify-center items-center " >
            <h2 class="mt-[2rem] text-center text-purple-400 text-3xl font-light tracking-[5.08px]">REGISTRARSE</h2>
            <img src="../Public/perfil.jpg" alt="Foto de Perfil" class="rounded-full w-[20%] h-[20%] border-purple-300 border-4 shadow-lg" >
            <input type="email" placeholder="ejemplo@email.com" class="h-[40px] text-center mt-3 w-96 items-center rounded-3xl pl-3 py-3 outline-none focus:ring-1 focus:ring-purple-800 transition-shadow delay-200 text-purple-800 bg-opacity-40 bg-stone-50">
            <input type="password" placeholder="contraseña" class="text-center h-[40px] mt-3 w-96 items-center rounded-3xl pl-3 py-3 outline-none focus:ring-1 focus:ring-purple-800 transition-shadow delay-200 text-purple-800 bg-opacity-40 bg-stone-50">
            <input type="text" placeholder="Nombre" class="text-center h-[40px] mt-3 w-96 items-center rounded-3xl pl-3 py-3 outline-none focus:ring-1 focus:ring-purple-800 transition-shadow delay-200 text-purple-800 bg-opacity-40 bg-stone-50">
            <input type="text"placeholder="Apellido" class="text-center h-[40px] mt-3 w-96 items-center rounded-3xl pl-3 py-3 outline-none focus:ring-1 focus:ring-purple-800 transition-shadow delay-200 text-purple-800 bg-opacity-40 bg-stone-50">

            <button class="mt-[20px] tracking-[3px] block px-4 py-2 text-slate-100 font-regular bg-gradient-to-r from-purple-400 to-teal-200 text-lg rounded-3xl">INGRESAR</button>
            <a href="register.php" class="mt-[35px] text-purple-500 text-md underline">Ya tienes cuenta? Inicia Sesión Aquí</a>
        </div> 
    </section>
</div>