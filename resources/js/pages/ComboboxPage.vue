<template>
    <div>
        <h3>콤보박스</h3>
        <combobox-component :siguns="siguns"></combobox-component>
    </div>
</template>

<script>
import ComboboxComponent from '../components/ComboboxComponent'

export default {
    name: 'ComboboxPage',
    
    components: { ComboboxComponent },

    data () {
        return {
            siguns: [],
        }
    },

    created () {
        axios.get('/api/siguns')
            .then(res => {
                this.siguns = res.data.siguns
            })
    }

}
</script>

<style>

</style>