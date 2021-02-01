<template>
    <v-app id="app">
        <!-- <h1>Vue Router Demo App</h1>  -->
        <router-view name="header"/>
        <!-- <p>
            <router-link :to="{ name: 'home' }">Home</router-link> |
            <router-link :to="{ name: 'hello' }">Hello World</router-link>
        </p> -->

        <div class="container">
            <router-view></router-view> <!-- 이름이 없는 router-view 컴포넌트는 자동으로 default라는 이름을 부여받는다. -->
        </div>
    </v-app>
</template>

<script>
export default {
    name: 'App',
}
</script>

<style scoped>

</style>