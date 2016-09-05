<template>
  <p>
    <form class="form-inline" method="post"
    @submit.prevent="onSubmit">
    <div class="form-group">
      <input type="text" size="45" v-model="newurl.url" placeholder="Add a URL you would like to shorten">
    </div>
    <div class="form-group">
      <button type="submit" class="btn btn-default btn-block" v-if="newurl.url"> Submit</button>
      <button class="btn btn-default disabled btn-block" v-if="!newurl.url"> Submit</button>
    </div>
  </form>
</p>
</template>

<script>
    export default {
      data() {
        return {
            props: ['url'],
            newurl: {
                url: ''
            },
            submitted: false
        };
    },
    methods: {
        onSubmit: function () {
            let newurl = this.newurl;
            this.submitted = true;
            console.log(newurl.url);
            this.$http.post('api/url', newurl).success(function (response) {
              if(response.code == 200) {
                    var userInfo = response.message;
                    console.log(userInfo);
                }
            });
        }
      }
    }
</script>
