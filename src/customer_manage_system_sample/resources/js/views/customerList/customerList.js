import { $WebAPI } from "@/commonjs/WebAPI";
export default {
    data() {
        return {
            loading: false,
            search: '',
            headers:[
                {text: '顧客ID', value: 'id'},
                {text: '顧客名', value: 'customer_name'},
                {text: '顧客名かな', value: 'customer_name_kana'},
            ],
            desserts:[]
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
            const res = await $WebAPI.postAxios("/api/customer_index",{});
            console.log(res);
            this.desserts = res.data.data;
            this.loading = false;
        }
    }
};
