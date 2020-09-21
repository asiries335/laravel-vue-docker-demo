<template>
    <div class="container">
        <div class="row justify-content-center">
            <button @click="getPosts" class="btn btn-info mb-4 mt-4">Update list posts</button>
            <div class="col-md-12">
                <div class="list-group posts" v-for="(post, index) in storeUserPosts.data.posts">
                    <div class="list-group-item mb-4">
                        <h4>{{ post.title }}</h4>
                        <p>{{ post.message }}</p>
                        <div class="btn-group">
                            <delete-component :post_id="post.id" :user_id="user_id"></delete-component>
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
import DeleteComponent from "./DeleteComponent";
import storeUserPosts from '../../storeUserPosts';

export default {
    name: "ListComponent",
    components: {
        DeleteComponent,
        EditComponent
    },
    props: [
        'user_id',
    ],
    data: function () {
        return {
            storeUserPosts
        }
    },
    mounted() {
        this.getPosts()
    },
    methods: {
        getPosts() {
            axios.get('/api/post/list/' + this.user_id).then((response) => {
                storeUserPosts.data.posts = response.data;
            });
        }
    }
}
</script>

<style scoped>

</style>
