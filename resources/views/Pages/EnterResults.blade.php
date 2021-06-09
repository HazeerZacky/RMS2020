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
  <!-- Toastr (Message) -->
  <link rel="stylesheet" href="{{asset('template')}}/plugins/toastr/toastr.min.css">
  <!-- Select2 -->
  <link rel="stylesheet" href="{{asset('template')}}/plugins/select2/css/select2.min.css">
  <link rel="stylesheet" href="{{asset('template')}}/plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="{{asset('template')}}/dist/css/adminlte.min.css">
  <!-- Preloader CSS -->
  <link rel="stylesheet" href="{{asset('template')}}/plugins/preloader/preloader.css">
  <!-- overlayScrollbars -->
  <link rel="stylesheet" href="{{asset('template')}}/plugins/overlayScrollbars/css/OverlayScrollbars.min.css">
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
            <a href="/Dashboard/EnterResults/{{$user->id}}" class="nav-link active">

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

          <li class="nav-item has-treeview">
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
                <a href="/Dashboard/UsersPage/{{$user->id}}" class="nav-link">
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

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">&#9745; <b>Enter Results Page</b></h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="/Dashboard/{{$user->id}}">Home</a></li>
              <li class="breadcrumb-item active">Enter Results</li>
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

             <h4><b>SUBJECT: </b>{{$user->subjectname}}</h4><br>
             <form action="/search" method="post">
                @csrf
                <input type="hidden" name="id" value = "{{$user->id}}">
                <label>Select a Class</label>
                    <select class="form-control select2" name="search" data-placeholder="Select an option">
                        <option value="" selected disabled hidden>(select an option)</option>
                      @foreach ($cs as $c)
                        <option value="{{$c->classname}}">{{$c->classname}}</option>
                      @endforeach
                    </select>

                    <div class="modal-footer">
                      <button type="submit" class="btn btn-primary ">Select</button>
                    </div>
               
             </form>
            </div>
            <!-- /.card -->
  </div>

  
  
  <div class="card">
    <div class="card-body">
        <form id = "form" action  = "/addresult" method = "post" onsubmit ="submitting()">
        @csrf
        @if($cls = session()->get('class'))
        <input type = "hidden" name = "class" value="{{$cls}}"/>
        @endif
          <input type="hidden" name = "name" value = "{{$user->name}}">
          <input  type="hidden" name = "subject" value = "{{$user->subjectname}}"/>
          <div >
            <div >
              <div class="form-group">
                <label>Tearm :</label>
                <select class="form-control" name="term" data-placeholder="Select an option">
                  <option value="" selected disabled hidden>(Select Tearm)</option>
                  <option value="1st Term">1st Term</option>
                  <option value="2nd Term">2nd Term</option>
                  <option value="3rd Term">3rd Term</option>
                </select>
              </div>
            </div>
            <div >
              <div class="form-group">
                <label>Year :</label>
                <select class="form-control" name="year" data-placeholder="Select an option">
                  <option value="" selected disabled hidden>(Select Year)</option>
                  <option value="2019">2019</option>
                  <option value="2020">2020</option>
                  <option value="2021">2021</option>
                </select>
              </div>
            </div>
          </div>
          <div >
            
            <div  style=" float:left; width:40%; margin-right:5%;">
              <div class="form-group">
                <!-- Marks Entering table Start -->
                  @if($msg = session()->get('st'))
                  <label>Marks Enter Table :</label>
                  <table class="table table-bordered table-striped">
                    <tr>
                      <th>Index</th>
                      <th>Name</th>
                      <th>Marks</th>
                    </tr>
                    <?php $z = 0; ?>
                    @foreach ($msg as $s)
                      <tr>
                        <td id="index<?php echo $z; ?>">{{$s->index_no}}</td>
                        <td onclick = "box(<?php echo $z; ?>)" id="name<?php echo $z; ?>">{{$s->student_name}}</td>
                        <td style = "width:60%;">
                            <input class = "btn btn-success btn-sm"type="button" id = "button<?php echo $z; ?>" onclick ="box(<?php echo $z; ?>)" value = "click" style="float:left;">
                            <input type="number" style="display:none; width:30%; float:left;" id="mr<?php echo $z; ?>">
                            <input class = "btn btn-primary btn-sm" id = "but<?php echo $z; ?>" style="display:none; float:left;" type="button" onclick="add(<?php echo $z; ?>)" value="Add">
                        </td>
                      </tr>
                      <?php $z++; ?>
                    @endforeach
                  </table>

                  <!-- Marks Entering table End -->
              </div>
            </div>
            <div style="float:left; width:40%; margin-right:1%;">
              <div class="form-group">
                <input type="hidden" name = "list[]" id = "list" >

                <div class="table table-bordered table-striped" id="div">
                  <!--  -->
                </div>
                <button class="btn btn-success " id="sub" type = "submit" >Send</button>

              </div>
            </div>
          </div>

        </form>

        


    </div>
  </div>
  @endif
  <script type="text/javascript">
  function box(id){
    
    var q = document.getElementById('mr'+id).style.display;
    var p = document.getElementById('but'+id).style.display;
    console.log(q);
    if(q == "none"){
        document.getElementById('mr'+id).style.display = "block";
        document.getElementById('but'+id).style.display = "block";
        document.getElementById('button'+id).value = "Close";
    }else{
       document.getElementById('mr'+id).style.display = "none";
        document.getElementById('but'+id).style.display = "none";
         document.getElementById('button'+id).value = "Click";
    }
  }
  var div = document.getElementById('div');
   window.setInterval( function(){
       var c = div.getElementsByTagName("input").length;
        var z = document.getElementById("sub");
    if (c > 0){
        z.style.display = "block";
    }else{
         z.style.display = "none";
     }
   },10)

  function add(id) {
    var index = document.getElementById('index'+id).innerHTML;
    var marks = document.getElementById('mr'+id).value;
    
    var form = document.getElementById('form');

    if(marks <= 100 && marks > 0 ){
      var input1 = document.createElement("input");
      input1.setAttribute("type","text");
      input1.setAttribute("name","ind"+id);
      input1.setAttribute("id","ind"+id);
      input1.setAttribute("value",index);
      input1.setAttribute("readonly",true);
   
      // input1.setAttribute("style"," width:8%; float:left;");
                                   
      var input2 = document.createElement("input");
      input2.setAttribute("type","number");
      input2.setAttribute("name","mk"+id);
      input2.setAttribute("id","mk"+id);
      input2.setAttribute("value",marks);
      input2.setAttribute("readonly",true);
 
      // input2.setAttribute("style","margin-right:5px; width:5%;");

      var br = document.createElement("br");

       div.appendChild(input1);
       div.appendChild(input2);

        var rem = document.createElement("button");
      
        rem.setAttribute("type", "button");
        // rem.setAttribute("style"," float:right; margin-right:81%; ");
        rem.setAttribute("id", "del"+id);
        rem.setAttribute("value", "Clear");
        
        rem.innerHTML = "Clear";
        rem.setAttribute("onclick", "remove("+id+")");
        div.appendChild(rem);
        div.appendChild(br);
        form.appendChild(div);

         form.appendChild(document.getElementById("sub"));

        document.getElementById('mr'+id).style.display = "none";
        document.getElementById('but'+id).style.display = "none";
         document.getElementById('button'+id).value = "Click";
    }
  }

     function remove(id){
        var a = document.getElementById("ind"+id);
        var b = document.getElementById("mk"+id);
        var c = document.getElementById("del"+id);

        a.remove();
        b.remove();
        c.remove();
    }

    function submitting(){
      var x = div.getElementsByTagName("input").length;
      var arr = Array();
      for(var i = 0 ; i < x ; i++){
          console.log(div.getElementsByTagName("input")[i].value);
          arr[i] = div.getElementsByTagName("input")[i].value;
      }
    document.getElementById('list').value = arr;
    }

  </script>

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
<!-- Toastr (Message Box) -->
<script src="{{asset('template')}}/plugins/toastr/toastr.min.js"></script>
<!-- ====================================      Include Scrips Part End      ========================================= -->



<!-- scrpt Start -->

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
<!-- scrpt End -->
</body>
</html>
