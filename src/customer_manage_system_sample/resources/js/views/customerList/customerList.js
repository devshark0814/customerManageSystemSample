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
                {text: '顧客ID', value: 'id', class: 'data_table_header'},
                {text: '顧客名', value: 'customer_name', class: 'data_table_header'},
                {text: '顧客名かな', value: 'customer_name_kana', class: 'data_table_header'},
            ],
            desserts:[],
            dialog: false,
            updateObj: {},
            // ダイアログボタン制御-------
            updating: false,
            deleting: false,
            //---------------------------
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
            this.updateObj = {};
            const res = await $WebAPI.postAxios("/api/customer_index",{});
            console.log(res);
            this.desserts = res.data.data;
            this.loading = false;
        },
        clickRow(row) {
            this.dialog = true;
            this.updateObj = {};
            this.setDatas(row);
        },
        getDatas(obj) {
            this.updateObj = obj;
        },
        // 子コンポーネントにデータ引継ぎ
        setDatas(row) {
            this.$refs.customerDefaultInfo.setDatas(row);
        },
        clickSave: async function() {
            this.updating = true;
            this.$refs.customerDefaultInfo.getDatas();
            const res = await $WebAPI.postAxios("/api/customer_update", this.updateObj);
            this.updating = false;
            this.dialog = false;
            this.searchList();
        },
        clickDelete: async function() {
            this.deleting = true;
            this.$refs.customerDefaultInfo.getDatas();
            const res = await $WebAPI.postAxios("/api/customer_destroy", this.updateObj);
            this.deleting = false;
            this.dialog = false;
            this.searchList();
        }
    }
};
