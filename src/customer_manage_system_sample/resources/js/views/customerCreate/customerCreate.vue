<template>
    <div style="padding:1% 5%">
        <v-card>
            <v-card-text>
                <customerDefaultInfo ref="customerDefaultInfo" @getDatas="getDatas" />
            </v-card-text>
            <v-card-actions>
                <v-btn color="primary" @click="clickSend">登録</v-btn>
            </v-card-actions>
        </v-card>
    </div>
</template>
<script src="./customerCreate.js"></script>
