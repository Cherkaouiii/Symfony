$(document).ready(function(){
   
    //var datatable = $("#contractTypeList").Datatable();
         
    //ajax : Routing.generate('getContractTypeJsonList')
    
   /* $('.contractTypeForm').on('submit', function(e) {
        e.preventDefault();
        
        $.ajax({
            type : $(this).attr('method'),
            url  : $(this).attr('action'),
            data : $(this).serialize(),
            beforeSend : function(){
                $('#myModal').modal('hide');
            }
        })
        .done(function(data){
            
            if(typeof data.message !== 'undefined') {             
                datatable.ajax.reload();
            }  
        })
        .fail(function(jqXHR, textStatus, errorThrown){
            console.log(jqXHR);
            console.log(jqXHR.responseJson);
            if(typeof jqXHR.responseJson !== 'undefined') {
                
                if(jqXHR.responseJson.hasOwnProperty('form')){
                    $('#form_body').html(jqXHR.responseJson.form)
                }
                $('.form_error').html(jqXHR.responseJson.message);
            }
            
        }) 
        
    });*/
});


