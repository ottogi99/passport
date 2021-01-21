<template>
    <div class="post-view-page">
        <!-- 게시물이 있는 경우에는 컴포넌트가 노출된다. -->
        <post-view-component v-if="post" :post="post"/>
        <p v-else>게시글 불러오는 중...</p>
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
        ...mapActions([ 'fetchPost' ])
    },
}
</script>

<style>

</style>