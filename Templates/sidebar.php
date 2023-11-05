<aside class="w-56 h-screen bg-purple-300 bg-opacity-40 border-2 border-fuchsia-100 backdrop-blur-xl text-purple-500 fixed"> 
    <figure class="flex justify-center mt-6">
        <?php if(!is_null($foto)) { ?>
        <img src="data:image/jpeg;base64,<?= base64_encode($foto); ?>" alt="Perfil" class="rounded-full w-32 h-32 ring-purple-400 ring-8">
        <?php } else { ?>
        <img src="../Public/perfil.jpg" alt="Perfil" class="rounded-full w-32 h-32 ring-purple-400 ring-8">
        <?php } ?>
    </figure>

    <h2 class="text-xl font-lg text-center mt-4"><?= $nombre; ?></h2>
    <h3 class="text-center mb-4"><?= $rol; ?></h3>

    <ul class="mt-4">
        <li >
            <a href="./dashboard.php" class="flex gap-2 mb-2 <?= ($link == 1) ? 'bg-purple-400 p-2 text-purple-200' : '' ?>">
                <img src="../Public/table-icon.svg" class="w-6 h-6">
                <p><?= ($rol == 'admin') ? 'Ver usuarios' : 'Ver notas' ?></p>
            </a>
        </li>
        <li>
            <a href="<?= ($rol == 'admin') ? './dashboard-ver-entradas.php' : './dashboard-agregar-editar.php' ?>" class="flex gap-2 mb-2 <?= ($link == 2) ? 'bg-purple-400 p-2 text-purple-200' : '' ?>">
                <img src="../Public/add-icon.svg" class="w-6 h-6">
                <p><?= ($rol == 'admin') ? 'Ver entradas' : 'Agregar nota' ?></p>
            </a>
        </li>
        <li>
            <a href="./dashboard-config.php" class="flex gap-2 <?= ($link == 3) ? 'bg-purple-400 p-2 text-purple-200' : '' ?>">
                <img src="../Public/user-icon.svg" class="w-6 h-6">
                <p>Configurar datos</p>
            </a>
        </li>
        <li>
            <a href="./cerrar.php" class="flex gap-2 <?= ($link == 3) ? 'bg-purple-400 p-2 text-purple-200' : '' ?>">
                <p>Cerrar sesión</p>
            </a>
        </li>
    </ul>
</aside>