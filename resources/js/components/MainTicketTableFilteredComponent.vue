<template>
    <b-container fluid>
        <b-row>
            <b-col lg="6" class="my-1">
                <b-button @click="updateTickets()">بروزرسانی</b-button>
            </b-col>
        </b-row>
        <!-- User Interface controls -->
        <b-row>
            <b-col lg="6" class="my-1">
                <b-form-group
                        label="مرتب سازی"
                        label-cols-sm="3"
                        label-align-sm="right"
                        label-size="sm"
                        label-for="sortBySelect"
                        class="mb-0"
                >
                    <b-input-group size="sm">
                        <b-form-select v-model="sortBy" id="sortBySelect" :options="sortOptions" class="w-75">
                            <template v-slot:first>
                                <option value="">-- انتخاب کنید --</option>
                            </template>
                        </b-form-select>
                        <b-form-select v-model="sortDesc" size="sm" :disabled="!sortBy" class="w-25">
                            <option :value="false">صعودی</option>
                            <option :value="true">نزولی</option>
                        </b-form-select>
                    </b-input-group>
                </b-form-group>
            </b-col>

            <b-col lg="6" class="my-1">
                <b-form-group
                        label="مرتب سازی اولیه"
                        label-cols-sm="3"
                        label-align-sm="right"
                        label-size="sm"
                        label-for="initialSortSelect"
                        class="mb-0"
                >
                    <b-form-select
                            v-model="sortDirection"
                            id="initialSortSelect"
                            size="sm"
                            :options="['asc', 'desc', 'last']"
                    ></b-form-select>
                </b-form-group>
            </b-col>

            <b-col lg="6" class="my-1">
                <b-form-group
                        label="فیلتر"
                        label-cols-sm="3"
                        label-align-sm="right"
                        label-size="sm"
                        label-for="filterInput"
                        class="mb-0"
                >
                    <b-input-group size="sm">
                        <b-form-input
                                v-model="filter"
                                type="search"
                                id="filterInput"
                                placeholder="نوع جستجو"
                        ></b-form-input>
                        <b-input-group-append>
                            <b-button :disabled="!filter" @click="filter = ''">پاکسازی</b-button>
                        </b-input-group-append>
                    </b-input-group>
                </b-form-group>
            </b-col>

            <b-col lg="6" class="my-1">
                <b-form-group
                        label="فیلتر شده بر اساس"
                        label-cols-sm="3"
                        label-align-sm="right"
                        label-size="sm"
                        description="همه فیلترها را علامت بزنید تا همه داده ها فیلتر شوند"
                        class="mb-0">
                    <b-form-checkbox-group v-model="filterOn" class="mt-1">
                        <b-form-checkbox value="title">عنوان سفارش</b-form-checkbox>
                        <b-form-checkbox value="desc">توضیح سفارش</b-form-checkbox>
                        <b-form-checkbox value="verified">وضعیت سفارش</b-form-checkbox>
                    </b-form-checkbox-group>
                </b-form-group>
            </b-col>

            <b-col sm="5" md="6" class="my-1">
                <b-form-group
                        label="تعداد مورد در هر صفحه"
                        label-cols-sm="6"
                        label-cols-md="4"
                        label-cols-lg="3"
                        label-align-sm="right"
                        label-size="sm"
                        label-for="perPageSelect"
                        class="mb-0"
                >
                    <b-form-select
                            v-model="perPage"
                            id="perPageSelect"
                            size="sm"
                            :options="pageOptions"
                    ></b-form-select>
                </b-form-group>
            </b-col>

            <b-col sm="7" md="6" class="my-1">
                <b-pagination
                        v-model="currentPage"
                        :total-rows="totalRows"
                        :per-page="perPage"
                        align="fill"
                        size="sm"
                        class="my-0"
                ></b-pagination>
            </b-col>
        </b-row>

        <!-- Main table element -->
        <b-table
                show-empty
                small
                stacked="md"
                :items="items"
                :fields="fields"
                :current-page="currentPage"
                :per-page="perPage"
                :filter="filter"
                :filterIncludedFields="filterOn"
                :sort-by.sync="sortBy"
                :sort-desc.sync="sortDesc"
                :sort-direction="sortDirection"
                @filtered="onFiltered"
        >
            <template v-slot:cell(name)="row">
                {{ row.value.first }} {{ row.value.last }}
            </template>

            <template v-slot:cell(actions)="row">
                <b-button size="sm" @click="info(row.item, row.index, $event.target)" class="mr-1">
                    اطلاعات بیشتر
                </b-button>
                <b-button size="sm" @click="row.toggleDetails">
                    {{ row.detailsShowing ? 'مخفی سازی' : 'نمایش' }}
                    وضعیت
                </b-button>
            </template>

            <template v-slot:row-details="row">
                <b-card>
                    <!--<ul>-->
                        <!--<li v-for="(value, key) in row.item" :key="key">{{ key }}: {{ value }}</li>-->
                    <!--</ul>-->
                </b-card>
            </template>
        </b-table>

        <!-- Info modal -->
        <b-modal :id="infoModal.id" :title="infoModal.title" ok-only @hide="resetInfoModal">
            <!--<pre>{{ infoModal.content }}</pre>-->
            <h2>{{infoModal.item.title}}</h2>
            <p>{{infoModal.item.desc}}</p>
            <p>{{infoModal.item.severity_id}}</p>
            <p>{{infoModal.item.organization_id}}</p>
            <p>{{infoModal.item.user_id}}</p>
            <p>{{infoModal.item.created_at}}</p>
            <p>{{infoModal.item.updated_at}}</p>
            <!--<button @click="updateCart" class="alert alert-info" ><i class="fa fa-plus"></i> افزودن به سبد درخواست </button>-->

        </b-modal>
    </b-container>
</template>

<script>
    import axios from 'axios';

    export default {
        props: ['user_id'],
        data() {
            return {
                items: [],
                cardItems: [],
                fields: [
                    {key: 'title', label: 'موضوع گفتگو', sortable: true, sortDirection: 'desc'},
                    { key: 'desc', label: 'توضیح گفتگو', sortable: true, class: 'text-center' },
                    { key: 'severity_id', label: 'شدت حساسیت گفتگو', sortable: true},
                    { key: 'organization_id', label: 'بخش مرتبط با گفتگو', sortable: true},
                    { key: 'user_id', label: 'کاربر ایجاد کننده گفتگو', sortable: true},
                    {key: 'actions', label: 'عملیات'}
                ],
                totalRows: 1,
                currentPage: 1,
                perPage: 5,
                pageOptions: [5, 10, 15],
                sortBy: '',
                sortDesc: true,
                sortDirection: 'desc',
                filter: null,
                filterOn: [],
                infoModal: {
                    id: 'info-modal',
                    title: '',
                    item: "{}",
                    content: ''
                }
            }
        },
        computed: {
            sortOptions() {
                // Create an options list from our fields
                return this.fields
                    .filter(f => f.sortable)
                    .map(f => {
                        return {text: f.label, value: f.key};
                    })
            }
        },
        mounted() {
            this.updateTickets();
            this.totalRows = this.items.length;
        },
        methods: {
            updateTickets(){
                this.getItems();
            },
            getItems() {
                axios.get('http://project7.test/api/tickets/' + this.user_id+'/user')
                    .then(response => {
                        console.log(response.data.data);
                        this.items = response.data.data;
                        // Trigger pagination to update the number of buttons/pages due to filtering
                        this.onFiltered(this.items);
                    })
                    .catch(e => {
                        // this.errors.push(e)
                        console.log(e);
                    });
            },
            info(item, index, button) {
                this.infoModal.title = `شماره ردیف: ${index}`;
                this.infoModal.content = JSON.stringify(item, null, 2);
                this.infoModal.item = item;
                this.$root.$emit('bv::show::modal', this.infoModal.id, button)
            },
            resetInfoModal() {
                this.infoModal.title = '';
                this.infoModal.item = '{}';
                this.infoModal.content = '';
            },
            onFiltered(filteredItems) {
                // Trigger pagination to update the number of buttons/pages due to filtering
                this.totalRows = filteredItems.length;
                this.currentPage = 1
            }
        }
    }
</script>


<style lang="scss">
    @import '~bootstrap-vue/dist/bootstrap-vue.css';
</style>
