<template>
    <!-- novalidate 속성은 HTML5의 자체적인 유효성 검사를 하지 않도록 설정하는 것 -->
    <!-- <form novalidate>
        <fieldset>
            <input type="text" v-model="name" placeholder="이름을 입력해 주세요." />
            <input type="email" v-model="email" placeholder="이메일을 입력해 주세요." />
            <input type="password" v-model="password" placeholder="비밀번호를 입력해 주세요." />
            <input type="password" v-model="passwordConfirm" placeholder="비밀번호를 다시 한번 입력해주세요." />
            <button type="submit">회원가입</button>
        </fieldset>
    </form> -->

    <!-- v-form 사용법 -->
    <!-- <v-form v-model="valid">
        <v-container>
            <v-row>
                <v-col cols="12" md="4">
                    <v-text-field v-model="name" :rules="nameRules" :counter="10" label="이름" requried></v-text-field>
                </v-col>
                <v-col cols="12" md="4">
                    <v-text-field v-model="email" :rules="emailRules" label="이메일" required></v-text-field>
                </v-col>
            </v-row>
        </v-container>
    </v-form> -->

    <!-- 제출 및 지우기를 통한 유효성 검사 -->
    <v-form ref="form" @submit.prevent="submit" v-model="valid" lazy-validation>
        <v-text-field v-model="name" :rules="nameRules" :counter="10" label="이름" requried></v-text-field>
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
        <v-text-field 
            v-model="passwordConfirm" 
            :append-icon="show2 ? 'mdi-eye' : 'mdi-eye-off'" 
            :rules="[rules.required, rules.min]" 
            :type="show2 ? 'text' : 'password'" 
            name="input-10-2"
            label="비밀번호 확인"
            hint="최소 8자"
            counter
            @click:append="show2 = !show2"
            required></v-text-field>
        <!-- <v-select v-model="select" :items="items" :rules="[v => !!v || '필수 항목입니다']" label="item" required></v-select> -->
        <v-checkbox v-model="checkbox" :rules="[v => !!v || '동의항목을 체크하여야만 진행이 가능합니다']" label="동의합니다" required></v-checkbox>
        <v-btn :disabled="!valid" color="success" class="mr-4" @click="validate">Validate</v-btn>
        <v-btn color="error" class="mr-4" @click="reset">Reset Form</v-btn>
        <v-btn color="warning" @click="resetValidation">Reset Validation</v-btn>
        <v-btn type="submit">Submit</v-btn>
    </v-form>

    <!-- <v-form ref="form" v-model="valid" lazy-validation>
        <v-text-field v-model="name" :error-messages="nameErrors" :counter="10" label="이름" requried @input="$v.name.$touch()" @blur="$v.name.$touch()"></v-text-field>
        <v-text-field v-model="email" :error-messages="emailErrors" label="이메일" required @input="$v.email.$touch()" @blur="$v.name.$touch()"></v-text-field>
        <v-select v-model="select" :items="items" label="item" required @change="$v.select.$touch()" @blur="$v.select.$touch()"></v-select>
        <v-checkbox v-model="checkbox" label="동의 하시겠습니까?" required @change="$v.checkbox.$touch()" @blur="$v.checkbox.$touch()"></v-checkbox>
        <v-btn class="mr-4" @click="submit">Submit</v-btn>
        <v-btn @click="clear">Clear</v-btn>
    </v-form> -->

</template>

<script>
// const { required, maxLength, email } = validators
// const validationMixin = vuelidate.validationMixin
// Vue.use(vuelidate.default)

export default {
    name: 'Sigunup',

    data () {
        return {
            valid: true,

            show1: false,
            show2: false,

            name: '',
            email: '',
            password: '',
            passwordConfirm: '',

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
            select: null,
            items: [
                'Item 1',
                'Item 2',
                'Item 3',
                'Item 4',
            ],
            checkbox: false,
        }
    },

    // validataions: {
    //     name: { required, maxLength: maxLength(10) },
    //     email: { required, email },
    //     select: { required },
    //     checkbox: {
    //         checked (val) {
    //             return val
    //         },
    //     },
    // },

    // computed: {
    //     checkboxErrors () {
    //         const error = []
    //         if (!this.$v.checkbox.$dirty) return this.errors
    //         !this.$v.checkbox.checked && error.push('You must agree to continue!')
    //         return error
    //     }
    // },

    methods: {
        validate () {
            this.$refs.form.validate()
        },

        reset () {
            this.$refs.form.reset()
        },

        resetValidation () {
            this.$refs.form.resetValidation()
        },

        submit () {
            const { name, email, password, passwordConfirm } = this

            if (!name || !email || !password || !passwordConfirm) {
                alert('모든 항목을 입력해주세요.')
            }
            if (password !== passwordConfirm) {
                alert('비밀번호가 일치하지 않습니다.')
                return
            }
            this.$emit('submit', { name, email, password })
        }

        // submit () {
        //     this.$v.$touch()
        // },
        // clear () {
        //     this.$v.$reset()
        //     this.name = ''
        //     this.email = ''
        //     this.select = null
        //     this.checkbox = false
        // }
    },
}
</script>

<style>

</style>