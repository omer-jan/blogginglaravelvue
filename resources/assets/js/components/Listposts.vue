<template id="post-list">
<div class="container">
  <router-link class="btn btn-sm btn-primary float-right"  v-bind:to="{path:'/add-post'}">
             <i class="fa fa-plus"></i>  &nbsp;  add new post
  </router-link>
 <br>
 <br>
   <table class="table ">
       <thead>
         <tr>
           <th>#</th>
           <th width="10%">post title</th>
           <th>post body</th>
           <th width="30%" >actions</th>
         </tr>
       </thead>
       <tbody>
         <tr v-for="(post,index) in filterdPosts">
         <td>{{index+1}}</td>
         <td>{{post.title}}</td>
         <td>{{post.body}}</td>
         <td>
          <router-link class="btn btn-info btn-sm" v-bind:to="{name:'Viewpost',params:{id:post.id}}">  <i class="fa fa-eye"></i> &nbsp; show</router-link>
          <router-link class="btn btn-warning btn-sm" v-bind:to="{name:'Editpost',params:{id:post.id}}">  <i class="fa fa-edit"></i>&nbsp; Edit</router-link>
          <router-link class="btn btn-danger btn-sm" v-bind:to="{name:'Deletepost',params:{id:post.id}}">  <i class="fa fa-trash"></i>&nbsp; Delete</router-link>

         </td>
         </tr>

         </tbody>

     </table>
     <br>
     <br>
 </div>
 </template>

<script>
    export default {
      data:function()
      {
        return {posts:''};
      },
      created:function()
      {
        let uri='http://127.0.0.1:8000/posts/';
        Axios.get(uri).then((response)=>{
          this.posts=response.data;
        });
      },
      computed:{
        filterdPosts:function(){
          if(this.posts.length){
            return this.posts;
          }
        }
      }

    }
</script>
