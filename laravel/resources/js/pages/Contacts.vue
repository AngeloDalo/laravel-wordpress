<template>
  <div class="container">
    <div class="row">
      <div class="col text-center">
        <h1>Contacts</h1>
      </div>
    </div>

        <form enctype="multipart/form-data">
          <div class="row mt-3">
            <div class="col">
              <input type="text" class="form-control" placeholder="First name" aria-label="First name" name="firstname" v-model="form.firstname">
            </div>
            <div class="col">
              <input type="text" class="form-control" placeholder="Last name" aria-label="Last name" name="lastname" v-model="form.lastname">
            </div>
          </div>
        
          <div class="row mt-3">
            <div class="col">
                <label for="message" class="form-label">Message</label>
                <textarea class="form-control" id="message" rows="3" name="message" v-model="form.message"></textarea>
            </div>
          </div>

          <div class="row mt-3">
            <div class="col">
              <div class="mb-3">
                <label for="file" class="form-label">File</label>
                <input class="form-control" type="file" id="file" name="file" @change="setFile($event.target.files)">
              </div>
            </div>
          </div>

          <input type="submit" value="Send" class="btn btn-primary" @click.prevent="sendMessage">
        </form>
    </div>
</template>

<script>
import Axios from "axios";
  export default {
    name: 'Contacts',
    data() {
      return {
        form: {
          firstname: '',
          lastname: '',
          message: '',
          file: ''
        }
      }
    },
    methods: {
      setFile(value) {
        console.log(value);
        this.form.file = value;
      },
      sendMessage() {
          const formData = new FormData();
          formData.append('file', this.form.file[0]);
          formData.append('firstname', this.form.firstname);
          formData.append('lastname', this.form.lastname);
          formData.append('message', this.form.message);
      
        const headers = { 
          'Content-Type': 'multipart/form-data', 
          'Authorization': 'Bearer jhgf678iklp987t' 
        };
        const url = "http://127.0.0.1:8000/api/v1/contacts/";
        
        Axios.post(url, formData, { headers })
          .then((result) => {
            console.log(result.data, result.status );
          })
        .catch(error => console.log(error));
      }
    }
  }
</script>

<style lang="scss">
</style>