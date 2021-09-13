<template>
    <v-form>
        <v-simple-table>
            <template v-slot:default>
                <tbody class="simple_table">
                    <tr>
                        <th>
                            氏名
                        </th>
                        <td>
                            <v-text-field
                                class="table_object"
                                v-model="customer_name"
                                outlined
                                clearable
                                dense
                                counter="50"
                                :rules="[rules.required]"
                            ></v-text-field>
                        </td>
                    </tr>
                    <tr>
                        <th>
                            氏名かな
                        </th>
                        <td>
                            <v-text-field
                                class="table_object"
                                v-model="customer_name_kana"
                                outlined
                                clearable
                                dense
                                counter="100"
                                :rules="[rules.required]"
                            ></v-text-field>
                        </td>
                    </tr>
                    <tr>
                        <th>
                            性別
                        </th>
                        <td>
                            <v-checkbox
                                class="pa-0 ma-0"
                                v-model="sex"
                                label="男性"
                                color="red"
                                value="1"
                                hide-details
                            ></v-checkbox>
                            <v-checkbox
                                class="pa-0 ma-0"
                                v-model="sex"
                                label="女性"
                                color="red"
                                value="2"
                                hide-details
                            ></v-checkbox>
                        </td>
                    </tr>
                    <tr>
                        <th>
                            生年月日
                        </th>
                        <td>
                            <v-menu
                                ref="menu"
                                v-model="menu"
                                :close-on-content-click="false"
                                transition="scale-transition"
                                offset-y
                                min-width="auto"
                            >
                                <template v-slot:activator="{ on, attrs }">
                                    <v-text-field
                                        class="table_object"
                                        v-model="birthday"
                                        prepend-icon="mdi-calendar"
                                        readonly
                                        v-bind="attrs"
                                        v-on="on"
                                        outlined
                                        clearable
                                        dense
                                        :rules="[rules.required]"
                                    ></v-text-field>
                                </template>
                                <v-date-picker
                                    v-model="birthday"
                                    :active-picker.sync="activePicker"
                                    :max="
                                        new Date(
                                            Date.now() -
                                                new Date().getTimezoneOffset() *
                                                    60000
                                        )
                                            .toISOString()
                                            .substr(0, 10)
                                    "
                                    min="1950-01-01"
                                    @change="save"
                                ></v-date-picker>
                            </v-menu>
                        </td>
                    </tr>
                    <tr>
                        <th>
                            電話番号(home)
                        </th>
                        <td>
                            <v-text-field
                                class="table_object"
                                v-model="tel_home"
                                outlined
                                clearable
                                dense
                                counter="10"
                                :rules="[rules.required, rules.lenght_10]"
                            ></v-text-field>
                        </td>
                    </tr>
                    <tr>
                        <th>
                            電話番号(celler)
                        </th>
                        <td>
                            <v-text-field
                                class="table_object"
                                v-model="tel_celler"
                                outlined
                                clearable
                                dense
                                counter="11"
                                :rules="[rules.required, rules.lenght_11]"
                            ></v-text-field>
                        </td>
                    </tr>
                    <tr>
                        <th>
                            メールアドレス
                        </th>
                        <td>
                            <v-text-field
                                class="table_object"
                                v-model="e_mail"
                                outlined
                                clearable
                                dense
                                :rules="[rules.required, rules.mail_regex]"
                            ></v-text-field>
                        </td>
                    </tr>
                    <tr>
                        <th>
                            郵便番号
                        </th>
                        <td>
                            <v-text-field
                                class="table_object"
                                v-model="post_code"
                                outlined
                                clearable
                                dense
                                counter="7"
                                :rules="[rules.required, rules.lenght_7]"
                            ></v-text-field>
                        </td>
                    </tr>
                    <tr>
                        <th>
                            住所
                        </th>
                        <td>
                            <v-text-field
                                class="table_object"
                                v-model="address"
                                outlined
                                clearable
                                dense
                                :rules="[rules.required]"
                            ></v-text-field>
                        </td>
                    </tr>
                    <tr>
                        <th>
                            住所かな
                        </th>
                        <td>
                            <v-text-field
                                class="table_object"
                                v-model="address_kana"
                                outlined
                                clearable
                                dense
                                :rules="[rules.required]"
                            ></v-text-field>
                        </td>
                    </tr>
                </tbody>
            </template>
        </v-simple-table>
    </v-form>
</template>
<script>
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
            id: 0,
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
            // バリデーション
            valid: false,
            rules: {
                required: v => !!v || "必須項目です",
                mail_regex: v =>
                    /^(([^<>()[\]\\.,;:\s@]+(\.[^<>()[\]\\.,;:\s@]+)*)|(.+))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/.test(
                        v
                    ) || "メールアドレスのフォーマットが間違っています",
                lenght_10: v =>
                    String(v.length) <= 10 ||
                    "10桁以内のハイフン無しで入力してください",
                lenght_11: v =>
                    String(v.length) <= 11 ||
                    "11桁以内のハイフン無しで入力してください",
                lenght_7: v =>
                    String(v.length) <= 7 ||
                    "7桁以内のハイフン無しで入力してください"
            }
            //-----------------------
        };
    },
    watch: {
        menu(val) {
            val && setTimeout(() => (this.activePicker = "YEAR"));
        },
        post_code: function(post_code) {
            let _this = this;
            new YubinBango.Core(post_code, function(addr) {
                _this.pref_id = addr.region; // 都道府県ID
                _this.locality = addr.locality; // 市区町村
                _this.street = addr.street; // 町域
                _this.address = _this.pref_id + _this.locality + _this.street;
            });
        }
    },
    methods: {
        save(birthday) {
            this.$refs.menu.save(birthday);
        },
        getDatas() {
            let param = {
                id: this.id,
                customer_name: this.customer_name,
                customer_name_kana: this.customer_name_kana,
                sex: this.sex,
                birthday: this.birthday,
                tel_home: this.tel_home,
                tel_celler: this.tel_celler,
                e_mail: this.e_mail,
                post_code: this.post_code,
                address: this.address,
                address_kana: this.address_kana,
                status: 1
            };
            this.$emit("getDatas", param);
        },
        setDatas(objs) {
            this.clearDatas();
            this.id = objs.id;
            this.customer_name = objs.customer_name;
            this.customer_name_kana = objs.customer_name_kana;
            this.sex = objs.sex;
            this.birthday = objs.birthday;
            this.tel_home = objs.tel_home;
            this.tel_celler = objs.tel_celler;
            this.e_mail = objs.e_mail;
            this.post_code = objs.post_code;
            this.address = objs.address;
            this.address_kana = objs.address_kana;
            this.status = objs.status;
        },
        clearDatas() {
            this.id = 0;
            this.customer_name = "";
            this.customer_name_kana = "";
            this.sex = "";
            this.birthday = "";
            this.tel_home = "";
            this.tel_celler = "";
            this.e_mail = "";
            this.post_code = "";
            this.address = "";
            this.address_kana = "";
            this.status = 1;
        }
    }
};
</script>
<style>
.simple_table th {
    height: 80px !important;
    width: 300px;
    vertical-align: middle;
    color: #24a974;
    font-size: 14px !important;
    letter-spacing: 0.1em;
    background-color: #f3fcf8;
    border-bottom: 1px solid #20bd7e !important;
}
@media screen and (max-width: 640px) {
    .last td:last-child {
        border-bottom: solid 1px #ccc;
        width: 100%;
    }
    .simple_table {
        width: 80% !important;
    }
    .simple_table th {
        display: block;
        width: 100%;
        height: 30px !important;
        color: #24a974;
        font-size: 14px !important;
        letter-spacing: 0.1em;
        background-color: #f3fcf8;
        border-bottom: 1px solid #20bd7e !important;
        padding-top: 5px !important;
    }
    .simple_table td {
        display: block;
        width: 100%;
        border: none !important;
        margin-bottom: 15px !important;
        margin-top: 5px !important;
    }
}

/* .table_header {
    height: 80px !important;
    width: 300px;
    vertical-align: middle;
    color: #24a974;
    font-size: 14px !important;
    letter-spacing: 0.1em;
    background-color: #f3fcf8;
    border-bottom: 1px solid #20bd7e !important;
}
.table_object {
    margin-top: 2% !important;
} */
</style>
