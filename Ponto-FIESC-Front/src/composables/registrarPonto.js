import { ref } from 'vue';
import axios from 'axios';
import { useRouter } from 'vue-router';

axios.defaults.baseURL = "http://localhost:8000/api/";

export default function useRegistrarPonto() {
    const errors = ref({});

    const storePonto = async (data) => {
        try {
            if(!window.confirm("Você confirma o registro do ponto")) {
                return;
            }
            await axios.post("registrarponto", data);
            // await router.push({name: "ColaboradoresIndex"})
        } catch(error)
        {
            if(error.response.status === 422){
                errors.value = error.response.data.errors;
            }
        }
    }


    return {
        storePonto,    
    };
}