export default {
    data() {
        return{
        }
    },

    methods: {
        clickCustomerCreate() {
            this.$router.push("/customerCreate");
        },
        clickCustomerIndex() {
            this.$router.push("/customerList");
        }
    }
};