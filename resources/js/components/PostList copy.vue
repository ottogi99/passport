<template>
    <!-- 어두운 테마 -->
    <!-- <v-simple-table dark> -->
    <!-- 좁은 간격 -->
    <!-- 테이블 해더 고정 -->
    <!-- <v-simple-table fixed-header height="300px"> -->
    <!-- <v-simple-table dense>
        <template v-slot:default>
            <thead>
                <tr>
                    <th class="text-left">번호</th>
                    <th class="text-left">제목</th>
                    <th class="text-left">작성자</th>
                    <th class="text-left">작성일</th>
                </tr>
            </thead>
            <tbody>
                <tr v-for="(post, index) in posts" :key="post.id">
                    <td>{{ index }}</td>
                    <td>
                        <router-link :to="{ name: 'PostViewPage', params: { postId: post.id.toString() } }">
                            {{ post.title }}
                        </router-link>
                    </td>
                    <td>{{ post.user.name }}</td>
                    <td>{{ post.created_at }}</td>
                </tr>
            </tbody>
        </template>
    </v-simple-table> -->

    <v-card>
         <v-card-title>
            Posts
            <v-spacer></v-spacer>
            <v-text-field
                v-model="search"
                append-icon="mdi-magnify"
                label="결과내 검색"
                single-line
                hide-details
            ></v-text-field>
        </v-card-title>
        <!-- v-data-table -->
        <v-data-table
            dense
            :headers="headers"

            :page.sync="page"
            hide-default-footer
            @page-count="pageCount = $event"

            :items="posts"
            :items-per-page="itemsPerPage"

            v-model="selected"
            :single-select="false"
            item-key="id"
            show-select

            :search="search"

            sort-by="작성자"
            
            :loading="loading"
            loading-text="데이터를 불러오는 중입니다. 잠시 기다려 주세요"
            class="elevation-1"
        >
            <template v-slot:top>
                <v-toolbar flat >
                    <v-toolbar-title>CRUD</v-toolbar-title>
                    <v-divider
                        class="mx-4"
                        inset
                        vertical
                    ></v-divider>
                    <v-spacer></v-spacer>
                    <v-dialog
                        v-model="dialog"
                        max-width="500px"
                    >
                        <template v-slot:activator="{ on, attrs }">
                            <v-btn
                                color="primary"
                                dark
                                class="mb-2"
                                v-bind="attrs"
                                v-on="on"
                            >
                                새 항목
                            </v-btn>
                        </template>
                        <v-card>
                            <v-card-title>
                                <span class="headline">{{ formTitle }}</span>
                            </v-card-title>

                            <v-card-text>
                                <v-container>
                                    <v-row>
                                        <v-col
                                            cols="12"
                                            sm="6"
                                            md="4"
                                        >
                                            <v-text-field
                                                v-model="editedItem.title"
                                                label="제목"
                                            ></v-text-field>
                                        </v-col>
                                        <v-col
                                            cols="12"
                                            sm="6"
                                            md="4"
                                        >
                                            <v-text-field
                                                v-model="editedItem.content"
                                                lable="내용"
                                            ></v-text-field>
                                        </v-col>
                                    </v-row>
                                </v-container>
                            </v-card-text>

                            <v-card-actions>
                                <v-spacer></v-spacer>
                                <v-btn
                                    color="blue darken-1"
                                    text
                                    @click="close"
                                >
                                    취소
                                </v-btn>
                                <v-btn
                                    color="blue darken-1"
                                    text
                                    @click="save"
                                >
                                    저장
                                </v-btn>
                            </v-card-actions>
                        </v-card>
                    </v-dialog>
                    <v-dialog v-model="dialogDelete" max-width="500px">
                        <v-card>
                            <v-card-title class="headline">이 아이템을 정말로 삭제하시겠습니까?</v-card-title>
                            <v-card-actions>
                                <v-spacer></v-spacer>
                                <v-btn color="blue darken-1" text @click="closeDelete">취소</v-btn>
                                <v-btn color="blue darken-2" text @click="deleteItemConfirm">예</v-btn>
                                <v-spacer></v-spacer>
                            </v-card-actions>
                        </v-card>
                    </v-dialog>
                </v-toolbar>
            </template>

            <template v-slot:item.title="props">
                <router-link :to="{ name: 'PostViewPage', params: { postId: props.item.id.toString() } }">
                    {{ props.item.title }}
                </router-link>

                <v-edit-dialog
                    :return-value.sync="props.item.title"
                    @save="save"
                    @cancel="cancel"
                    @open="open"
                    @close="close"
                >
                    {{ props.item.title }}
                    <template v-slot:input>
                        <v-text-field
                            v-model="props.item.title"
                            :rules="[max25chars]"
                            label="Edit"
                            single-line
                            counter
                        ></v-text-field>
                    </template>
                </v-edit-dialog>
            </template>

            <template v-slot:item.actions="{ item }">
                <v-icon
                    small
                    class="mr-2"
                    @click="editItem(item)"
                >
                    mdi-pencil
                </v-icon>
                <v-icon
                    small
                    @click="deleteItem(item)"
                >
                    mdi-delete
                </v-icon>
            </template>
            <template v-slot:no-data>
                <v-btn
                    color="primary"
                    @click="initialize"
                >
                    리셋
                </v-btn>
            </template>

            <!-- 해더 Customize -->
            <template v-slot:header.title="{ header }">
                ## {{ header.text.toUpperCase() }} ##
            </template>

            <!-- 체크박스 -->
            <template v-slot:item.active="{ item }">
                <v-simple-checkbox
                    v-model="item.active"
                    disabled
                ></v-simple-checkbox>
            </template>

        </v-data-table>
        <div class="text-center pt-2">
            <v-pagination
                v-model="page"
                :length="pageCount"
            ></v-pagination>
            <v-text-field
                :value="itemsPerPage"
                label="페이지 당 아이템 수"
                type="number"
                min="-1"
                max="15"
                @input="itemsPerPage = parseInt($event, 10)"
            ></v-text-field>
        </div>

        <v-snackbar
            v-model="snack"
            :timeout="3000"
            :color="snackColor"
        >
            {{ snackText }}
            <template v-slot:action="{ attrs }">
                <v-btn
                    v-bind="attrs"
                    text
                    @click="snack = false"
                >
                    닫기
                </v-btn>
            </template>
        </v-snackbar>
    </v-card>
</template>

<script>
export default {
    name: 'PostList',

    props: {
        posts: {
            type: Array
        },
        loading: {
            type: Boolean
        },
    },

    data () {
        return {
            date: new Date().toISOString().substr(0, 10),
            menu2: false,


            snack: false,
            snackColor: '',
            snackText: '',
            max25chars: v => v.length <=25 || 'Input too long!',


            page: 1,
            pageCount: 0,
            itemsPerPage: 10,


            search: '',

            selected: [],

            dialog: false,
            dialogDelete: false,
            _posts: [],
            editedIndex: -1,
            editedItem: {
                title: '',
                content: ''
            },
            defaultItem: {
                title: '',
                content: '',
            },

            headers: [
                {
                    text: '번호',
                    align: 'start',
                    sortable: false,
                    value: 'index',
                },
                { text: '제목', value: 'title' },
                { text: '작성자', value: 'user.name' },
                { text: '작성일', value: 'created_at' },
                { text: '활성화', value: 'active' },
                { text: 'Actions', value: 'actions', sortable: false },
                // { text: 'ID', value: 'id' },
            ],
        }
    },

    computed: {
        postsWithIndex () {
            return this.posts.map(
                (post, index) => ({
                    ...post,
                    index: index + 1,
                    active: false,
                })
            )
        },

        formTitle () {
            return this.editedIndex === -1 ? '새 아이템' : '수정 아이템'
        },
    },

    watch: {
        dialog (val) {
            val || this.close()
        },
        dialogDelete (val) {
            val || this.closeDelete()
        },
    },

    created () {
        // this.initialize()
    },

    methods: {
        initialize () {
            this.posts = []
        },

        editItem (item) {
            // console.log('item: '+ JSON.stringify(item))
            this.editedIndex = this.posts.indexOf(item)
            this.editedItem = Object.assign({}, item)
            this.dialog = true
        },

        deleteItem (item) {
            this.editedIndex = this.posts.indexOf(item)
            this.editedItem = Object.assign({}, item)
            this.dialogDelete = true
        },

        deleteItemConfirm () {
            this.posts.splice(this.editedIndex, 1)
            this.closeDelete()
        },

        close () {
            this.dialog = false
            this.$nextTick( () => {
                this.editedItem = Object.assign({}, this.defaultItem)
                this.editedIndex = -1
            })
        },

        closeDelete () {
            this.dialogDelete = false
            this.$nextTick( () => {
                this.editedItem = Object.assign({}, this.defaultItem)
                this.editedIndex = -1
            })
        },

        // save () {
        //     if (this.editedIndex > -1) {
        //         Object.assign(this.posts[this.editedIndex], this.editItem)
        //     } else {
        //         this.posts.push(this.editItem)
        //     }
        //     this.close()
        // },

        // v-edit-dialog 사용
        save () {
            this.snack = true
            this.snackColor = 'success'
            this.snackText = '저장 되었습니다.'
        },
        cancel () {
            this.snack = true
            this.snackColor = 'success'
            this.snackText = '취소 되었습니다.'
        },
        open () {
            this.snack = true
            this.snackColor = 'info'
            this.snackText = 'Dialog opened'
        },
        close () {
            console.log('Dialog closed')
        }
    }
}
</script>

<style scoped>

</style>