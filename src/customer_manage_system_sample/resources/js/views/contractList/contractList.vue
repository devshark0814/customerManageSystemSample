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
                                            <tbody>
                                                <tr>
                                                    <th class="table_header">契約ID</th>
                                                    <td>
                                                        <span>{{ editedItem.contract_id }}</span>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <th class="table_header">契約顧客</th>
                                                    <td>
                                                        <v-select
                                                            v-model="editedItem.customer_id"
                                                            :items="cusList"
                                                            item-text="customer_name"
                                                            item-value="id"
                                                        />
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <th class="table_header">担当者</th>
                                                    <td>
                                                        <v-select
                                                            v-model="editedItem.employee_id"
                                                            :items="empList"
                                                            item-text="employee_name"
                                                            item-value="id"
                                                        />
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <th class="table_header">契約タイトル</th>
                                                    <td>
                                                        <v-text-field
                                                            class="table_object"
                                                            v-model="editedItem.contract_title"
                                                            outlined
                                                            clearable
                                                            dense
                                                            counter="50"
                                                        ></v-text-field>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <th class="table_header">契約内容</th>
                                                    <td>
                                                        <v-textarea
                                                            class="table_object"
                                                            v-model="editedItem.contract_desc"
                                                            solo
                                                            dense
                                                            auto-grow
                                                        ></v-textarea>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <th class="table_header">ステータス</th>
                                                    <td>
                                                        <v-select
                                                            v-model="editedItem.status"
                                                            :items="statusList"
                                                            item-text="status_name"
                                                            item-value="status_code"
                                                        />
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <th class="table_header">進捗率</th>
                                                    <td>
                                                        <v-text-field
                                                            class="table_object"
                                                            v-model="editedItem.progress"
                                                            outlined
                                                            clearable
                                                            dense
                                                            counter="2"
                                                            type="number"
                                                        />
                                                        <v-progress-linear
                                                            v-model="editedItem.progress"
                                                            :color="primary"
                                                            striped
                                                            disabled
                                                        >
                                                        </v-progress-linear>
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
<script src="./contractList.js"></script>
<style src="./contractList.css"></style>
