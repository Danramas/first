<template>
    <div class="container" v-if="photo">
        <img :src="photo.img" alt="image" class="preview"/>
    </div>
</template>

<script>
    export default {
        data: function () {
            return {
                photo:{
                    photo_name: null,
                    img: null,
                },
            }
        },
        mounted() {
            this.loadPhoto()
        },
        methods: {
            loadPhoto() {
                axios.get("/api/image/" + this.id).then(response => {
                    this.photo = response.data.data;
                })
            },
        },
        props: {
            id: null,
        },
        name: "PhotoComponent"
    }
</script>

<style scoped>

</style>
