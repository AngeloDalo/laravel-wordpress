<!-- navbar sotto nav login -->
<template>
<div class="container">
    <nav class="navbar navbar-light bg-light">
        <form class="container-fluid justify-content-start">
            <button class="btn btn-outline-success me-2" type="button" v-for="(item) in menuItems" :key="item.id"><a class="nav-link" :href="item.link">{{ item.label }}</a></button>
        </form>
    </nav>
</div>
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