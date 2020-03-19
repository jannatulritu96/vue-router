<template>
    <div class="container">
        <h1 class="text-center"> </h1>
        <hr>
        <div class="col-sm-12">
            <div class="row">
                <div class="col-sm-6">
                    <div class="form-group">
                        <input type="text" class="form-control" placeholder="search name" v-model="search"
                               keyup="searchData">
                    </div>
                </div>
                <div class="col-sm-2">
                    <router-link to="/create" class="btn btn-primary">Create post</router-link>
                </div>
            </div>
        </div>
        <br>
        <div class="col-sm-12">
            <table class="table table-striped table-bordered">
                <thead>
                <tr>
                    <th width="10%" class="text-left">ID</th>
                    <th width="10%" class="text-left">Item Name</th>
                    <th width="10%" class="text-left">Item Price</th>
                    <th width="10%" class="text-left">Actions</th>

                </tr>
                </thead>
                <tbody>
                <tr v-for="post in posts" :key="post.id">

                    <td>{{ post.id }}</td>
                    <td>{{ post.title }}</td>
                    <td>{{ post.body }}</td>
                    <td>
                        <a :href="'/edit/'+post.id" class="btn btn-primary">Edit</a>
                        <button class="btn btn-danger" @click.prevent="deletePost(post.id)">Delete</button>
                    </td>
                </tr>
                </tbody>
            </table>
        </div>
    </div>
</template>

<script>
    export default {
        data() {
            return {
                posts: [],
                search: '',
            }
        },
        mounted() {
            this.showData();
        },

        methods: {

            showData() {
                let uri = '/post-show';
                this.axios.get(uri).then(response => {
                    // console.log(response.data);
                    this.posts = response.data;
                    // console.log(this.posts);
                });
            },

            deletePost(id) {
                let uri = `/post/delete/${id}`;
                this.axios.delete(uri).then(response => {
                    this.posts.splice(this.posts.indexOf(id), 1);
                });
            }
        }
    }
</script>
