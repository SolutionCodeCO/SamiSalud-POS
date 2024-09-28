<?php
$user = $this->data['user'];
?>
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="public/css/style.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap"
        rel="stylesheet">
    <title>Mi perfil</title>
</head>


<body class="bg-blanco flex  w-full absolute min-h-[100vh]">
    <!-- Incluir la barra lateral izquierda-->
    <?php include 'views/partials/sidebar_left.php'; ?>

    <section id="contenido" class="flex flex-col bg-azul_oscuro_opacidad w-[60%] relative rounded-3xl my-5">
        <article class="w-full pt-5 px-8">
            <h2 class="text-azul_oscuro text-[32px] font-semibold">Mi perfil</h2>
            <p class="font-medium text-[18px] -mt-2 ">Aqui podrás gestionar tu usuario</p>
        </article>


        <article class="flex gap-5 pt-14 pb-5 mx-8">
            <?php $this->showMessages(); ?>

            <div
                class="transition-all shadow-lg relative w-[100%] h-[550px] rounded-xl  flex items-center justify-between p-10 gap-10">
                <div class="w-[30%] text-center">
                    <div
                        class="bg-white h-[100px] w-[100%] p-5 bg-[url('public/img/box.jpg')]  bg-cover bg-center rounded-lg">
                    </div>
                    <h4 class="text-xl"><?php echo $user->getNombre(); ?></h4>
                    <h4> <span class="-mt-2 text-[15px]">
                            <?php echo ($user->getId_rol() == '2') ? 'Administrador' : 'Empleado' ?></span></h4>
                </div>

                <div class="bg-white h-[100%] w-[70%] p-5 rounded-lg">
                    <h4 class="text-xl">Editar información:</h4>
                    <p class="text-azul text-sm">Ten en cuenta al cambiar tus datos, al lado de cada espacio cambiará
                        unitariamente cada item.</p>

                    <div class="w-full h-full gap-2 flex flex-col mt-5">
                        <div class="w-full h-12 mt-3 ">
                            <div class="w-[100%] h-12 relative rounded-xl">
                                <form action="<?php echo constant('URL') . '/user/updateUser'; ?>" method="post"
                                    class="w-full">
                                    <input type="hidden" name="id" value="<?php echo $user->getId(); ?>" />
                                    <div class="flex gap-5 justify-between items-center">
                                        <div class="w-full">
                                            <input required="" disable
                                                class="peer w-full h-[45px] bg-transparent outline-none px-4 text-base rounded-xl bg-white border border-[#4070f4] focus:shadow-md"
                                                id="nombre" type="text" name="usuario"
                                                value="<?php echo $user->getUsuario(); ?>" />
                                            <label
                                                class="absolute top-1/2 translate-y-[-50%] bg-white left-4 px-2 peer-focus:top-0 peer-focus:left-3 font-light text-base peer-focus:text-sm peer-focus:text-[#4070f4] peer-valid:-top-0 peer-valid:left-3 peer-valid:text-sm peer-valid:text-[#4070f4] duration-150"
                                                for="id">
                                                Usuario</label>

                                        </div>


                                    </div>


                            </div>
                        </div>
                        <div class="w-full h-12 mt-3 ">
                            <div class="w-[100%] h-12 relative rounded-xl">

                                <div class="flex gap-5 justify-between items-center">
                                    <div class="w-full">
                                        <input required="" disable
                                            class="peer w-full h-[45px] bg-transparent outline-none px-4 text-base rounded-xl bg-white border border-[#4070f4] focus:shadow-md"
                                            id="nombre" type="text" name="nombre"
                                            value="<?php echo $user->getNombre(); ?>" />
                                        <label
                                            class="absolute top-1/2 translate-y-[-50%] bg-white left-4 px-2 peer-focus:top-0 peer-focus:left-3 font-light text-base peer-focus:text-sm peer-focus:text-[#4070f4] peer-valid:-top-0 peer-valid:left-3 peer-valid:text-sm peer-valid:text-[#4070f4] duration-150"
                                            for="id">
                                            Nombre</label>

                                    </div>


                                </div>


                            </div>
                        </div>
                        <div class="w-full h-12 mt-3 ">
                            <div class="w-[100%] h-12 relative rounded-xl">

                                <div class="flex gap-5 justify-between items-center">
                                    <div class="w-full">
                                        <input required=""
                                            class="peer w-full h-[45px] bg-transparent outline-none px-4 text-base rounded-xl bg-white border border-[#4070f4] focus:shadow-md"
                                            id="nombre" type="text" name="nueva_contrasenia"
                                            />
                                        <label
                                            class="absolute top-1/2 translate-y-[-50%] bg-white left-4 px-2 peer-focus:top-0 peer-focus:left-3 font-light text-base peer-focus:text-sm peer-focus:text-[#4070f4] peer-valid:-top-0 peer-valid:left-3 peer-valid:text-sm peer-valid:text-[#4070f4] duration-150"
                                            for="id">
                                            Contraseña nueva</label>

                                    </div>
                                    
                                </div>
                                
                            </div>

                        </div>
                        <div class="w-full h-12 mt-3 ">
                            <div class="w-[100%] h-12 relative rounded-xl">

                                <div class="flex gap-5 justify-between items-center">
                                    <div class="w-full">
                                        <input required=""
                                            class="peer w-full h-[45px] bg-transparent outline-none px-4 text-base rounded-xl bg-white border border-[#4070f4] focus:shadow-md"
                                            id="nombre" type="text" name="confirmar_contrasenia"
                                           />
                                        <label
                                            class="absolute top-1/2 translate-y-[-50%] bg-white left-4 px-2 peer-focus:top-0 peer-focus:left-3 font-light text-base peer-focus:text-sm peer-focus:text-[#4070f4] peer-valid:-top-0 peer-valid:left-3 peer-valid:text-sm peer-valid:text-[#4070f4] duration-150"
                                            for="id">
                                            Confirmar contraseña</label>

                                    </div>
                                    
                                </div>
                                
                            </div>

                        </div>
                        <div class="w-full h-12 ">
                            
                            <button type="submit"
                            class="flex items-center bg-azul text-white gap-1 px-10 py-2   cursor-pointer text-gray-800 font-semibold tracking-widest rounded-md hover:bg-azul_oscuro hover:text-blanco duration-300 hover:gap-2 hover:translate-x-3">
                            Actualizar datos
                            <svg class="w-5 h-5" stroke="currentColor" stroke-width="1.5" viewBox="0 0 24 24"
                            fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path
                                    d="M6 12 3.269 3.125A59.769 59.769 0 0 1 21.485 12 59.768 59.768 0 0 1 3.27 20.875L5.999 12Zm0 0h7.5"
                                    stroke-linejoin="round" stroke-linecap="round"></path>
                                </svg>
                            </button>
                        </div>
                    </form>
                    </div>
                </div>




        </article>


    </section>

    <!-- Incluir la barra lateral derecha-->
    <?php include 'views/partials/sidebar_right.php'; ?>

</body>
<script src="https://kit.fontawesome.com/db59255a97.js" crossorigin="anonymous"></script>
<script src="public/js/main.js"></script>


</html>