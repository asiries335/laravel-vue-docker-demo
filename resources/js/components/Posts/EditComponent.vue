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
    ]

}
</script>

<style scoped>

</style>
