
import ColaboradoresEditVue from '../Colaboradores/ColaboradoresEdit.vue';
<script>
import useRegistrarPonto from '@/composables/registrarPonto';
import useColaboradores from '@/composables/colaboradores';
import { onMounted, ref } from 'vue';
import axios from 'axios';

const { getColaborador, colaborador } = useColaboradores();
const { storePonto } = useRegistrarPonto();


export default {
  data() {
    return {
      currentDate: new Date().toLocaleDateString(), // Data atual
      currentTime: new Date().toLocaleTimeString(), // Hora atual
      horarios: [],
    };
  },
  created() {
    setInterval(() => {
      this.currentTime = new Date().toLocaleTimeString();
    }, 1000);
  },
  methods: {
    async registrarPonto() {
      try {
        const matricula = this.$refs.matricula.value;
        const params = {
          colaborador_id: matricula,
          data: this.currentDate,    // Data atual
          horario: this.currentTime, // Hora atual
        };
        const response = await axios.get('/registrarponto', { params });
        this.successMessage = "Ponto registrado com sucesso";

        //this.buscarPonto();
        
      } catch (error) {
        // tratamento de erro
      }
    },
    async buscarPonto() {
      try {
        const matricula = this.$refs.matricula.value;
        const responsee = await axios.post('buscarpontos', {matricula});
        this.horarios = responsee.data.map(value => {
          return value.horario}) 
        this.successMessage = "Ponto registrado com sucesso";
      } catch (error) {
        // tratamento de erro
      }
    },
    handleClick() {
      this.buscarPonto();
    }
  },
  mounted() {
    // Lógica para atualizar a hora atual em tempo real
  }
};

</script>
<template>
  <h1 class="text-2xl font-bold mb-4 text-center">Registro de Ponto</h1>
  <div class="container mx-auto mt-10 p-5 rounded shadow-lg max-w-md">
    <h1 class="text-2xl font-bold mb-4 text-center">{{ currentDate }}</h1>
    <h1 class="text-2xl font-bold mb-4 text-center">{{ currentTime }}</h1>
    <div class="mb-3">
      <p class="text-md mb-1" id="data"><strong>Data atual:</strong> {{ currentDate }}</p>
      <p class="text-md mb-1" id="horario"><strong>Hora atual:</strong> {{ currentTime }}</p>
      <label for="matricula" class="text-md mb-1">Matrícula:</label>
      <input type="text" id="matricula" ref="matricula"
        class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
    </div>
    <p v-if="successMessage" class="text-green-500">{{ successMessage }}</p>
    <button class="w-lg bg-blue-500 text-white p-2 mb-4 mt-4 rounded hover:bg-blue-700 transition-colors" @click="registrarPonto" >
      Registrar
    </button>
    <br />
    <div class="relative overflow-x-auto">
      <table class="w-full text-sm text-left rtl:text-right text-gray-500">
        <thead class="text-xs text-gray-700 uppercase bg-gray-50">
          <tr>
            <th scope="col" class="px-6 py-3" >
              Entrada
            </th>
            <th scope="col" class="px-6 py-3" >
              Entrada almoço
            </th>
            <th scope="col" class="px-6 py-3" >
              Saída almoço
            </th>
            <th scope="col" class="px-6 py-3" >
              Saída
            </th>
          </tr>
        </thead>
        <tbody>
          <tr class="bg-white border-b">
            <td class="px-6 py-4">
              08:00
            </td>
            <td class="px-6 py-4">
              12:00
            </td>
            <td class="px-6 py-4">
              13:00
            </td>
            <td class="px-6 py-4">
              18:00
            </td>
          </tr>
        </tbody>
      </table>
    </div>

  </div>
</template>
  
  
  