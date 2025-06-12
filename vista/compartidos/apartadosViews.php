<?php
class apartadosViews{
    protected function formSideBarShow()
    {
    ?>
        <div class="-translate-x-full absolute left-0 top-0 z-9999 flex h-screen w-72.5 flex-col bg-gradient-to-b from-green-600 to-green-200 ease-linear lg:static lg:translate-x-0">

            <div class="flex items-center gap-4 px-7 py-5.5 select-none">
                <div class="flex items-center mt-3 w-60">
                    <!-- Logo -->
                    <img 
                        src="../assets/logo.png" 
                        lt="Logo" 
                        class="w-45 h-45 rounded-full object-cover border-4 border-white shadow-md mx-auto"
                    />
                </div>
            </div>

            <div class="mt-2 no-scrollbar flex flex-col overflow-y-auto duration-100 ease-linear select-none">
                <!-- Menu -->
                <nav class="mt-5 px-4 py-4 lg:mt-9 lg:px-6">
                    <div>
                        <!-- Menu Medico -->
                        <?php if ($_SESSION['rol']=='m') { ?>
                            <ul class="mb-6 flex flex-col gap-1.5">
                                    <li>
                                        <form action="/jbctextil/moduloVentas/clientes/getEnlaceClientes.php" method="post">
                                            <button name="btnClientes" type="submit"class="group relative flex items-center gap-2.5 rounded-sm px-4 py-2 font-medium text-white bg-green-600 hover:bg-green-700 hover:text-green-100 duration-300 ease-in-out">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 640 512" class="fill-current"><!--!Font Awesome Free 6.7.2 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2024 Fonticons, Inc.-->
                                                    <path d="M96 128a128 128 0 1 1 256 0A128 128 0 1 1 96 128zM0 482.3C0 383.8 79.8 304 178.3 304l91.4 0C368.2 304 448 383.8 448 482.3c0 16.4-13.3 29.7-29.7 29.7L29.7 512C13.3 512 0 498.7 0 482.3zM609.3 512l-137.8 0c5.4-9.4 8.6-20.3 8.6-32l0-8c0-60.7-27.1-115.2-69.8-151.8c2.4-.1 4.7-.2 7.1-.2l61.4 0C567.8 320 640 392.2 640 481.3c0 17-13.8 30.7-30.7 30.7zM432 256c-31 0-59-12.6-79.3-32.9C372.4 196.5 384 163.6 384 128c0-26.8-6.6-52.1-18.3-74.3C384.3 40.1 407.2 32 432 32c61.9 0 112 50.1 112 112s-50.1 112-112 112z" />
                                                </svg>
                                                Inicio
                                            </button>
                                        </form>
                                    </li>

                                    <li>
                                        <form action="/jbctextil/moduloVentas/Productos/getEnlaceProductos.php" method="post">
                                            <button name="btnProductos" type="submit" class="group relative flex items-center gap-2.5 rounded-sm py-2 px-4 font-medium text-white hover:text-yellow-300 duration-300 ease-in-out hover:bg-graydark dark:hover:bg-meta-4">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 448 512" class="fill-current"><!--!Font Awesome Free 6.7.2 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2024 Fonticons, Inc.-->
                                                    <path d="M224 256A128 128 0 1 0 224 0a128 128 0 1 0 0 256zm-45.7 48C79.8 304 0 383.8 0 482.3C0 498.7 13.3 512 29.7 512l388.6 0c16.4 0 29.7-13.3 29.7-29.7C448 383.8 368.2 304 269.7 304l-91.4 0z" />
                                                </svg>
                                                Agregar Paciente
                                            </button>
                                        </form>
                                    </li>


                                    <li>
                                        <form action="/jbctextil/moduloVentas/pedidos/getEnlacePedido.php" method="post">
                                            <button type="submit" name="btnPedidos" class="group relative flex items-center gap-2.5 rounded-sm px-4 py-2 font-medium text-white hover:text-yellow-300 duration-300 ease-in-out hover:bg-graydark dark:hover:bg-meta-4" href="#" @click="selected = (selected === 'Profile' ? '':'Profile')" :class="{ 'bg-graydark dark:bg-meta-4': (selected === 'Profile') &amp;&amp; (page === 'profile') }">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 576 512" class="fill-current"><!--!Font Awesome Free 6.7.2 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2024 Fonticons, Inc.-->
                                                    <path d="M0 24C0 10.7 10.7 0 24 0L69.5 0c22 0 41.5 12.8 50.6 32l411 0c26.3 0 45.5 25 38.6 50.4l-41 152.3c-8.5 31.4-37 53.3-69.5 53.3l-288.5 0 5.4 28.5c2.2 11.3 12.1 19.5 23.6 19.5L488 336c13.3 0 24 10.7 24 24s-10.7 24-24 24l-288.3 0c-34.6 0-64.3-24.6-70.7-58.5L77.4 54.5c-.7-3.8-4-6.5-7.9-6.5L24 48C10.7 48 0 37.3 0 24zM128 464a48 48 0 1 1 96 0 48 48 0 1 1 -96 0zm336-48a48 48 0 1 1 0 96 48 48 0 1 1 0-96z" />
                                                </svg>

                                                Listar de pacientes
                                            </button>
                                        </form>
                                    </li>

                                    <form action="/jbctextil/moduloVentas/Distribuidores/getEnlaceDistribuidores.php" method="post">
                                        <button name="btnDistribuidores" type="submit" class="group relative flex items-center gap-2.5 rounded-sm py-2 px-4 font-medium text-white hover:text-yellow-300 duration-300 ease-in-out hover:bg-graydark dark:hover:bg-meta-4">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 448 512" class="fill-current"><!--!Font Awesome Free 6.7.2 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2024 Fonticons, Inc.-->
                                                <path d="M224 256A128 128 0 1 0 224 0a128 128 0 1 0 0 256zm-45.7 48C79.8 304 0 383.8 0 482.3C0 498.7 13.3 512 29.7 512l388.6 0c16.4 0 29.7-13.3 29.7-29.7C448 383.8 368.2 304 269.7 304l-91.4 0z" />
                                            </svg>
                                            Listar Sintomas
                                        </button>
                                    </form>

                                    <li>
                                        <form action="/jbctextil/moduloVentas/ComprobantesPago/getEnlaceComprobantesPago.php" method="post">
                                            <button name="btnComprobantesDePago" type="submit" class="group relative flex items-center gap-2.5 rounded-sm py-2 px-4 font-medium text-white hover:text-yellow-300 duration-300 ease-in-out hover:bg-graydark dark:hover:bg-meta-4">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 448 512" class="fill-current"><!--!Font Awesome Free 6.7.2 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2024 Fonticons, Inc.-->
                                                    <path d="M224 256A128 128 0 1 0 224 0a128 128 0 1 0 0 256zm-45.7 48C79.8 304 0 383.8 0 482.3C0 498.7 13.3 512 29.7 512l388.6 0c16.4 0 29.7-13.3 29.7-29.7C448 383.8 368.2 304 269.7 304l-91.4 0z" />
                                                </svg>
                                                Listar Enfermedades
                                            </button>
                                        </form>
                                    </li>
                                    <li>
                                        <form action="/enfermedades_prg/controlador/logoutController.php" method="post">
                                            <button type="submit" class="group relative flex items-center gap-2.5 rounded-sm px-4 py-2 font-medium text-white hover:bg-red-600 hover:text-white duration-300 ease-in-out bg-red-500">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 512 512" class="fill-current">
                                                    <path d="M502.6 233.4l-96-96c-9.4-9.4-24.6-9.4-33.9 0s-9.4 24.6 0 33.9L417.9 224H192c-13.3 0-24 10.7-24 24s10.7 24 24 24h225.9l-45.2 52.7c-9.4 9.4-9.4 24.6 0 33.9s24.6 9.4 33.9 0l96-96c9.4-9.4 9.4-24.6 0-34zM160 64c-35.3 0-64 28.7-64 64v256c0 35.3 28.7 64 64 64h192c13.3 0 24-10.7 24-24s-10.7-24-24-24H160c-8.8 0-16-7.2-16-16V128c0-8.8 7.2-16 16-16h192c13.3 0 24-10.7 24-24s-10.7-24-24-24H160z"/>
                                                </svg>
                                                Salir
                                            </button>
                                        </form>
                                    </li>

                            </ul>
                        <!-- Menu Pacientes -->
                        <?php }else { ?>

                            <h3 class="mb-4 ml-4 text-base font-medium text-white">Paciente</h3>
                            <ul class="mb-6 flex flex-col gap-1.5">

                                    <li>
                                        <form action="/jbctextil/moduloVentas/clientes/getEnlaceClientes.php" method="post">
                                            <button name="btnClientes" type="submit" class="group relative flex items-center gap-2.5 rounded-sm px-4 py-2 font-medium text-white hover:text-yellow-300 hover:bg-gray- duration-300 ease-in-out bg-meta-4" href="#">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 640 512" class="fill-current"><!--!Font Awesome Free 6.7.2 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2024 Fonticons, Inc.-->
                                                    <path d="M96 128a128 128 0 1 1 256 0A128 128 0 1 1 96 128zM0 482.3C0 383.8 79.8 304 178.3 304l91.4 0C368.2 304 448 383.8 448 482.3c0 16.4-13.3 29.7-29.7 29.7L29.7 512C13.3 512 0 498.7 0 482.3zM609.3 512l-137.8 0c5.4-9.4 8.6-20.3 8.6-32l0-8c0-60.7-27.1-115.2-69.8-151.8c2.4-.1 4.7-.2 7.1-.2l61.4 0C567.8 320 640 392.2 640 481.3c0 17-13.8 30.7-30.7 30.7zM432 256c-31 0-59-12.6-79.3-32.9C372.4 196.5 384 163.6 384 128c0-26.8-6.6-52.1-18.3-74.3C384.3 40.1 407.2 32 432 32c61.9 0 112 50.1 112 112s-50.1 112-112 112z" />
                                                </svg>
                                                Inicio
                                            </button>
                                        </form>
                                    </li>

 
                                    <li>
                                        <form action="/jbctextil/moduloVentas/Productos/getEnlaceProductos.php" method="post">
                                            <button name="btnProductos" type="submit" class="group relative flex items-center gap-2.5 rounded-sm py-2 px-4 font-medium text-white hover:text-yellow-300 duration-300 ease-in-out hover:bg-graydark dark:hover:bg-meta-4">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 448 512" class="fill-current"><!--!Font Awesome Free 6.7.2 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2024 Fonticons, Inc.-->
                                                    <path d="M224 256A128 128 0 1 0 224 0a128 128 0 1 0 0 256zm-45.7 48C79.8 304 0 383.8 0 482.3C0 498.7 13.3 512 29.7 512l388.6 0c16.4 0 29.7-13.3 29.7-29.7C448 383.8 368.2 304 269.7 304l-91.4 0z" />
                                                </svg>
                                                Realizar Test
                                            </button>
                                        </form>
                                    </li>

                                    <li>
                                        <form action="/jbctextil/moduloVentas/pedidos/getEnlacePedido.php" method="post">
                                            <button type="submit" name="btnPedidos" class="group relative flex items-center gap-2.5 rounded-sm px-4 py-2 font-medium text-white hover:text-yellow-300 duration-300 ease-in-out hover:bg-graydark dark:hover:bg-meta-4" href="#" @click="selected = (selected === 'Profile' ? '':'Profile')" :class="{ 'bg-graydark dark:bg-meta-4': (selected === 'Profile') &amp;&amp; (page === 'profile') }">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 576 512" class="fill-current"><!--!Font Awesome Free 6.7.2 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2024 Fonticons, Inc.-->
                                                    <path d="M0 24C0 10.7 10.7 0 24 0L69.5 0c22 0 41.5 12.8 50.6 32l411 0c26.3 0 45.5 25 38.6 50.4l-41 152.3c-8.5 31.4-37 53.3-69.5 53.3l-288.5 0 5.4 28.5c2.2 11.3 12.1 19.5 23.6 19.5L488 336c13.3 0 24 10.7 24 24s-10.7 24-24 24l-288.3 0c-34.6 0-64.3-24.6-70.7-58.5L77.4 54.5c-.7-3.8-4-6.5-7.9-6.5L24 48C10.7 48 0 37.3 0 24zM128 464a48 48 0 1 1 96 0 48 48 0 1 1 -96 0zm336-48a48 48 0 1 1 0 96 48 48 0 1 1 0-96z" />
                                                </svg>

                                                Mis Evaluaciones
                                            </button>
                                        </form>
                                    </li>

                                    <li>
                                        <form action="/jbctextil/moduloVentas/Distribuidores/getEnlaceDistribuidores.php" method="post">
                                            <button name="btnDistribuidores" type="submit" class="group relative flex items-center gap-2.5 rounded-sm py-2 px-4 font-medium text-white hover:text-yellow-300 duration-300 ease-in-out hover:bg-graydark dark:hover:bg-meta-4">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 448 512" class="fill-current"><!--!Font Awesome Free 6.7.2 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2024 Fonticons, Inc.-->
                                                    <path d="M224 256A128 128 0 1 0 224 0a128 128 0 1 0 0 256zm-45.7 48C79.8 304 0 383.8 0 482.3C0 498.7 13.3 512 29.7 512l388.6 0c16.4 0 29.7-13.3 29.7-29.7C448 383.8 368.2 304 269.7 304l-91.4 0z" />
                                                </svg>
                                                Mis Reportes
                                            </button>
                                        </form>
                                    </li>
                                    <li>
                                        <form action="/enfermedades_prg/controlador/logoutController.php" method="post">
                                            <button type="submit" class="group relative flex items-center gap-2.5 rounded-sm px-4 py-2 font-medium text-white hover:bg-red-600 hover:text-white duration-300 ease-in-out bg-red-500">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 512 512" class="fill-current">
                                                    <path d="M502.6 233.4l-96-96c-9.4-9.4-24.6-9.4-33.9 0s-9.4 24.6 0 33.9L417.9 224H192c-13.3 0-24 10.7-24 24s10.7 24 24 24h225.9l-45.2 52.7c-9.4 9.4-9.4 24.6 0 33.9s24.6 9.4 33.9 0l96-96c9.4-9.4 9.4-24.6 0-34zM160 64c-35.3 0-64 28.7-64 64v256c0 35.3 28.7 64 64 64h192c13.3 0 24-10.7 24-24s-10.7-24-24-24H160c-8.8 0-16-7.2-16-16V128c0-8.8 7.2-16 16-16h192c13.3 0 24-10.7 24-24s-10.7-24-24-24H160z"/>
                                                </svg>
                                                Salir
                                            </button>
                                        </form>
                                    </li>
                            </ul>
                        <?php } ?>

                    </div>
                </nav>
                <!-- Sidebar Menu -->
            </div>
        </div>
        <!-- ===== Sidebar  ===== -->
    <?php
    }

}
?>