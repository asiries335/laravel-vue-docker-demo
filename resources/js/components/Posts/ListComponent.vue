<template>
    <div class="container">
        <div class="row justify-content-center">
            <button @click="getPosts" class="btn-toolbar">Update list posts</button>
            <div class="col-md-12">
                <div class="list-group" v-for="(post, index) in posts">
                    <div class="list-group-item mb-4">
                        <h4>{{post.title}} </h4>
                        <p>{{post.message}} </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
export default {
    name: "ListComponent",

    data: function () {
        return {
            posts: [],
        }
    },

    mounted() {
        this.getPosts()
    },

    methods: {
        getPosts() {
            axios.get('api/post/list').then((response) => {
                console.log(response.data);
                this.posts = response.data;
            });
        }
    }
}
</script>

<style scoped>

</style>
