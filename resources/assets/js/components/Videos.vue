<template>
    <div class="row">
         <div class="col 12"><center><h3 v-text="postTitle"></h3></center></div><br>
        <div class="col l8 m12 s12"> 
            <div class="embed-responsive embed-responsive-16by9">     
                <video width="100%" height="100%" id ="video" controls="" :src="'/diswp/public/storage/'+ videoSelected.url_video"   ></video>  
            </div>
            <hr> 
            <div class="col l12">
                    <div class="col l2"  ><b>Titulo:</b></div>
                    <div class="col l10" v-text="videoSelected.titulo"></div>
            </div>   
            <div class="col l12" >
                        <div class="col l2"  ><b>Descripci&oacute;n:</b></div>
                    <div class="col l10" v-text="videoSelected.description"></div>
                    
            </div> 
         
        
        </div>
        <div class="col  s12  m12 l4 card white"  >
             <h5  style="text-align: center ;" ><b>LISTA DE VIDEOS</b></h5> 
         <!-- <ul class="collection"  v-for="video, index in arrayVideo":key="video.codigo" >
            <li class="collection-item" href="#"  @click="selectVideo(video)" v-text="video.titulo"  > <img src="" alt=""></li> 
        </ul> -->
        
        <ul class="collection with-header" v-for="video, index in arrayVideo":key="video.codigo" > 
            <li class="collection-item" href="#"  @click="selectVideo(video)" v-text="video.titulo"  ></li> 
        </ul>
        </div>
    </div>
</template> 
<script>
    export default {
        name: 'videosn', 
        props: ['postTitle','cursoId'],
        data() {
            return {
                 
                arrayVideo:[],
                videoSelected: {
                    codigo: '',
                    description: ' ',
                    url_video:" ",
                    titulo:""
                }
                
            }
        },
        mounted() {
            this.listarVideos();
             
        },
        methods: {
            listarVideos() {
                let me =this; 
                console.log(this.postTitle,this.cursoId); 
                axios.get('/diswp/public/CursoI'+'/'+this.cursoId) .then(function (response) { 
                    // handle success
                     console.log(response.data);
                     me.arrayVideo=response.data;
                })
                .catch(function (error) {
                    // handle error
                    console.log(error);
                });
            } ,
            selectVideo(video) { 
                this.videoSelected.description = video.descripcion;
                this.videoSelected.url_video = video.url_video; 
                this.videoSelected.codigo =  video.codigo;  
                this.videoSelected.titulo =  video.titulo;  
            }  
        }
    }
</script>