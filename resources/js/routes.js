import VueRouter from 'vue-router'

const routes = [
    {
        path: '/',
        name: 'Home',
        component: require('./views/Home.vue').default
    },
    {
        path: '/about',
        name: 'About',
        component: require('./views/About.vue').default
    }
]

export default new VueRouter({
    routes
})