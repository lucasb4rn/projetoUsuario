require('./bootstrap');

window.Vue = require('vue');


import Vue from 'vue';
import VueResource from 'vue-resource';
import UploadForm from './components/UploadForm';
import FormCadastro from './components/FormCadastro';
import ListaUsuario from './components/ListaUsuario';
import VeeValidate from 'vee-validate';
import VcPagination from './components/VcPagination';
import Paginate from 'vuejs-paginate';

Vue.component('paginate', Paginate)
Vue.use(VeeValidate);
Vue.use(VueResource);



//adicionar
const app = new Vue({
    el: '#app',
    components:{UploadForm}

});


const app1 = new Vue({

    el: '#formCadastro',
    components:{FormCadastro},

});


const app2 = new Vue({
  el: '#app2',
  components:{ListaUsuario, VcPagination}

 });








