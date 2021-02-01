<template>
    <div class="post-view-page">
        <!-- 게시물이 있는 경우에는 컴포넌트가 노출된다. -->
        <post-view-component v-if="post" :post="post"/>
        <p v-else>게시글 불러오는 중...</p>
        <router-link :to="{ name: 'PostEditPage', params: { postId }}">수정</router-link>
        <button @click="onDelete">삭제</button>
        <router-link :to="{ name: 'PostListPage' }">목록</router-link>
    </div>
</template>

<script>
import { mapState, mapActions } from 'vuex'
import PostViewComponent from '../components/PostViewComponent.vue'

export default {
    name: 'PostViewPage',

    components: {
        PostViewComponent,
    },

    props: {
        postId: {
            type: String,
            required: true
        }
    },

    created () {
        this.fetchPost(this.postId)
            .catch(err => {
                this.$router.back();
            })
    },

    computed: {
        ...mapState([ 'post'] )
    },

    methods: {
        onDelete () {
            const { id } = this.post
            axios.delete(`/api/posts/${id}`)
                .then(res => {
                    alert('게시물이 성공적으로 삭제되었습니다.')
                    this.$router.push({ name: 'PostListPage' })
                })
                .catch(err => {
                    if (err.response.status === 401) {
                        alert('로그인이 필요합니다.')
                        this.$router.push({ name: 'Signin' })
                    } else {
                        alert(err.response.data.msg)
                    }
                })
        },

        ...mapActions([ 'fetchPost' ])
    },
}
</script>

<style>

</style>