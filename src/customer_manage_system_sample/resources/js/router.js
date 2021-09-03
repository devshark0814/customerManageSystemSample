import Vue from "vue";
import VueRouter from "vue-router";

Vue.use(VueRouter);

import Dashboard from "./views/dashboard/dashboard.vue";


const router = new VueRouter({
    mode: "history",
    routes: [
        {
            path: "/dashboard",
            name: "Dashboard",
            component: Dashboard,
        },
    ]
});

export default router;