export default {

    props:[
        "card_contract_id",
        "card_status",
        "card_contract_title",
        "card_customer_name",
        "card_employee_name",
        "card_contract_desc",
        "card_progress",
    ],

    data() {
        return {
            dialog: false
        };
    },

    computed : {
        card_class: function() {
            if(this.card_status == 1) return "task_card_header_color_todo";
            if(this.card_status == 2) return "task_card_header_color_doing";
            if(this.card_status == 3) return "task_card_header_color_review";
            if(this.card_status == 4) return "task_card_header_color_done";
        },
        typeColor: function() {
            if(this.card_status == 1) return "#D84315";
            if(this.card_status == 2) return "#EF6C00";
            if(this.card_status == 3) return "#1565C0";
            if(this.card_status == 4) return "#66A638";
        }
    },

    methods: {
        clickCard() {
            this.dialog = true;
        }
    }
};
