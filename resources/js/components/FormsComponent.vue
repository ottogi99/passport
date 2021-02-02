<template>
    <v-form v-model="valid" ref="form" lazy-validation>
        <v-container>
            <v-row>
                <v-col
                    cols="12"
                    md="4"
                >
                    <v-text-field
                        v-model="firstname"
                        :rules="nameRules"
                        :counter="10"
                        label="First name"
                        required
                    ></v-text-field>
                </v-col>

                <v-col
                    cols="12"
                    md="4"
                >
                    <v-text-field
                        v-model="lastname"
                        :rules="nameRules"
                        :counter="10"
                        label="Last name"
                        required
                    ></v-text-field>
                </v-col>

                <v-col
                    cols="12"
                    md="4"
                >
                    <v-text-field
                        v-model="email"
                        :rules="emailRules"
                        label="E-mail"
                        required
                    ></v-text-field>
                </v-col>
            </v-row>
            <v-row>
                <v-btn
                    :disabled="!valid"
                    color="success"
                    class="mr-4"
                    @click="validate"
                >유효성검증</v-btn>

                <v-btn
                    color="error"
                    class="mr-4"
                    @click="reset"
                >리셋 폼</v-btn>

                <v-btn
                    color="warning"
                    @click="resetValidation"
                >리셋 유효성검증</v-btn>
            </v-row>
        </v-container>
    </v-form>
</template>

<script>
export default {
    name: 'FormsComponent',

    data () {
        return {
            valid: true,
            firstname: '',
            lastname: '',
            nameRules: [
                v => !!v || 'Name is required',
                v => (v && v.length <= 10) || 'Name must be less than 10 characters.',
            ],
            email: '',
            emailRules: [
                v => !!v || 'E-mail is required',
                v => /.+@.+\..+/.test(v) || 'E-mail must be valid',

                value => (value || '').length <= 20 || 'Max 20 characters',
                value => {
                    const pattern = /^(([^<>()[\]\\.,;:\s@"]+(\.[^<>()[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/
                    return pattern.test(value) || 'Invalid e-mail.'                
                },
            ],
        }
    },

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
    },
}
</script>

<style>

</style>