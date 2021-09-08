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
        <v-dialog v-model="dialog" max-width="800px" eager persistent>
            <v-card>
                <v-card-title>
                    <span class="data_table_dialog_title">顧客情報</span>
                </v-card-title>
                <v-card-text>
                    <customerDefaultInfo ref="customerDefaultInfo" @getDatas="getDatas" />
                </v-card-text>
                <v-card-actions>
                    <v-btn style="width:20%" class="white--text" color="pink lighten-1" @click="clickDelete" :loading="deleting" :disabled="updating">
                        削除
                    </v-btn>
                    <v-spacer></v-spacer>
                    <v-btn style="width:20%" class="white--text" color="#24a974" @click="clickSave" :loading="updating" :disabled="deleting">
                        保存
                    </v-btn>
                    <v-btn style="width:20%" class="white--text" color="blue-grey" @click="dialog = false" :disabled="deleting || updating">
                        閉じる
                    </v-btn>
                </v-card-actions>
            </v-card>
        </v-dialog>
    </div>
</template>
<script src="./customerList.js"></script>
<style>
.data_table_header {
    color: #24a974 !important;
    font-size: 14px !important;
    letter-spacing: 0.08em;
    background-color: #f3fcf8;
}
.data_table_dialog_title {
    width: 100%;
    text-align: center;
    color: #24a974;
    font-size: 28px !important;
    font-weight: bold;
}
</style>