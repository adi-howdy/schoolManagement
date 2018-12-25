<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Page Title</title>
  <link  rel='stylesheet' type='text/css' href="<?php echo base_url('assets/bootstrap/css/bootstrap.min.css') ?>"> 
  <link  rel='stylesheet' type='text/css' href="<?php echo base_url('assets/datatables/datatables.min.css') ?>"> 
  <link  rel='stylesheet' type='text/css' href="<?php echo base_url('custom/css/custom.css') ?>"> 
  <link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/fileinput/css/fileinput.min.css') ?>">
  <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">

    <!-- jquery -->
    <script type="text/javascript" src="<?php echo base_url('assets/jquery/jquery.min.js') ?>"></script>
    <script type="text/javascript" src="<?php echo base_url('assets/datatables/datatables.min.js') ?>"></script>
    <script type="text/javascript" src="<?php echo base_url('custom/js/popper.js') ?>"></script>
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">
    <script type="text/javascript" src="<?php echo base_url('assets/bootstrap/js/bootstrap.min.js')?>"></script>
    <script type="text/javascript" src="<?php echo base_url('assets/bootstrap/js/popper.js') ?>"></script>
    <script type="text/javascript" src="<?php echo base_url('assets/fileinput/js/fileinput.min.js') ?>"></script>
  <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>


</head>
<body>
<input type="hidden" id="base_url" value="<?php echo base_url()?>"></input>
<nav class="navbar navbar-expand-sm navbar-light bg-light">
<div class="container-fluid">
<!--<nav class="navbar navbar-default navbar-static-top"> -->
  <a class="navbar-brand" href="<?php echo base_url('dashboard')?>">LAS</a>
  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="nav navbar-nav">
      <li id="topNavDashboard"> <a class="nav-link" href="<?php echo base_url('dashboard')?>"><span class="glyphicon glyphicon-dashboard"></span>Dashboard<span class="sr-only">(current)</span></a></li>
      <li class="dropdown" id="topClassMainNav">
        <a  class="dropdown-toggle nav-link"  href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          Class <span class="caret"></span>
        </a>
        <ul class="dropdown-menu">
          <li id="topNavClass"><a class="dropdown-item" href="<?php echo base_url('classes')?>">Manage Class</a></li>
          <li id="topNavSection"><a class="dropdown-item" href="<?php echo base_url('section')?>">Manage Section</a></li>
          <li id="topNavSubject"><a class="dropdown-item" href="<?php echo base_url('subject')?>">Manage Subject</a></li>
        </ul>
      </li>

      <li class="dropdown" id="topStudentMainNav">
        <a  class="dropdown-toggle nav-link"  href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          Student <span class="caret"></span>
        </a>
        <ul class="dropdown-menu">
          <li id="addStudentNav"><a class="dropdown-item" href="<?php echo base_url('student?opt=addst')?>">Add a student</a></li>
          <li id="addBulkStudentNav"><a class="dropdown-item" href="<?php echo base_url('student?opt=addblkst')?>">Add bulk student</a></li>
          <li id="manageStudentNav"><a class="dropdown-item" href="<?php echo base_url('student?opt=mgst')?>">Manage Student</a></li>
        </ul>
      </li>


      <li class="dropdown" id="topTeacherMainNav">
        <a  class="nav-link"  href="<?php echo base_url('teacher')?>" role="button"  aria-haspopup="true" aria-expanded="false">
          Teacher</span>
        </a>
      </li>

     <li class="dropdown" id="topMarksheetMainNav">
        <a  class="dropdown-toggle nav-link"  href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          Marksheets <span class="caret"></span>
        </a>
        <ul class="dropdown-menu">
          <li id="manageMarksheet"><a class="dropdown-item" href="<?php echo base_url('marksheet?opt=mgms')?>">Manage Marksheet</a></li>
            <li id="manageMark"><a class="dropdown-item" href="<?php echo base_url('marksheet?opt=mgmk')?>">Manage Marks</a></li>
        </ul>
      </li>

      <li class="dropdown" id="topAccountingMainNav">
        <a  class="dropdown-toggle nav-link"  href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          Accounting <span class="caret"></span>
        </a>
        <ul class="dropdown-menu">
          <li id="createStudentPayNav"><a class="dropdown-item" href="<?php echo base_url('accounting?opt=crtpay')?>">Create Student Payment</a></li>
          <li id="managePayNav"><a class="dropdown-item" href="<?php echo base_url('accounting?opt=mngpay')?>">Manage Payment</a></li>
          <li id="incomeNav"><a class="dropdown-item" href="<?php echo base_url('accounting?opt=income')?>">Income</a></li>
          <li id="expensesNav"><a class="dropdown-item" href="<?php echo base_url('accounting?opt=exp')?>">Expenses</a></li>
        </ul>
      </li>

        <li class="dropdown" id="topAttendanceMainNav">
        <a  class="dropdown-toggle nav-link"  href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          Attendance <span class="caret"></span>
        </a>
        <ul class="dropdown-menu">
          
        <li id="takeAttendance"><a class="dropdown-item" href="<?php echo base_url('attendance?atd=add')?>">Take Attendance</a></li>
          <li id="AttnReport"><a class="dropdown-item" href="<?php echo base_url('attendance?atd=report')?>">Attendance Report</a></li>

        </ul>
      </li>



       
   

    </ul>

    
    <ul class="nav navbar-nav">
      <li class="dropdown" id="topClassMainNav">
        <a  class="dropdown-toggle nav-link"  href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          Setting <span class="caret"></span>
        </a>
        <ul class="dropdown-menu">
          <li id="topNavClass"><a class="dropdown-item" href="<?php echo base_url('setting')?>">Setting</a></li>
          <li id="topNavSection"><a class="dropdown-item" href="<?php echo base_url('users/logOut')?>">Logout</a></li> 
        </ul>
      </li>
    </ul>
  </div>
  </div>
</nav>


</body>
</html>
