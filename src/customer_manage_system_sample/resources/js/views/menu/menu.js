export default {
    data() {
        return{
            menuList : [
                { name: "ダッシュボード", icon: "mdi-home", route: "/dashboard" },
                { name: "顧客登録", icon: "mdi-account-plus", route: "/customerCreate" },
                { name: "顧客一覧", icon: "mdi-view-list", route: "/customerList" },
                { name: "契約一覧", icon: "mdi-view-list", route: "/contractList" },
                { name: "顧客かんばん", icon: "mdi-view-list", route: "/customerKanban" },
                { name: "社員一覧", icon: "mdi-view-list", route: "/employeeList" },
            ]
        }
    },
};