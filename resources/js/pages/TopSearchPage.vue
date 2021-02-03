<template>
    <div>
        <h3>상단 검색 바</h3>
        <top-search-bar @submit="onSubmit" :siguns="siguns"></top-search-bar>
        <div class="mt-4"></div>
        <post-list :posts="posts" :loading="loading"></post-list>
    </div>
</template>

<script>
import PostList from '../components/PostList.vue'
import TopSearchBar from '../components/TopSearchBar.vue'

export default {
    components: { 
        TopSearchBar, 
        PostList, 
    },

    data () {
        return {
            siguns: [],
            posts: [],
            loading: false,
        }
    },

    created () {
        axios.get('/api/siguns')
            .then(res => {
                this.siguns = res.data.siguns
            })
    },

    methods: {
        onSubmit (payload) {
            console.log(payload)
            this.loading = true

            axios.get('/api/posts')
                .then(res => {
                    // console.log(res.data)
                    this.posts = res.data.posts
                    // console.log(this.posts)
                    this.loading = false
                })

            return ''
        }
    }
}
</script>

<style>

</style>