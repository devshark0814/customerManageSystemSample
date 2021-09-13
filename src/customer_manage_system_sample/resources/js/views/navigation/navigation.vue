<template>
    <v-app>
        <v-navigation-drawer app v-model="drawer">
            <menu-component />
        </v-navigation-drawer>

        <v-app-bar app>
            <v-app-bar-nav-icon @click.stop="drawer = !drawer">
            </v-app-bar-nav-icon>
        </v-app-bar>

        <v-main style="background-color: #f7f7f7;">
            <v-container fluid>
                <router-view :key="$route.path"/>
            </v-container>
        </v-main>
    </v-app>
</template>
<script src="./navigation.js"></script>
<style>
.v-application {
    font-family: 'Noto Sans JP', sans-serif;
    line-height: 1.5;
}
</style>