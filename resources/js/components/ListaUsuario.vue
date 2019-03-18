<template>
    
    <div>

          <div class="navbar-form navbar-right">
            <div class="form-group container-barra-pesquisa">
                <select name="seletorPesquisa" v-model="selecionado" class="form-control campo-selecao">
                    <option >Nome</option>
                    <option >E-mail</option>
                    <option >CPF</option>
                </select>

                <input type="search" class="filtro campo-pesquisa" @input="filtro = $event.target.value" placeholder="">
                <!-- <button type="submit" class="btn btn-success btn-pesquisar">Pesquisar</button> -->
                
            </div>
        </div>


    <table  class="table custom-table">
        <thead class="thead-dark">
          <tr>
            <th class="usuario-foto" scope="col"></th>
            <th class="usuario-name" scope="col">NOME</th>
            <th class="usuario-email" scope="col">EMAIL</th>
            <th class="usuario-cpf" scope="col">CPF</th>
            <th scope="col"></th>
            <th scope="col"></th>
            <th scope="col"></th>
          </tr>
        </thead>
         <tr v-for="user in filtroUsuarios" :key="user.id">

              <td v-if="user.avatar == null" ><img class="img-thumbnail" @onerror="imgUrlAlt" src="https://s3-sa-east-1.amazonaws.com/imagensbucket/IMAGEM-PADRAO.png" alt="Imagem"></td>
              <td v-else><img class="img-thumbnail" @onerror="imgUrlAlt" :src="user.avatar" alt="Imagem"></td>
              <td class="usuario-name"> {{user.name}}</td>
              <td class="usuario-email"> {{user.email}}</td>
              <td class="usuario-cpf" > {{user.cpf}}</td>
              <td><a @click="detalhar(user.id)"><i class="fas fa-address-card"></i></a></td>
              <td><a @click="alterar(user.id)"><i class="fas fa-user-edit"></i></a></td>
              <td><a @click="remover(user.id)"><i class="fas fa-trash-alt"></i></a></td>
          </tr>
      </table>

       <div class="text-center">
           
           <vc-pagination :source="pagination" @navigate="navigate" ></vc-pagination>
           
        </div> 


    </div>


</template>

<script>


    import VcPagination from './VcPagination.vue'


    export default {

        components: {

            VcPagination

        },

        data() {

        return { 


            usuarios : [],

            pagination: [],

            url : 'http://localhost:8000/api',

            filtro: '',

            selecionado: 'Nome',
            
            }
        },


    mounted(){

        this.ready()

    },

    computed: {

     filtroUsuarios() {

      if (this.filtro) {

        if(this.selecionado == 'CPF'){

         let exp = new RegExp(this.filtro.trim(), 'i');

         return this.usuarios.filter(user => exp.test(user.cpf));

        } else if(this.selecionado  == 'E-mail') {

         let exp = new RegExp(this.filtro.trim(), 'i');

         return this.usuarios.filter(user => exp.test(user.email));

        } else {

         let exp = new RegExp(this.filtro.trim(), 'i');

         return this.usuarios.filter(user => exp.test(user.name));

        }

      

      } else {

        return this.usuarios;
      }
    }

    },

    methods: {

        alterar(id){

        window.location = '/usuarios/alteraUsuario/'+id;

     },   
    
      remover(id){

         window.location = '/usuarios/remove/'+id;

     },      

     detalhar(id){

         window.location = '/usuarios/detalheUsuario/'+id;

     },   


     imgUrlAlt(event) {
        event.target.src = "https://s3-sa-east-1.amazonaws.com/imagensbucket/IMAGEM-PADRAO.png"
    },  

     navigate(page){

            this.$http.get('http://localhost:8000/api?page='+page).then((req) => {
            this.usuarios = req.data.data 
             this.pagination = req.data

            });

        },
   

        
    ready() {


            this.$http.get(this.url).then((req) => {
                this.usuarios = req.data.data 
                this.pagination = req.data
                
                
        } )  

    },



}


}
</script>

<style>

  .container-barra-pesquisa {
    display: flex;
    margin-top: 1em;
    width: 40%;
    float: right;
  }

  .campo-pesquisa {
    box-sizing: border-box;
    border-radius: 0.25rem;
    border: 1px solid #ced4da;
    width: 80%;
    padding: 0 3% 0 3%;

  }


  .campo-selecao {
    
    width: 20%;
  }
  

  .titulo-lista-usuario {

      width: 130px;

  }

  .table th, .table td {
    padding: 0.75rem;
    vertical-align: unset;
    border-top: 1px solid #dee2e6;

  }

  .img-thumbnail {
    width: 60px;
    height: 60px;
    border-radius: 80%;
  }
  
  nav.navbar.navbar-default {
    background-color: #337ab7;
    border-color: #2e6da4;
  }
  
  nav.navbar.navbar-default a {
    color: white;
  }
  
  li p.navbar-text, a.navbar-brand {
    color: white!important;
    font-weight: bolder;
  }
 
  
  .custom-table {
      table-layout: fixed;

  }

  .usuario-name  {

      width: 25%;


  }

  .usuario-email {

       width: 20%;
  }


.usuario-cpf {

      width: 20%;


  }

.usuario-foto {
    width: 10%;
}


</style>


