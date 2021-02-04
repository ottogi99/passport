<template>
    <div>
        <top-search-bar @submit="onSubmit" :siguns="siguns"></top-search-bar>
        <div class="mt-4"></div>
        <nonghyup-list :nonghyups="nonghyups"></nonghyup-list>
    </div>
</template>

<script>
import { mapState, mapActions } from 'vuex'
import NonghyupList from '../components/NonghyupList'
import TopSearchBar from '../components/TopSearchBar.vue'

export default {
    name: 'NonghyupListPage',

    components: {
        TopSearchBar,
        NonghyupList
    },

    data () {
        return {
            siguns: [],
        }
    },

    created () {
        this.fetchNonghyupList(),
        axios.get('/api/siguns')
            .then(res => {
                this.siguns = res.data.siguns
            })
    },

    computed: {
        ...mapState(['nonghyups'])
    },

    methods: {
        ...mapActions(['fetchNonghyupList']),

        onSubmit (payload) {
            this.loading = true

            axios.get('/api/nonghyups')
                .then(res => {
                    // console.log(res.data)
                    this.posts = res.data.nonghyups
                    // console.log(this.posts)
                    this.loading = false
                })

            return ''
        }
    }
}
</script>

<style scoped>

</style>