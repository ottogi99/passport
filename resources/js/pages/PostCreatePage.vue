<template>
    <div class="post-create-page">
        <h3>게시물 작성하기</h3>
        <post-create-form @submit="onSubmit" />
    </div>
</template>

<script>
// import PostCreateForm from '@/components/PostCreateForm'
import PostCreateForm from '../components/PostCreateForm'

export default {
    name: 'PostCreatePage',
    components: { 
        PostCreateForm,
    },
    methods: {
        onSubmit (payload) {
            const { title, contents } = payload
            axios.post('/api/posts', { title, contents })
                .then(res => {
                    alert('게시물이 성공적으로 작성되었습니다.')
                    console.log('post: ' + JSON.stringify(res.data.post));
                    this.$router.push({
                        name: 'PostViewPage',
                        params: { postId: res.data.post.id.toString() }
                    })
                })
                .catch(err => {
                    console.log('err: ' + err)
                    if (err.response.status === 401) {
                        alert('로그인이 필요합니다.')
                        this.$router.push({ name: 'Signin' })
                    } else {
                        alert(err.response.data.msg)
                    }
                })
        }
    }
}
</script>

<style>

</style>