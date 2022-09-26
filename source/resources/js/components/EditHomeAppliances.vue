<template>
    <h2 class="text-center">Cadastrar produto</h2>
    <form class="form position-relative" action="" @submit.prevent="submitForm">
        <div v-show="loading"  class="loader">
            <div class="loader-content">
                <div class="spinner-border" role="status">
                    <span class="visually-hidden">Loading...</span>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-12 my-2">
                <label class="form-label" for="name">Nome</label>
                <input type="text" required name="name" class="form-control" v-model="product.name">
            </div>
            <div class="col-12 my-2">
                <label class="form-label" for="description">Descrição</label>
                <textarea type="text" required name="description" class="form-control" v-model="product.description"></textarea>
            </div>
            <div class="col-12 col-md-6 my-2">
                <label class="form-label" for="">Voltagem</label>
                <input type="text" required name="voltage" class="form-control" v-model="product.voltage">
            </div>
            <div class="col-12 col-md-6 my-2">
                <label class="form-label" for="brand">Marca</label>
                <select name="name" required class="form-control" v-model="product.brand">
                    <option disabled value="">Selecione uma marca</option>
                    <BrandsOptionsForm />
                </select>
            </div>
            <div class="col-12 my-2 text-center">
                <button type="submit" :disabled="submitted" class="btn btn-success">
                    <span v-show="submitted" class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span> Salvar
                </button>
            </div>
        </div>
    </form>
</template>

<script>
import BrandsOptionsForm from "./commons/BrandsOptionsForm";

export default {
    name: "EditHomeAppliances",
    components: {
        BrandsOptionsForm
    },
    data() {
        return {
            loading: true,
            submitted: false,
            product: {
                name: '',
                description: '',
                brand: '',
                voltage: '',
                _method: 'post'
            }
        }
    },
    beforeMount() {
        this.showProduct()
    },
    methods: {
        async showProduct(){

            await this.axios.get('/api/v1/home-appliances/'+this.$route.params.id).then(response=>{
                this.loading = false;
                this.product = response.data.data
            }).catch(error=>{
                let errors = error.response.data.errors;
                if(errors){
                    for (let field of Object.keys(errors)) {
                        this.$toast.error(errors[field][0])
                    }
                } else if(error.response.data.message) {
                    this.$toast.error(error.response.data.message);
                }
            })
        },
        async submitForm(){
            this.submitted = true;
            await this.axios.put('/api/v1/home-appliances/'+this.$route.params.id, this.product).then(response=>{
                this.submitted = false;
                this.$toast.success('Produto editado com sucesso')
                this.$router.push({name:"list"})
            }).catch(error=>{
                let errors = error.response.data.errors;
                if(errors){
                    for (let field of Object.keys(errors)) {
                        this.$toast.error(errors[field][0])
                    }
                } else if(error.response.data.message) {
                    this.$toast.error(error.response.data.message);
                }
                this.submitted = false;
            })
        }
    }
}
</script>

<style scoped>

</style>
