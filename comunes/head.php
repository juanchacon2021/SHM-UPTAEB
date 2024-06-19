<header>
        <span class="absolute text-white text-4xl top-5 left-4 cursor-pointer" onclick="Openbar()">
            <i class="fa-solid fa-stethoscope bi bi-filter-left px-2 bg-yellow-600 rounded-md"></i>
        </span>
        <div class="sidebar fixed top-0 bottom-0 lg:left-0 left-[-300px] duration-1000 
            p-2 w-[300px] overflow-y-auto text-center bg-yellow-600 shadow h-screen">
            <div class="text-gray-100 text-xl">
            <div class="p-2.5 mt-1 flex items-center rounded-md ">
                <span class="relative flex h-3 w-3">
                    <span class="animate-ping absolute inline-flex h-full w-full rounded-full bg-sky-400 opacity-75"></span>
                    <span class="relative inline-flex rounded-full h-3 w-3 bg-sky-500"></span>
                </span>
                <i class="fa-solid fa-house px-2 py-2 bg-yellow-800 rounded-md"></i>
                <h1 class="text-[15px]  ml-3 text-xl text-gray-200 font-bold">CDI - Carmen Estella Mendoza de Flores</h1>
                <i class="bi bi-x ml-20 cursor-pointer lg:hidden" onclick="Openbar()"></i>
            </div>
            <hr class="my-2 text-gray-600">

            <div>
                <div class="p-2.5 mt-3 flex items-center rounded-md px-4 duration-300 cursor-pointer  bg-yellow-700">
                <i class="bi bi-search text-sm"></i>
                <input class="text-[15px] ml-4 w-full bg-transparent focus:outline-none rounded-md" placeholder="Busqueda..." />
                </div>

                <!--    ESCRITORIO es el inicio de la pagina asi que sugiero que deba mostrar los pacientes en fila para ese dia    -->
                <div class="p-2.5 mt-2 flex items-center rounded-md px-4 duration-300 cursor-pointer  hover:bg-yellow-500">
                    <i class="fa-solid fa-desktop"></i>
                <span class="text-[15px] ml-4 text-gray-200 text-lg">Escritorio</span>
                </div>

                <div class="p-2.5 mt-2 flex items-center rounded-md px-4 duration-300 cursor-pointer  hover:bg-yellow-500">
                    <i class="fa-solid fa-hospital-user"></i>
                <a href="?pagina=pacientes"><span class="text-[15px] ml-4 text-gray-200 text-lg">Pacientes</span></a>
                </div>

                <hr class="my-4 text-gray-600">

                <div class="p-2.5 mt-2 flex items-center rounded-md px-4 duration-300 cursor-pointer  hover:bg-yellow-500">
                    <i class="fa-solid fa-hospital"></i>
                <div class="flex justify-between w-full items-center" onclick="dropDown1()">
                    <span class="text-[15px] ml-4 text-gray-200 text-lg">Centro Medico</span>
                    <span class="text-sm rotate-180" id="arrow1">
                        <i class="fa-solid fa-angle-down"></i>
                    </span>
                </div>
                </div>
                <div class=" leading-7 text-left text-sm font-thin mt-2 w-4/5 mx-auto" id="submenu">

                    <!--    PERSONAL: Registra a un nuevo usuario otorgandole los permisos que el usuario mayor (Doctor) quiera que ese usuario tenga-->
                    <a href=""><h1 class="cursor-pointer p-2 hover:bg-yellow-500 rounded-md mt-1 text-lg">Personal</h1></a>

                    <!--    PERMISOS: Muestra la lista de permisos que tiene el usuario ingresado ejemplo
                    Al doctor le deben aparecer todos los permisos en cambio a los usuarios que creo el doctor solo le deben
                    aparecer los permisos que le otorgaron-->
                    <a href=""><h1 class="cursor-pointer p-2 hover:bg-yellow-500 rounded-md mt-1 text-lg">Permisos</h1></a>
                </div>

                <div class="p-2.5 mt-2 flex items-center rounded-md px-4 duration-300 cursor-pointer  hover:bg-yellow-600">
                    <!--    ATENCION este espacio lleva a una linea de atencion donde el usuario coloca la cedula del Paciente
                    y el aparece todo lo relacionado con ese paciente de forma basica, etc
                    tambien debe tener un boton de agregar paciente...-->
                    <i class="fa-solid fa-circle-exclamation"></i>  
                    <span class="text-[15px] ml-4 text-gray-200 text-lg">Atención</span>
                </div>

                <div class="p-2.5 mt-2 flex items-center rounded-md px-4 duration-10000 cursor-pointer  hover:bg-yellow-600">
                    <i class="fa-solid fa-chart-simple"></i>
                    <div class="flex justify-between w-full items-center" onclick="dropDown2()">
                        <span class="text-[15px] ml-4 text-gray-200 text-lg">Consultas</span>
                        <span class="text-sm rotate-180" id="arrow2">
                            <i class="fa-solid fa-angle-down"></i>
                        </span>
                </div>
                </div>
                <div class=" leading-7 text-left text-sm font-thin mt-2 w-4/5 mx-auto" id="submenu2">

                    <!--    USUARIOS: Muestra la cantidad de usuarios registrados en el sistema (esta opcion solo debe ser visible para el doctor)-->
                    <a href=""><h1 class="cursor-pointer p-2 hover:bg-yellow-900 rounded-md mt-1">Usuarios</h1></a>

                    <!--    Historias: Muestra absolutamente toda la historia medica de un paciente en especial
                            Opino que deberia tener tambien un boton de imprimir para que se descargue en PDF
                            toda su historia medica
                    -->
                    <a href=""><h1 class="cursor-pointer p-2 hover:bg-yellow-900 rounded-md mt-1">Historias</h1></a>
                </div>

                <div class="p-2.5 mt-3 flex items-center rounded-md px-4 duration-300 cursor-pointer  hover:bg-yellow-600">
                    <i class="fa-solid fa-right-from-bracket"></i>
                    <span class="text-[15px] ml-4 text-gray-200 text-lg">Cerrar Sesión</span>
                </div>

                </div>
            </div>
        </div>
    </header>