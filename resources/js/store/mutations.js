import { 
    FETCH_SIGUN_LIST, 
    FETCH_NONGHYUP_LIST,
    FETCH_POST,
    SET_ACCESS_TOKEN,
    SET_MY_INFO,
    DESTROY_ACCESS_TYPE,
    DESTROY_MY_INFO,
    DESTROY_ACCESS_TOKEN,
} from './mutations-types'

import Cookies from 'js-cookie'

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
            Cookies.set('accessToken', accessToken)
        }
    },

    [SET_MY_INFO] (state, me) {
        if (me) {
            state.me = me
        }
    },

    [DESTROY_ACCESS_TOKEN] (state) {
        state.accessToken = ''
        delete axios.defaults.headers.common.Authorization
        Cookies.remove('accessToken')
    },

    [DESTROY_MY_INFO] (state) {
        state.me = null
    }
}