<template>
    <v-container>
        <v-row v-if="!$vuetify.breakpoint.xs && !$vuetify.breakpoint.sm">
            <v-col cols="3" v-for="(kanban, i) in kanbans" :key="i">
                <v-card id="parentCard" height="100%">
                    <v-card-subtitle>
                        <span class="card_header">{{ kanban.kanban_name }}</span>
                        <span>{{ taskCount(i) }}件</span>
                    </v-card-subtitle>
                    <v-card-text>
                        <draggable
                            :list="kanban.items"
                            tag="ul"
                            :options="{ group: 'ITEMS', animation: 150 }"
                            @end="onEnd"
                        >
                            <template v-for="(item, j) in kanban.items">
                                <kanbancard
                                    :key="j"
                                    :card_contract_id="item.contract_id"
                                    :card_status="item.status"
                                    :card_contract_title="item.contract_title"
                                    :card_customer_name="item.customer_name"
                                    :card_employee_name="item.employee_name"
                                    :card_contract_desc="item.contract_desc"
                                    :card_progress="0"
                                />
                            </template>
                        </draggable>
                    </v-card-text>
                </v-card>
            </v-col>
        </v-row>
        <v-row v-else>
            <v-col>
                PCで参照してね
            </v-col>
        </v-row>
    </v-container>
</template>
<script src="./customerKanban.js"></script>
<style src="./customerKanban.css"></style>
