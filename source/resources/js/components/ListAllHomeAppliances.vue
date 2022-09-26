<template>
    <div class="row">
        <div class="col-12 pb-3 pb-lg-5">
            <h2 class="text-center">Lista de Produtos</h2>
        </div>

        <div class="col-12 position-relative">
            <div v-show="loading"  class="loader">
                <div class="loader-content">
                    <div class="spinner-border" role="status">
                        <span class="visually-hidden">Loading...</span>
                    </div>
                </div>
            </div>
            <table class="table table-responsive">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Nome</th>
                        <th>Detalhe</th>
                        <th>Voltage</th>
                        <th>Marca</th>
                         <th>Ações</th>
                    </tr>
                </thead>
            <tbody>
                <tr v-for="product in products" :key="product.id">
                    <td>{{ product.id }}</td>
                    <td>{{ product.name }}</td>
                    <td>{{ product.description }}</td>
                    <td>{{ product.voltage }}</td>
                    <td>{{ product.brand_name }}</td>
                    <td>
                        <div class="btn-group" role="group">
                            <router-link :to="{name: 'edit', params: { id: product.id }}" class="btn btn-success">Edit</router-link>
                            <button class="btn btn-danger" @click="deleteProduct(product.id)">Delete</button>
                        </div>
                    </td>
                </tr>
            </tbody>
        </table>
        </div>
    </div>
</template>

<script>
export default {
    name: "ListAllHomeAppliances",
    data() {
        return {
            loading: true,
            products: {}
        }
    },
    mounted(){
        this.getProducts()
    },
    methods: {
        async getProducts(){
            await this.axios.get('/api/v1/home-appliances/').then(response=>{
                this.products = response.data.data;
                this.loading = false
            }).catch(error=>{
                let errors = error.response.data.errors;
                if(errors){
                    for (let field of Object.keys(errors)) {
                        this.$toast.error(errors[field][0])
                    }
                } else if(error.response.data.message) {
                    this.$toast.error(error.response.data.message);
                }
                this.products = []
                this.loading = false
            })
        },
        deleteProduct(id) {
            this.axios
                .delete(`/api/v1/home-appliances/${id}`)
                .then(response => {
                    let i = this.products.map(data => data.id).indexOf(id);
                    this.products.splice(i, 1)
                    this.$toast.success('Produto excluído com sucesso')
                }).catch(error=>{
                    let errors = error.response.data.errors;
                    if(errors){
                        for (let field of Object.keys(errors)) {
                            this.$toast.error(errors[field][0])
                        }
                    } else if(error.response.data.message) {
                        this.$toast.error(error.response.data.message);
                    }
                    this.products = []
                    this.loading = false
                });
        }
    }
}
</script>

<style scoped>

</style>
