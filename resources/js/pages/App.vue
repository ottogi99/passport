<template>
    <v-app id="app">
        <v-navigation-drawer 
            v-model="drawer"
            app
        >
            <v-sheet
                color="grey lighten-4"
                class="pa-4"
            >
                <v-avatar
                    class="mb-4"
                    color="grey darken-1"
                    size="64"
                ></v-avatar>
            </v-sheet>

            <v-divider></v-divider>

            <!-- <v-list>
                <v-list-item
                    v-for="[icon, text] in links"
                    :key="icon"
                    link
                >
                    <v-list-item-icon>
                        <v-icon>{{ icon }}</v-icon>
                    </v-list-item-icon>
                    <v-list-item-content>
                        <v-list-item-title>{{ text }}</v-list-item-title>
                    </v-list-item-content>
                </v-list-item>
            </v-list> -->

            <!-- <v-list>
                <v-list-item>
                    <v-list-item-icon>
                        <v-icon>mdi-home</v-icon>
                    </v-list-item-icon>
                    <v-list-item-title>Home</v-list-item-title>
                </v-list-item>

                <v-list-group
                    :value="true"
                    prepend-icon="mdi-account-circle"
                >
                    <template v-slot:activator>
                        <v-list-item-title>Users</v-list-item-title>
                    </template>

                    <v-list-group
                        :value="true"
                        no-action
                        sub-group
                    >
                        <template v-slot:activator>
                            <v-list-item-content>
                                <v-list-item-title>Admin</v-list-item-title>
                            </v-list-item-content>
                        </template>

                        <v-list-item
                            v-for="([title, icon], i) in admins"
                            :key="i"
                            link
                        >
                            <v-list-item-title v-text="title"></v-list-item-title>
                            <v-list-item-icon><v-icon v-text="icon"></v-icon></v-list-item-icon>
                        </v-list-item>
                    </v-list-group>

                    <v-list-group
                        no-ction
                        sub-group
                    >
                        <template v-slot:activator>
                            <v-list-item-content>
                                <v-list-item-title>Actions</v-list-item-title>
                            </v-list-item-content>
                        </template>

                        <v-list-item
                            v-for="([title, icon], i) in admins"
                            :key="i"
                            link
                        >
                            <v-list-item-title v-text="title"></v-list-item-title>
                            <v-list-item-icon><v-icon v-text="icon"></v-icon></v-list-item-icon>
                        </v-list-item>
                    </v-list-group>
                </v-list-group>
            </v-list> -->

            <v-list>
                <v-list-group
                    v-for="menu in menus"
                    :key="menu.title"
                    v-model="menu.active"
                    :prepend-icon="menu.action"
                    no-action
                >
                    <template v-slot:activator>
                        <v-list-item-content>
                            <v-list-item-title v-text="menu.title"></v-list-item-title>
                        </v-list-item-content>
                    </template>

                        <div
                            v-for="sub in menu.menus"
                            :key="sub.title"
                        >
                            <v-list-group
                                v-if="sub.menus"
                                no-action
                                sub-group
                            >
                                <template v-slot:activator>
                                    <v-list-item-content>
                                        <v-list-item-title v-text="sub.title"></v-list-item-title>
                                    </v-list-item-content>
                                </template>

                                <v-list-item
                                    v-for="child in sub.menus"
                                    :key="child.title"
                                    :to="child.to"
                                >
                                    <v-list-item-content>
                                        <v-list-item-title v-text="child.title"></v-list-item-title>
                                    </v-list-item-content>
                                </v-list-item>
                            </v-list-group>                        

                            <v-list-item
                                v-else
                                :to="sub.to"
                            >
                                <v-list-item-title style="margin-left:56px" v-text="sub.title"></v-list-item-title>
                                <v-list-item-icon><v-icon>mdi-account-multiple-outline</v-icon></v-list-item-icon>
                            </v-list-item>
                        </div>

                    <!-- <v-list-item
                        v-for="sub in menu.menus"
                        :key="sub.title"
                    >
                        <v-list-item-content>
                            <v-list-item-title v-text="sub.title"></v-list-item-title>
                        </v-list-item-content>
                    </v-list-item> -->
                </v-list-group>
            </v-list>

        </v-navigation-drawer>

        <v-system-bar app>
            <v-spacer></v-spacer>
            <v-icon>mdi-square</v-icon>
            <v-icon>mdi-circle</v-icon>
            <v-icon>mdi-triangle</v-icon>
        </v-system-bar>

        <v-app-bar app>
            <v-app-bar-nav-icon @click="drawer = !drawer"></v-app-bar-nav-icon>

            <v-toolbar-title>Application</v-toolbar-title>
        </v-app-bar>

        <v-main>
            <v-container fluid>
                <!-- <h1>Vue Router Demo App</h1>  -->
                <router-view name="header"/>
                <!-- <p>
                    <router-link :to="{ name: 'home' }">Home</router-link> |
                    <router-link :to="{ name: 'hello' }">Hello World</router-link>
                </p> -->

                <div class="container">
                    <router-view></router-view> <!-- 이름이 없는 router-view 컴포넌트는 자동으로 default라는 이름을 부여받는다. -->
                </div>
            </v-container>
        </v-main>

        <v-footer app>
        </v-footer>
    </v-app>
</template>

<script>
export default {
    name: 'App',

    data () {
        return {
            drawer: null,
            links: [
                ['mdi-inbox-arrow-down', 'Inbox'],
                ['mdi-send', 'Send'],
                ['mdi-delete', 'Trash'],
                ['mdi-alert-octagon', 'Spam'],
            ],

            admins: [
                ['Management', 'mdi-account-multiple-outline'],
                ['Settings', 'mdi-cog-outline'],
            ],
            curds: [
                ['Create', 'mdi-plus-outline'],
                ['Read', 'mdi-file-outline'],
                ['Update', 'mdi-update'],
                ['Delete', 'mdi-delete'],
            ],
            // for CNAWS
            // 사용자(농협)정보
            menus: [
                {
                    title: '사용자(농협)정보',
                    action: 'mdi-ticket',
                    menus: [
                        {
                            title:'사용자(농협)',
                            to:'/',
                        },
                        {
                            title:'이력조회',
                            to:'/',
                        }
                    ],
                },
                {
                    title: '사업관리',
                    action: 'mdi-ticket',
                    menus: [
                        {
                            title: '사업비',
                            to: '/',
                        }
                    ],
                },
                {
                    title: '모집등록',
                    action: 'mdi-ticket',
                    active: false,
                    menus: [
                        {
                            title: '농기계지원반',
                            to: '/',
                            menus: [
                                {
                                    title: '농가모집',
                                    to: '/signin',
                                },
                                {
                                    title: '지원반모집',
                                    to: '/signup',
                                },
                            ],
                        },
                        {
                            title: '인력지원반',
                            to: '/',
                            menus: [
                                {
                                    title: '농가모집',
                                    to: '/',
                                },
                                {
                                    title: '지원반모집',
                                    to: '/',
                                },
                            ],
                        },
                    ],
                },
                {
                    title: '지원현황',
                    action: 'mdi-ticket',
                    menus: [
                        {
                            title: '교육홍보비',
                            to: '/',
                        },
                        {
                            title: '농작업지원',
                            to: '/',
                            menus: [
                                {
                                    title: '농가모집',
                                    to: '/',
                                },
                                {
                                    title: '지원반모집',
                                    to: '/',
                                },
                            ],
                        },
                        {
                            title: '센터운영비(인건비)',
                            to: '/',
                        },
                        {
                            title: '센터운영비(운영비)',
                            to: '/',
                        },
                    ],
                },
                {
                    title: '사업현황',
                    action: 'mdi-ticket',
                    menus: [
                        {
                            title: '운영실적',
                            to: '/',
                        },
                        {
                            title: '집행실적',
                            to: '/',
                        },
                    ],
                },
                {
                    title: '업무포털',
                    action: 'mdi-ticket',
                    active: true,
                    menus: [
                        {
                            title: '공지사항',
                            to: '/post',
                        },
                        {
                            title: '사용자매뉴얼',
                            to: '/searchcombo',
                        },
                        {
                            title: '건의사항',
                            to: '/search',
                        },
                        {
                            title: '업로드',
                            to: '/upload',
                        },
                        {
                            title: '폼',
                            to: '/forms',
                        },
                        {
                            title: '셀렉트',
                            to: '/selects',
                        },
                        {
                            title: '툴바',
                            to: '/toolbar',
                        },
                    ],
                },
            ],
            nonghyups: [
                ['mdi-plus-outline', '사용자(농협)'],
                ['mdi-plus-outline', '이력조회'],
            ],
            // 사업관리
            amounts: [
                ['mdi-plus-outline', '사업비'],
            ],
            // 모집등록
            recruitment: [
                ['mdi-plus-outline', '농기계지원반'],
                ['mdi-plus-outline', '농가모집'],
                ['mdi-plus-outline', '지원반모집'],
                ['mdi-plus-outline', '인력지원반'],
                ['mdi-plus-outline', '농가모집'],
                ['mdi-plus-outline', '지원반모집'],
            ],
            // 지원현황
            support: [
                ['mdi-plus-outline', '교육홍보비'],
                ['mdi-plus-outline', '농작업지원'],
                    ['mdi-plus-outline', '농기계지원반'],
                    ['mdi-plus-outline', '인력지원반'],
                ['mdi-plus-outline', '센터운영비(인건비)'],
                ['mdi-plus-outline', '센터운영비(운영비)'],
            ],
            // 사업현황
            business: [
                ['mdi-plus-outline', '운영실적'],
                ['mdi-plus-outline', '집행실적'],
            ],
            // 업무포털
            portal: [
                ['mdi-plus-outline', '공지사항'],
                ['mdi-plus-outline', '사용자매뉴얼'],
                ['mdi-plus-outline', '건의사항'],
            ]
            
        }
    }
}
</script>

<style scoped>
/* 전체 범위에서 input box text 폰트 변경할 경우 scoped 지우고 해야 함 */
input {
    font-size: 12px;
}
.v-text-field input {
    padding: 2px 0;
}
</style>