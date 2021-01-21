import { 
    FETCH_SIGUN_LIST, 
    FETCH_NONGHYUP_LIST,
    FETCH_POST,
} from './mutations-types'

export default {
    [FETCH_SIGUN_LIST] (state, siguns) {
        state.siguns = siguns
    },

    [FETCH_NONGHYUP_LIST] (state, nonghyups) {
        state.nonghyups = nonghyups
    },

    [FETCH_POST] (state, post) {
        state.post = post
    },
}