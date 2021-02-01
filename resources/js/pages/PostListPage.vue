<template>
    <div class="post-list-page">
        <h1>포스트 게시글</h1>
        <div>
            <post-list :posts="posts" :loading="loading"></post-list>
        </div>
        <v-btn color="success">Success</v-btn>
        <router-link :to="{ name: 'PostCreatePage' }">글쓰기</router-link>
    </div>
</template>

<script>
import PostList from '../components/PostList'

export default {
    name: 'PostListPage',

    components: {
        PostList
    },

    data () {
        return {
            posts: [],
            loading: true,
        }
    },
    
    created () {
        axios.get('/api/posts')
            .then(res => {
                // console.log(res.data)
                this.posts = res.data.posts
                // console.log(this.posts)
                this.loading = false
            })
    }
}
</script>

<style scoped>

</style>