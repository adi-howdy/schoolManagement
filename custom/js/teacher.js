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
  
$("#createTeacherForm").unbind('submit').bind('submit', function(e){
             e.preventDefault();
            var form=$(this);
            console.log('action: ' + form.attr("action"));
                    var url=form.attr("action");
                    var type = form.attr("method");
                    console.log('data is ' +  $(this)[0]);
                    var formdata = new FormData($(this)[0]);
                    console.log('form data: ' + formdata);
                    $.ajax({
                            url:url,
                            type:type,
                            data:formdata,
                            cache:false,
                            dataType: 'json',
                            contentType: false,
                            processData: false,
                            async: false,
                            error: function(response){
                                console.log('error occured');
                                console.log(response.success);
                            },
                            success: function(response){  
                               $("#add-teacher-messages").html('<p>' + response.message+ '</p>');  
                               manageTeacherTable.ajax.reload(null, false);
                               $('#addTeacher').modal("hide");

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

    function updateTeacher(teacherId){
        $( function() {
            $( "#editdob" ).datepicker();
          } );
        
          $( function() {
            $( "#editregister" ).datepicker();
          } );
        
        
          var btnCust = '<button type="button" class="btn btn-secondary" title="Add picture tags" ' + 
            'onclick="alert(\'Call your custom code here.\')">' +
            '<i class="glyphicon glyphicon-tag"></i>' +
            '</button>'; 
        
          $("#editimage").fileinput({
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
     
        $.ajax({
        url: 'teacher/fetchTeacher' + '/' + teacherId,
        type: 'post',
        datatype: 'json',
        success: function(res){
          //converting from string to object.
           obj = JSON.parse(res) 
           //adding existing  value from table to form 
           $('#editfname').val(obj.fname);
           $('#editlname').val(obj.lname);
           $('#editdob').val(obj.date_of_birth);
           $('#editemail').val(obj.email);
           $('#editregister').val(obj.register_date);
           $('#editcontact').val(obj.contact);
           $('#editjobType').val(obj.job_type);
          //$('#editimageUpload').val(obj.image);
           $("#editimageupload").attr('src', obj.image);
        }
      });


      $('#updateTeacherForm').unbind('submit').bind('submit',function(e){
        var form = $(this);
         var formData = new FormData($(this)[0]);
        //var url = form.attr('action') + '/' + teacherId;
         //var type = form.attr('method');
       //  console.log('url: ' +  url);
         console.log('type:' + formData);
        $.ajax({
                     url : 'teacher/updateTeacher/' + teacherId ,
                     type : 'post',
                     data: formData,
                     dataType: 'json',
                     cache: false,
                     contentType: false,
                     processData: false,
                     async: false,
             error: function(response){
                 console.log('failed');
                 console.log(teacherId);
               //  console.log(url);
             },
             success: function(response){
                 console.log('successsss');
                 console.log(teacherId);
             }

         });
        });
    }


