<template>
    <div style="padding:1% 2%">
        <v-card>
            <v-card-title>
                <v-text-field
                    v-model="search"
                    append-icon="mdi-magnify"
                    label="検索"
                    single-line
                    hide-details
                ></v-text-field>
            </v-card-title>
            <v-data-table
                :headers="headers"
                :items="desserts"
                :search="search"
                :loading="loading"
                loading-text="検索中…"
                color="#24a974"
                @click:row="clickRow"
            ></v-data-table>
        </v-card>
    </div>
</template>
<script src="./employeeList.js"></script>
<style src="./employeeList.css"></style>
