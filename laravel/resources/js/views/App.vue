<template>
  <div>
    <Header></Header>
    <Main></Main>
  </div>
</template>

<script>
import Header from '../components/Header.vue';
import Main from '../components/Main.vue';

export default {
    name: "App",
    components: {
        Header,
        Main
    }
}
</script>

<style lang="scss" scoped>
</style>