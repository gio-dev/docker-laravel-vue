<template>
    <option v-for="brand in brands" :value="brand.id">{{ brand.name }}</option>
</template>

<script>
export default {
    name: "BrandsOptionsForm",
    data() {
        return {
            brands:{
                id: '',
                name: '',
            }
        }
    },
    beforeMount(){
        this.getBrands()
    },
    methods: {
        async getBrands(){
            await this.axios.get('/api/v1/home-appliances/brands').then(response=>{
                this.brands = response.data.data
            }).catch(error=>{
                console.log(error)
                this.products = []
            })
        },
    }
}
</script>

<style scoped>

</style>
