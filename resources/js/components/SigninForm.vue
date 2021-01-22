<template>
    <!-- <form @submit.prevent="submit">
        <fieldset>
            <input type="text" v-model="email" placeholder="이메일을 입력해주세요." />
            <input type="password" v-model="password" placeholder="비밀번호를 입력해주세요." />
            <button type="submit">로그인</button>
        </fieldset>
    </form> -->

    <v-form ref="form" @submit.prevent="submit" v-model="valid" lazy-validation>
        <v-text-field v-model="email" :rules="emailRules" label="이메일" required></v-text-field>
        <v-text-field 
            v-model="password" 
            :append-icon="show1 ? 'mdi-eye' : 'mdi-eye-off'" 
            :rules="[rules.required, rules.min]" 
            :type="show1 ? 'text' : 'password'" 
            name="input-10-1"
            label="비밀번호"
            hint="최소 8자"
            counter
            @click:append="show1 = !show1"
            required></v-text-field>
        <v-btn type="submit">Submit</v-btn>
    </v-form>
</template>

<script>
export default {
    name: 'SigninForm',

    data () {
        return {
            valid: true, 
            show1: false,

            eamil: '',
            password: '',

            nameRules: [
                v => !!v || '이름을 필수 입력 항목입니다',
                v => v.length <= 10 || '이름을 10글자 이하이여야 합니다',
            ],
            email: '',
            emailRules: [
                v => !! v || '이메일은 필수 입력 항목입니다',
                v => /.+@.+/.test(v) || '이메일 형식이 유효하지 않습니다',
            ],
            rules: {
                required: value => !! value || '필수 항목입니다.',
                min: v => v.length >= 8 || '최소 8자 이상입니다.',
                emailMatch: () => (`The email and password you entered don't match`)
            },
        }
    },

    methods: {
        submit () {
            const { email, password } = this
            this.$emit('submit', { email, password })
        }
    }
}
</script>

<style>

</style>