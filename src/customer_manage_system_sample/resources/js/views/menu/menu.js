export default {
    data() {
        return{
        }
    },

    methods: {
        // TODO メニューをループで
        clickHome() {
            this.$router.push("/dashboard");
        },
        clickCustomerCreate() {
            this.$router.push("/customerCreate");
        },
        clickCustomerIndex() {
            this.$router.push("/customerList");
        },
        clickCustomerKanban() {
            this.$router.push("/customerKanban");
        }
    }
};