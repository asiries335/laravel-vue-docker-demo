<template>
    <div class="container">
        <div class="row justify-content-center">
            <button @click="getPosts" class="btn btn-info mb-4 mt-4">Update list posts</button>
            <div class="col-md-12">
                <div class="list-group" v-for="(post, index) in posts">
                    <div class="list-group-item mb-4">
                        <h4>{{ post.title }} </h4>
                        <p>{{ post.message }} </p>
                        <div class="btn-group">
                            <button class="btn btn-secondary btn-sm dropdown-toggle" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                Edit
                            </button>
                            <div class="dropdown-menu">
                                <div class="form-group">
                                    <edit-component
                                        :message="post.message"
                                        :title="post.title"
                                        :post_id="post.id"
                                        :user_id="user_id">
                                    </edit-component>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
import EditComponent from "./EditComponent";

export default {
    name: "ListComponent",
    components: {
        EditComponent
    },
    props: [
        'user_id',
    ],
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
                this.posts = response.data;
            });
        }
    }
}
</script>

<style scoped>

</style>
