<script setup>
import useColaboradores from "../../composables/colaboradores";
import { onMounted } from "vue";

const { colaboradores, getColaboradores, destroyColaborador} = useColaboradores();

onMounted(() => getColaboradores());
</script>
<template>
    <div class="mt-12">
        <div class="flex justify-end m-2 p-2">
            <RouterLink :to="{name: 'ColaboradoresCreate'}" class="px-4 py-2 bg-indigo-500 hover:bg-indigo-700 text-white rounded">
                Inserir novo colaborador
            </RouterLink>
        </div>
        <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
            <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
                <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                    <tr>
                        <th scope="col" class="px-6 py-3">
                            Matrícula
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Nome
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Email
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Telefone
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Ações
                        </th>
                    </tr>
                </thead>
                <tbody>
                    <tr v-for="colaborador in colaboradores" :key="colaborador.id"
                        class="odd:bg-white odd:dark:bg-gray-900 even:bg-gray-50 even:dark:bg-gray-800 border-b dark:border-gray-700">
                        <td class="px-6 py-4">{{ colaborador.id }}</td>
                        <td class="px-6 py-4">{{ colaborador.nome }}</td>
                        <td class="px-6 py-4">{{ colaborador.email }}</td>
                        <td class="px-6 py-4">{{ colaborador.telefone }}</td>
                        <td class="px-6 py-4 space-x-2">
                            <RouterLink
                                :to="{ name: 'ColaboradoresEdit', params: { id: colaborador.id }}"
                                class="px-4 py-2 bg-green-500 hover:bg-green-700 text-white rounded"
                            >Editar</RouterLink>  
                            <button 
                                @click="destroyColaborador(colaborador.id)"
                                class="px-4 py-2 bg-red-500 hover:bg-red-700 text-white rounded">
                                Deletar
                            </button>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>

    </div>
</template>