import { $WebAPI } from "@/commonjs/WebAPI";

export default {
    data() {
        return {
            loading: false,
            search: "",
            headers: [
                { text: "契約ID", value: "contract_id", class: "data_table_header" },
                {
                    text: "契約タイトル",
                    value: "contract_title",
                    class: "data_table_header"
                },
                {
                    text: "ステータス",
                    value: "status_name",
                    class: "data_table_header"
                },
                {
                    text: "作成日",
                    value: "created_at",
                    class: "data_table_header"
                },
                {
                    text: "更新日",
                    value: "updated_at",
                    class: "data_table_header"
                },
                {
                    text: "操作",
                    value: "actions",
                    sortable: false,
                    class: "data_table_header"
                }
            ],
            desserts: [],
            dialog: false,
            dialogDelete: false,

            editedIndex: -1,
            editedItem: {
                contract_id: 0,
                customer_id: 0,
                employee_id: 0,
                contract_title: "",
                contract_desc: "",
                status: 1,
                progress: 0,
            },
            defaultItem: {
                contract_id: 0,
                customer_id: 0,
                employee_id: 0,
                contract_title: "",
                contract_desc: "",
                status: 1,
                progress: 0,
            },

            empList: [],
            cusList: [],
            statusList: [
                { status_code: 1, status_name: "新規" },
                { status_code: 2, status_name: "着手中" },
                { status_code: 3, status_name: "確認中" },
                { status_code: 4, status_name: "完了" },
            ],
        };
    },

    computed: {
        formTitle() {
            return this.editedIndex === -1 ? "新規登録" : "編集";
        }
    },

    watch: {
        dialog(val) {
            val || this.close();
        },
        dialogDelete(val) {
            val || this.closeDelete();
        }
    },

    created() {
        this.init();
    },
    methods: {
        init() {
            this.searchList();
            this.searchPulldown();
        },
        // 一覧検索
        searchList: async function() {
            this.loading = true;
            const res = await $WebAPI.postAxios("/api/contract_index", {});
            this.desserts = res.data.data;
            this.loading = false;
        },
        // プルダウン表示用検索
        searchPulldown: async function() {
            const emp = await $WebAPI.postAxios("/api/employee_index", {});
            this.empList = emp.data.data;
            const cus = await $WebAPI.postAxios("/api/customer_index", {});
            this.cusList = cus.data.data;
        },
        close() {
            this.dialog = false;
            this.$nextTick(() => {
                this.editedItem = Object.assign({}, this.defaultItem);
                this.editedIndex = -1;
            });
        },
        closeDelete() {
            this.dialogDelete = false;
            this.$nextTick(() => {
                this.editedItem = Object.assign({}, this.defaultItem);
                this.editedIndex = -1;
            });
        },
        save: async function() {
            console.log(this.editedItem);
            if(this.editedItem.contract_id != 0) {
                // 更新
                const res = await $WebAPI.postAxios("/api/contract_update", this.editedItem);
            }else {
                // 登録
                const res = await $WebAPI.postAxios("/api/contract_store", this.editedItem);
            }
            this.close();
            this.searchList();
        },
        deleteItemConfirm: async function() {
            // this.desserts.splice(this.editedIndex, 1);
            const res = await $WebAPI.postAxios("/api/contract_destroy", this.editedItem);
            this.closeDelete();
            this.searchList();
        },
        editItem(item) {
            this.editedIndex = this.desserts.indexOf(item);
            this.editedItem = Object.assign({}, item);
            this.dialog = true;
        },
        deleteItem(item) {
            this.editedIndex = this.desserts.indexOf(item);
            this.editedItem = Object.assign({}, item);
            this.dialogDelete = true;
        }
    }
};
