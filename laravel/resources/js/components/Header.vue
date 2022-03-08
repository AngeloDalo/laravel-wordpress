<!-- navbar sotto nav login -->
<template>
<nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
<div class="container">
    <a class="navbar-brand" href="#">
        <img id="logo" class="w-25" :src="logo" alt="logo">
    </a>
    <nav class="navbar navbar-light bg-light">
        <form class="container-fluid justify-content-start">
            <button class="btn btn-outline-success me-2" type="button" v-for="(item) in menuItems" :key="item.id"><a class="nav-link" :href="item.link">{{ item.label }}</a></button>
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
      logo: require('../../img/logo.svg'),
      menuItems: [
                    {
                        label: 'Item 1',
                        link: '#',
                        id: 1,
                    },
                    {
                        label: 'Item 2',
                        link: '#',
                         id: 2,
                    },
                    {
                        label: 'Item 3',
                        link: '#',
                        id: 3
                    },
                    {
                        label: 'Item 4',
                        link: '#',
                        id: 4,
                    },
                    {
                        label: 'Item 5',
                        link: '#',
                        id: 5,
                    }
                ],
      }
    },
  }
</script>

<style lang="scss">
</style>