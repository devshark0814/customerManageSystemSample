<template>
    <v-card class="mx-auto navimenu" width="300" height="100%">
        <v-list>
            <v-list-item v-for="(menu, index) in menuList" :key="index" :to="menu.route">
                <v-list-item-icon class="mx-0" large>
                    <v-icon>{{ menu.icon }}</v-icon>
                </v-list-item-icon>

                <v-list-item-title>{{ menu.name }}</v-list-item-title>
            </v-list-item>
        </v-list>
    </v-card>
</template>
<script src="./menu.js"></script>
<style>
.navimenu {
    background-color: #30537b !important;
}
.navimenu *{
    font-size: 15px !important;
    color:white !important;
}
</style>