import {ref} from "vue";
import axios from "axios";
import {useRouter} from "vue-router";

export default function useNews() {
    const newsList = ref([]);
    const newsListPagination = ref([]);
    const oneNews = ref([]);
    const searchNews = ref([]);

    const errors = ref('')
    const router = useRouter()

    const getNewsList = async (url = '/api/news') => {
        let response = await axios.get(url);
        newsList.value = response.data.data.data
        newsListPagination.value = response.data.data
    }

    const getNews = async (id) => {
        let response = await axios.get(`/api/news/${id}`)
        oneNews.value = response.data.data
    }

    const getSearchNews = async (text) => {
        let response = await axios.post('/api/news/find', {'find_by': text})
        searchNews.value = response.data.data
    }

    const createNews = async (data) => {
        errors.value = ''
        try {
            await axios.post('/api/news', data, {
                headers: {
                    'Content-Type': 'multipart/form-data'
                }
            })
            await router.push({name: 'admin'})
        }
        catch (e) {
            for (const key in e.response.data.errors) {
                errors.value = e.response.data.errors
            }
        }
    }

    return {
        errors,
        newsList,
        newsListPagination,
        oneNews,
        searchNews,
        getNewsList,
        getNews,
        getSearchNews,
        createNews
    }
}
