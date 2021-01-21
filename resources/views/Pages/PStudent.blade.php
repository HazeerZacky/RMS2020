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
    <!-- overlayScrollbars -->
    <link rel="stylesheet" href="{{asset('template')}}/plugins/overlayScrollbars/css/OverlayScrollbars.min.css">
  <!-- Google Font: Source Sans Pro -->
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
</head>
<body class="hold-transition sidebar-mini layout-fixed layout-navbar-fixedy layout-footer-fixed layout-navbar-fixed">

<div class="wrapper">
  <!-- Navbar -->
  <nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
      </li>
      <li class="nav-item d-none d-sm-inline-block">
        <a href="/" class="nav-link"><i class="fas fa-home"></i> <b>Home</b></a>
      </li>
      <li class="nav-item d-none d-sm-inline-block">
        <a href="/Contact" class="nav-link"><i class="fas fa-id-card"></i> <b>Contact</b></a>
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
        <a href="/" class="nav-link"><b><i class="fas fa-sign-out-alt"></i> Logout</b></a>
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
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="{{asset('template')}}/index3.html" class="brand-link">
      <img src="{{asset('template')}}/dist/img/AdminLTELogo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3"
           style="opacity: .8">
      <span class="brand-text font-weight-light"><b>Resulect</b></span>
    </a>

    <!-- Sidebar -->
    <!-- -------------------------------------------Sidebar Profile Part Start --------------------------------- -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img src="{{asset('template')}}/dist/img/user2-160x160.jpg" class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info">
          <a href="#" class="d-block">Alexander Pierce</a>
        </div>
      </div>
    <!-- -------------------------------------------Sidebar Profile Part End --------------------------------- -->

    <!-- -------------------------------------------Sidebar Navigation Part Start --------------------------------- -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
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
          <li class="nav-header">ADMIN</li>
          <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-feather-alt"></i>
              <p>Enter Results</p>
            </a>
          </li>
          <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
              <i class="nav-icon fab fa-accusoft"></i>
              <p>Report View</p>
            </a>
          </li>
          <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-user-circle"></i>
              <p>Profile</p>
            </a>
          </li>
          <li class="nav-header">SUPER ADMIN</li>
          <li class="nav-item has-treeview menu-open">
            <a href="#" class="nav-link active">
              <i class="nav-icon fas fa-edit"></i>
              <p>
                Forms
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="/Class" class="nav-link ">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Class Form</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="/Users" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Users Form</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="/Student" class="nav-link active">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Student Form</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{asset('template')}}/pages/forms/subjectform.html" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Subject Form</p>
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
          <li class="nav-header">EXAMPLES</li>
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
              <li class="nav-item">
                <a href="#" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Inbox</p>
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
        <div class="modal fade" id="AddClass" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">&#9776; Class Form</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
            <!-- form start -->
                    <form role="form" action="/addclass" method="post">
                    @csrf
                        <div class="form-group">
                            <label for="exampleInputText" class="form-label">Index Number</label>
                            <input type="text" class="form-control"name="SINo" placeholder="Enter student index number">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputText" class="form-label">Full Name</label>
                            <input type="text" class="form-control"name="SName" placeholder="Enter student name">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputText" class="form-label">Gender</label>
                            <input type="text" class="form-control"name="SName" placeholder="Enter gender">
                        </div>
                        <div class="form-group">
                        <label for="exampleInputText" class="form-label">Date of birth</label>
                            <div class="input-group date" id="reservationdate" data-target-input="nearest">
                                <input type="text" class="form-control datetimepicker-input" data-target="#reservationdate"/>
                                <div class="input-group-append" data-target="#reservationdate" data-toggle="datetimepicker">
                                    <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                                </div>
                            </div>
                        </div>
                        
                        <div class="form-group">
                        <label>Class Name</label>
                            <select class="custom-select" name="CType">
                                <option value="" selected disabled hidden>(select one option)</option>
                                @foreach($cls as $cl)
                                  <option value="{{$cl->class_name}}"><b>{{$cl->class_name}}</b></option>
                                @endforeach
                               
                            </select>
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
  <div class="modal fade" id="EditClass" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">&#9776; Class Form</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
            <!-- form start -->
                    <form role="form" action="/editclass" method="post">
                    @csrf
                        <div class="form-group">
                            <label for="exampleInputText" class="form-label">Class ID</label>
                            <input type="text" class="form-control" id="ECId" name="ECId" placeholder="Enter class name" readonly>
                        </div>
                        <div class="form-group">
                            <label for="exampleInputText" class="form-label">Class Name</label>
                            <input type="text" class="form-control" id="ECName" name="ECName" placeholder="Enter class name">
                        </div>
                        <div class="form-group">
                            <label>Class Type</label>
                            <select class="custom-select" id="ECType" name="ECType">
                                <option value="" selected disabled hidden>(select one option)</option>
                                <option value="GCE-A/L"><b>GCE Advanced Level</b></option>
                                <option value="GCE-O/L"><b>GCE Ordinary Level</b></option>
                                <option value="SecondaryLevel"><b>Secondary Level</b></option>
                                <option value="PrimaryLevel"><b>Primary Level</b></option>
                            </select>
                        </div>
                            
                        <div class="form-group">
                            <label for="exampleInputText" class="form-label">Class Status</label><br>
                            <div class="custom-control custom-radio custom-control-inline">
                              <input type="radio" id="customRadioInline1" value="Active" name="CStatus" class="custom-control-input">
                              <label class="custom-control-label" for="customRadioInline1">Active</label>
                            </div>
                            <div class="custom-control custom-radio custom-control-inline">
                              <input type="radio" id="customRadioInline2" value="Deactive" name="CStatus" class="custom-control-input">
                              <label class="custom-control-label" for="customRadioInline2">Deactive</label>
                            </div>
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
            var type = document.getElementById('type' +i).value;
            var status = document.getElementById('status' +i).value;

            document.getElementById('ECId').value = id;
            document.getElementById('ECName').value = name;
            document.getElementById('ECType').value = type;
            document.getElementById('ECStatus').value = status;
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
            <h1 class="m-0 text-dark">&#9745; <b>Student Page</b></h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="/">Home</a></li>
              <li class="breadcrumb-item active">Student</li>
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
                                <button type="button" class="btn btn-success" data-toggle="modal" data-target="#AddClass">Add New Student</button>
                            </div>
                </div>
                <br>
                <!-- Add Button Part End -->
                <table id="example1" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                    <th scope="col">Index No</th>
                    <th scope="col">Full Name</th>
                    <th scope="col">Gender</th>
                    <th scope="col">Date of birth</th>
                    <th scope="col">Class Name</th>
                    <th scope="col">Status</th>
                    <th style="width:  12%">Action</th>
                  </tr>
                  </thead>
                  <tbody>
                    <?php $k = 0; ?> <!-- identify row number -->
                      @foreach($student as $stu)
                      
                      <tr>
                        <th>{{$stu->index_no}}</th>
                        <th>{{$stu->student_name}}</th>
                        <th>{{$stu->gender}}</th>
                        <th>{{$stu->dob}}</th>
                        <th>{{$cl->class_name}}</th>
                        <th>{{$stu->student_status}}</th>
                        
                        <td>
                          <input type="hidden" id="index_no<?php echo $k; ?>" value="{{$stu->index_no}}">
                          <input type="hidden" id="student_name<?php echo $k; ?>" value="{{$stu->student_name}}">
                          <input type="hidden" id="gender<?php echo $k; ?>" value="{{$stu->gender}}">
                          <input type="hidden" id="dob<?php echo $k; ?>" value="{{$stu->dob}}">
                          <input type="hidden" id="dob<?php echo $k; ?>" value="{{$cl->class_name}}">
                          <input type="hidden" id="student_status<?php echo $k; ?>" value="{{$stu->student_status}}">
                            
                            <button type="button" class="btn btn-danger btn-sm" data-toggle="modal" data-target="#DeleteClass">Delete</button>
                            <button type="button" class="btn btn-primary btn-sm" data-toggle="modal" onclick="edit(<?php echo $k; ?>)" data-target="#EditClass">Edit</button>
                        </td>
                      </tr>
                      <?php $k++; ?>
                        <!-- Delete Conformation Model Start -->
                        <div class="modal fade" id="DeleteClass">
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
                                      <button type="button" class="btn btn-default" data-dismiss="modal">No</button>
                                      <a  href="{{route('delete',$stu->index_no)}}" class="btn btn-danger">Yes</a> <!-- $stu->id = passing variable-->
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
                    <th scope="col">Index No</th>
                    <th scope="col">Full Name</th>
                    <th scope="col">Gender</th>
                    <th scope="col">Date of birth</th>
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

  <!-- footer contant Start -->
  <footer class="main-footer">
    <strong>Copyright &copy; 2020-2021 <a href="#">Reselect.info</a>.</strong>
    All rights reserved.
    <div class="float-right d-none d-sm-inline-block">
      <b>Version</b> 0.1.2
    </div>
  </footer>
  <!-- footer contant End -->

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
<!-- overlayScrollbars -->
<script src="{{asset('template')}}/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>
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

  <script>
  $(function () {
    //Initialize Select2 Elements
    $('.select2').select2()

    //Initialize Select2 Elements
    $('.select2bs4').select2({
      theme: 'bootstrap4'
    })

    //Datemask dd/mm/yyyy
    $('#datemask').inputmask('dd/mm/yyyy', { 'placeholder': 'dd/mm/yyyy' })
    //Datemask2 mm/dd/yyyy
    $('#datemask2').inputmask('mm/dd/yyyy', { 'placeholder': 'mm/dd/yyyy' })
    //Money Euro
    $('[data-mask]').inputmask()

    //Date range picker
    $('#reservationdate').datetimepicker({
        format: 'L'
    });
    //Date range picker
    $('#reservation').daterangepicker()
    //Date range picker with time picker
    $('#reservationtime').daterangepicker({
      timePicker: true,
      timePickerIncrement: 30,
      locale: {
        format: 'MM/DD/YYYY hh:mm A'
      }
    })
    //Date range as a button
    $('#daterange-btn').daterangepicker(
      {
        ranges   : {
          'Today'       : [moment(), moment()],
          'Yesterday'   : [moment().subtract(1, 'days'), moment().subtract(1, 'days')],
          'Last 7 Days' : [moment().subtract(6, 'days'), moment()],
          'Last 30 Days': [moment().subtract(29, 'days'), moment()],
          'This Month'  : [moment().startOf('month'), moment().endOf('month')],
          'Last Month'  : [moment().subtract(1, 'month').startOf('month'), moment().subtract(1, 'month').endOf('month')]
        },
        startDate: moment().subtract(29, 'days'),
        endDate  : moment()
      },
      function (start, end) {
        $('#reportrange span').html(start.format('MMMM D, YYYY') + ' - ' + end.format('MMMM D, YYYY'))
      }
    )

    //Timepicker
    $('#timepicker').datetimepicker({
      format: 'LT'
    })
    
    //Bootstrap Duallistbox
    $('.duallistbox').bootstrapDualListbox()

    //Colorpicker
    $('.my-colorpicker1').colorpicker()
    //color picker with addon
    $('.my-colorpicker2').colorpicker()

    $('.my-colorpicker2').on('colorpickerChange', function(event) {
      $('.my-colorpicker2 .fa-square').css('color', event.color.toString());
    });

    $("input[data-bootstrap-switch]").each(function(){
      $(this).bootstrapSwitch('state', $(this).prop('checked'));
    });

  })
</script>

<!-- Alert Part End -->
<!-- page script Part End-->
</body>
</html>
