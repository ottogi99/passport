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
                    <td>{{ post.writer }}</td>
                    <td>{{ post.created_at }}</td>
                </tr>
            </tbody>
        </template>
    </v-simple-table>
</template>

<script>
export default {
    name: 'PostListComponent',

    props: {
        posts: {
            type: Array
        }
    },
}
</script>

<style scoped>

</style>