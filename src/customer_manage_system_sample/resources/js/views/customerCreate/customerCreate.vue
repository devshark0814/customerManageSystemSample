<template>
    <div>
        <customerDefaultInfo ref="customerDefaultInfo" @getDatas="getDatas" />
        <v-btn @click="clickSend">登録</v-btn>
    </div>
</template>
<script src="./customerCreate.js"></script>
