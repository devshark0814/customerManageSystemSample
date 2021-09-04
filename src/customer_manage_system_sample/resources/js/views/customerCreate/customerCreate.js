import { $WebAPI } from "@/commonjs/WebAPI";
export default {
    data() {
        return {
            activePicker: null,
            menu: false,
            // 郵便番号周り-----------
            pref_id: null,
            locality: null,
            street: null,
            address: "",
            //-----------------------
            // model-----------------
            customer_name: "",
            customer_name_kana: "",
            sex: "",
            birthday: "",
            tel_home: "",
            tel_celler: "",
            post_code: "",
            e_mail: "",
            address_kana: "",
            //-----------------------
        };
    },
    watch: {
        menu(val) {
            val && setTimeout(() => (this.activePicker = "YEAR"));
        },
        post_code: function(post_code) {
            let _this = this
            new YubinBango.Core(post_code, function(addr) {
                _this.pref_id  = addr.region // 都道府県ID
                _this.locality = addr.locality  // 市区町村
                _this.street   = addr.street　  // 町域
                _this.address = _this.pref_id + _this.locality + _this.street;
            })
        }
    },
    methods: {
        save(birthday) {
            this.$refs.menu.save(birthday);
        },
        clickSend: async function() {
            let param = {
                customer_name : this.customer_name,
                customer_name_kana : this.customer_name_kana,
                sex: this.sex,
                birthday: this.birthday,
                tel_home: this.tel_home,
                tel_celler: this.tel_celler,
                e_mail: this.e_mail,
                post_code: this.post_code,
                address: this.address,
                address_kana : this.address_kana,
                status : 1,
            }
            console.log(param);
            const res = await $WebAPI.postAxios("/api/customer_store",param);

        }
    }
};
