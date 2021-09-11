import { $WebAPI } from "@/commonjs/WebAPI";

export default {
    data() {
        return {
            loading: false,
            search: '',
            headers:[
                {text: '従業員ID', value: 'id', class: 'data_table_header'},
                {text: '従業員名', value: 'employee_name', class: 'data_table_header'},
            ],
            desserts:[],
        };
    },
    created() {
        this.init();
    },
    methods: {
        init() {
            this.searchList();
        },
        searchList: async function() {
            this.loading = true;
            const res = await $WebAPI.postAxios("/api/employee_index",{});
            this.desserts = res.data.data;
            this.loading = false;
        },
        clickRow(row) {
        },
    }
};
