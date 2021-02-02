<template>
    <v-file-input
        accept="image/png, image/jpeg, image/bmp"
        placeholder="업로드할 파일을 선택하세요."
        prepend-icon="mdi-camera"
        label="첨부파일"
        counter
        show-size
        truncate-length="30"
        small-chips
        multiple
    ></v-file-input>
    <!--         :rules="rules" 옵션을 넣으면 multiple과 안맞아서 에러가 걸리는 어떻게 해결? -->
</template>

<script>
export default {
    name: 'FileInputComponent',

    data () {
        return {
            rules: [
                value => !value || value.size < 2000000 || 'Avatar size should be less than 2 MB!',
            ]
        }
    }
}
</script>

<style>

</style>