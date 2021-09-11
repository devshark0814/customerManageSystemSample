import { $WebAPI } from "@/commonjs/WebAPI";
import draggable from "vuedraggable";
import kanbancard from "@/views/customerKanban/kanbanCard.vue";

export default {
    components: {
        draggable: draggable,
        kanbancard: kanbancard
    },
    data() {
        return {
            kanbans: [],
            dialog: false,
            cardItem: {
                title: "",
                body: "",
                progress: 0,
                type:1
            },
            toCardType: 1,
            
            title: "",
            body: "",
            progress: 10,
        };
    },

    created() {
        this.init();
    },

    computed: {
        taskCount: function() {
            return function(index) {
                return this.kanbans[index].items.length;
            };
        }
    },

    methods: {
        init: async function () {
            const res = await $WebAPI.postAxios("/api/kanban_index",{});
            this.kanbans = res.data;
        },
        // drop時
        onEnd(event) {
            let arr = this.kanbans.map(kanban => {
                let items = kanban.items;
                let type = kanban.kanban_type;
                let arr2 = items.map(item => {
                    item.status = type;
                    return item;
                });
                kanban.items = arr2;
                return kanban;
            });
            this.kanbans = arr;
            // TODO ステータスの更新処理
        },
    }
};
