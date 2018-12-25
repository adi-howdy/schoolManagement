$(document).ready(function(){
    $('#loginform').unbind('submit').bind('submit', function(){
        var form = $(this);
        var url = form.attr('action');
        var type = form.attr('method');
        
        
        $.ajax({
			url  : url,
			type : type,
			data : form.serialize(),
            dataType: 'json',
            //this one is helpful for debug.
            error: function(response) {
                console.log('error occuered');
                
             },
			success:function(data) {
                if(data.success == true){
                    window.location = data.messages;
                }
                else {
                    alert(data.messages);
                }
                
        }
        });
       return false;
      
    });
});

