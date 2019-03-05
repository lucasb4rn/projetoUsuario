<template>
    <div>
        <input class="teste" type="file" name="image" @change="GetImage">
        <img class="teste" :src= "avatar" alt="Image">
    </div>
</template>

<script>
        
export default {

        props:['user'],


    data(){
     return {

       avatar:this.user.avatar

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
            axios.post('/usuarios/alterar', {'image':this.avatar})
        }
    }
}
</script>

