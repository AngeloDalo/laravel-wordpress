<!-- navbar sotto nav login -->
<template>
<nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
<div class="container">
    <a class="navbar-brand" href="#">
        <img id="logo" class="w-50" :src="logo" alt="logo">
    </a>
    <nav class="navbar navbar-light bg-light">
        <form class="container-fluid justify-content-start">
            <button class="btn btn-outline-success" type="button" v-for="(item) in menuItems" :key="item.id"><router-link class="nav-link" :to="{ name: item.routeName}">{{ item.label }}</router-link></button>
        </form>
    </nav>
</div>
</nav>
</template>

<script>
  export default {
    name: "Header",
    data() {
      return {
        //percorso per il logo da nettere nella navbar
        logo: require('../../img/logo.svg'),
        menuItems: [
                {
                    label: 'Home',
                    routeName: 'home'
                },
                {
                    label: 'Posts',
                    routeName: 'posts'
                },
                {
                    label: 'Chi Siamo',
                    routeName: 'about'
                },                
                {
                    label: 'Contatti',
                    routeName: 'contacts'
                }
            ],
        }
    },
  }
</script>

<style lang="scss">
</style>