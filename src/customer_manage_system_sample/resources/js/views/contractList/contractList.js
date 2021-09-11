import { $WebAPI } from "@/commonjs/WebAPI";

export default {
    data() {
        return {
            loading: false,
            search: "",
            headers: [
                { text: "従業員ID", value: "id", class: "data_table_header" },
                {
                    text: "従業員名",
                    value: "employee_name",
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
                employee_name: "",
                employee_img_path: ""
            }
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
        },
        searchList: async function() {
            this.loading = true;
            const res = await $WebAPI.postAxios("/api/employee_index", {});
            this.desserts = res.data.data;
            this.loading = false;
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
            if('id' in this.editedItem) {
                // 更新
                const res = await $WebAPI.postAxios("/api/employee_update", this.editedItem);
            }else {
                // 登録
                const res = await $WebAPI.postAxios("/api/employee_store", this.editedItem);
            }
            this.close();
            this.searchList();
        },
        deleteItemConfirm: async function() {
            // this.desserts.splice(this.editedIndex, 1);
            const res = await $WebAPI.postAxios("/api/employee_destroy", this.editedItem);
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
