<template>
    <div class="post-list-page">
        <h1>포스트 게시글</h1>
        <div>
            <post-list-component :posts="posts"></post-list-component>
        </div>
        <v-btn color="success">Success</v-btn>
        <router-link :to="{ name: 'PostCreatePage' }">글쓰기</router-link>
    </div>
</template>

<script>
import PostListComponent from '../components/PostListComponent'

export default {
    name: 'PostListPage',

    components: {
        PostListComponent
    },

    data () {
        return {
            posts: []
        }
    },
    
    created () {
        axios.get('/api/posts')
            .then(res => {
                console.log(res.data)
                this.posts = res.data.posts
                console.log(this.posts)
            })
    }
}
</script>

<style scoped>

</style>