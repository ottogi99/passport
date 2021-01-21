<template>
    <!-- 어두운 테마 -->
    <!-- <v-simple-table dark> -->
    <!-- 좁은 간격 -->
    <v-simple-table dense>
    <!-- 테이블 해더 고정 -->
    <!-- <v-simple-table fixed-header height="300px"> -->
        <template v-slot:default>
            <thead>
                <tr>
                    <th class="text-left">번호</th>
                    <th class="text-left">아이디</th>
                    <th class="text-left">코드</th>
                    <th class="text-left">이름</th>
                    <th class="text-left">생성일자</th>
                </tr>
            </thead>
            <tbody>
                <tr v-for="(item, index) in siguns" :key="item.id">
                    <td>{{ index }}</td>
                    <td>{{ item.id }}</td>
                    <td>{{ item.code }}</td>
                    <td>{{ item.name }}</td>
                    <td>{{ item.created_at }}</td>
                </tr>
            </tbody>
        </template>
    </v-simple-table>
</template>

<script>
import { mapState, mapActions } from 'vuex'

export default {
    name: 'PostListComponent',

    // data() {
    //     return {
    //         siguns: [
    //             // {id: 1, seq: 1, code: 'ca', name: '천안시', created_at: '2021-01-21 13:42:00'},
    //             // {id: 2, seq: 2, code: 'gj', name: '공주시', created_at: '2021-01-21 13:42:00'},
    //             // {id: 3, seq: 3, code: 'br', name: '보령시', created_at: '2021-01-21 13:42:00'},
    //             // {id: 4, seq: 4, code: 'as', name: '아산시', created_at: '2021-01-21 13:42:00'},
    //             // {id: 5, seq: 5, code: 'ss', name: '서산시', created_at: '2021-01-21 13:42:00'},
    //             // {id: 6, seq: 6, code: 'ns', name: '논산시', created_at: '2021-01-21 13:42:00'},
    //             // {id: 7, seq: 7, code: 'dj', name: '당진시', created_at: '2021-01-21 13:42:00'},
    //             // {id: 8, seq: 8, code: 'gs', name: '금산군', created_at: '2021-01-21 13:42:00'},
    //             // {id: 9, seq: 9, code: 'by', name: '부여군', created_at: '2021-01-21 13:42:00'},
    //             // {id: 10, seq: 10, code: 'sc', name: '서천군', created_at: '2021-01-21 13:42:00'},
    //             // {id: 11, seq: 11, code: 'cy', name: '청양군', created_at: '2021-01-21 13:42:00'},
    //             // {id: 12, seq: 12, code: 'hs', name: '홍성군', created_at: '2021-01-21 13:42:00'},
    //             // {id: 13, seq: 13, code: 'ys', name: '예산군', created_at: '2021-01-21 13:42:00'},
    //             // {id: 14, seq: 14, code: 'ta', name: '태안군1', created_at: '2021-01-21 13:42:00'},
    //         ]
    //     }
    // },
    
    created () {
        // axios.get('/api/siguns', {
        //     params: {

        //     }
        // }).then(res => {
        //     this.siguns = res.data.siguns
        // }, 200)
        // .catch(err => {

        // })
        this.fetchSigunList()
    },

    computed: {
        ...mapState(['siguns'])
    },

    methods: {
        ...mapActions(['fetchSigunList'])
    }

}
</script>

<style scoped>

</style>