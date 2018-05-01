<template id="add-post">
<div class="container">
  <h3>add new Post </h3>
  <hr>
  <form v-on:submit.prevent="createPost">
    <div class="form-group">
      <label for="add-title">Title</label>
      <input id="add-title" v-model="post.title" class="form-control" required>
    </div>
      <div class="form-group">
        <label for="add-body">Body</label>
        <textarea rows="10" id="add-body" v-model="post.body" class="form-control"></textarea>
      </div>
      <button type="submit" class="btn btn-sm btn-primary" >Create Post</button>
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
   methods:{
  createPost:function()
  {
    let uri='http://127.0.0.1:8000/posts/';
    Axios.post(uri,this.post).then((response)=>{
      this.$router.push({name:'Listposts'})
    });
  }
}


}
</script>
