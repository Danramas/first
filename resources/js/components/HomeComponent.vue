<template>
    <div class="container">
        <div>
            <div v-if="authenticated && user">
                <p>Hello, {{ user.name }}</p>

                <router-link to="/logout">Logout</router-link>
            </div>
            <router-link to="/login">Login</router-link>
            <router-link to="/CreateAlbum">Create Album</router-link>
        </div>
        <div class="card" v-for="album in albums" v-if="albums.length">
            <div class="card-header">
                <router-link :to="{ name: 'album', params: { id: album.id }}">
                    {{album.album_name}}
                </router-link>
            </div>
            <div class="card-body" v-if="album.preview">
                <img :src="album.preview" alt="image" class="preview"/>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        data:function(){
            return {
                albums:[],
                authenticated: auth.check,
                user: auth.user
            }
        },
        mounted() {
            this.loadAlbums()
            Event.$on('userLoggedIn', () => {
                this.authenticated = true;
                this.user = auth.user;
            });
        },
        methods:{
            loadAlbums(){
                axios.get("/api/albums").then(response=>{
                    this.albums=response.data.data;
                    console.log(response.data);

                })
            }
        },
        name: "HomeComponent"
    }
</script>

<style>
    .card {
        width: 200px;
        height: 200px;
        background: silver;
        border: 1px solid #000000;
        float: left;
        margin: 10px;
    }
    .preview {
        width: 100px;
        height: 100px;
        position: absolute;
    }
</style>
