import { ref } from 'vue';
import axios from 'axios';
import { useRouter } from 'vue-router';

axios.defaults.baseURL = "http://localhost:8000/api/";

export default function useColaboradores() {
    const colaboradores = ref([]);
    const colaborador = ref([]);
    const errors = ref({});
    const router = useRouter();

    const getColaboradores = async () => {
        const response = await axios.get("Colaboradores");
        colaboradores.value = response.data.data;
    }

    const getColaborador = async (id) => {
        const response = await axios.get("Colaboradores/" + id);
        colaborador.value = response.data.data;
    }

    const storeColaborador = async (data) => {
        try {
            await axios.post("Colaboradores", data);
            await router.push({name: "ColaboradoresIndex"})
        } catch(error)
        {
            if(error.response.status === 422){
                errors.value = error.response.data.errors;
            }
        }
    }

    const updateColaborador = async (id) => {
        try {
            await axios.put("Colaboradores/" + id, colaborador.value);
            await router.push({name: "ColaboradoresIndex"})
        } catch(error)
        {
            if(error.response.status === 422){
                errors.value = error.response.data.errors;
            }
        }
    }

    const destroyColaborador = async (id) => {
        if(!window.confirm("Você tem certeza que deseja excluir o colaborador")) {
            return;
        }
        await axios.delete("Colaboradores/" + id);
        await getColaboradores();
    }

    return {
        colaboradores,
        colaborador,
        getColaboradores,
        getColaborador,
        storeColaborador,
        updateColaborador,
        destroyColaborador,
        errors,
    };
}