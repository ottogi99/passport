import { 
    FETCH_SIGUN_LIST, 
    FETCH_NONGHYUP_LIST,
    FETCH_POST,
    SET_ACCESS_TOKEN,
    SET_MY_INFO,
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

    [SET_ACCESS_TOKEN] (state, accessToken) {
        if (accessToken) {
            state.accessToken = accessToken
            axios.defaults.headers.common.Authorization = `Bearer ${accessToken}`
        }
    },

    [SET_MY_INFO] (state, me) {
        if (me) {
            state.me = me
        }
    },
}