var base_url = $("#base_url").val();

$(document).ready(function(){
    
    //filling up data table
    $('#classDataTable').DataTable({"ajax": {
        url: base_url + 'classes/fetchClass',
        type : 'GET'
    }});

    // insert data into class table
    $('#createClassForm').unbind('submit').bind('submit', function(e){
       e.preventDefault();
        var form = $(this);
        var formdata = new FormData($(this)[0]);
        $.ajax({
            url: 'classes/addClass',
            type: 'post',
            datatype: 'json',
            data: formdata,
            contentType: false,
            processData: false,
            async: false,
            success: function(res){
                  obj = jQuery.parseJSON(res);
                $('#addClassMessage').html('<p>' + obj.message + '</p>');
            },
            error: function(res){
                obj = jQuery.parseJSON(res);
                $('#addClassMessage').html('<p>' + obj.message + '</p>');
            }
        });
        
        $('#addClass').modal('hide');
    });
});

function removeClass($classId){
    $.ajax({
        url: 'classes/removeClass/' + $classId,
        type: 'post',
        success: function(res){
            obj = jQuery.parseJSON(res);
            console.log('data: ' +  obj.messages);
            $('#addClassMessage').html('<p>' + obj.messages + '</p>');
        },
        error: function(res){
            obj = jQuery.parseJSON(res);
            console.log('data: ' +  obj.messages);
            $('#addClassMessage').html('<p>' + obj.messages + '</p>');
        }

    });
}