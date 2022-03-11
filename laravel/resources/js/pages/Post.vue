<template>
<div>
    <div class="row row-cols-1 row-cols-md-4 g-4">
        <div class="card ms-5">
          <img :src="'/storage/'+post.image" class="card-img-top" :alt="post.title">
          <div class="card-body">
            <h3 class="card-title">{{ post.eyelet }}</h3>
            <h1 class="card-title">{{ post.title }}</h1>
            <p class="card-text">{{ post.content }}</p>
          </div>
        </div>
      </div>
</div>
</template>

<script>
import Axios from "axios";
  export default {
    name: 'Post',
    props: ['id'],
    data() {
        return {
            post: null
        }
    },
    created() {
        const url = 'http://127.0.0.1:8000/api/v1/posts/' + this.id;
        this.getPost(url);
    },
    methods: {
        getPost(url){
            Axios.get(url,  {headers: {'Authorization': 'Bearer n686yd9qnm9b56h'}}).then(
                (result) => {
                this.post = result.data.results.data;
            }).catch(error => console.log(error));
        }
    }
  }
</script>

<style lang="scss">
</style>