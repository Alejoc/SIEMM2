$(function(){	
    
    	$( "#find" ).click(function() {
             $('#result').html( '<img src="'+ global_data.theme +'images/load16.gif" alt="procesando" title="procesando" />' );
             var dataString = 'ajax=find&carrera=' + $('#carrera').val() + '&cantidad=' + $('#cantidad').val();
             $.ajax({
                type: 'POST',
                url: 'index.php',
                data: dataString,
                success: function( data ) {                    
                    $('#result').html( data );
                }
             });//fin ajax	              
        });
        
});//--> FIN JQUERY
