import AllArtikel from './components/AllArtikel.vue';
import CreateArtikel from './components/CreateArtikel.vue';
import EditArtikel from './components/EditArtikel.vue';
 
export const routes = [
    {
        name: 'home',
        path: '/',
        component: AllArtikel
    },
    {
        name: 'create',
        path: '/create',
        component: CreateArtikel
    },
    {
        name: 'edit',
        path: '/edit/:id',
        component: EditArtikel
    }
];