<template>
    <div class="post-create-page">
        <h3>게시물 작성하기</h3>
        <post-create-form @submit="onSubmit"></post-create-form>
    </div>
</template>

<script>
// import PostCreateForm from '@/components/PostCreateForm'
import PostCreateForm from '../components/PostCreateForm.vue'

export default {
    name: 'PostCreatePage',
    components: { 
        PostCreateForm,
    },
    methods: {
        onSubmit (payload) {
            const { title, contents } = payload
            axios.post('/posts', { title, contents })
                .then(res => {
                    alert('게시물이 성공적으로 작성되었습니다.')
                    this.$router.push({
                        name: 'PostViewPage',
                        params: { postId: res.data.id.toString() }
                    })
                })
                .catch(err => {
                    if (err.response.status === 401) {
                        // 401 UnAuthorized라면 사용자 로그인 페이지로 이동시킨다.
                        alert('로그인이 필요합니다.')
                        this.$router.push({ name: 'Signin' })
                    } else {
                        alert(err.response.data.msg)
                  h  }
                })
        }
    }
}
</script>

<style>

</style>