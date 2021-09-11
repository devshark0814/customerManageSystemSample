<template>
    <div>
        <v-card class="task_card_header" v-bind:class="card_class" @click="clickCard">
            <v-card-text>
                <div class="task_title">契約名: {{ card_contract_title }}</div>
                <div class="task_body">顧客名: {{ card_customer_name }}</div>
                <div class="task_body">担当名: {{ card_employee_name }}</div>
                <div>
                    <v-progress-linear
                        v-model="card_progress"
                        :color="typeColor"
                        disabled
                    >
                    </v-progress-linear>
                </div>
            </v-card-text>
        </v-card>
        <v-dialog v-model="dialog" max-width="800px">
            <v-card>
                <v-card-title>内容確認</v-card-title>
                <v-card-text>
                    <v-simple-table>
                        <template v-slot:default>
                            <tbody>
                                <tr>
                                    <th class="table_header">契約ID</th>
                                    <td>
                                        <span>{{ card_contract_id }}</span>
                                    </td>
                                </tr>
                                <tr>
                                    <th class="table_header">契約顧客</th>
                                    <td>
                                        <v-text-field
                                            readonly
                                            class="table_object"
                                            v-model="card_customer_name"
                                            outlined
                                            dense
                                        ></v-text-field>
                                    </td>
                                </tr>
                                <tr>
                                    <th class="table_header">担当者</th>
                                    <td>
                                        <v-text-field
                                            readonly
                                            class="table_object"
                                            v-model="card_employee_name"
                                            outlined
                                            dense
                                        ></v-text-field>
                                    </td>
                                </tr>
                                <tr>
                                    <th class="table_header">契約タイトル</th>
                                    <td>
                                        <v-text-field
                                            readonly
                                            class="table_object"
                                            v-model="card_contract_title"
                                            outlined
                                            dense
                                        ></v-text-field>
                                    </td>
                                </tr>
                                <tr>
                                    <th class="table_header">契約内容</th>
                                    <td>
                                        <v-textarea
                                            readonly
                                            class="table_object"
                                            v-model="card_contract_desc"
                                            solo
                                            dense
                                        ></v-textarea>
                                    </td>
                                </tr>
                                <tr>
                                    <th class="table_header">ステータス</th>
                                    <td>
                                        <v-text-field
                                            readonly
                                            class="table_object"
                                            v-model="card_status"
                                            outlined
                                            dense
                                        />
                                    </td>
                                </tr>
                                <tr>
                                    <th class="table_header">進捗率</th>
                                    <td>
                                        <v-text-field
                                            readonly
                                            class="table_object"
                                            v-model="card_progress"
                                            outlined
                                            dense
                                        />
                                        <v-progress-linear
                                            v-model="card_progress"
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
                    <v-spacer></v-spacer>
                    <v-btn color="blue darken-1" text @click="dialog = false">
                        閉じる
                    </v-btn>
                </v-card-actions>
            </v-card>
        </v-dialog>
    </div>
</template>
<script src="./kanbanCard.js"></script>
<style src="./kanbanCard.css"></style>
