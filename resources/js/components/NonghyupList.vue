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

    <div>
        <!-- v-data-table -->
        <v-data-table
            dense
            :headers="_headers"

            :page.sync="page"
            hide-default-footer
            @page-count="pageCount = $event"

            :items="nonghyupsWithIndex"
            :items-per-page="itemsPerPage"

            v-model="selected"
            :single-select="false"
            item-key="id"
            show-select

            :search="search"

            sort-by="순번"
            
            :loading="loading"
            loading-text="데이터를 불러오는 중입니다. 잠시 기다려 주세요"
            class="elevation-1"
        >
            <template v-slot:top>
                <v-toolbar flat >
                    <v-toolbar-title>농협 목록</v-toolbar-title>
                    <v-divider
                        class="mx-4"
                        inset
                        vertical
                    ></v-divider>

                    <v-spacer></v-spacer>

                    <v-text-field
                        v-model="search"
                        append-icon="mdi-magnify"
                        label="결과내 검색"
                        single-line
                        hide-details
                    ></v-text-field>

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
                                등록
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
                                            <v-combobox
                                                v-model="editedItem.sigun"
                                                :items="siguns"
                                                item-text="name"
                                                item-value="code"
                                                label="시/군 선택"
                                                outlined
                                                dense
                                            ></v-combobox>
                                            <!-- <v-text-field
                                                v-model="editedItem.sigun.name"
                                                label="시군명"
                                            ></v-text-field> -->
                                        </v-col>
                                        <v-col
                                            cols="12"
                                            sm="6"
                                            md="4"
                                        >
                                            <!-- <v-combobox
                                                v-model="editedItem.name"
                                                :items="nonghyups"
                                                item-text="name"
                                                item-value="code"
                                                label="농협 선택"
                                                outlined
                                                dense
                                            ></v-combobox> -->
                                            <v-text-field
                                                v-model="editedItem.name"
                                                label="농협명"
                                            ></v-text-field>
                                        </v-col>
                                        <v-col
                                            cols="12"
                                            sm="6"
                                            md="4"
                                        >
                                            <v-text-field
                                                v-model="editedItem.code"
                                                label="코드"
                                            ></v-text-field>
                                        </v-col>
                                        <v-col
                                            cols="12"
                                            sm="6"
                                            md="4"
                                        >
                                            <v-text-field
                                                v-model="editedItem.address"
                                                label="주소"
                                                clearable
                                            ></v-text-field>
                                        </v-col>
                                        <v-col
                                            cols="12"
                                            sm="6"
                                            md="4"
                                        >
                                            <!-- <v-text-field
                                                v-model="editedItem.contact"
                                                label="연락처"
                                                clearable
                                                counter=11
                                                :rules="[v => !!v || 'This field is required',v => /^\d+$/.test(v)||'공백없이 숫자만 입력하세요']"
                                                @keypress="acceptNumber($event)"

                                                style="ime-mode:disabled"
                                            ></v-text-field> -->
                                            <v-text-field
                                                :value="editedItem.contact"
                                                @input="filteringHandler"
                                                label="연락처"
                                                clearable
                                                counter=11
                                                ref="inputContact"
                                            ></v-text-field>
                                        </v-col>
                                        <v-col
                                            cols="12"
                                            sm="6"
                                            md="4"
                                        >
                                            <v-text-field
                                                v-model="editedItem.ceo"
                                                label="대표자"
                                                clearable
                                            ></v-text-field>
                                        </v-col>
                                        <v-col
                                            cols="12"
                                            sm="6"
                                            md="4"
                                        >
                                            <v-checkbox
                                                v-model="editedItem.active"
                                                label="활성화"
                                                dense
                                            ></v-checkbox>
<!-- 
                                            <v-combobox
                                                v-model="editedItem.active"
                                                :items="[0, 1]"
                                                item-text="name"
                                                item-value="code"
                                                label="상태"
                                                outlined
                                                dense
                                            ></v-combobox> -->
                                        </v-col>
                                        <v-col
                                            cols="12"
                                            sm="6"
                                            md="4"
                                        >
                                            <v-combobox
                                                v-model="editedItem.seq"
                                                :items="Array.from(Array(100).keys(), i=>i+1)"
                                                label="순번"
                                                outlined
                                                dense
                                            ></v-combobox>
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
                            <v-card-title class="headline">아이템({{editedItem.name}})을 정말로 삭제하시겠습니까?</v-card-title>
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

            <template v-slot:item.created_at="{ item }">
                <span>{{new Date(item.created_at).toISOString().substr(0, 10),}}</span>
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

            <!-- 해더 Customize -->
            <template v-slot:header.title="{ header }">
                ## {{ header.text.toUpperCase() }} ##
            </template>

            <!-- 체크박스 -->
            <template v-slot:item.active="{ item }">
                <v-simple-checkbox
                    :value="!!item.active"
                    disabled
                ></v-simple-checkbox>
            </template>

        </v-data-table>
        <div class="text-center pt-2">
            <v-pagination
                v-model="page"
                :length="pageCount"
            ></v-pagination>
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
    </div>
</template>

<script>
import { mapState } from 'vuex'

export default {
    name: 'NonghyupList',

    props: {
        nonghyups: {
            type: Array
        },
        loading: {
            type: Boolean
        },
    },

    data () {
        return {
            selectedNonghyup: '',
            selectedSigun: '',
            siguns: [],
            date: new Date().toISOString().substr(0, 10),
            menu2: false,


            snack: false,
            snackColor: '',
            snackText: '',
            max25chars: v => v.length <=25 || 'Input too long!',


            page: 1,
            pageCount: 0,
            itemsPerPage: 20,


            search: '',

            selected: [],

            dialog: false,
            dialogDelete: false,
            _posts: [],
            editedIndex: -1,
            editedItem: {
                sigun: {
                    name: '',
                    code: ''
                },
                name: '',
                code: '',
                address: '',
                contact: '',
                ceo: '',
                active: false,
                seq: 0,
            },
            defaultItem: {
                sigun: {
                    name: '',
                    code: ''
                },
                name: '',
                code: '',
                address: '',
                contact: '',
                ceo: '',
                active: false,
                seq: 0,
            },

            headers: [
                {
                    text: '번호',
                    align: 'start',
                    sortable: false,
                    value: 'index',
                },
                { text: '시군명', sortable: false, value: 'sigun.name' },
                { text: '농협명', value: 'name' },
                { text: '코드', value: 'code' },
                { text: '주소', sortable: false, value: 'address' },
                { text: '연락처', sortable: false, value: 'contact' },
                { text: '대표자', sortable: false, value: 'ceo' },
                { text: '상태', sortable: false, value: 'active' },
                { text: '순번', sortable: false, value: 'seq' },
                { text: '등록일자', value: 'created_at' },
                { text: 'Actions', value: 'actions', sortable: false },
                // { text: 'ID', value: 'id' },
            ],
        }
    },

    computed: {
        ...mapState([ 'me' ]),

        nonghyupsWithIndex () {
            return this.nonghyups.map(
                (nonghyup, index) => ({
                    ...nonghyup,
                    index: index + 1,
                })
            )
        },

        formTitle () {
            return this.editedIndex === -1 ? '새 아이템' : '수정 아이템'
        },

        _headers () {
            return this.headers.map(
                header => ({
                    ...header,
                    // 여기 조건에 사용자가 관리자이면 Action의 show값이 true 아니면 false로 설정
                    show: (header.text === 'Actions') 
                        ? this.me.roles.filter(v => { return v.code === 'master'}).length > 0
                        : true
                })
            ).filter(v=>v.show)
        }
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
        // this.fetchNonghyupList(),
        axios.get('/api/siguns')
            .then(res => {
                this.siguns = res.data.siguns

                const all = {
                    code: '',
                    name: '전체',
                }
                this.siguns.splice(0, 0, all)
            })
    },

    methods: {
        initialize () {
            this.nonghyups = []
        },

        editItem (item) {
            // console.log('editItem: '+ JSON.stringify(item))
            // this.editedIndex = this.nonghyups.indexOf(item)
            this.editedIndex = this.nonghyups.findIndex(v => v.id === item.id)

            // Vue waring 제거
            item.active = !!item.active
            this.editedItem = Object.assign({}, item)
            this.dialog = true
        },

        deleteItem (item) {
            // console.log('deleteItem: '+ JSON.stringify(item))
            // this.editedIndex = this.nonghyups.indexOf(item)
            this.editedIndex = this.nonghyups.findIndex(v => v.id === item.id)
            item.active = !!item.active
            this.editedItem = Object.assign({}, item)
            // console.log('editedItem: ' + JSON.stringify(this.editedItem))
            this.dialogDelete = true
        },

        deleteItemConfirm (event) {
            console.log(this.editedIndex) // undefined
            axios.delete(`/api/nonghyups/${this.editedItem.id}`)
                .then(res => {
                    // const targetIndex = this.nonghyups.findIndex(v => v.id === this.editItem.id)
                    this.nonghyups.splice(this.editedIndex, 1)
                })
                .catch(err => {
                    console.log('err =>' + err)
                })
                .finally(() => {
                    console.log('finally')
                    this.closeDelete()
                })
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
            // console.log(`save: editedInex: ${this.editedIndex}`)
            console.log(JSON.stringify(this.editedItem))

            // editedItem : sigun 항목은 객체인데 id값만 전달해야함
            // this.editedItem.sigun = this.editedItem.sigun.code

            if (this.editedIndex > -1) { // UPDATE
                axios.patch(`/api/nonghyups/${this.editedItem.id}`, this.editedItem)
                    .then(res => {
                        console.log(res.data.nonghyup)
                        // const targetIndex = this.nonghyups.findIndex(v => v.id === this.editItem.id)
                        // Object.assign(this.nonghyups[this.editedIndex], this.editedItem)
                        Object.assign(this.nonghyups[this.editedIndex], res.data.nonghyup)

                        this.snack = true
                        this.snackColor = 'success'
                        this.snackText = '저장 되었습니다.'
                    })
                    .catch(err => {
                        console.log('err =>' + err)

                        this.snack = true
                        this.snackColor = 'error'
                        this.snackText = '오류가 발생하였습니다.'
                    })
                    .finally(() => {

                        this.close()
                    })
            } else { // CREATE
                axios.post('/api/nonghyups/', this.editedItem)
                    .then(res => {
                        console.log('editedItem: ' + JSON.stringify(this.editedItem))
                        console.log('RES: ' + JSON.stringify(res.data.nonghyup))
                        this.nonghyups.push(res.data.nonghyup)

                        this.snack = true
                        this.snackColor = 'success'
                        this.snackText = '저장 되었습니다.'

                        this.$emit('update')
                    })
                    .catch(err => {
                        console.log('message =>' + JSON.stringify(err.response.data))
                        console.log('message =>' + JSON.stringify(err.response.data.message))
                        console.log('message =>' + err.response.data.message)

                        this.snack = true
                        this.snackColor = 'error'
                        this.snackText = err.response.data.message
                    })
                    .finally(() => {
                        this.close()
                    })
            }            
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
        acceptNumber($event) {
            let keyCode = $event.keyCode ? $event.keyCode : $event.which
            console.log(`keyCode: ${keyCode}`)

            let text = this.editedItem.contact
            // 한글 정규식
            const notPhoneticSymbolExp = /[ㄱ-ㅎ|ㅏ-ㅣ|가-힣]/;
            if (notPhoneticSymbolExp.test(text)) {
                text = text.slice(0, -1);
                let condition = notPhoneticSymbolExp.test(text);
                while (condition) {
                    text = text.slice(0, -1);
                    condition = notPhoneticSymbolExp.test(text);
                }
            }

            this.editedItem.contact = text
            // if (keyCode > 31 && (keyCode < 48 || keyCode > 57)) {
            //     $event.preventDefault();
            // }
        },
        // vuetify v-text-field 혹은 vuejs input에서 한글 입력 막기
        filteringHandler(str) {
            // 대소문자 무시 플래그(i), 글로벌(g)
            const ONLY_NUMBER = /[0-9]/g
            const REG_FILTER_KOREAN_LETTER = /[^ㄱ-ㅎㅏ-ㅣ가-힣]*/i
            // const filterdString = str.match(REG_FILTER_KOREAN_LETTER)[0]
            let filterdString = ''
            console.log(str.length)
            if (str.length > 0) {
                if (str.length === 1) {
                    const matched = str.match(ONLY_NUMBER)
                    filterdString = !!matched ? matched : ''
                }
                else {
                    filterdString = str.match(ONLY_NUMBER).join('').substr(0, 11)
                }
            }

            const inputField = this.$refs.inputContact
            inputField.lazyValue = filterdString
            this.editedItem.contact = filterdString
        }
    }
}
</script>

<style scoped>

</style>