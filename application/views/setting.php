  <ol class="breadcrumb">
    <li class ="breadcrumb-item"><a href="<?php echo base_url('dashboard') ?>">Dashboard</a></li>
    <li class= "breadcrumb-item active"><a href="#">Manage Setting</a></li>
  </ol>

  <div class="row">
    <div class="col-md-12">
        <div class="panel panel-default">
            <div class="panel-heading">Manage Setting</div>
                <div class="panel-body">
                   <div class = "update_profile">
                             
<!-- it looks for name to update-->
<div class = "col-md-6">
<form action="users/updateProfile" method = "post" id="updateProfileForm">
<fieldset>
<legend>Profile Setting</legend>
<div class = "form-group">
<label for="userName">User Name</label>
<input class="form-control" id = "userName" name = "userName" type = "text" placeholder="User Name" value="<?php echo $userdata["userName"] ?>">
</div>
<div class = "form-group">
<label for="fname">First Name</label>
<input class="form-control" id = "fname" name = "fname" type = "text" placeholder="First Name" value="<?php echo $userdata["fname"] ?>">
</div>
<div class = "form-group">
<label for="lname">Last Name</label>
<input class="form-control" id = "lname" name = "lname" type = "text" placeholder="Last Name" value="<?php echo $userdata["lname"] ?>">
</div>
<div class = "form-group">
<label for="email">Email</label>
<input class="form-control" id = "email" name = "email" type = "text" placeholder="Email " value="<?php echo $userdata["email"] ?>">
</div>
<button type="submit" class="btn btn-primary">Save Changes</button>
</fieldset>
</form>
</div>


                             <div class = "col-md-6"> 
                                <form action="users/changePassword" method = "post" id="changePasswordform">
                                    <fieldset>
                                    <legend>Change Password</legend>
                                    <div class = "form-group">
                                            <label for="cpass">Current Password</label>
                                            <input class="form-control" name="cpass" id = "cpass" type = "password" placeholder="Current Password " value="<?php echo $userdata["cpass"] ?>">
                                    </div>
                                    <div class = "form-group">
                                            <label for="npass">New Password</label>
                                            <input class="form-control" name= "npass" id = "npass" type = "password" placeholder="New Password " value="<?php echo $userdata["npass"] ?>">
                                    </div>

                                    <div class = "form-group">
                                            <label for="cnpass">Confirm New Password</label>
                                            <input class="form-control" name ="cnpass" id = "cnpass" type = "password" placeholder="Confirm New Password " value="<?php echo $userdata["npass"] ?>">
                                    </div>
                                    <button type="submit" class="btn btn-primary">Change Password</button>
                                    </fieldset>
                                </form>
                                
                             </div>
                   </div>
                </div>
        </div>
    </div>
  </div>        

