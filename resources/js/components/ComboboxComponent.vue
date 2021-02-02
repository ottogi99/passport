<template>
    <v-container fluid>
        <!-- <v-row>
            <v-col cols="12">
                <v-combobox
                    v-model="selectedSigun"
                    :items="siguns"
                    item-text="name"
                    label="시/군 선택"
                    multiple
                    outlined
                    dense
                ></v-combobox>
            </v-col>
        </v-row> -->

        <v-row>
            <v-col cols="2">
                <v-combobox
                    v-model="selectedYear"
                    :items="years"
                    item-text="name"
                    label="년도 선택"
                    outlined
                    dense
                ></v-combobox>
            </v-col>
            <v-col cols="2">
                <v-combobox
                    v-model="selectedSigun"
                    :items="siguns"
                    item-text="name"
                    label="시/군 선택"
                    outlined
                    dense
                ></v-combobox>
            </v-col>
            <v-col cols="2">
                <v-combobox
                    v-model="selectedNonghyup"
                    :items="nonghyups"
                    item-text="name"
                    label="농협 선택"
                    outlined
                    dense
                ></v-combobox>
            </v-col>
            <v-spacer></v-spacer>
        </v-row>
    </v-container>
</template>

<script>
export default {
    name: 'ComboBoxComponent',

    props: {
        siguns: {
            type: Array,
        }
    },

    data () {
        return {
            selectedYear: '',
            selectedSigun: '',
            selectedNonghyup: '',

            years: [
                '2020',
                '2021',
            ],

            nonghyups: [
                '천안농협',
                '동천안농협',
            ]
        }
    },

    // watch () {
        // 시/군 선택시, 농협항목 동적으로 변경되도록 구현
    // }
}
</script>

<style>

</style>