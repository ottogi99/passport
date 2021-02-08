<template>
    <div>
        <top-search-bar @submit="onSubmit" :siguns="siguns"></top-search-bar>
        <div class="mt-4"></div>
        <nonghyup-list @update="onUpdate" :nonghyups="nonghyups"></nonghyup-list>
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

                const all = {
                    code: '',
                    name: '전체',
                }
                this.siguns.splice(0, 0, all)
            })
    },

    computed: {
        ...mapState(['nonghyups']),
    },

    methods: {
        onSubmit (payload) {
            this.loading = true

            const { selectedYear, selectedSigun, selectedNonghyup, searchString } = payload
            const params = { 
                year: selectedYear,
                sigun: selectedSigun.code,
                nonghyup: selectedNonghyup.code,
                q: searchString,
            }

            this.fetchNonghyupList(params)

            // axios.get('/api/nonghyups', { params })
            //     .then(res => {
            //         // console.log(res.data)
            //         this.nonghyups = res.data.nonghyups
            //         // console.log(this.posts)
            //         this.loading = false
            //     })

            // return ''
        },

        onUpdate () {
            this.fetchNonghyupList()
        },

        ...mapActions(['fetchNonghyupList']),
    }
}
</script>

<style scoped>

</style>