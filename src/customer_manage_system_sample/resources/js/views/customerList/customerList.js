import { $WebAPI } from "@/commonjs/WebAPI";
import customerDefaultInfo from '@/views/components/customerDefaultInfo.vue';

export default {
    components :{
        customerDefaultInfo
    },
    data() {
        return {
            loading: false,
            search: '',
            headers:[
                {text: '顧客ID', value: 'id'},
                {text: '顧客名', value: 'customer_name'},
                {text: '顧客名かな', value: 'customer_name_kana'},
            ],
            desserts:[],
            dialog: false,
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
        },
        clickRow(row) {
            this.dialog = true;
            this.setDatas(row);
        },
        getDatas() {

        },
        // 子コンポーネントにデータ引継ぎ
        setDatas(row) {
            this.$refs.customerDefaultInfo.setDatas(row);
        },
    }
};
