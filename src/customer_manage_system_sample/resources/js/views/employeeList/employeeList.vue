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
            >
                <template v-slot:top>
                    <v-toolbar flat>
                        <v-toolbar-title>My CRUD</v-toolbar-title>
                        <v-divider class="mx-4" inset vertical></v-divider>
                        <v-spacer></v-spacer>
                        <v-dialog v-model="dialog" max-width="500px">
                            <template v-slot:activator="{ on, attrs }">
                                <v-btn
                                    color="primary"
                                    dark
                                    class="mb-2"
                                    v-bind="attrs"
                                    v-on="on"
                                >
                                    新規登録
                                </v-btn>
                            </template>
                            <v-card>
                                <v-card-title>
                                    <span class="text-h5">{{ formTitle }}</span>
                                </v-card-title>
                                <v-card-text>
                                    <v-text-field v-model="editedItem.employee_name" label="従業員名"/>
                                    <v-text-field v-model="editedItem.employee_img_path" label="画像パス"/>
                                </v-card-text>
                                <v-card-actions>
                                    <v-spacer />
                                    <v-btn
                                        color="blue darken-1"
                                        text
                                        @click="close"
                                    >
                                        閉じる
                                    </v-btn>
                                    <v-btn
                                        color="blue darken-1"
                                        text
                                        @click="save"
                                    >
                                        保存
                                    </v-btn>
                                    <v-spacer />
                                </v-card-actions>
                            </v-card>
                        </v-dialog>
                        <v-dialog v-model="dialogDelete" max-width="500px">
                            <v-card>
                                <v-card-title class="text-h5">本当に削除しても良いですか？</v-card-title>
                                <v-card-actions>
                                    <v-spacer />
                                    <v-btn
                                        color="blue darken-1"
                                        text
                                        @click="closeDelete"
                                    >
                                        閉じる
                                    </v-btn>
                                    <v-btn
                                        color="blue darken-1"
                                        text
                                        @click="deleteItemConfirm"
                                    >
                                        削除
                                    </v-btn>
                                    <v-spacer />
                                </v-card-actions>
                            </v-card>
                        </v-dialog>
                    </v-toolbar>
                </template>
                <template v-slot:item.actions="{ item }">
                    <v-icon small class="mr-2" @click="editItem(item)">
                        mdi-pencil
                    </v-icon>
                    <v-icon small @click="deleteItem(item)">
                        mdi-delete
                    </v-icon>
                </template>
            </v-data-table>
        </v-card>
    </div>
</template>
<script src="./employeeList.js"></script>
<style src="./employeeList.css"></style>
