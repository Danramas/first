import HomeComponent from "../components/HomeComponent";
import AlbumComponent from "../components/AlbumComponent";
import CreateAlbumComponent from "../components/CreateAlbumComponent";
import PhotoComponent from "../components/PhotoComponent";
import LoginComponent from "../components/LoginComponent";

const routes = [
    {
        path: '/',
        name: 'welcome',
        component: HomeComponent,
    },
    {
        path: '/login',
        component: LoginComponent,
    },
    {
        path: '/albums/:id',
        name: 'album',
        component: AlbumComponent,
        props: true,
    },

    {
        path: '/CreateAlbum',
        name: 'CreateAlbum',
        component: CreateAlbumComponent,
        props: true,
    },
    {
        path: '/albums/:id/:id',
        name: 'photo',
        component: PhotoComponent,
        props: true,
    },
]

export default routes
