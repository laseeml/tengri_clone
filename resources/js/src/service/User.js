import {ref} from "vue";
import axios from "axios";
import {useRouter} from "vue-router";

export default function useUser() {
    const user = ref([])
    const errors = ref('')

    const router = useRouter()

    const loginUser = async (data) => {
        errors.value = ''
        try {
            let response = await axios.post('/api/login', data)
            user.value = response.data.data
            await router.push({name: 'admin'})
        }
        catch (e) {
            for (const key in e.response.data.errors) {
                errors.value = e.response.data.errors
            }
        }
    }

    return {
        user,
        loginUser
    }
}
