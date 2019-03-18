<template>


<form action="/usuarios/adicionaUsuario" @submit.prevent="validateBeforeSubmit" method="post" enctype="multipart/form-data" >

     <div class="container-flex-cadastro">


            <div id="app">
                <upload-form></upload-form>
            </div> 


            <div class="flex-item-cadastro">

                    <div class="form-group">
                        <label>Nome: </label>
                        <input name="name" v-validate= "'required|alpha'" :class="{'input': true, 'is-invalid': errors.has('name') }"  value="" class="form-control"/>
                        <span v-show="errors.has('name')" class="text-danger">{{errors.first('name')}}</span>    
                    </div>                  

                    <label >Email: </label>
                    <label class="sr-only " for="inlineFormInputGroup">Email</label>
                        <div class="input-group mb-2">
                            <div class="input-group-prepend">
                                <div class="input-group-text">@</div>
                            </div>
                        <input placeholder="name@example.com" id="email" type="email" class="form-control" name="email" value="">
                    </div>
                 

                    <div class="container-flex-email-cpf">

                        <div class="form-group flex-item-cpf">
                            <label >CPF: </label>
                            <input name="cpf" value="" class="form-control"/>    
                        </div>

                        <div class="form-group flex-item-data-nascimento">
                            <label >Data Nascimento: </label>
                            <input type="date" name="data_nascimento" value="" class="form-control"/>    
                        </div>

                    </div>

                    <div class="form-group campo-senha">
                        <label >Senha: </label>
                        <input type="password" name="password" class="form-control"/>    
                    </div>

                    <div class="form-group campo-senha">
                        <label >Confirmação da Senha: </label>
                        <input type="password" name="password1" class="form-control"/>    
                    </div>

                    <div class="form-group">
                        <label>Situacao</label>
                        <select name="situacao_id" class="form-control">
                            <option v-for= "sit in situacao" value="sit.id">{{sit.nome}}</option>
                        </select>    
                    </div>

                </div>

            </div>

         <button class="btn btn-primary btn-block btn-adicionar-usuario" type="submit">Adicionar</button>

    </form>

       
</template>


<script>

import UploadForm from './UploadForm.vue';

export default {

   props: {

    situacao: {
        type: Array,
        default: () => []

  }
},

    components: { 

        'upload-form' : UploadForm
    },


    create: {

        function(){
            
            this.array = situacao
            
        }

    },

  data: () => ({
    array: [],
    email: '',
    name: '',
    phone: '',
    url: ''

  }),



  methods: {
    validateBeforeSubmit() {
      this.$validator.validateAll().then((result) => {
        if (result) {

          alert('Form Submitted!');
          return;

        }

        alert('Correct them errors!');
      });
    }
  }
};

</script>

<style>


</style>



