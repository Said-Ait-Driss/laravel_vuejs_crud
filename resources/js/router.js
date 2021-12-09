import VueRouter from "vue-router";
import create from "./components/create.vue";
import home from "./components/index.vue";
import update from "./components/update.vue";

import Vue from "vue";

const routes =[
    {
        path:"/create",
        component:create
    },
    {
        path:"/",
        component:home
    },
    {
        path:"/update/:id",
        component:update
    }
];

Vue.use(VueRouter);

const router = new VueRouter({
    routes
});

export default router;
