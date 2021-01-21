<template>
    <div class="post-list-page">
        <h1>포스트 게시글</h1>
        <div>
            <sigun-list-component></sigun-list-component>
        </div>
        <v-btn color="success">Success</v-btn>
    </div>
</template>

<script>
// import PostListComponent from '@/components/PostListComponent'
import SigunListComponent from '../components/SigunListComponent'
// import { mapActions } from 'vuex'

export default {
    name: 'SigunListPage',

    components: {
        SigunListComponent
    },

    // create () {
    //     this.fetchSigunList()
    // }
}
</script>

<style scoped>

</style>