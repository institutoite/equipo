<script setup>
import { ref } from 'vue';
import { Head, Link } from '@inertiajs/vue3';
import ApplicationMark from '@/Components/ApplicationMark.vue';
import Banner from '@/Components/Banner.vue';
import NavLink from '@/Components/NavLink.vue';
import { router } from '@inertiajs/vue3';

defineProps({
    title: String,
});

const showingNavigationDropdown = ref(false);

const logout = () => {
    router.post(route('logout'));
};
</script>

<template>
    <div>
        <Head :title="title" />

        <Banner />

        <!-- Página de Bienvenida -->
        <div class="min-h-screen bg-gray-100 dark:bg-gray-900">
            <nav class="bg-white dark:bg-gray-800 border-b border-gray-100 dark:border-gray-700">
                <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                    <div class="flex justify-between h-16">
                        <div class="flex">
                            <!-- Logo -->
                            <div class="shrink-0 flex items-center">
                                <Link :href="route('dashboard')">
                                    <ApplicationMark class="block h-9 w-auto" />
                                </Link>
                            </div>

                            <!-- Navigation Links -->
                            <div class="hidden space-x-8 sm:-my-px sm:ml-10 sm:flex">
                                <NavLink :href="route('dashboard')" :active="route().current('dashboard')">
                                    Dashboard
                                </NavLink>
                            </div>
                        </div>
                    </div>
                </div>
            </nav>

            <!-- Contenido Principal -->
            <div class="max-w-7xl mx-auto py-10 sm:px-6 lg:px-8">
                <div class="bg-white shadow sm:rounded-lg p-6">
                    <h1 class="text-2xl font-bold text-gray-800 dark:text-gray-200">Bienvenido al Sistema</h1>
                    <p class="mt-4 text-gray-600 dark:text-gray-400">
                        Este sistema está diseñado para ofrecer información y servicios relevantes para la Policía Boliviana. A continuación, encontrarás información clave sobre sus funciones y cómo acceder a diferentes recursos.
                    </p>

                    <!-- Sección de Información sobre la Policía Boliviana -->
                    <section class="mt-8">
                        <h2 class="text-xl font-semibold text-gray-800 dark:text-gray-200">Misión de la Policía Boliviana</h2>
                        <p class="mt-2 text-gray-600 dark:text-gray-400">
                            La misión de la Policía Boliviana es mantener el orden público, garantizar la seguridad ciudadana, y hacer cumplir la ley en todo el territorio nacional.
                        </p>

                        <h2 class="mt-8 text-xl font-semibold text-gray-800 dark:text-gray-200">Valores Institucionales</h2>
                        <ul class="mt-2 list-disc list-inside text-gray-600 dark:text-gray-400">
                            <li>Integridad</li>
                            <li>Responsabilidad</li>
                            <li>Compromiso con la sociedad</li>
                            <li>Transparencia</li>
                        </ul>
                    </section>

                    <!-- Enlaces a Recursos y Contacto -->
                    <section class="mt-8">
                        <h2 class="text-xl font-semibold text-gray-800 dark:text-gray-200">Recursos Importantes</h2>
                        <div class="mt-4 space-y-4">
                            <Link href="https://policiaboliviana.gob.bo" target="_blank" class="text-blue-600 dark:text-blue-400 hover:underline">
                                Sitio Oficial de la Policía Boliviana
                            </Link>

                            <Link href="/reportes" class="text-blue-600 dark:text-blue-400 hover:underline">
                                Reportar un Incidente
                            </Link>

                            <Link href="/contacto" class="text-blue-600 dark:text-blue-400 hover:underline">
                                Contacto y Asistencia
                            </Link>
                        </div>
                    </section>

                    <!-- Botón de Cierre de Sesión -->
                    <div class="mt-8">
                        <button @click="logout" class="bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-4 rounded">
                            Cerrar Sesión
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<style scoped>
a:hover {
    color: #2563eb; /* Tailwind 'blue-600' */
}
</style>
