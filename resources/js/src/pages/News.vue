<template>
    <img v-if="oneNews.image && oneNews.image[0] === 'i'" :src="imageStorage + oneNews.image" alt="image" class="news-image">
    <img :src="oneNews.image" alt="image" class="news-image" v-else>
    <div class="news-centered">
        <div class="news-title">
            {{oneNews.description_title}}
        </div>
        <hr class="hr-line">
        <div class="news-desc">
            {{oneNews.description}}
        </div>
    </div>
    <router-link :to="{name: 'home'}" class="news-back">
        <svg xmlns="http://www.w3.org/2000/svg" width="40" height="40" fill="white" class="bi bi-x-circle" viewBox="0 0 16 16">
            <path d="M8 15A7 7 0 1 1 8 1a7 7 0 0 1 0 14m0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16"/>
            <path d="M4.646 4.646a.5.5 0 0 1 .708 0L8 7.293l2.646-2.647a.5.5 0 0 1 .708.708L8.707 8l2.647 2.646a.5.5 0 0 1-.708.708L8 8.707l-2.646 2.647a.5.5 0 0 1-.708-.708L7.293 8 4.646 5.354a.5.5 0 0 1 0-.708"/>
        </svg>
    </router-link>
</template>

<script setup>
import useNews from "@/service/News.js";
import {onMounted} from "vue";

const imageStorage = import.meta.env.VITE_API_IMAGE_STORAGE;

const {oneNews, getNews} = useNews()
const props = defineProps({
    id: {
        required: true,
        type: Number
    }
})

onMounted(() => getNews(props.id))
</script>

<style scoped>
.news-image{
    width: 100%;
    height: 400px;
}
.news-centered{
    width: 1000px;
    margin: 60px auto;
}
.news-title{
    font-weight: bold;
    font-size: 26px;
}
.hr-line{
    border: none;
    height: 3px;
    background-color: #000;
    width: 100%;
    margin: 25px 0;
}
.news-desc{
    font-size: 26px;
    white-space: pre-wrap;
}
.news-back{
    border: none;
    background-color: transparent;
    position: absolute;
    top: 45px;
    right: 30px;
}
</style>
