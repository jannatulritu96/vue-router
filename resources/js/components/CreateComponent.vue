<template>
    <div class="container">
        <h2>Country Create form</h2>

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
            <button class="btn btn-primary" @click="storeData">Create</button>
        </div>

        <div>
            <h3> {{message}}</h3>
        </div>
    </div>
</template>

<script>

    export default {
        data() {
            return {
                post: {
                    title: null,
                    body: null
                },

                message: null,
            }
        },

        methods: {
            storeData() {
                console.log(this.post);
                axios.post('/post/store', this.post)
                    .then(response => response.data)
                    .then(response => {
                        this.message = "data store successfully";
                    })
                    .catch(error => {

                    })
                window.location.reload()
            },
        }
    }


</script>






