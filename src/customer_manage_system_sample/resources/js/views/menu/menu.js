export default {
    data() {
        return{
            menuList : [
                { name: "ダッシュボード", icon: "mdi-home", route: "/dashboard" },
                { name: "顧客登録", icon: "mdi-account-plus", route: "/customerCreate" },
                { name: "顧客一覧", icon: "mdi-view-list", route: "/customerList" },
                { name: "顧客かんばん", icon: "mdi-view-list", route: "/customerKanban" },
            ]
        }
    },
};