<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <script src="./Public/js/tailwind.js"></script>
    
    <title>Index </title>
</head>
    <body class="flex justify-center items-center h-screen bg-cover bg-no-repeat bg-[url('./Public/fondo.jpg')]">
    <style>
    * {
      font-family: 'Montserrat', sans-serif;
    }
  </style>        
    <section class=" w-[600.00px] h-[550.00px] shadow-lg border-1  rounded-[60px]      bg-opacity-[0.5px] bg-purple-300  border-[1px] border-white backdrop-blur-[4px]">
                <div class="space-y-10 mb-10">
                    <h1 class="mt-[5rem] text-center text-white text-4xl font-light tracking-[5.08px]">BIENVENIDO</h1>
                    <h4 class="text-violet-500 mx-28 text-sm">Aplicación de notas. Organiza sus tareas en un solo lugar.</h4>
                    <p class="text-purple-500 px-40 text-2xl">Tu ruta rápida hacia el conocimiento con nuestros apuntes.</p>
                </div>
                 
                <div class="flex flex-row justify-center items-center space-x-20">
                    <a href="./Views/login.php">
                        <button class="mt-[20px] tracking-[3px] block px-4 py-2 text-slate-100 font-regular bg-gradient-to-r from-purple-400 to-teal-200 text-lg rounded-3xl">INICIAR SESIÓN</button>
                    </a>
                    <a href="./Views/register.php">
                    <button class="mt-[20px] tracking-[3px] block px-4 py-2 text-slate-100 font-regular bg-gradient-to-r from-purple-400 to-teal-200 text-lg rounded-3xl">REGISTRARSE</button>

                </div>
                
                </a>
            </section>
    </body>
</html>