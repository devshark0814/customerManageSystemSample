<template>
    <div style="padding:1% 5%">
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
                @click:row="clickRow"
            ></v-data-table>
        </v-card>
        <v-dialog v-model="dialog" max-width="800px" eager>
            <v-card>
                <v-card-title>
                    <span class="text-h5" style="width: 100%;text-align: center;">顧客情報</span>
                </v-card-title>
                <v-card-text>
                    <customerDefaultInfo ref="customerDefaultInfo" @getDatas="getDatas" />
                </v-card-text>
                <v-card-actions>
                    <v-spacer></v-spacer>
                    <v-btn style="width:20%" class="white--text" color="blue-grey" @click="dialog = false" :disabled="deleting || updating">
                        閉じる
                    </v-btn>
                    <v-btn style="width:20%" class="white--text" color="primary" @click="clickSave" :loading="updating" :disabled="deleting">
                        保存
                    </v-btn>
                    <v-btn style="width:20%" class="white--text" color="pink lighten-1" @click="clickDelete" :loading="deleting" :disabled="updating">
                        削除
                    </v-btn>
                </v-card-actions>
            </v-card>
        </v-dialog>
    </div>
</template>
<script src="./customerList.js"></script>
