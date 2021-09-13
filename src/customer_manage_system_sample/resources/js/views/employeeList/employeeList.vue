<template>
    <div style="padding:1% 2%">
        <v-card>
            <v-card-title></v-card-title>
            <v-data-table
                :headers="headers"
                :items="desserts"
                :search="search"
                :loading="loading"
                loading-text="検索中…"
                color="#24a974"
                :footer-props="{ 'items-per-page-options': [50, 100, 150, -1] }"
            >
                <template v-slot:top>
                    <v-toolbar flat>
                        <v-toolbar-title class="table_search_label">
                            <v-text-field
                                v-model="search"
                                append-icon="mdi-magnify"
                                label="検索"
                                single-line
                                hide-details
                                clearable
                            ></v-text-field>
                        </v-toolbar-title>
                        <v-spacer />
                        <v-dialog v-model="dialog" max-width="800px" persistent>
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
                                    <span class="data_table_dialog_title">{{ formTitle }}</span>
                                </v-card-title>
                                <v-card-text>
                                    <v-simple-table>
                                        <template v-slot:default>
                                            <tbody class="simple_table">
                                                <tr>
                                                    <th>従業員名</th>
                                                    <td>
                                                        <v-text-field v-model="editedItem.employee_name" />
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <th>従業員画像</th>
                                                    <td>
                                                        <v-text-field v-model="editedItem.employee_img_path" label="画像パス"/>
                                                    </td>
                                                </tr>
                                            </tbody>
                                        </template>
                                    </v-simple-table>
                                </v-card-text>
                                <v-card-actions>
                                    <v-spacer />
                                    <v-btn style="width:20%" class="white--text" color="blue-grey" @click="close">
                                        閉じる
                                    </v-btn>
                                    <v-btn style="width:20%" class="white--text" color="#24a974" @click="save">
                                        保存
                                    </v-btn>
                                </v-card-actions>
                            </v-card>
                        </v-dialog>
                        <v-dialog v-model="dialogDelete" max-width="500px">
                            <v-card>
                                <v-card-title class="text-h5">本当に削除しても良いですか？</v-card-title>
                                <v-card-actions>
                                    <v-spacer />
                                    <v-btn style="width:20%" class="white--text" color="blue-grey" @click="closeDelete">
                                        閉じる
                                    </v-btn>
                                    <v-btn style="width:20%" class="white--text" color="pink lighten-1" @click="deleteItemConfirm">
                                        削除
                                    </v-btn>
                                </v-card-actions>
                            </v-card>
                        </v-dialog>
                    </v-toolbar>
                </template>
                <template v-slot:item.actions="{ item }">
                    <v-icon class="mr-2" @click="editItem(item)">
                        mdi-pencil
                    </v-icon>
                    <v-icon @click="deleteItem(item)">
                        mdi-delete
                    </v-icon>
                </template>
            </v-data-table>
        </v-card>
    </div>
</template>
<script src="./employeeList.js"></script>
<style src="./employeeList.css"></style>
