;;/**
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
            path: '/posts',
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
            // beforeEnter 가드 훅을 추가한다.
            beforeEnter (to, from, next) {
                const { isAuthorized } = store.getters
                if (!isAuthorized) {
                    alert('로그인이 필요합니다!')
                    next({ name: 'Signin' })
                }
                next()
            }
        },
        {
            path: '/posts/:postId',
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
// 비동기 처리를 위한 함수를 생성한다.
function init () {
    const savedToken = Cookies.get('accessToken')
    if (savedToken) {
        // 저장된 토큰이 존재한다면 signinByToken 액션을 반환한다.
        return store.dispatch('signinByToken', savedToken)
    } else {
        // 토큰이 존재하지 않는다면 바로 Promise를 성공시킨다.
        return Promise.resolve();
    }
}

init().then(res => {
    // init 함수의 then 체이닝 메소드 내부는 init 함수가 종료되었음을 보장받는다.
    const app = new Vue({
        el: '#app',
        // components: { App },
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