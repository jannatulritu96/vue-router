<template>
    <div class="container">
        <h1>Edit Post</h1>
        <form>
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label>Post Title:</label>
                        <input type="text" class="form-control" v-model="post.title">
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label>Post Body:</label>
                        <textarea class="form-control" v-model="post.body" rows="5"></textarea>
                    </div>
                </div>
            </div>
            <br/>
            <div class="form-group">
                <button class="btn btn-primary" @click="updateData">Update</button>
            </div>
        </form>
    </div>
</template>

<script>
    export default {
        data() {
            return {
                post: {
                    id: null,
                    title: null,
                    body: null,
                },
                message: null,
            }
        },
        created() {
            let uri = `/post/edit/${this.$route.params.id}`;
            this.axios.get(uri).then((response) => {
                console.log(response.data);
                this.post = response.data;
            });                console.log(this.post);

        },
        methods: {
            updateData() {
                let uri = `/post/update/${this.$route.params.id}`;
                this.axios.put(uri, this.post).then((response) => {
                    this.$router.push({name: 'post'});
                });
            }
        }
    }
</script>
