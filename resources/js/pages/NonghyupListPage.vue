<template>
    <div class="post-list-page">
        <h1>농협 정보</h1>
        <div>
            <nonghyup-list-component :nonghyups="nonghyups"></nonghyup-list-component>
        </div>
        <v-btn color="success">Success</v-btn>
    </div>
</template>

<script>
import { mapState, mapActions } from 'vuex'
import NonghyupListComponent from '../components/NonghyupListComponent'

export default {
    name: 'NonghyupListPage',

    components: {
        NonghyupListComponent
    },

    created () {
        this.fetchNonghyupList()
    },

    computed: {
        ...mapState(['nonghyups'])
    },

    methods: {
        ...mapActions(['fetchNonghyupList'])
    }
}
</script>

<style scoped>

</style>