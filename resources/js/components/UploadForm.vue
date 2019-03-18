<template>
    <div class="delimitar-imagem">
        <div v-if=" avatar==null" >
            <img class="imagem-loader" src="https://s3-sa-east-1.amazonaws.com/imagensbucket/IMAGEM-PADRAO.png" alt="Image">
        </div>
        <div v-else> 
            <img class="imagem-loader"  :src= "avatar" alt="Image">
        </div> 
        <div class="container-flex-upload container-flex-alterar">
            <div class="item-flex-upload">
                <label class="btn custom-input-btn fake-buttom">
                <input type="file" name="image" class="input-imagem-stro" style="display:none" accept="*" @change="GetImage">        
                <i class="fa fa-cloud-upload"></i> Carregar Imagem</label>
            </div>
            <div class="item-flex-cancelar">
                <a href="#" class="btn btn-danger" @click.prevent= "cancelar">Cancelar</a>
            </div>
            <div class="item-flex-remover">
                <a href="#" class="btn btn-danger" @click.prevent= "remover">Remover</a>
            </div>
        </div>


        
    </div>
</template>
<script>
        
export default {

        props: {

            imagem: {

              default: null

            }

        },

    data(){

     return {

       avatar: this.imagem

     }
    },
    
     methods:{
    
    GetImage(e){
            let image = e.target.files[0]
            let reader = new FileReader();
            let avatar
            reader.readAsDataURL(image);
            reader.onload = e => {
               this.avatar = e.target.result
            }
        },

         remover(){
            this.avatar = null;
        },

         cancelar(){
            this.avatar = this.imagem;
        }
    },

}

</script>

