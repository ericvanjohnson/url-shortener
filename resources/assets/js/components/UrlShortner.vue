<template>
    <h2 v-if="newurl.errors">Problem with your entry: {{ newurl.errors }}</h2>
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
    <p>
        <div v-if=newurl.code>You Code Is: {{ newurl.code }}</div>
    </p>
</template>

<script>
    export default {
        data() {
            return {
                props: ['url', 'code', 'errors'],
                newurl: {
                    url: '',
                    code: '',
                    errors: ''
                },
                submitted: false
            };
        },
        methods: {
            onSubmit: function () {
                let newurl = this.newurl;
                this.submitted = true;
//            console.log(newurl.url);
                this.$http.post('/api/url', newurl).then((response) => {
                    if (response.status == 200){
                        newurl.code = response.body;
                        console.log(response);
                    }
                }, (response) => {
                    newurl.errors = response.body;
                });
            }
        }
    }
</script>
