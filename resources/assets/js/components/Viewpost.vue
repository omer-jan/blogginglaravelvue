<template id="post" >
<div class="container">
  <h3>{{post.title}}</h3>
  <hr>
  <div>
    {{post.body}}
  </div>
<hr>
  <router-link class="btn btn-sm btn-blue" v-bind:to="'/'"><span class="fa fa-arrow-left"></span>&nbsp; Back to post list</router-link>

<br>
<br>
 </div>
 </template>

<script>
export default {
  data:function()
  {
    return {post:{title:'',body:''}};
  },
  created:function()
  {
    let uri='http://127.0.0.1:8000/posts/'+this.$route.params.id;
    Axios.get(uri).then((response)=>{this.post=response.data;});
  }


}
</script>
