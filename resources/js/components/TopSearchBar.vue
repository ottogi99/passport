<template>
    <v-card
        tile
    >
        <v-form v-model="valid" ref="form">
            <v-container>
                <v-row>
                    <v-spacer></v-spacer>

                    <v-col cols="2" v-if="years">
                        <v-combobox
                            v-model="selectedYear"
                            :items="years"
                            :rules="yearsRules"
                            label="년도 선택"
                            outlined
                            dense
                        ></v-combobox>
                    </v-col>
                    <v-col cols="2">
                        <v-combobox
                            v-model="selectedSigun"
                            :items="siguns"
                            :rules="sigunsRules"
                            item-text="name"
                            item-value="code"
                            label="시/군 선택"
                            outlined
                            dense
                        ></v-combobox>
                    </v-col>
                    <v-col cols="2">
                        <v-combobox
                            v-model="selectedNonghyup"
                            :items="nonghyups"
                            :rules="nonghyupsRules"
                            :loading="loading"
                            item-text="name"
                            item-value="code"
                            label="농협 선택"
                            outlined
                            dense
                        ></v-combobox>
                    </v-col>

                    <v-spacer></v-spacer>

                    <v-col cols="5">
                        <v-autocomplete
                            v-model="searchString"
                            persistent-hint
                            :items="siguns"
                            color="ornage"
                            item-text="name"
                            item-value="name"
                            clearable
                            @keydown.enter="submit"
                        >
                            <template v-slot:append-outer>
                                <v-icon
                                    @click="onSubmit"
                                    v-text="'mdi-magnify'"
                                ></v-icon>
                            </template>
                        </v-autocomplete>
                    </v-col>

                    <v-spacer></v-spacer>
                </v-row>
            </v-container>
        </v-form>
    </v-card>
</template>

<script>
export default {
    name: 'TopSearchBar',

    props: {
        years: {
            type: Array,
        },
        siguns: {
            type: Array,
        },
        // nonghyups: {
        //     type: Array,
        // },
    },

    data () {
        return {
            loading: false,
            nonghyups: [],
            selectedYear: '',
            selectedSigun: '',
            selectedNonghyup: '',
            searchString: '',

            startYear: 2020,
            startDate: new Date().toISOString().substr(0, 10),
            endDate: new Date().toISOString().substr(0, 10),

            menu1: false,
            menu2: false,

            valid: false,

            yearsRules: [
                // v => !!v || '년도를 선택하세요',
            ],
            sigunsRules: [
                // v => !!v || '시/군을 선택하세요',
            ],
            nonghyupsRules: [
                // v => !!v || '농협을 선택하세요',
            ],

            nameRules: [
                v => !!v || 'Name is required',
                v => v.length <= 10 || 'Name must be less than 10 characters',
            ],
        }
    },

    computed: {
        // years () {
        //     const temp = []
        //     const currentYear = new Date().getFullYear()
        //     for (let i = this.startYear; i <= currentYear; i++) {
        //         temp.push(i)
        //     }
        //     return temp            
        // },
    },

    created () {       
        this.nonghyups = this.getNonghyupList()
    },

    methods: {
        onSubmit () {
            const isValidated = this.$refs.form.validate()
            if (isValidated) {
                const { selectedYear, selectedSigun, selectedNonghyup, searchString } = this
                // console.log({ selectedYear, selectedSigun, selectedNonghyup, searchString })
                // console.log( selectedSigun.id, selectedNonghyup.id );
                this.$emit('submit', { selectedYear, selectedSigun, selectedNonghyup, searchString })
            }

            // alert('onSubmit')
        },

        keydown (e) {
            const query = e.target.value.trim();
            console.log(query)
        },

        getNonghyupList (params) {
            axios.get('/api/nonghyups', { params })
                .then(res => {
                    this.nonghyups = res.data.nonghyups

                    const all = {
                        code: '',
                        name: '전체',
                    }
                    this.nonghyups.splice(0, 0, all)
                    // this.selectedNonghyup = null
                    this.selectedNonghyup = this.nonghyups[0]
                })
                .finally(() => {
                    this.loading = false
                })
        },        
    },

    watch: {
        selectedSigun: function (val) {
            this.loading = true
            const payload = { 
                sigun: val.code,
            }
            this.nonghyups = this.getNonghyupList(payload)

            // axios.get('/api/nonghyups', { params })
            //     .then(res => {
            //         // console.log(res.data)
            //         this.nonghyups = res.data.nonghyups
            //         // console.log(this.posts)
            //         this.loading = false
            //     })
        },

        // 시군 prop 가 비동기로 동작하므로 created () 에 넣으면 동작되지 않는다.
        siguns: function (siguns) {
            if (siguns.length > 1)
                this.selectedSigun = siguns[0]
        },

    },
}
</script>

<style scoped>
>>>.v-input--dense>.v-input__control>.v-input__slot {
    margin-top: 8px !important;
    margin-bottom: 0px !important;
}
</style>