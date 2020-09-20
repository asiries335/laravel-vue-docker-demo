<template>
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <button @click="remove" class="btn btn-info">Delete</button>
            </div>
        </div>
    </div>
</template>

<script>
export default {
    name: "DeleteComponent",
    props: [
        'user_id',
        'post_id',
    ],
    methods: {
        remove() {
            axios.delete('/api/post', {
                'data' : {
                    'user_id': this.user_id,
                    'post_id': this.post_id,
                }
            }).then((response) => {
                this.title   = null;
                this.message = null;
            });
        }
    }
}
</script>

<style scoped>

</style>
