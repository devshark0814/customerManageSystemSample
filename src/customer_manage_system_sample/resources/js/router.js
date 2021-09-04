import Vue from "vue";
import VueRouter from "vue-router";

Vue.use(VueRouter);

import Dashboard from "./views/dashboard/dashboard.vue";
import CustomerCreate from "./views/customerCreate/customerCreate.vue";
import CustomerList from "./views/customerList/customerList.vue";


const router = new VueRouter({
    mode: "history",
    routes: [
        {
            path: "/dashboard",
            name: "Dashboard",
            component: Dashboard,
        },
        {
            path: "/customerCreate",
            name: "CustomerCreate",
            component: CustomerCreate,
        },
        {
            path: "/customerList",
            name: "CustomerList",
            component: CustomerList,
        },
    ]
});

export default router;