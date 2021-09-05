<template>
    <div>
        <v-card>
            <v-card-title>
                <v-text-field
                    v-model="search"
                    append-icon="mdi-magnify"
                    label="Search"
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
                @click:row="clickRow"
            ></v-data-table>
        </v-card>
        <v-dialog v-model="dialog" max-width="600px" eager>
            <v-card>
                <v-card-title>
                    <span class="text-h5">User Profile</span>
                </v-card-title>
                <v-card-text>
                    <customerDefaultInfo ref="customerDefaultInfo" @getDatas="getDatas" />
                </v-card-text>
                <v-card-actions>
                    <v-spacer></v-spacer>
                    <v-btn color="blue darken-1" text @click="dialog = false">
                        Close
                    </v-btn>
                    <v-btn color="blue darken-1" text @click="dialog = false">
                        Save
                    </v-btn>
                </v-card-actions>
            </v-card>
        </v-dialog>
    </div>
</template>
<script src="./customerList.js"></script>
