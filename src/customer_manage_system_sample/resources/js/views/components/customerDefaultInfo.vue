<template>
    <v-form>
        <v-container>
            <v-row>
                <v-col>
                    <v-text-field
                        label="氏名"
                        v-model="customer_name"
                    ></v-text-field>
                </v-col>
            </v-row>
            <v-row>
                <v-col>
                    <v-text-field
                        label="氏名_カナ"
                        v-model="customer_name_kana"
                    ></v-text-field>
                </v-col>
            </v-row>
            <v-row>
                <v-col>
                    <v-checkbox
                        v-model="sex"
                        label="男性"
                        color="red"
                        value="1"
                        hide-details
                    ></v-checkbox>
                    <v-checkbox
                        v-model="sex"
                        label="女性"
                        color="red"
                        value="2"
                        hide-details
                    ></v-checkbox>
                </v-col>
            </v-row>
            <v-row>
                <v-col>
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
                                v-model="birthday"
                                label="生年月日"
                                prepend-icon="mdi-calendar"
                                readonly
                                v-bind="attrs"
                                v-on="on"
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
                </v-col>
            </v-row>
            <v-row>
                <v-col>
                    <v-text-field
                        label="電話番号(家)"
                        v-model="tel_home"
                    ></v-text-field>
                </v-col>
            </v-row>
            <v-row>
                <v-col>
                    <v-text-field
                        label="電話番号(携帯)"
                        v-model="tel_celler"
                    ></v-text-field>
                </v-col>
            </v-row>
            <v-row>
                <v-col>
                    <v-text-field
                        label="メールアドレス"
                        v-model="e_mail"
                    ></v-text-field>
                </v-col>
            </v-row>
            <v-row>
                <v-col>
                    <v-text-field
                        label="郵便番号"
                        v-model="post_code"
                    ></v-text-field>
                </v-col>
            </v-row>
            <v-row>
                <v-col>
                    <v-text-field
                        label="住所"
                        v-model="address"
                    ></v-text-field>
                </v-col>
            </v-row>
            <v-row>
                <v-col>
                    <v-text-field
                        label="住所_カナ"
                        v-model="address_kana"
                    ></v-text-field>
                </v-col>
            </v-row>
        </v-container>
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
        getDatas() {
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
            this.$emit("getDatas", param);
        },
        setDatas(objs) {
            this.clearDatas();
            this.customer_name      = objs.customer_name;
            this.customer_name_kana = objs.customer_name_kana;
            this.sex                = objs.sex;
            this.birthday           = objs.birthday;
            this.tel_home           = objs.tel_home;
            this.tel_celler         = objs.tel_celler;
            this.e_mail             = objs.e_mail;
            this.post_code          = objs.post_code;
            this.address            = objs.address;
            this.address_kana       = objs.address_kana;
            this.status             = objs.status;
        },
        clearDatas() {
            this.customer_name      = "";
            this.customer_name_kana = "";
            this.sex                = "";
            this.birthday           = "";
            this.tel_home           = "";
            this.tel_celler         = "";
            this.e_mail             = "";
            this.post_code          = "";
            this.address            = "";
            this.address_kana       = "";
            this.status             = 1;
        }
    }
};

</script>
