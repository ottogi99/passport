<template>
    <div class="sign-up-page">
        <h3>회원가입</h3>
        <signup-form @submit="onSubmit"></signup-form>
    </div>
</template>

<script>
import SignupForm from '../components/SignupForm'

export default {
    name: 'Signup',

    components: {
        SignupForm,
    },

    methods: {
        onSubmit (payload) {
            const { email, password, name} = payload
            axios.post('/api/auth/signup', { name, email, password }).then(res => {
                alert('회원가입이 완료되었습니다.')
                this.$router.push('/')
            }).catch(err => {
                alert(err.response.data.msg)
            })
        }
    }
}
</script>

<style>

</style>