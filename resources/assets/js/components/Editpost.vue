<template id="update">
<div class="container">
  <h3>Update {{post.title}} </h3>
  <hr>
  <form v-on:submit.prevent="updatePost">
    <div class="form-group">
      <label for="Edit-title">Edit Title</label>
      <input id="Edit-title" v-model="post.title" class="form-control" required>
    </div>
      <div class="form-group">
        <label for="Edit-body">Edit Body</label>
        <textarea rows="10" id="Edit-body" v-model="post.body" class="form-control"></textarea>
      </div>
      <button type="submit" class="btn btn-sm btn-primary" >Update Post</button>
      <router-link class="btn btn-sm btn-warning" v-bind:to="'/'">Cancel</router-link>
  </form>
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
  },
  methods:{
 updatePost:function()
 {
   let uri='http://127.0.0.1:8000/posts/'+this.$route.params.id;
   Axios.put(uri,this.post).then((response)=>{
     this.$router.push({name:'Listposts'})
   });
 }
}

}


</script>
