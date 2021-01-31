<template>
    <div class="sign-in-page">
        <h3>로그인</h3>
        <signin-form @submit="onSubmit"></signin-form>
        <p>회원이 아니신가요? <router-link :to="{ name: 'Signup' }">회원 가입하러 가기</router-link></p>
    </div>
</template>

<script>
import SigninForm from '../components/SigninForm'
import { mapActions } from 'vuex'

export default {
    name: 'Signin',

    components: {
        SigninForm,
    },

    methods: {
        onSubmit (payload) {
            const { email, password } = payload
            this.signin(payload)
                .then(res => {
                    alert('로그인이 완료되었습니다.')
                    this.$router.push({ name: 'PostListPage' })
                })
                .catch(err => {
                    console.log(err)
                    // 로그인에 실패할 경우 사용자에게 에러 원인을 알려준다.
                    alert(err.response.data.msg)
                })
        },

        ...mapActions([ 'signin' ]),
    },
}
</script>

<style>

</style>