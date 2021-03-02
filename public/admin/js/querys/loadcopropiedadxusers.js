
//Seleccionar usuario al formulario
function agregarUsuario(data){

    var option = 2;
        $.ajax({
                
                url: BASE_URL+'/getprofilejs',
                headers : {'X-CSRF-TOKEN' : $('[name="token"]').val() },
                type: 'POST',
                dataType: 'json',
                data:{

                    option : option,
                    query: 	data,
                    
                },
                success:function(data){
                    

                    for (var i = 0; i < data.length; i++)
                        { 
                       $('#search_profiles').val(data[i].name);

                       $('#idUser').val(data[i].id);

                   }
                       
                       $('#modalUserSearch').modal('hide');	
                        
                    
                },
                error: function(data){
                    
                    //console.log(data.responseText);

                    alert('Error');
                }
            });
                

    }

    function agregarCopropiedad(data){

      
        var option = 2;
       
        $.ajax({
                
                url: BASE_URL+'/getcopropiedadesjs',
                headers : {'X-CSRF-TOKEN' : $('[name="token"]').val() },
                type: 'POST',
                dataType: 'json',
                data:{

                    option : option,
                    query: 	data,
                    
                },
                success:function(data){
                    
                   // console.log('response',data);
                    for (var i = 0; i < data.length; i++)
                        { 
                       $('#search_copropiedades').val(data[i].name);

                       $('#idCopropiedad').val(data[i].id);

                   }
                       
                       $('#modalCopropiedadSearch').modal('hide');	
                        
                    
                },
                error: function(data){
                    
                   

                    alert('Error');
                }
            });

    }