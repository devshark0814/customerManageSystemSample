<template>
    <div style="padding:1% 5%">
        <v-card>
            <v-card-text>
                <customerDefaultInfo ref="customerDefaultInfo" @getDatas="getDatas" />
            </v-card-text>
            <v-card-actions>
                <v-spacer />
                <v-btn style="width:20%" class="white--text" color="#24a974" @click="clickSend" :loading="creatingFlag">登録</v-btn>
                <v-spacer/>
            </v-card-actions>
        </v-card>
        <v-snackbar v-model="snack" absolute top right timeout=5000 color="success">
            {{ snackMessage }}
        </v-snackbar>
    </div>
</template>
<script src="./customerCreate.js"></script>
