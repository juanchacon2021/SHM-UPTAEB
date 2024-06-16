<!doctype html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://cdn.tailwindcss.com?plugins=forms,typography,aspect-ratio,line-clamp,container-queries"></script>
    <title>Sistema de Historia Medica</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css" integrity="sha512-SnH5WK+bZxgPHs44uWIX+LLJAJ9/2PkPKZ5QiAj6Ta86w+fsb2TkcmfRyVX3pBnMFcV7oQPJkl9QevSCWr3W6A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
    <div class="flex justify-center items-center h-screen bg-fixed" id="fondo">
        <div class="w-96 p-6 shadow-lg bg-white rounded-md  font-sans font-family: ui-sans-serif, system-ui, sans-serif">
            <h1 class="text-3xl block text-center font-semibold"><i class="fa-solid fa-user"></i> Iniciar Sesión</h1>
            <hr class="mt-3">
            <div class="mt-3">
                <label for="username" class="block text-base mb-2">Usuario</label>
                <input type="text" id="username" class="border w-full text-base px-2 py-1 focus:outline-none focus:ring-0 focus:border-gray-600 rounded-md" placeholder="Usuario..."  />
            </div>
            <div class="mt-3">
                <label for="password" class="block text-base mb-2">Contraseña</label>
                <input type="password" id="password" class="border w-full text-base px-2 py-1 focus:outline-none focus:ring-0 focus:border-gray-600 rounded-md" placeholder="Contraseña..."  />
            </div>
            <div class="mt-3 flex justify-between items-center">
                <div>
                    <input type="checkbox">
                    <label for="">Recuerdame</label>
                </div>
                <div>
                    <a href="#" class="text-yellow-700 font-se">Olvidaste tu Contraseña?</a>
                </div>
            </div>
            <div class="mt-5">
                <button type="submit" class="border-2 border-yellow-700 bg-yellow-500 text-white py-1 w-full rounded-md hover:bg-white hover:text-yellow-500 font-semibold">Ingresar</button>
            </div>
            <div class="mt-5">
                <a href="?pagina=inicio">inicio</a>
</div>
        </div>
    </div>
</body>
</html>

