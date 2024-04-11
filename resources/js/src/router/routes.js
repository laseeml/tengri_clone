import Home from "@/pages/Home.vue";
import Privacy from "@/pages/Privacy.vue";
import News from "@/pages/News.vue";
import Search from "@/pages/Search.vue";
import Login from "@/pages/Login.vue";
import Admin from "@/pages/Admin.vue";

const routes = [
    {
        path: '/',
        name: 'home',
        component: Home,
    },
    {
        path: '/privacy',
        name: 'privacy',
        component: Privacy
    },
    {
        path: '/news/:id',
        name: 'news',
        component: News,
        props: true
    },
    {
        path: '/search/:text',
        name: 'search',
        component: Search,
        props: true
    },
    {
        path: '/login',
        name: 'login',
        component: Login
    },
    {
        path: '/admin',
        name: 'admin',
        component: Admin
    }
]

export default routes;
