<?php
class apartadosViews{
    protected function formSideBarShow()
    {
    ?>
        <div class="-translate-x-full absolute left-0 top-0 z-9999 flex h-screen w-72.5 flex-col bg-gray-950 ease-linear lg:static lg:translate-x-0 ">

            <div class="flex items-center gap-4 px-7 py-5.5 select-none">
                <div class="flex items-center mt-3 w-60">
                    <!-- Logo -->
                    <!--<img src="/jbctextil/images/JBCTEXTIL.png" alt="Logo" class="w-14 h-14">-->
                    <h1 class="text-2xl font-semibold text-gray-50 ml-4">Eres un enfermo</h1>
                </div>
            </div>

            <div class="mt-2 no-scrollbar flex flex-col overflow-y-auto duration-100 ease-linear select-none">
                <!-- Menu -->
                <nav class="mt-5 px-4 py-4 lg:mt-9 lg:px-6">
                    <div>
                        <!-- Menu Medico -->
                        <?php if ($_SESSION['rol']=='m') { ?>
                            <h3 class="mb-4 ml-4 text-base font-medium text-white">Medico</h3>
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

    protected function formHeadShow_2()
    {
    ?>
        <!-- ===== Header  ===== -->
        <header
            class="sticky p-1 top-0 z-999 flex w-full drop-shadow-1 bg-gray-950 shadow-md shadow-neutral-950">
            <div
                class="flex flex-grow items-center justify-between px-4 py-4 shadow-2 md:px-6 2xl:px-11">
                <div class="hidden select-none sm:block">
                    <div class="relative">
                        <p class="text-2xl text-white font-semibold">Bienvenido al Sistema Empresarial</p>
                    </div>
                </div>

                <div class="flex items-center gap-3 2xsm:gap-7">
                    <ul class="flex items-center gap-2 2xsm:gap-4">
                    </ul>

                    <!-- User Area -->
                    <div>
                        <a
                            class="flex items-center gap-4 cursor-default"
                            id="dropdown-toggle"
                            href="#">
                            <span class="hidden text-right lg:block">
                                <span class="block text-lg font-medium text-white select-none"></span>
                            </span>
                            <svg fill="none" width="18"
                                height="12" class="hidden fill-current sm:block" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512"><!--!Font Awesome Free 6.7.2 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2024 Fonticons, Inc.-->
                                <path fill="#ffffff" d="M201.4 374.6c12.5 12.5 32.8 12.5 45.3 0l160-160c12.5-12.5 12.5-32.8 0-45.3s-32.8-12.5-45.3 0L224 306.7 86.6 169.4c-12.5-12.5-32.8-12.5-45.3 0s-12.5 32.8 0 45.3l160 160z" />
                            </svg>
                        </a>

                        <!-- Dropdown Start -->
                        <div
                            id="dropdown-menu"
                            class="hidden absolute right-1 mt-5 flex w-44 flex-col rounded-sm border-t-2 border-gray-800 bg-gray-950 shadow-default">
                            <button
                                class="text-white flex items-center gap-3.5 px-6 py-4 text-sm font-medium duration-300 ease-in-out hover:text-yellow-300 lg:text-base">
                                <svg
                                    class="fill-current"
                                    width="22"
                                    height="22"
                                    viewBox="0 0 22 22"
                                    fill="none"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <path
                                        d="M15.5375 0.618744H11.6531C10.7594 0.618744 10.0031 1.37499 10.0031 2.26874V4.64062C10.0031 5.05312 10.3469 5.39687 10.7594 5.39687C11.1719 5.39687 11.55 5.05312 11.55 4.64062V2.23437C11.55 2.16562 11.5844 2.13124 11.6531 2.13124H15.5375C16.3625 2.13124 17.0156 2.78437 17.0156 3.60937V18.3562C17.0156 19.1812 16.3625 19.8344 15.5375 19.8344H11.6531C11.5844 19.8344 11.55 19.8 11.55 19.7312V17.3594C11.55 16.9469 11.2062 16.6031 10.7594 16.6031C10.3125 16.6031 10.0031 16.9469 10.0031 17.3594V19.7312C10.0031 20.625 10.7594 21.3812 11.6531 21.3812H15.5375C17.2219 21.3812 18.5625 20.0062 18.5625 18.3562V3.64374C18.5625 1.95937 17.1875 0.618744 15.5375 0.618744Z"
                                        fill="" />
                                    <path
                                        d="M6.05001 11.7563H12.2031C12.6156 11.7563 12.9594 11.4125 12.9594 11C12.9594 10.5875 12.6156 10.2438 12.2031 10.2438H6.08439L8.21564 8.07813C8.52501 7.76875 8.52501 7.2875 8.21564 6.97812C7.90626 6.66875 7.42501 6.66875 7.11564 6.97812L3.67814 10.4844C3.36876 10.7938 3.36876 11.275 3.67814 11.5844L7.11564 15.0906C7.25314 15.2281 7.45939 15.3312 7.66564 15.3312C7.87189 15.3312 8.04376 15.2625 8.21564 15.125C8.52501 14.8156 8.52501 14.3344 8.21564 14.025L6.05001 11.7563Z"
                                        fill="" />
                                </svg>
                                <a href="../index.php"> Salir</a>
                            </button>
                        </div>
                        <!-- Dropdown End -->
                    </div>
                    <!-- User Area -->
                </div>
            </div>
        </header>
        <!-- ===== Header  ===== -->
    <?php
    }

}
?>