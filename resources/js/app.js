/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');

window.Vue = require('vue');

// /**
//  * The following block of code may be used to automatically register your
//  * Vue components. It will recursively scan this directory for the Vue
//  * components and automatically register them with their "basename".
//  *
//  * Eg. ./components/ExampleComponent.vue -> <example-component></example-component>
//  */

// // const files = require.context('./', true, /\.vue$/i)
// // files.keys().map(key => Vue.component(key.split('/').pop().split('.')[0], files(key).default))

// Vue.component('example-component', require('./components/ExampleComponent.vue').default);

// Vue.component(
//     'passport-clients',
//     require('./components/passport/Clients.vue').default
// );

// Vue.component(
//     'passport-authorized-clients',
//     require('./components/passport/AuthorizedClients.vue').default
// );

// Vue.component(
//     'passport-personal-access-tokens',
//     require('./components/passport/PersonalAccessTokens.vue').default
// );

// /**
//  * Next, we will create a fresh Vue application instance and attach it to
//  * the page. Then, you may begin adding components to this application
//  * or customize the JavaScript scaffolding to fit your unique needs.
//  */

// const app = new Vue({
//     el: '#app',
// });


// 기존의 내용 대체
import '@mdi/font/css/materialdesignicons.css'
import Vue from 'vue'
import VueRouter from 'vue-router'
import Vuetify from 'vuetify'
import 'vuetify/dist/vuetify.min.css'

Vue.use(VueRouter)
Vue.use(Vuetify)

// Vuex 주입
import store from './store'

import App from './pages/App'
import Hello from './pages/Hello'
import Home from './pages/Home'


// import pages
import SigunListPage from './pages/SigunListPage'
import NonghyupListPage from './pages/NonghyupListPage'

// Post pages
import PostListPage from './pages/PostListPage'
import PostViewPage from './pages/PostViewPage'
import PostCreatePage from './pages/PostCreatePage'
import PostEditPage from './pages/PostEditPage'
import Signup from './pages/Signup'
import Signin from './pages/Signin'

// AppHeader 컴포넌트를 추가한다.
import AppHeader from './components/AppHeader'

import Cookies from 'js-cookie'

const router = new VueRouter({
    mode: 'history',
    routes: [
        // {
        //     path: '/',
        //     name: 'home',
        //     component: Home
        // },
        // {
        //     path: '/hello',
        //     name: 'hello',
        //     component: Hello,
        // }
        // {
        //     path: '/',
        //     name: 'PostListPage',
        //     component: PostListPage
        // },
        {
            path: '/siguns',
            name: 'SigunListPage',
            // component: SigunListPage
            components: {
                header: AppHeader,
                default: SigunListPage,
            }
        },
        {
            path: '/nonghyups',
            name: 'NonghyupListPage',
            component: NonghyupListPage
        },
        {
            path: '/signup',
            name: 'Signup',
            // components 속성을 사용하면 여러 개의 router-view에 컴포넌트를 렌더할 수 있다.
            components: {
                header: AppHeader,
                default: Signup,
            }
            // component: Signup
        },
        {
            path: '/signin',
            name: 'Signin',
            // components 속성이 아니라 component를 사용하면 자동으로 이름이 없는 router-view에만 컴포넌트를 렌더한다.
            // component: Signin
            components: {
                header: AppHeader,
                default: Signin,
            }
        },
        {
            path: '/post',
            name: 'PostListPage',
            components: {
                header: AppHeader,
                // default: SigunListPage,
                default: PostListPage,
            }
        },
        {
            path: '/post/create',
            name: 'PostCreatePage',
            components: {
                header: AppHeader,
                default: PostCreatePage,
            },
            beforeEnter (to, from, next) {
                const { isAuthorized } = store.getters
                if (!isAuthorized) {
                    alert('로그인이 필요합니다!')
                    // 로그인이 되어있지 않다면 로그인 페이지로 이동시킨다.
                    next({ name: 'Signin' })
                }
                next()
            }
        },
        {
            path: '/post/:postId/edit',
            name: 'PostEditPage',
            components: {
                header: AppHeader,
                default: PostEditPage,
            },
            props: {
                default: true
            },
            beforeEnter (to, from, next) {
                const { isAuthorized } = store.getters
                if (!isAuthorized) {
                    alert('로그인이 필요합니다!')
                    next({ name: 'Signin' })
                    return false
                }
                store.dispatch('fetchPost', to.params.postId)
                    // 게시물 데이터 요청이 성공했다면 다음 라우트로 이동한다.
                    .then(res => {
                        const post = store.state.post
                        // 게시물 작성자의 아이디와 현재 로그인된 사용자의 아이디가 일치하는지 확인한다.
                        // const isAuthor = post.user.id === store.state.me.id
                        const isAuthor = post.writer === store.state.me.id
                        if (isAuthor) {
                            next()
                        } else {
                            alert('게시물의 작성자만 게시물을 수정할 수 있습니다.')
                            next(from)
                        }                        
                    })
                    // 게시물 데이터 요청이 실패했다면 전 페이지로 돌아간다.
                    .catch(err => {
                        console.log(err)
                        // alert(err.response.data.msg)
                        next(from)
                    })
            }
        },
        {
            path: '/post/:postId',
            name: 'PostViewPage',
            components: {
                header: AppHeader,
                default: PostViewPage,
            },
            // component: PostViewPage,
            // props값 역시 대상 components의 이름으로 수정한다.
            props: {
                default: true
            }
        },
    ],
})

// const savedToken = Cookies.get('accessToken')
// if (savedToken) {
//     store.dispatch('signinByToken', savedToken)
// }

function init () {
    const savedToken = Cookies.get('accessToken')
    if (savedToken) {
        // 저장된 토큰이 존재한다면 signinByToken 액션을 반환한다.
        return store.dispatch('signinByToken', savedToken)
    } else {
        // 토큰이 존재하지 않는다면 바로 Promise를 성공시킨다.
        return Promise.resolve()
    }
}

// const app = new Vue({
//     el: '#app',
//     // components: { App },
//     render:h => h(App),
//     router,
//     store,
//     vuetify: new Vuetify({
//         icons: {
//             iconfont: 'mdi',
//         },
//     }),
// });
init().then(res => {
    new Vue({
        el: '#app',
        render:h => h(App),
        router,
        store,
        vuetify: new Vuetify({
            icons: {
                iconfont: 'mdi',
            },
        }),
    });
})