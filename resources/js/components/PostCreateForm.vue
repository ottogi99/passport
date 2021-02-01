<template>
    <form @submit.prevent="onSubmit">
        <fieldset>
            <label>제목</label>
            <input v-model="title" type="text" placeholder="게시물 제목을 입력해주세요." />
            <label>내용</label>
<<<<<<< HEAD
            <textarea v-models="contents" rows="5" placeholder="게시물 내용을 입력해주세요."></textarea>
=======
            <textarea v-model="contents" rows="5" placeholder="게시물 내용을입력해주세요."></textarea>
>>>>>>> d43eecaa16e6289be5137ad99a7d2311ad07544d
            <button type="submit">제출하기</button>
        </fieldset>
    </form>
</template>

<script>
export default {
    name: 'PostCreateForm',
    data () {
        return {
            title: '',
<<<<<<< HEAD
            contents: '',
=======
            contents: ''
>>>>>>> d43eecaa16e6289be5137ad99a7d2311ad07544d
        }
    },
    methods: {
        onSubmit () {
            const { title, contents } = this
            this.$emit('submit', { title, contents })
        }
<<<<<<< HEAD
    }
=======
    },
>>>>>>> d43eecaa16e6289be5137ad99a7d2311ad07544d
}
</script>

<style>

</style>