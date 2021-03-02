
 //var submitButton = document.querySelector('#submit-all');



 Dropzone.options.dropzoneFrom = {

  autoProcessQueue: false,
  acceptedFiles:".png,.jpg,.gif,.bmp,.jpeg",
  maxFilesize: 800,
  
  init: function(){
   
      var upload =  document.querySelector('#upload');
       myDropzone = this;
    

    upload.addEventListener("click", function(){      
           
      myDropzone.processQueue();
      console.log("Enviado");
   
    });
 
   
   this.on("complete", function(data){
    console.log(data);
     

      if(this.getQueuedFiles().length == 0 && this.getUploadingFiles().length == 0)
      {
       var _this = this;
       _this.removeAllFiles();
      }
   });

   this.on("success", function(data){
    
    console.log(data);
      alert("Cargado con exito");
      console.log("Exito");
      window.location=BASE_URL+"/copropiedad";
   });

  },
};
     
        
          
 function query_success(){


    window.location.replace = BASE_URL+"/copropiedad";
 }