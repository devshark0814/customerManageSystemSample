import { $WebAPI } from "@/commonjs/WebAPI";
import customerDefaultInfo from '@/views/components/customerDefaultInfo.vue';
export default {
    components :{
        customerDefaultInfo
    },
    data() {
        return {
            creatObj: {},
        };
    },
    methods: {
        // 子コンポーネントからデータ取得
        getDatas(obj) {
            this.creatObj = obj;
        },
        // 登録処理
        clickSend: async function() {
            this.$refs.customerDefaultInfo.getDatas();
            const res = await $WebAPI.postAxios("/api/customer_store",param);
        }
    }
};
