<template>
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <input type="text" class="form-control" v-model="title" placeholder="title">
                <textarea v-model="message" placeholder="your message" class="form-control"></textarea>
                <button @click="edit">Edit</button>
            </div>
        </div>
    </div>
</template>

<script>
export default {
    name: "EditComponent",
    props: [
        'title',
        'post_id',
        'message',
        'user_id',
    ],
    methods: {
        edit() {
            axios.put('/api/post', {
                'title': this.title,
                'message': this.message,
                'user_id': this.user_id,
                'post_id': this.post_id,
            }).then((response) => {
                this.title   = response.data.title;
                this.message = response.data.message;
            });
        }
    }

}
</script>

<style scoped>

</style>
