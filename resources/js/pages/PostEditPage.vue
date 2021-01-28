<template>
    <div class="post-edit-page">
        <h1>게시물 수정</h1>
        
        <post-edit-form v-if="post" :post="post" @submit="onSubmit" />
        <p v-else>게시물 불러오는 중...</p>
    </div>
</template>

<script>
import PostEditForm from '../components/PostEditForm'
import { mapState } from 'vuex'

export default {
    name: 'PostEditPage',
    props: {
        // 라우터의 파라미터를 받아오기 위한 props를 선언해준다.
        postId: {
            type: String,
            required: true,
        }
    },

    components: {
        PostEditForm
    },

    // 라우터의 beforeEnter 훅에서 스토어에 저장했던 게시물 정보를 가져온다.
    computed: {
        ...mapState([ 'post' ])
    },

    created () {
        console.log('post: ' + JSON.stringify(this.post));
        console.log(`postId: ${this.postId}`)
    },

    methods: {
        onSubmit (payload) {
            const { title, contents } = payload
            axios.put(`/api/posts/${this.postId}`, { title, contents })
                .then(res => {
                    alert('게시물이 성공적으로 수정되었습니다.')
                    this.$router.push({
                        name: 'PostViewPage',
                        params: { postId: res.data.post.id.toString() }
                    })
                })
                .catch(err => {
                    if (err.response.status === 401) {
                        alert('로그인이 필요합니다.')
                        this.$router.push({ name: 'Signin' })
                    } else if (err.response.status === 403) {
                        alert(err.response.data.msg)
                        this.$router.back()
                    } else {
                        alert(err.response.data.mssg)
                    }
                })
        }
    },
}
</script>

<style>

</style>