<template>
    <Head title="Bienvenidos - Policía Boliviana" />
    <div class="bg-gray-50 text-black/50 dark:bg-black dark:text-white/50">
        <!-- Imagen de Fondo -->
        <img
            id="background"
            class="absolute -left-20 top-0 max-w-[877px]"
            src=""
            onerror="document.getElementById('screenshot-container')?.classList.add('!hidden');
                      document.getElementById('docs-card')?.classList.add('!row-span-1');
                      document.getElementById('docs-card-content')?.classList.add('!flex-row');
                      document.getElementById('background')?.classList.add('!hidden');"
        />
        <!-- Contenedor Principal -->
        <div class="relative min-h-screen flex flex-col items-center justify-center selection:bg-[#FF2D20] selection:text-white">
            <div class="relative w-full max-w-4xl px-6 lg:max-w-7xl">
                
                <!-- Header -->
                <header class="grid grid-cols-2 items-center gap-2 py-10 lg:grid-cols-3">
                    <div class="flex lg:justify-center lg:col-start-2">
                        <img src="/path/to/logo.png" alt="Logo Policía Boliviana" class="h-20 w-auto" />
                    </div>
                    <nav class="-mx-3 flex flex-1 justify-end space-x-4">
                        <a href="/login" class="text-black hover:text-blue-700 dark:text-white hover:underline">Ingresar</a>
                        <a href="/register" class="text-black hover:text-blue-700 dark:text-white hover:underline">Registrarse</a>
                    </nav>
                </header>

                <!-- Sección de Bienvenida -->
                <section class="text-center py-10">
                    <h1 class="text-5xl font-bold text-green-800 dark:text-green-500">Bienvenidos a la Policía Boliviana</h1>
                    <p class="text-lg mt-4 text-gray-700 dark:text-gray-300">
                        Protegiendo y sirviendo a nuestra nación con integridad y compromiso.
                    </p>
                </section>

                <!-- Sección Misión -->
                <section class="py-12 bg-white dark:bg-gray-800">
                    <h2 class="text-3xl font-semibold text-center text-blue-900 dark:text-blue-400">Nuestra Misión</h2>
                    <p class="mt-6 text-center text-gray-600 dark:text-gray-400">
                        Garantizar la seguridad ciudadana y el orden público, protegiendo la vida, la integridad física y los bienes de todos los bolivianos.
                    </p>
                </section>

                <!-- Sección Visión -->
                <section class="py-12 bg-gray-100 dark:bg-gray-900">
                    <h2 class="text-3xl font-semibold text-center text-blue-900 dark:text-blue-400">Nuestra Visión</h2>
                    <p class="mt-6 text-center text-gray-600 dark:text-gray-400">
                        Ser una institución modelo en Latinoamérica, destacada por su profesionalismo, ética y cercanía con la comunidad.
                    </p>
                </section>

                <!-- Sección Valores -->
                <section class="py-12 bg-white dark:bg-gray-800">
                    <h2 class="text-3xl font-semibold text-center text-blue-900 dark:text-blue-400">Nuestros Valores</h2>
                    <div class="flex flex-wrap justify-around mt-8">
                        <div class="max-w-xs p-4">
                            <h3 class="text-xl font-bold">Integridad</h3>
                            <p class="text-gray-600 dark:text-gray-400">Actuamos con honestidad y responsabilidad en cada una de nuestras acciones.</p>
                        </div>
                        <div class="max-w-xs p-4">
                            <h3 class="text-xl font-bold">Servicio</h3>
                            <p class="text-gray-600 dark:text-gray-400">Comprometidos con el bienestar y la seguridad de todos los ciudadanos.</p>
                        </div>
                        <div class="max-w-xs p-4">
                            <h3 class="text-xl font-bold">Profesionalismo</h3>
                            <p class="text-gray-600 dark:text-gray-400">Nos capacitamos continuamente para ofrecer un servicio de calidad.</p>
                        </div>
                    </div>
                </section>

                <!-- Sección de Noticias -->
                <section class="py-12 bg-gray-100 dark:bg-gray-900">
                    <h2 class="text-3xl font-semibold text-center text-blue-900 dark:text-blue-400">Últimas Noticias</h2>
                    <ul class="mt-8 space-y-4">
                        <li>
                            <a href="#" class="block bg-white p-4 rounded-lg shadow-md hover:bg-gray-200 dark:bg-gray-800 dark:hover:bg-gray-700">
                                <h3 class="font-bold">Operativo contra el narcotráfico en Santa Cruz</h3>
                                <p class="text-sm text-gray-600 dark:text-gray-400">La Policía Boliviana logró desmantelar una red de narcotráfico...</p>
                            </a>
                        </li>
                        <li>
                            <a href="#" class="block bg-white p-4 rounded-lg shadow-md hover:bg-gray-200 dark:bg-gray-800 dark:hover:bg-gray-700">
                                <h3 class="font-bold">Capacitación a nuevos cadetes</h3>
                                <p class="text-sm text-gray-600 dark:text-gray-400">Se inició un nuevo ciclo de formación para cadetes en la Academia...</p>
                            </a>
                        </li>
                    </ul>
                </section>

                <!-- Sección de Contacto -->
                <section class="py-12 bg-white dark:bg-gray-800">
                    <h2 class="text-3xl font-semibold text-center text-blue-900 dark:text-blue-400">Contáctenos</h2>
                    <form class="max-w-xl mx-auto mt-8 space-y-4">
                        <input type="text" placeholder="Nombre" class="w-full p-3 border rounded-lg dark:bg-gray-900 dark:border-gray-700" />
                        <input type="email" placeholder="Correo Electrónico" class="w-full p-3 border rounded-lg dark:bg-gray-900 dark:border-gray-700" />
                        <textarea placeholder="Mensaje" class="w-full p-3 border rounded-lg dark:bg-gray-900 dark:border-gray-700" rows="4"></textarea>
                        <button class="w-full bg-blue-900 text-white py-3 rounded-lg hover:bg-blue-800">
                            Enviar Mensaje
                        </button>
                    </form>
                </section>

                <!-- Footer -->
                <footer class="mt-12 text-center text-gray-600 dark:text-gray-400">
                    <p>© 2024 Policía Boliviana - Todos los derechos reservados</p>
                </footer>
            </div>
        </div>
    </div>
</template>
