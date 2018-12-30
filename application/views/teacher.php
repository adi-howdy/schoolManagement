<ol class="breadcrumb">
	<li class="breadcrumb-item"><a
		href="<?php echo base_url('dashboard') ?>">Dashboard</a></li>
	<li class="breadcrumb-item active"><a href="#">Teacher Profile</a></li>
</ol>

<div class="row">
	<div class="col-md-12">
		<div class="panel panel-default">
			<div class="panel-body">
				<fieldset>
					<legend>Manage Teacher</legend>
					<div id = "message"> </div>
					<div id="add-teacher-messages"></div>
					<div class="pull pull-right">
						<button type="button" class="btn btn-default" data-toggle="modal"
							data-target="#addTeacher" id="addTeacherModalBtn">
							<i class="glyphicon glyphicon-plus-sign"></i>Add Teacher
						</button>
					</div>
					<!--modal button-->

					</br> </br> </br>
					<table class="table" id="manageTeacherTable">
						<thead>
							<tr>
								<th scope="col">#</th>
								<th scope="col">Name</th>
								<th scope="col">Age</th>
								<th scope="col">Contact</th>
								<th scope="col">Email</th>
								<th scope="col">Action</th>
							</tr>
						</thead>
					</table>
				</fieldset>

<div class="modal fade" id="removeTeacher" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <p>Are you sure you want to delete the teacher?</p>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-footer">
	  	<button type="button" class="btn btn-primary" id = "removeSecure" >Yes</button>
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>      
      </div>
    </div>
  </div>
</div>

				<div class="modal fade" id="addTeacher" tabindex="-1" role="dialog">
					<div class="modal-dialog modal-lg" role="document">
						<div class="modal-content">
							<div class="modal-header">
								<h5 class="modal-title">Add Teacher</h5>
								<button type="button" class="close" data-dismiss="modal"
									aria-label="Close">
									<span aria-hidden="true">&times;</span>
								</button>
							</div>
							
							<form action="teacher/createTeacher" method="post" id="createTeacherForm"
								enctype="multipart/form-data">
								<div class="modal-body create-modal">
								
									<div class="row">

										<div class="col-md-6">
											<div class="form-group">
												<label for="fname" class="col-sm-4 control-label">First Name</label>
												<div class="col-sm-8">
													<input type="text" placeholder="First Name" id="fname"
														name="fname" />
												</div>
											</div>

											<div class="form-group">
												<label for="lname" class="col-sm-4 control-label">Last Name
												</label>
												<div class="col-sm-8">
													<input type="text" placeholder="Last Name" id="lname"
														name="lname" />
												</div>
											</div>

											<div class="form-group">
												<label for="dob" class="col-sm-4 control-label">DOB </label>
												<div class="col-sm-8">
													<input type="text" placeholder="Date of Birth" id="dob"
														name="dob" />
												</div>
											</div>

											<div class="form-group">
												<label for="age" class="col-sm-4 control-label">Age</label>
												<div class="col-sm-8">
													<input type="text" placeholder="Age" id="age" name="age" />
												</div>
											</div>



											<div class="form-group">
												<label for="contact" class="col-sm-4 control-label">Contact</label>
												<div class="col-sm-8">
													<input type="text" placeholder="Contact" id="contact"
														name="contact" />
												</div>
											</div>

											<div class="form-group">
												<label for="email" class="col-sm-4 control-label">Email</label>
												<div class="col-sm-8">
													<input type="text" placeholder="Email" id="email"
														name="email" />
												</div>
											</div>
										</div>

										<div class="col-md-6">
											<div class="form-group">
												<label for="register" class="col-sm-4 control-label">RegisterDate</label>
												<div class="col-sm-8">
													<input type="text" placeholder="Register Date"
													id="register"  name="register" />
												</div>
											</div>

											<div class="form-group">
												<label for="jobType" class="control-label">Job Status</label>
												<select class="form-control" name="jobType" id="jobType">
													<option value="not chosen">Choose...</option>
													<option value="Full time">Full Time</option>
													<option value="Part time">Part Time</option>
												</select>
											</div>


											<div class="form-group">
												<label for="imageUpload" File</label> <input type="file"
													class="form-control-file" name="imageUpload"
													id="imageUpload">
											</div>
										</div>
										<!--md-6-->
									</div>
									<!--  row -->



								</div>
								<!--  create model -->
								<div class="modal-footer">
									<button type="button" class="btn btn-secondary"
										data-dismiss="modal">Close</button>
									<button type="submit" id="submit" class="btn btn-primary">Save changes</button>
								</div>
							</form>

						</div>
					</div>
				</div>
			
			
				<!--Updating teacher-->

				<div class="modal fade" id="updateTeacherModal" tabindex="-1" role="dialog">
					<div class="modal-dialog modal-lg" role="document">
						<div class="modal-content">
							<div class="modal-header">
								<h5 class="modal-title">Update  Teacher</h5>
								<button type="button" class="close" data-dismiss="modal"
									aria-label="Close">
									<span aria-hidden="true">&times;</span>
								</button>
							</div>
							
							<form action="" method="post" id="updateTeacherForm"
								enctype="multipart/form-data">
								<div class="modal-body create-modal">
								
									<div class="row">

										<div class="col-md-6">
											<div class="form-group">
												<label for="editfname" class="col-sm-4 control-label">First Name</label>
												<div class="col-sm-8">
													<input type="text" placeholder="First Name" id="editfname"
														name="editfname" />
												</div>
											</div>

											<div class="form-group">
												<label for="editlname" class="col-sm-4 control-label">Last Name
												</label>
												<div class="col-sm-8">
													<input type="text" placeholder="Last Name" id="editlname"
														name="editlname" />
												</div>
											</div>

											<div class="form-group">
												<label for="editdob" class="col-sm-4 control-label">DOB </label>
												<div class="col-sm-8">
													<input type="text" placeholder="Date of Birth" id="editdob"
														name="editdob" />
												</div>
											</div>

											<div class="form-group">
												<label for="editage" class="col-sm-4 control-label">Age</label>
												<div class="col-sm-8">
													<input type="text" placeholder="Age" id="editage" name="editage" />
												</div>
											</div>



											<div class="form-group">
												<label for="editcontact" class="col-sm-4 control-label">Contact</label>
												<div class="col-sm-8">
													<input type="text" placeholder="Contact" id="editcontact"
														name="editcontact" />
												</div>
											</div>

											<div class="form-group">
												<label for="editemail" class="col-sm-4 control-label">Email</label>
												<div class="col-sm-8">
													<input type="text" placeholder="Email" id="editemail"
														name="editemail" />
												</div>
											</div>
										</div>

										<div class="col-md-6">
											<div class="form-group">
												<label for="editregister" class="col-sm-4 control-label">RegisterDate</label>
												<div class="col-sm-8">
													<input type="text" placeholder="Register Date"
													id="editregister"  name="editregister" />
												</div>
											</div>

											<div class="form-group">
												<label for="editjobType" class="control-label">Job Status</label>
												<select class="form-control" name="editjobType" id="editjobType">
													<option value="not chosen">Choose...</option>
													<option value="Full time">Full Time</option>
													<option value="Part time">Part Time</option>
												</select>
											</div>


												<div class="col-md-6">
							<center>
								<img src="" id="editimageupload" class="img-thumbnail upload-photo" />
							</center>								
						</div>
<!--
						<div class="form-group">
												<label for="editimage" File</label> <input type="file"
													class="form-control-file" name="editimage"
													id="editimage">
											</div>
											-->
										</div>
										<!--md-6-->
									</div>
									<!--  row -->



								</div>
								<!--  create model -->
								<div class="modal-footer">
									<button type="button" class="btn btn-secondary"
										data-dismiss="modal">Close</button>
									<button type="submit" id="updateTeacher1" class="btn btn-primary">Update changes</button>
								</div>
							</form>

						</div>
					</div>
				</div>
			
			
			
			
			
			
			
			
			
			
			
			
			
			</div>
		</div>
	</div>
</div>
</div>
<script type="text/javascript" src="<?php echo base_url('custom/js/teacher.js') ?>"></script>
