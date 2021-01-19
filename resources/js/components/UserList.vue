<template>
    <div>
        <div v-for="(user, index) in usersWithoutSignedInUser" :key="user.id" @click="updateChatWith(user.id)">
            {{ index }} {{ user.id }} {{ user.name }} {{ user.email }}
        </div>
    </div>    
</template>

<script>
export default {
    name: 'UserList',
    props: {
        currentUser: {
            type: Number,
            required: true,
        }
    },

    data () {
        return {
            users: []
        }
    },

    computed: {
        usersWithoutSignedInUser () {
            return this.users.filter(user => user.id !== this.currentUser)
            // return this.users
        }
    },

    created () {
        axios.get('/api/users')
            .then(res => {
                console.log(res.data)
                this.users = res.data.users
            }).catch(err => {
                console.log(err);
            });
    },

    mounted () {
        console.log('UserList Component mounted.')
    },

    methods: {
        updateChatWith (userId) {
            // console.log('clicked user list')
            this.$emit('updatedChatWith', userId)
        }
    }
}
</script>

<style scoped>

</style>