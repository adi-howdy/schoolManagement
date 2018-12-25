var manageTeacherTable;
var base_url = $("#base_url").val();

//to create the got to next page template
$(document).ready(function(){
   manageTeacherTable = $("#manageTeacherTable").DataTable({
        "ajax" : {
            url: base_url + 'teacher/fetchTeacher',
            type: "POST"
        }
    });


  $( function() {
    $( "#dob" ).datepicker();
  } );

  $( function() {
    $( "#register" ).datepicker();
  } );


  var btnCust = '<button type="button" class="btn btn-secondary" title="Add picture tags" ' + 
    'onclick="alert(\'Call your custom code here.\')">' +
    '<i class="glyphicon glyphicon-tag"></i>' +
    '</button>'; 

  $("#imageUpload").fileinput({
    overwriteInitial: true,
    maxFileSize: 1500,
    showClose: false,
    showCaption: false,
    browseLabel: '',
    removeLabel: '',
    browseIcon: '<i class="glyphicon glyphicon-folder-open"></i>',
    removeIcon: '<i class="glyphicon glyphicon-remove"></i>',
    removeTitle: 'Cancel or reset changes',
    elErrorContainer: '#kv-avatar-errors-1',
    msgErrorClass: 'alert alert-block alert-danger',
    defaultPreviewContent: '<img src="'+base_url+'assets/images/default/default_avatar.png" alt="Your Avatar" style="width:208px;height:200px;"><h6 class="text-muted">Click to select</h6>',
    layoutTemplates: {main2: '{preview} ' +  btnCust + ' {remove} {browse}'},
    allowedFileExtensions: ["jpg", "png", "gif"]
});
  
          $("#submit").click(function(e){
             // e.preventDefault();
            var form=$(this);
                    var url=form.attr("action");
                    var type = form.attr("method");
                    $.ajax({
                            url:url,
                            type:type,
                            data:formData,
                            cache:false,
                            dataType: 'json',
                            contentType: false,
                            processData: false,
                            async: false,
                            success: function(response){             
                               $("#add-teacher-messages").html('<p> this is a success</p>');  
                            }
                    }); 
            return false;
        });     
    });

    function removeTeacher(teacherId){
        if(teacherId){
            $("#removeSecure").click(function(){
            $.ajax({
                url: 'teacher/remove/' + teacherId ,
                type: 'post',
              datatype: 'json',
                error: function(response){
                    console.log('error occured');
                },
                success: function(response){
                    obj = JSON.parse(response);
                    if(obj.success == true){
                        $("#message").html('<p>' + obj.message+ '</p>');
                        
                        //reload the page and remove the modal
                        manageTeacherTable.ajax.reload(null, false);
                        $('#removeTeacher').modal("hide");
                    }
                    
               }
            });
            return false;

        });
        }
    }
   

