<template>
    <div class="container">
        <div class="container-create">
            <div class="form-group">
                <input type="text" class="form-control" placeholder="Name" v-model="name">
            </div>
            <div class="form-group">
                <div class="custom-file">
                    <input type="file"
                           class="custom-file-input"
                           id="customFile"
                           @change="onAttachmentChange"
                    >
                    <label class="custom-file-label" for="customFile">Choose file</label>
                </div>
            </div>
            <div class="form-group">
                <button v-on:click="submit" class="btn btn-primary">Submit</button>
            </div>
        </div>
        <div class="card" v-for="photo in photos" v-if="photos.length">
            <div class="card-header">
                <router-link :to="{ name: 'photo', params: { id: photo.id }}">
                    {{photo.photo_name}}
                </router-link>
            </div>
            <div class="card-body" v-if="photo.img">
                <img :src="photo.img" alt="image" class="preview"/>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        data:function(){
            return {
                photos:[],

                name: null,
                attachment: null
            }
        },
        mounted() {
            this.loadPhotos()
        },
        methods:{
            loadPhotos(){
                axios.get("/api/photos/"+this.id).then(response=>{
                    this.photos=response.data.data;
                })
            },
            submit () {
                const config = { 'content-type': 'multipart/form-data' }
                const formData = new FormData()
                formData.append('photo_name', this.name)
                formData.append('album_id', this.id)
                formData.append('attachment', this.attachment)

                axios.post('/api/upload', formData, config)
                    .then(response => {
                        console.log(response.data.message)
                        this.loadPhotos()
                    })
                    .catch(error => console.log(error))
            },
            onAttachmentChange (e) {
                this.attachment = e.target.files[0]
            },
        },
        props:{
            id: null,
        },
        name: "AlbumComponent"
    }
</script>

<style scoped>

</style>
