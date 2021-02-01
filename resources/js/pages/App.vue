<template>
    <v-app id="app">
        <!-- <h1>Vue Router Demo App</h1>  -->
        <router-view name="header"/>
        <!-- <p>
            <router-link :to="{ name: 'home' }">Home</router-link> |
            <router-link :to="{ name: 'hello' }">Hello World</router-link>
        </p> -->

        <div class="container">
<<<<<<< HEAD
            <router-view></router-view> <!-- ì´ë¦„ì´ ì—†ëŠ” router-view ì»´í¬ë„ŒíŠ¸ëŠ” ìžë™ìœ¼ë¡œ defaultë¼ëŠ” ì´ë¦„ì„ ë¶€ì—¬ë°›ëŠ”ë‹¤. -->
=======
            <router-view></router-view> <!-- ÀÌ¸§ÀÌ ¾ø´Â router-view ÄÄÆ÷³ÍÆ®´Â ÀÚµ¿À¸·Î default¶ó´Â ÀÌ¸§À» ºÎ¿©¹Þ´Â´Ù. -->
>>>>>>> d43eecaa16e6289be5137ad99a7d2311ad07544d
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