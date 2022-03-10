<template>
  <div>
    <Header></Header>
    <router-view></router-view>
  </div>
</template>

<script>
import Header from '../components/Header.vue';

export default {
    name: "App",
    components: {
        Header,
    }
}
</script>

<style lang="scss" scoped>
@import '~bootstrap/scss/bootstrap';
</style>