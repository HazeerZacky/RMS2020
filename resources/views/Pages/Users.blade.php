<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>AdminLTE 3 | DataTables</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="{{asset('template')}}/plugins/fontawesome-free/css/all.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- DataTables -->
  <link rel="stylesheet" href="{{asset('template')}}/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
  <link rel="stylesheet" href="{{asset('template')}}/plugins/datatables-responsive/css/responsive.bootstrap4.min.css">
  <!-- Toastr -->
  <link rel="stylesheet" href="{{asset('template')}}/plugins/toastr/toastr.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="{{asset('template')}}/dist/css/adminlte.min.css">
  <!-- Select2 -->
  <link rel="stylesheet" href="{{asset('template')}}/plugins/select2/css/select2.min.css">
  <link rel="stylesheet" href="{{asset('template')}}/plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css">
  <!-- overlayScrollbars -->
  <link rel="stylesheet" href="{{asset('template')}}/plugins/overlayScrollbars/css/OverlayScrollbars.min.css">
  <!-- Preloader CSS -->
  <link rel="stylesheet" href="{{asset('template')}}/plugins/preloader/preloader.css">
  <!-- Google Font: Source Sans Pro -->
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
</head>
<body class="hold-transition sidebar-mini layout-fixed layout-navbar-fixedy layout-footer-fixed layout-navbar-fixed">

<!-- ***** Preloader Start ***** -->
<div id="preloader">
    <div class="jumper">
         <div></div>
        <div></div>
        <div></div>
    </div>
</div>  
<!-- ***** Preloader End ***** -->

<div class="wrapper">
  <!-- Navbar -->
  <nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
      </li>
      <li class="nav-item d-none d-sm-inline-block">
        <a href="/Dashboard/{{$user->id}}" class="nav-link"><i class="fas fa-home"></i> <b>Home</b></a>
      </li>
      <li class="nav-item d-none d-sm-inline-block">
        <a href="/Contact/{{$user->id}}" class="nav-link"><i class="fas fa-id-card"></i> <b>Contact</b></a>
      </li>
    </ul>

    <!-- SEARCH FORM -->
    <form class="form-inline ml-3">
      <div class="input-group input-group-sm">
        <input class="form-control form-control-navbar" type="search" placeholder="Search" aria-label="Search">
        <div class="input-group-append">
          <button class="btn btn-navbar" type="submit">
            <i class="fas fa-search"></i>
          </button>
        </div>
      </div>
    </form>

    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto">
      <!-- Messages Dropdown Menu -->

      <li class="nav-item d-none d-sm-inline-block">
        <a  class="nav-link"><b><p id="time"></p></b></a>
        <script>
                setInterval(function() {
            var today = new Date();
            var time = today.getHours() + ":" + today.getMinutes() + ":" + today.getSeconds();
            var date = today.getDate()+'/'+(today.getMonth()+1)+'/'+today.getFullYear();
            document.getElementById('time').innerHTML = time + " &nbsp; &nbsp;"+date;
                }, 1000);
        </script>
      </li>
      <li class="nav-item d-none d-sm-inline-block">
        <a href="/logout" class="nav-link"><b><i class="fas fa-sign-out-alt"></i> Logout</b></a>
      </li>
      <li class="nav-item">
        <a class="nav-link" data-widget="control-sidebar" data-slide="true" href="#" role="button">
          <i class="fas fa-th-large"></i>
        </a>
      </li>
    </ul>
  </nav>
  <!-- /.navbar -->
   

      <!-- Message Part -->


  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-purple elevation-4">
    <!-- Brand Logo -->
    <a href="{{asset('template')}}/index3.html" class="brand-link">
      <img src="{{asset('template')}}/dist/img/AdminLTELogo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3"
           style="opacity: .8">
      <span class="brand-text font-weight-light"><b>Resulect</b></span>
    </a>

    <!-- -------------------------------------------Sidebar Navigation Part Start --------------------------------- -->
    <!-- -------------------------------------------Sidebar Profile Part Start --------------------------------- -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img src="{{asset('template')}}/dist/img/user2-160x160.jpg" class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info">
          <a href="#" class="d-block">{{$user->name}}</a>
        </div>
      </div>

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar nav-child-indent nav-flat flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
          <li class="nav-item has-treeview menu-open">
            <a class="nav-link active">
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>
                Dashboard
              </p>
            </a>
          </li>
          @if($user->role == "Teacher")
          <li class="nav-header">TEACHER</li>
          <li class="nav-item has-treeview">
            <a href="/Dashboard/TeachersProfile/{{$user->id}}" class="nav-link">
              <i class="nav-icon fas fa-user-circle"></i>
              <p>Profile</p>
            </a>
          </li>
          <li class="nav-item has-treeview">
            <a href="/Dashboard/EnterResults/{{$user->id}}" class="nav-link">
              <i class="nav-icon fas fa-feather-alt"></i>
              <p>Enter Results</p>
            </a>
          </li>
          <li class="nav-item has-treeview">
            <a href="/Dashboard/TeachersReport/{{$user->id}}" class="nav-link">
              <i class="nav-icon fab fa-accusoft"></i>
              <p>Report View</p>
            </a>
          </li>
          @else
          <li class="nav-header">ADMIN</li>
          <li class="nav-item has-treeview menu-open">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-edit"></i>
              <p>
                Forms
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="/Dashboard/SubjectPage/{{$user->id}}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Subject Form</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="/Dashboard/ClassPage/{{$user->id}}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Class Form</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="/Dashboard/UsersPage/{{$user->id}}" class="nav-link active">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Users Form</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="/Dashboard/StudentPage/{{$user->id}}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Student Form</p>
                </a>
              </li>
            </ul>
          </li>
          
          <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-table"></i>
              <p>
                Tables
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{asset('template')}}/pages/tables/simple.html" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Simple Tables</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{asset('template')}}/pages/tables/data.html" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>DataTables</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{asset('template')}}/pages/tables/jsgrid.html" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>jsGrid</p>
                </a>
              </li>
            </ul>
          </li>
          <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-chart-pie"></i>
              <p>
                Charts
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="pages/charts/chartjs.html" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>ChartJS</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="pages/charts/flot.html" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Flot</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="pages/charts/inline.html" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Inline</p>
                </a>
              </li>
            </ul>
          </li>
          @endif
          

          <li class="nav-header">OTHER UTILITY(Un.Con..)</li>
          <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="nav-icon far fa-image"></i>
              <p>
                Gallery
              </p>
            </a>
          </li>
          <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
              <i class="nav-icon far fa-envelope"></i>
              <p>
                Mailbox
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item" >
                <a href="#" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p >Inbox</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="#" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Compose</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="#" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Read</p>
                </a>
              </li>
            </ul>
          </li>
          <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-book"></i>
              <p>
                Pages
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="#" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Test</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="#" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Test</p>
                </a>
              </li>
            </ul>
          </li>
          <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
              <i class="nav-icon far fa-plus-square"></i>
              <p>
                Extras
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="#" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Test</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="#" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Test</p>
                </a>
              </li>
            </ul>
          </li>

        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- -------------------------------------------Sidebar Navigation Part End --------------------------------- -->
  </aside>

  <!-- Model Start   -->
  <!-- Add Model Start -->
        <div class="modal fade" id="AddUser" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">&#9776; Users Form</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
            <!-- form start -->
                    <form role="form" action="/adduser" method="post">
                    @csrf
                        <div class="form-group">
                            <label for="UName" class="form-label">Name</label>
                            <input type="text" class="form-control"name="UName" placeholder="Enter full name">
                        </div>
                        <div class="form-group">
                            <label for="UEmail" class="form-label">E-mail</label>
                            <input type="email" class="form-control"name="UEmail" placeholder="Enter e-mail address">
                        </div>
                        <div class="form-group">
                            <label for="UPassword" class="form-label">Password</label>
                            <input type="password" class="form-control"name="UPassword" placeholder="Enter password">
                        </div>
                        <div class="form-group">
                            <label for="USubject" class="form-label">Subject</label>
                            <select class="custom-select select2" data-placeholder="Select an option" name="USubject">
                                <option value="" selected disabled hidden>(select an option)</option>
                                @foreach($subj as $su)
                                  <option value="{{$su->subjectname}}"><b>{{$su->subjectname}}</b></option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                        <label for="URole" class="form-label">Role</label>
                            <select class="form-control select2" name="URole" data-placeholder="Select an option">
                                <option value="" selected disabled hidden>(select an option)</option>
                                <option value="Teacher"><b>Teacher</b></option>
                                <option value="Admin"><b>Admin</b></option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="UStatus" class="form-label">User Status</label><br>
                            <div class="custom-control custom-radio custom-control-inline">
                              <input type="radio" id="customRadioInline1" value="Active" name="UStatus" class="custom-control-input">
                              <label class="custom-control-label" for="customRadioInline1">Active</label>
                            </div>
                            <div class="custom-control custom-radio custom-control-inline">
                              <input type="radio" id="customRadioInline2" value="Deactive" name="UStatus" class="custom-control-input">
                              <label class="custom-control-label" for="customRadioInline2">Deactive</label>
                            </div>
                        </div>
            </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                    <button type="submit" class="btn btn-primary ">Save changes</button>
                                </div> 
                            </div>
                    </form>
            
        </div>
        </div>
  <!-- Add Model End -->

  <!-- Edit Model Start -->
  <div class="modal fade" id="EditUser" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">&#9776; Users Form</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
            <!-- form start -->
                    <form role="form" action="/edituser" method="post">
                    @csrf
                        <div class="form-group">
                            <label for="exampleInputText" class="form-label">ID</label>
                            <input type="text" class="form-control" id="EUID" name="EUID" placeholder="Enter class name" readonly>
                        </div>
                        <div class="form-group">
                            <label for="exampleInputText" class="form-label">Name</label>
                            <input type="text" class="form-control" id="EUName" name="EUName" placeholder="Enter name">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1" class="form-label">E-mail</label>
                            <input type="email" class="form-control" id="EUEmail" name="EUEmail" placeholder="Enter email">
                        </div>
                        <div class="form-group">
                            <label for="EUPassword" class="form-label">Password</label>
                            <input type="password" class="form-control" id="EUPassword" name="EUPassword" placeholder="Enter password" readonly>
                        </div>
                        <div class="form-group">
                            <label for="exampleInputText" class="form-label">Subject</label>
                            <select class="form-control select2" id="EUSubject" name="EUSubject">
                                @foreach($subj as $su)
                                  <option value="{{$su->subjectname}}"><b>{{$su->subjectname}}</b></option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label>Role</label>
                            <select class="form-control select2" id="EURole" name="EURole">
                                <option value="Teacher"><b>Teacher</b></option>
                                <option value="Admin"><b>Admin</b></option>
                            </select>
                        </div>
              </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                    <button type="submit" class="btn btn-primary">Save changes</button>
                                </div> 
                            </div>
                    </form>
        </div>
        </div>

        <!-- Edit Model Get Function Start-->
        <script>
          function edit(i) {
            var id = document.getElementById('id' +i).value;
            var name = document.getElementById('name' +i).value;
            var email = document.getElementById('email' +i).value;
            var pw = document.getElementById('pw' +i).value;
            var subjectname = document.getElementById('subjectname' +i).value;
            var type = document.getElementById('type' +i).value;


            document.getElementById('EUID').value = id;
            document.getElementById('EUName').value = name;
            document.getElementById('EUEmail').value = email;
            document.getElementById('EUPassword').value = pw;
            document.getElementById('EUSubject').value = subjectname;
            document.getElementById('EURole').value = type;
          }
        </script>
        <!-- Edit Model Get Function End-->

  <!-- Edit Model End -->
  <!-- Model End   -->

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">&#9745; <b>Users Page</b></h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="/Dashboard/{{$user->id}}">Home</a></li>
              <li class="breadcrumb-item active">Users</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Class Page Full Front View Part Start -->
    <div class="card">
              <!-- Table part start -->
              <div class="card-body">
                <!-- Add Button Part Start -->
                <div class="row">
                            <div class="col-md-12 text-end">
                                <button type="button" class="btn btn-success" data-toggle="modal" data-target="#AddUser">Add New User</button>
                            </div>
                </div>
                <br>
                <!-- Add Button Part End -->
                <table id="example1" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                    <th scope="col">ID</th>
                    <th scope="col">Name</th>
                    <th scope="col">E-mail</th>
                    <th scope="col">Password</th>
                    <th scope="col">Subject</th>
                    <th scope="col">Role</th>
                    <th scope="col">Status</th>
                    <th style="width:  12%">Action</th>
                  </tr>
                  </thead>
                  <tbody>
                    <?php $k = 0; ?> <!-- identify row number -->
                      @foreach($users as $use)
                      <tr>
                        <td>{{$use->id}}</td>
                        <td>{{$use->name}}</td>
                        <td>{{$use->email}}</td>
                        <td><b><center><i class='fas fa-eye-slash'></i></center></b></td> <!-- {{$use->password}} -->
                        <td>{{$use->subjectname}}</td>
                        <td>{{$use->role}}</td>
                        <td>
                          @if($use->user_status == "Deactive")
                          <a type = "button" href = "{{route('changeusersstatus',$use->id)}}"  class ="btn btn-success btn-sm">&nbsp;&nbsp;&nbsp;Active&nbsp;&nbsp;</a>
                          @else
                          <a type = "button" href = "{{route('changeusersstatus',$use->id)}}" class ="btn btn-danger btn-sm">Deactive</a>
                          @endif
                        
                        </td>
                        <td>
                          <input type="hidden" id="id<?php echo $k; ?>" value="{{$use->id}}">
                          <input type="hidden" id="name<?php echo $k; ?>" value="{{$use->name}}">
                          <input type="hidden" id="email<?php echo $k; ?>" value="{{$use->email}}">
                          <input type="hidden" id="pw<?php echo $k; ?>" value="{{$use->password}}">
                          <input type="hidden" id="subjectname<?php echo $k; ?>" value="{{$use->subjectname}}">
                          <input type="hidden" id="type<?php echo $k; ?>" value="{{$use->role}}">
                          <input type="hidden" id="status<?php echo $k; ?>" value="{{$use->user_status}}">
                            
                            <button type="button" class="btn btn-danger btn-sm" data-toggle="modal" data-target="#DeleteUser">Delete</button>
                            <button type="button" class="btn btn-primary btn-sm" data-toggle="modal" onclick="edit(<?php echo $k; ?>)" data-target="#EditUser">Edit</button>
                        </td>
                      </tr>
                      <?php $k++; ?>
                        <!-- Delete Conformation Model Start -->
                        <div class="modal fade" id="DeleteUser">
                                <div class="modal-dialog modal-sm">
                                  <div class="modal-content">
                                    <div class="modal-header">
                                      <h4 class="modal-title">&#11088;Delete Confirmation</h4>
                                      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                      </button>
                                    </div>
                                    <div class="modal-body">
                                      <p><b>Are you sure you want to delete?</b></p>
                                    </div>
                                    <div class="modal-footer justify-content-between">
                                      <button type="button" class="btn btn-default btn-sm" data-dismiss="modal">No</button>
                                      <a  href="{{route('deleteuser',$use->id)}}" class="btn btn-danger btn-sm">Yes</a> <!-- $cls->id = passing variable-->
                                    </div>
                                  </div>
                                  <!-- /.modal-content -->
                                </div>
                                <!-- /.modal-dialog -->
                              </div>
                              <!-- /.modal -->
                          <!-- Delete Conformation Model End-->
                      @endforeach
                  </tbody>
                  <tfoot>
                  <tr>
                    <th scope="col">ID</th>
                    <th scope="col">Name</th>
                    <th scope="col">E-mail</th>
                    <th scope="col">Password</th>
                    <th scope="col">Subject</th>
                    <th scope="col">Role</th>
                    <th scope="col">Status</th>
                    <th style="width:  12%">Action</th>
                  </tr>
                  </tfoot>
                </table>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
  </div>
  <!-- Class Page Full Front View Part End -->
  <!-- /.content-wrapper -->

  <!-- Footer Start -->
  <footer class="main-footer text-sm">
      <strong>Copyright &copy; 2020-2021 <a href="#">Reselect.info</a>.</strong>
      All rights reserved.
      <div class="float-right d-none d-sm-inline-block">
        <b>Version</b> 0.2.2
      </div>
      <div class="float-right d-none d-sm-inline-block">
            <a href="#"><b>HAZKY EDITS &nbsp;<b></a> | &nbsp;
      </div>
    </footer>
  <!-- Footer End -->

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark"> 
    <!-- color, type change  -->
    <!-- Control sidebar content goes here -->
  </aside>
  <!-- /.control-sidebar -->

</div>
<!-- ./wrapper -->

<!-- ====================================      Include Scrips Part Start      ========================================= -->

<!-- jQuery -->
<script src="{{asset('template')}}/plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="{{asset('template')}}/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- DataTables -->
<script src="{{asset('template')}}/plugins/datatables/jquery.dataTables.min.js"></script>
<script src="{{asset('template')}}/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
<script src="{{asset('template')}}/plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
<script src="{{asset('template')}}/plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
<!-- AdminLTE App -->
<script src="{{asset('template')}}/dist/js/adminlte.min.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="{{asset('template')}}/dist/js/demo.js"></script>
<!-- Toastr -->
<script src="{{asset('template')}}/plugins/toastr/toastr.min.js"></script>
<!-- Select2 -->
<script src="{{asset('template')}}/plugins/select2/js/select2.full.min.js"></script>
<!-- overlayScrollbars -->
<script src="{{asset('template')}}/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>
<!-- Plugins -->
<script src="{{asset('template')}}/plugins/preloader/scrollreveal.min.js""></script>
<!-- Global Init -->
<script src="{{asset('template')}}/plugins/preloader/custom.js"></script>

<!-- ====================================      Include Scrips Part End      ========================================= -->

<!-- page script Part Start-->
<!-- Data Table Start -->
<script>
  $(function () {
    $("#example1").DataTable({
      "responsive": true,
      "autoWidth": false,
    });
    $('#example2').DataTable({
      "paging": true,
      "lengthChange": false,
      "searching": false,
      "ordering": true,
      "info": true,
      "autoWidth": false,
      "responsive": true,
    });
  });
</script>
<!-- Data Table End -->

<!-- Alert Part Start -->

  @if(Session::has('message'))
  <script>
    var type = "{{ Session::get('alert-type', 'info') }}";
    switch(type){
        case 'info':
            toastr.info("{{ Session::get('message') }}");
            break;
        
        case 'warning':
            toastr.warning("{{ Session::get('message') }}");
            break;

        case 'success':
            toastr.success("{{ Session::get('message') }}");
            break;

        case 'error':
            toastr.error("{{ Session::get('message') }}");
            break;
    }
    </script>
  @endif

        @if($errors->any())
          @foreach($errors->all()  as $error)
          <script>
            toastr.info("{{$error}}");
          </script>
          @endforeach
        @endif
<!-- Alert Part End -->
<!-- select 2 script start -->
<script>
  $(function () {
    //Initialize Select2 Elements
    $('.select2').select2()

    //Initialize Select2 Elements
    $('.select2bs4').select2({
      theme: 'classic'
    })

  })
</script>
<!-- select 2 script end -->
<!-- page script Part End-->
</body>
</html>
