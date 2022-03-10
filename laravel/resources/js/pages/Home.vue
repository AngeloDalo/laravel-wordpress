<template>
    <div>
        <div class="container-fluid">
            <div class="row">
            <div class="col text-center m-2">
                <h1>Home</h1>
            </div>
            </div>
                <Main :cards="cards" @changePage="changePage($event)"></Main>
            </div>
    </div>
</template>

<script>
import Axios from "axios";
import Main from '../components/Main.vue';
  export default {
    name: 'Home',
    components: {
      Main
    },
    data() {
      return {
        cards: {
          posts: null,
          next_page_url: null,
          prev_page_url: null
        }
      }
    },
    created() {
      this.getPosts('http://127.0.0.1:8000/api/v1/posts/random');
    },
    methods: {
      changePage(vs) {
        let url = this.cards[vs];
        if(url) {
          this.getPosts(url);
        }
      },
      getPosts(url){
          Axios.get(url).then(
            (result) => {
              console.log(result);
              this.cards.posts = result.data.results.data;
              this.cards.next_page_url = result.data.results.next_page_url;
              this.cards.prev_page_url = result.data.results.prev_page_url;
            });
      }
      
    }
  }
</script>

<style lang="scss">
</style>

<style lang="scss">
</style>