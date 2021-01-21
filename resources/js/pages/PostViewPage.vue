<template>
    <div class="post-view-page">
        <div class="post-vie">
            <div>
                <h1>게시글의 제목이 노출된다.</h1>
                <span>게시판 번호 1</span>
                <strong>정성화. 2021-01-21 18:37</strong>
            </div>
            <p>해당 영역에는 게시글의 콘텐츠 내용이 노출된다.</p>
        </div>
        <router-link :to="{ name: 'PostListPage' }">목록</router-link>
    </div>
</template>

<script>
export default {
    name: 'PostViewPage'
}
</script>

<style>

</style>