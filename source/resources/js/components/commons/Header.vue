<template>
    <div class="container">
        <header class="d-flex flex-wrap justify-content-center py-3 mb-4 border-bottom">
            <a href="/" class="d-flex align-items-center mb-3 mb-md-0 me-md-auto text-dark text-decoration-none">
                <svg class="bi me-2" width="40" height="32"><use xlink:href="#bootstrap"></use></svg>
                <span class="fs-4">Grupo Plan Test</span>
            </a>

            <ul class="nav nav-pills">
                <li class="nav-item">
                    <router-link to="/" class="nav-link" >Home</router-link>
                </li>
                <li class="nav-item">
                    <router-link to="/create" class="nav-link" >Novo</router-link>
                </li>
            </ul>
        </header>
    </div>
</template>

<script>
export default {
    name: "Header"
}
</script>

<style scoped>

</style>
