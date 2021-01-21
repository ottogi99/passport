import Axios from 'axios'
import { 
    FETCH_SIGUN_LIST, 
    FETCH_NONGHYUP_LIST,
    FETCH_POST,
} from './mutations-types'

export default {
    fetchSigunList ({ commit }) {
        return axios.get('/api/siguns').then(res => {
            commit(FETCH_SIGUN_LIST, res.data.siguns)
        })
    },

    fetchNonghyupList({ commit }) {
        return axios.get('/api/nonghyups').then(res => {
            commit(FETCH_NONGHYUP_LIST, res.data.nonghyups)
        })
    },

    fetchPost({ commit }, postId) {
        return axios.get(`/api/posts/${postId}`).then(res => {
            commit(FETCH_POST, res.data.post)
        })
    }
}