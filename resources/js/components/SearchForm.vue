<template>
    <v-container fluid>
        <v-row align="center">
            <v-col cols="12">
                <v-autocomplete
                    v-model="values"
                    :items="items"
                    outlined
                    dense
                    chips
                    small-chips
                    label="검색"
                    multiple
                ></v-autocomplete>
            </v-col>
        </v-row>

        <v-card
            class="overflow-hidden"
            color="purple lighten-1"
            dark
        >
            <v-toolbar
                flat
                color="purple"
            >
                <v-icon>mid-account</v-icon>
                <v-toolbar-title class="font-weight-light">
                    사용자 정보
                </v-toolbar-title>
                <v-spacer></v-spacer>
                <v-btn
                    color="purple darken-3"
                    fab
                    small
                    @click='isEditing = !isEditing'
                >
                    <v-icon v-if="isEditing">
                        mdi-close
                    </v-icon>
                    <v-icon v-else>
                        mdi-pencil
                    </v-icon>
                </v-btn>
            </v-toolbar>
            <v-card-text>
                <v-text-field
                    :disabled="!isEditing"
                    color="white"
                    label="이름"
                ></v-text-field>
                <v-autocomplete
                    :disabled="!isEditing"
                    :items="states"
                    :filter="customFilter"
                    color="white"
                    item-text="name"
                    label="지역"
                ></v-autocomplete>
            </v-card-text>
            <v-divider></v-divider>
            <v-card-actions>
                <v-spacer></v-spacer>
                <v-btn
                    :disabled="!isEditing"
                    color="success"
                    @click="save"
                >저장
                </v-btn>
            </v-card-actions>
            <v-snackbar
                v-model="hasSaved"
                :timeout="2000"
                absolute
                bottom
                left
            >사용자 정보가 업데이트 되었습니다.
            </v-snackbar>


            <v-toolbar
                dark
                color="teal"
            >
                <v-toolbar-title>State selection</v-toolbar-title>
                <v-autocomplete
                    v-model="select"
                    :loading="loading"
                    :items="items"
                    :search-input.sync="search"
                    cache-items
                    class="mx-4"
                    flat
                    hide-no-data
                    hide-details
                    label="What state are you from?"
                    solo-inverted
                ></v-autocomplete>
                <v-btn icon>
                    <v-icon>mdi-dots-vertical</v-icon>
                </v-btn>
            </v-toolbar>
        </v-card>
    </v-container>
</template>

<script>
export default {
    name: 'SearchForm',

    data () {
        return {
            items: ['foo', 'bar', 'fizz', 'buzz'],
            values: ['foo', 'bar'],
            value: null,


            hasSaved: false,
            isEditing: null,
            model: null,
            states: [
                { name: 'Floria', abbr: 'FL', id: 1 },
                { name: 'Georgia', abbr: 'GA', id: 2 },
                { name: 'Nebraska', abbr: 'NE', id: 3 },
                { name: 'California', abbr: 'CA', id: 4 },
                { name: 'New York', abbr: 'NY', id: 5 },
            ],


            loading: false,
            items: [],
            search: null,
            select: null,
            states: [
                'Alabama',
                'Alaska',
                'American Samoa',
                'Arizona',
                'Arkansas',
                'California',
                'Colorado',
                'Connecticut',
                'Delaware',
                'District of Columbia',
                'Federated States of Micronesia',
                'Florida',
                'Georgia',
                'Guam',
                'Hawaii',
                'Idaho',
                'Illinois',
                'Indiana',
                'Iowa',
                'Kansas',
                'Kentucky',
                'Louisiana',
                'Maine',
                'Marshall Islands',
                'Maryland',
                'Massachusetts',
                'Michigan',
                'Minnesota',
                'Mississippi',
                'Missouri',
                'Montana',
                'Nebraska',
                'Nevada',
                'New Hampshire',
                'New Jersey',
                'New Mexico',
                'New York',
                'North Carolina',
                'North Dakota',
                'Northern Mariana Islands',
                'Ohio',
                'Oklahoma',
                'Oregon',
                'Palau',
                'Pennsylvania',
                'Puerto Rico',
                'Rhode Island',
                'South Carolina',
                'South Dakota',
                'Tennessee',
                'Texas',
                'Utah',
                'Vermont',
                'Virgin Island',
                'Virginia',
                'Washington',
                'West Virginia',
                'Wisconsin',
                'Wyoming',
            ]
        }
    },

    methods: {
        customFilter (item, queryText, itemText) {
            const textOne = item.name.toLowerCase()
            const textTwo = item.abbr.toLowerCase()
            const searchText = queryText.toLowerCase()

            return textOne.indexOf(searchText) > -1 || textTwo.indexOf(searchText) > -1
        },
        save () {
            this.isEditing = !this.isEditing
            this.hasSaved = true
        },

        querySelection (v) {
            this.loading = true

            setTimeout( () => {
                this.items = this.states.filter(e => {
                    return (e || '').toLowerCase().indexOf((v || '').toLowerCase()) > -1
                })
                this.loading = false
            }, 500)
        }
    },

    watch: {
        search (val) {
            val && val !== this.select && this.querySelections(val)
        },
    }
}
</script>

<style>

</style>