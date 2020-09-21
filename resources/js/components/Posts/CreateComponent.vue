<template>
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <input type="text" class="form-control" v-model="title" placeholder="title">
                <textarea v-model="message" placeholder="your message" class="form-control"></textarea>
                <button @click="create">Add</button>
            </div>
        </div>
    </div>
</template>

<script>
import ListComponent from "./ListComponent";
import storeUserPosts from '../../storeUserPosts';

export default {
    name: "CreateComponent",
    data() {
        return {
            title: null,
            message: null,
        }
    },
    components: {
        ListComponent
    },
    props: [
        'user_id',

    ],
    methods: {
        create() {
            axios.post('/api/post', {
                'title': this.title,
                'message': this.message,
                'user_id': this.user_id
            }).then((response) => {
                this.title = null;
                this.message = null;
                storeUserPosts.data.posts.push(response.data)
            });
        },
    }
}
</script>

<style scoped>

</style>
