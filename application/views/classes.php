<nav aria-label="breadcrumb">
  <ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="#">Home</a></li>
    <li class="breadcrumb-item active" aria-current="page">Manage Class</li>
  </ol>
</nav>


<div class='row'>
<div class='col-md-12'>
<div class='panel'>
<div class='panel-body'>
<div class='pull pull-right'>
<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#addClass">
  Add Class
</button>
</div>

<div id="addClassMessage"></div>

<br><br><br>

<table class="table" id="classDataTable">
  <thead>
    <tr>
    
      <th scope="col">Class Name</th>
      <th scope="col">Class Number Name</th>
      <th scope="col">Action</th>
    </tr>
  </thead>
  <tbody>
  
  </tbody>
</table>



<!--Modal body to add class-->

<div class="modal fade" id="addClass" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Add Class</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
      <form action='classes/addClass' method='post' id='createClassForm'>
  <div class="form-group">
    <label for="className">Class Name</label>
    <input type="text" class="form-control" name= "className" id="className" aria-describedby="emailHelp" placeholder="Enter Class Name">
  </div>
  <div class="form-group">
    <label for="classNumName">Class Num Name</label>
    <input type="text" class="form-control" name="classNumName" id="classNumName" placeholder="Enter Class Num Name">
  </div>
  <button type="submit" class="btn btn-primary">Submit</button>
</form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Save changes</button>
      </div>
    </div>
  </div>
</div>

</div>
</div>
</div>
</div>
<script type='text/javascript' src="<?php echo base_url('custom/js/classes.js')?>"></script>


