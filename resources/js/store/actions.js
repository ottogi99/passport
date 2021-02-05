// import axios from 'axios'
import { 
    FETCH_SIGUN_LIST, 
    FETCH_NONGHYUP_LIST,
    FETCH_POST,
    SET_ACCESS_TOKEN,
    SET_MY_INFO,
    DESTROY_ACCESS_TOKEN,
    DESTROY_MY_INFO,
} from './mutations-types'

export default {
    fetchSigunList ({ commit }) {
        return axios.get('/api/siguns').then(res => {
            commit(FETCH_SIGUN_LIST, res.data.siguns)
        })
    },

    // fetchNonghyupList({ commit }) {
    //     return axios.get('/api/nonghyups').then(res => {
    //         commit(FETCH_NONGHYUP_LIST, res.data.nonghyups)
    //     })
    // },

    fetchNonghyupList({ commit }, params) {
        // console.log('params: ' + JSON.stringify(params));
        return axios.get('/api/nonghyups', { params }).then(res => {
            commit(FETCH_NONGHYUP_LIST, res.data.nonghyups)
        })
    },


    fetchPost({ commit }, postId) {
        console.log(`/api/posts/${postId}`)
        return axios.get(`/api/posts/${postId}`).then(res => {
            commit(FETCH_POST, res.data.post)
        })
    },

    signin({ commit }, payload) {
        const { email, password } = payload
        return axios.post('/api/signin', { email, password })
                .then(res => {
                    console.log('tokenType:' + res.data.token_type)
                    console.log('expiresIn:' + res.data.expires_in)
                    console.log('accessToken:' + res.data.access_token)
                    console.log('refresh_token:' + res.data.refresh_token)

                    const { access_token } = res.data
                    commit(SET_ACCESS_TOKEN, access_token)

                    // 토큰을 스토어에 저장하면 headers에 토큰이 저장되므로 바로 사용자 정보를 불러올 수 있다.
                    // axios.defaults.headers.common.Authorization = `Bearer ${access_token}`
                    // console.log(axios.defaults.headers.common.Authorization);
                    // axios.defaults.headers.common['X-CSRF-TOKEN'] = document.querySelector('meta[name="csrf-token"]').getAttribute('content');
                    return axios.get('/api/user/me')
                })
                .then(res => {
                    // 사용자 정보 요청이 성공했다면 변이를 사용하여 스토어에 사용자 정보를 저장한다.
                    commit(SET_MY_INFO, res.data.me)
                })
    },

    signinByToken ({ commit }, token) {
        // 토큰을 스토어에 커밋한다.
        console.log('signinByToken: ' + token)
        commit(SET_ACCESS_TOKEN, token)
        // 사용자의 정보를 받아온 후 스토어에 커밋한다.
        return axios.get('/api/user/me')
                    .then(res => {
                        commit(SET_MY_INFO, res.data.me)
                    })
    },

    signout ({ commit }) {
        commit(DESTROY_MY_INFO)
        commit(DESTROY_ACCESS_TOKEN)
    }
}