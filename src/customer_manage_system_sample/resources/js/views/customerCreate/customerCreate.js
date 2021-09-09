import { $WebAPI } from "@/commonjs/WebAPI";
import customerDefaultInfo from '@/views/components/customerDefaultInfo.vue';
export default {
    components :{
        customerDefaultInfo,
    },
    data() {
        return {
            creatObj: {},
            snackMessage: "",
            snack:false,
            creatingFlag: false,
        };
    },
    methods: {
        // 子コンポーネントからデータ取得
        getDatas(obj) {
            this.creatObj = obj;
        },
        // 登録処理
        clickSend: async function() {
            this.creatingFlag = true;
            this.$refs.customerDefaultInfo.getDatas();
            const res = await $WebAPI.postAxios("/api/customer_store",this.creatObj);
            this.creatingFlag = false;
            this.snack = true;
            this.snackMessage = res.data.message;
        }
    }
};
