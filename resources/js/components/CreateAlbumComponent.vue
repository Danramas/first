<template>
    <div class="container-create">
        <h3>Create Album</h3>
        <div class="form-group">
            <input type="text" class="form-control" placeholder="Name" v-model="album_name">
        </div>
        <div class="form-group">
            <input type="hidden" class="form-control" placeholder="user_id" v-model="user_id">
        </div>
        <div class="form-group">
            <button v-on:click="submit" class="btn btn-primary">Submit</button>
        </div>
    </div>
</template>

<script>
    export default {
        data:function(){
            return {
                album_name: null,
                user_id: 1,
            }
        },
        mounted() {

        },
        methods:{
            submit () {
                const formData = new FormData()
                formData.append('album_name', this.album_name)
                formData.append('user_id', '1')

                axios.post('/api/CreateAlbum', formData)
                    .then(response => {
                        console.log(response.data.message)
                        this.router.push('/');
                    })
                    .catch(error => console.log(error))
            },
        },
        name: "CreateAlbumComponent"
    }
</script>
