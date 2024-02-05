<script setup>
import { reactive } from 'vue';
import useColaboradores from '@/composables/colaboradores';
import { onMounted, ref } from 'vue';
import axios from 'axios';
import { TheMask } from 'vue-the-mask'

const { storeColaborador, errors } = useColaboradores();
const cargos = ref([]);
const funcoes = ref([]);

const form = reactive({
    nome: "",
    email: "",
    telefone: "",
    cpf: "",
    data_nascimento: "",
    cargo_id: null,
    funcao_id: null,
    ativo: false,
    data_admissao: "",
    data_rescisao: "",
})

onMounted(async () => {
    const response = await axios.get('/cargos');
    cargos.value = response.data;
});
onMounted(async () => {
    const response = await axios.get('/funcoes');
    funcoes.value = response.data;
});
</script>
<template>
    <div class="flex flex-col items-center justify-center py-12">
        <div class="header text-gray-700 text-5xl font-bold text-center mb-8">Inserir Colaborador</div>
        <form class="w-full max-w-2xl bg-white shadow-md rounded px-8 pt-6 pb-8 mb-4"
            @submit.prevent="storeColaborador(form)">
            <div class="mb-4">
                <label for="cpf" class="block text-gray-700 text-sm font-bold mb-2">CPF:</label>
                <input type="text" id="cpf" v-mask="'###.###.###-##'" v-model="form.cpf"
                    class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
                <!-- Mensagens de erro -->
                <div v-if="errors.cpf">
                    <span class="text-sm text-red-400">{{ errors.cpf[0] }}</span>
                </div>
            </div>
            <div class="mb-6 max-w">
                <label for="nome" class="block mb-2 text-sm font-medium text-gray-900">Nome</label>
                <input type="text" id="nome" v-model="form.nome"
                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 ">
                <div v-if="errors.nome">
                    <span class="text-sm text-red-400">Digite um nome válido (Nome e Sobrenome com as iniciais maiúsculas)</span>
                </div>
            </div>
            <div class="mb-6 max-w">
                <label for="email" class="block mb-2 text-sm font-medium text-gray-900">Email</label>
                <input type="text" id="email" v-model="form.email"
                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 ">
                <div v-if="errors.email">
                    <span class="text-sm text-red-400">{{ errors.email[0] }}</span>
                </div>
            </div>
            <div class="mb-6">
                <label for="telefone" class="block mb-2 text-sm font-medium text-gray-900">Telefone</label>
                <input type="text" id="telefone" v-mask="'(##) #####-####'" v-model="form.telefone"
                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 ">
                <div v-if="errors.telefone">
                    <span class="text-sm text-red-400">{{ errors.telefone[0] }}</span>
                </div>
            </div>
            <div class="mb-6">
                <label for="data_nascimento" class="block mb-2 text-sm font-medium text-gray-900">Data de
                    Nascimento</label>
                <input type="date" id="data_nascimento" v-model="form.data_nascimento"
                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5">
                <div v-if="errors.data_nascimento">
                    <span class="text-sm text-red-400">{{ errors.data_nascimento[0] }}</span>
                </div>
            </div>
            <div class="mb-6">
                <label for="cargo_id" class="block mb-2 text-sm font-medium text-gray-900">Cargo</label>
                <select id="cargo_id" v-model="form.cargo_id"
                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5">
                    <option v-for="cargo in cargos" :key="cargo.id" :value="cargo.id">
                        {{ cargo.nome }}
                    </option>
                </select>
            </div>
            <div class="mb-6">
                <label for="funcao_id" class="block mb-2 text-sm font-medium text-gray-900">Função</label>
                <select id="funcao_id" v-model="form.funcao_id"
                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5">
                    <option v-for="funcao in funcoes" :key="funcao.id" :value="funcao.id">
                        {{ funcao.nome }}
                    </option>
                </select>
            </div>
            <div class="mb-6">
                <label for="data_admissao" class="block mb-2 text-sm font-medium text-gray-900">Data de Admissão</label>
                <input type="date" id="data_admissao" v-model="form.data_admissao"
                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5">
                <div v-if="errors.data_admissao">
                    <span class="text-sm text-red-400">{{ errors.data_admissao[0] }}</span>
                </div>
            </div>

            <div class="mb-6">
                <label for="data_rescisao" class="block mb-2 text-sm font-medium text-gray-900">Data de Rescisão</label>
                <input type="date" id="data_rescisao" v-model="form.data_rescisao"
                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5">
                <div v-if="errors.data_rescisao">
                    <span class="text-sm text-red-400">{{ errors.data_rescisao[0] }}</span>
                </div>
            </div>
            <div class="mb-6">
                <label for="usuario" class="block mb-2 text-sm font-medium text-gray-900">Usuário</label>
                <input type="text" id="usuario" v-model="form.usuario"
                    class="bg-gray-200 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 "
                    disabled readonly>
            </div>
            <div class="mb-6">
                <input id="remember" type="checkbox" value="" v-model="form.telefone"
                    class="w-4 h-4 border border-black-300 rounded bg-gray-50 focus:ring-3 focus:ring-blue-300 dark:bg-gray-700 dark:border-gray-600 dark:focus:ring-blue-600 dark:ring-offset-gray-800"
                    disabled readonly>
                <label for="ativo" class="block mb-2 text-sm font-medium text-gray-900">Ativo?</label>
            </div>
            <div class="mt-4">
                <button type="submit"
                    class="px-4 py-2 bg-indigo-500 hover:bg-indigo-700 text-white rounded">Cadastrar</button>
            </div>

        </form>
    </div>
</template>