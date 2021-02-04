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
                    <th class="text-left">시군</th>
                    <th class="text-left">코드</th>
                    <th class="text-left">이름</th>
                    <th class="text-left">주소</th>
                    <th class="text-left">연락처</th>
                    <th class="text-left">대표자</th>
                    <th class="text-left">상태</th>
                    <th class="text-left">순번</th>
                    <th class="text-left">작성일자</th>
                </tr>
            </thead>
            <tbody>
                <tr v-for="(nonghyup, index) in nonghyups" :key="nonghyup.id">
                    <td>{{ index }}</td>
                    <td>{{ nonghyup.sigun.name }}</td>
                    <td>{{ nonghyup.code }}</td>
                    <td>{{ nonghyup.name }}</td>
                    <td>{{ nonghyup.address }}</td>
                    <td>{{ nonghyup.contact }}</td>
                    <td>{{ nonghyup.ceo }}</td>
                    <td>{{ nonghyup.active }}</td>
                    <td>{{ nonghyup.seq }}</td>
                    <td>{{ nonghyup.created_at }}</td>
                </tr>
            </tbody>
        </template>
    </v-simple-table>
</template>

<script>
export default {
    name: 'NonghyupList',

    props: {
        nonghyups: {
            type: Array
            // type: Object
        }
    }
}
</script>

<style scoped>

</style>