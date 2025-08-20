import {createRouter,createWebHistory} from 'vue-router'
import Home from '../components/Home.vue'
import About from '../components/About.vue'
import User from '../components/User.vue'
import Profile from '../components/Profile.vue'
import Settings from '../components/Settings.vue'

const routes = [
    {path: '/',component: Home},
    {path: '/about',component: About},
    {   path: '/user',
        component: User,
        children:[
            {path:'profile',component:Profile},
            {path:'settings',component: Settings}

        ]

    }
]

const router =createRouter({
    history:createWebHistory(),
    routes
})

export default router