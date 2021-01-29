import VueRouter from 'vue-router'

const routes = [
    {
        path: '/',
        name: 'Home',
        component: require('./views/Home.vue').default
    },
    {
        path: '/co-foundry',
        name: 'CoFoundry',
        component: require('./views/CoFoundry.vue').default
    },
    {
        path: '/appetiser',
        name: 'Appetiser',
        component: require('./views/Appetiser.vue').default
    }
]

export default new VueRouter({
    routes
})