<template>
  <div>
      HOME
  </div>
</template>

<script>
//import Axios from "axios";
  export default {
    name: 'Home',
    data() {
      return {
      }
    },
    created() {
      this.getProducts('http://127.0.0.1:8001/api/v1/posts/random');
    },
    methods: {
    }
  }
</script>

<style lang="scss">
</style>