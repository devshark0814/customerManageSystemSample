<template>
    <v-card class="mx-auto navimenu" width="300" height="100%">
        <v-list>
            <v-list-item>
                <v-list-item-icon>
                    <v-icon>mdi-home</v-icon>
                </v-list-item-icon>

                <v-list-item-title>Home</v-list-item-title>
            </v-list-item>
            <v-list-item @click="clickCustomerCreate">
                <v-list-item-icon>
                    <v-icon>mdi-account-plus</v-icon>
                </v-list-item-icon>

                <v-list-item-title>顧客登録</v-list-item-title>
            </v-list-item>
            <v-list-item @click="clickCustomerIndex">
                <v-list-item-icon>
                    <v-icon>mdi-view-list</v-icon>
                </v-list-item-icon>

                <v-list-item-title>顧客一覧</v-list-item-title>
            </v-list-item>
            <v-list-item @click="clickCustomerKanban">
                <v-list-item-icon>
                    <v-icon>mdi-view-list</v-icon>
                </v-list-item-icon>

                <v-list-item-title>顧客かんばん</v-list-item-title>
            </v-list-item>
        </v-list>
    </v-card>
</template>
<script src="./menu.js"></script>
<style>
.navimenu *{
    font-size: 14px;
}
</style>