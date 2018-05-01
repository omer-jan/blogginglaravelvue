<template id="post-delete" >
<div class="container">
   <p class="text-danger">Do you want to Delete <strong> {{post.title}}</strong></h3>
  <hr>
  <p>{{post.body}}</p>
  <div>
    <hr>
    <form v-on:submit.prevent="deletePost">
      <p class="text-danger">The action cannot be undone</p>
      <button type="submit" class="btn btn-sm btn-danger">Delete</button>
        <router-link class="btn btn-sm btn-warning" v-bind:to="'/'">Cancel</router-link>
    </form>
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
    let uri='http://127.0.0.1:8000/posts/'+this.$route.params.id+'/edit';
    Axios.get(uri).then((response)=>{this.post=response.data;});
  },
  methods:{
 deletePost:function()
 {
   let uri='http://127.0.0.1:8000/posts/'+this.$route.params.id;
   Axios.delete(uri,this.post).then((response)=>{
     this.$router.push({name:'Listposts'})
   });
 }
}


}
</script>
