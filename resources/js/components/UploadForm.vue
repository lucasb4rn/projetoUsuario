<template>
    <div class="delimitar-imagem">
        <div v-if=" avatar==null" >
            <img class="imagem-loader"  src= "/storage/img-default.jpg" alt="Image">
        </div>
        <div v-else> 
            <img class="imagem-loader"  :src= "avatar" alt="Image">
        </div> 
        <input class="input-imagem-cadastro" type="file" name="image" @change="GetImage">
    </div>
</template>

<script>
        
export default {

    data(){
     return {

       avatar:null

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

        Upload(){
            axios.post('/usuarios/adiciona', {'image':this.avatar})
        }
    }
}
</script>
