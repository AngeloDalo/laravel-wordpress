<!-- visualizzazione dei post -->
<template>
  <div class="container">
    <div class="row row-cols-1 row-cols-md-4 g-4">
      <div class="col" v-for="(post, index) in cards.posts" :key="index">
        <div class="card">
          <img :src="'/storage/'+post.image" class="card-img-top" :alt="post.title">
          <div class="card-body">
            <h5 class="card-title">{{ post.title }}</h5>
            <p class="card-text">{{ post.content }}</p>
          </div>
        </div>
      </div>
    </div>
    <div class="row mt-3 bg-light" v-if="cards.prev_page_url || cards.next_page_url">
      <ul class="list-inline bg-light">
        <li class="list-inline-item"> <button v-if="cards.prev_page_url" class="btn btn-primary" @click="changePage('prev_page_url')">Prev</button></li>
        <li class="list-inline-item"> <button v-if="cards.next_page_url" class="btn btn-primary" @click="changePage('next_page_url')">Next</button></li>
      </ul>
    </div>

    
    <div class="jumbotron">
    <div class="container">
      <p>This is a template for a simple marketing or informational website. It includes a large callout called a jumbotron and three supporting pieces of content. Use it as a starting point to create something more unique.</p>
      <p><a class="btn btn-primary btn-lg" href="#" role="button">Learn more »</a></p>
    </div>
  </div>
  <div class="container">
    <!-- Example row of columns -->
    <div class="row">
      <div class="col-md-4">
        <h2>Heading</h2>
        <p>Donec id elit non mi porta gravida at eget metus. Fusce dapibus, tellus ac cursus commodo, tortor mauris condimentum nibh, ut fermentum massa justo sit amet risus. Etiam porta sem malesuada magna mollis euismod. Donec sed odio dui. </p>
        <p><a class="btn btn-secondary" href="#" role="button">View details »</a></p>
      </div>
      <div class="col-md-4">
        <h2>Heading</h2>
        <p>Donec id elit non mi porta gravida at eget metus. Fusce dapibus, tellus ac cursus commodo, tortor mauris condimentum nibh, ut fermentum massa justo sit amet risus. Etiam porta sem malesuada magna mollis euismod. Donec sed odio dui. </p>
        <p><a class="btn btn-secondary" href="#" role="button">View details »</a></p>
      </div>
      <div class="col-md-4">
        <h2>Heading</h2>
        <p>Donec sed odio dui. Cras justo odio, dapibus ac facilisis in, egestas eget quam. Vestibulum id ligula porta felis euismod semper. Fusce dapibus, tellus ac cursus commodo, tortor mauris condimentum nibh, ut fermentum massa justo sit amet risus.</p>
        <p><a class="btn btn-secondary" href="#" role="button">View details »</a></p>
      </div>
    </div>
    <hr>
  </div>
  </div>
</template>

<script>
export default {
  name: "Main",
  props: ['cards'],
    // data() {
    //   return {
    //     posts: null,
    //     next_page_url: null,
    //     prev_page_url: null
    //   }
    // },
    // created() {
      //passo alla funzione getPost il link per il file json
      //nella funzione il file è url
      //se il file url esiste(json) allora in this.post che prima era vuoto vanno i post
      // this.getPosts('http://127.0.0.1:8000/api/posts');
    //     Axios.post('http://127.0.0.1:8000/api/posts', {
    //     orderby: 'title',
    //     order: 'desc'
    //   })
    //   .then(function (response) {
    //     console.log(response);
    //   })
    //   .catch(function (error) {
    //     console.log(error);
    //   });
    // },
  methods: {
      //in changePage dico se voglio la pagina successiva o quella precedente
      //andrò a questo punto a riempira la variabile in return
      //Se la variabile non esiste perchè siamo arrivati a fine pagina o all'inizio non verrà mostrato il pulsante
      // changePage(vs) {
      //   let url = this[vs];
      //   if(url) {
      //     this.getPosts(url);
      //   }
      // },
      // getPosts(url){
      //     Axios.get(url).then(
      //       (result) => {
      //         this.posts = result.data.results.data;
      //         this.next_page_url = result.data.results.next_page_url;
      //         this.prev_page_url = result.data.results.prev_page_url;
      //       });
      // }
    changePage(vs) {
      this.$emit('changePage', vs);
    }
  }
}
</script>

<style lang="scss" scoped>
</style>