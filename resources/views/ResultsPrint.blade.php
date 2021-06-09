<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Results | Reselect</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta name="viewport" content="width=device-width, initial-scale=1">
<!-- CSS Start -->
  <!-- Font Awesome -->
  <link rel="stylesheet" href="{{asset('template')}}/plugins/fontawesome-free/css/all.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- icheck bootstrap -->
  <link rel="stylesheet" href="{{asset('template')}}/plugins/icheck-bootstrap/icheck-bootstrap.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="{{asset('template')}}/dist/css/adminlte.min.css">
  <!-- Preloader CSS -->
  <link rel="stylesheet" href="{{asset('template')}}/plugins/preloader/preloader.css">
  <!-- Toastr (Message) -->
  <link rel="stylesheet" href="{{asset('template')}}/plugins/toastr/toastr.min.css">
  <!-- Google Font: Source Sans Pro -->
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
<!-- CSS END -->
  <!-- Style Start -->
    <style>
    .myDiv {
      
      background-color: lightblue;
 
    }
    .footer {
      text-align: center;
      color: #3d3d3d;
    }
    .bgc {
      background-color: #E6E6FA
    }
    </style>
  <!-- Style End -->
</head>

  <body class="bgc hold-transition sidebar-mini layout-fixed layout-navbar-fixedy layout-footer-fixed layout-navbar-fixed">
  <div align="center" class="">
      <!-- ***** Preloader Start ***** -->
      <div div id="preloader">
          <div class="jumper">
              <div></div>
              <div></div>
              <div></div>
          </div>
      </div>  
      <!-- ***** Preloader End ***** -->

      <div class="">
        <div class="login-logo">
          <a href=""><b>GET</b> RESULTS</a>
        </div>

        <form action="/stresult" method="post" class="modal-content modal-dialog modal-lg card-body">
          @csrf
          <br>
          <div class="row">
            <!-- class -->
            <div class="col-sm-4">
              <label>Your Index</label>
              <input type="number" name = "index" class="form-control"><br>
            </div>
            <!-- Year -->
            <div class="col-sm-4">
              <label>Select a Year</label>
              <select class="form-control select2" name="year" data-placeholder="Select an option">
                    <option value="" selected disabled hidden>(select an option)</option>
                  
                    <option value="2019">2019</option>
                    <option value="2020">2020</option>
                    <option value="2021">2021</option>
                  
              </select>
              
            </div>
            <!-- Tearm -->
            <div class="col-sm-4">
              <label>Select a Tearm</label>
              <select class="form-control select2" name="term" data-placeholder="Select an option">
                    <option value="" selected disabled hidden>(select an option)</option>
                  
                    <option value="1st Term">1st Term</option>
                    <option value="2nd Term">2nd Term</option>
                    <option value="3rd Term">3rd Term</option>
                  
              </select>
              <div class="modal-footer">
                <button type="button" class="btn btn-outline-dark">Home</button>
                <button type="submit" class="btn btn-outline-primary">Search</button>
              </div>
            </div>
          </div>
        </form> 
            @if($result = session()->get('result'))
                <h5 align="gestify"><b>Index No: </b> {{session()->get('index')}}</h5>
                <h5 align="gestify"><b>Name: </b>{{session()->get('name')}}</h5>
                <h5 align="gestify"><b>Class: </b> {{session()->get('class')}}</h5>

                <table  class="table table-bordered table-striped modal-content modal-dialog card-body">
                <tr>
                    <th>Subject</th>
                    <th>Marks</th>
                    <th>Grade</th>
                </tr>
                  @foreach($result as $re)
                      <tr>
                          <td class="col-md-4">{{$re->subject}}</td>
                          <td class="col-md-4">{{$re->result}}</td>
                          <td class="col-md-4">
                              @if($re->result >= 75)
                              <p><b>A</b></p>
                              @elseif($re->result >= 65)
                              <p><b>B</b></p>
                              @elseif($re->result >= 55)
                              <p><b>C</b></p>
                              @elseif($re->result >= 35)
                              <p><b>S</b></p>
                              @else
                              <p><b>F</b></p>
                              @endif

                          </td>
                      </tr>
                  @endforeach
                      <tr>
                        <td colspan="3">
                        <a href="invoice-print.html" target="_blank" class="btn btn-default"><i class="fas fa-print"></i> Print</a>                        
                        <button type="button" class="btn btn-primary float-right" style="margin-right: 5px;">
                          <i class="fas fa-download"></i> PDF
                        </button>
                        </td>
                      </tr>
                </table>

                        

            @endif
      </div>
  </div>

      <div class="modal-content modal-dialog modal-lg card-body"> 
        <div class=""> 
        <!-- footer contant Start -->
        <footer class="footer">
          <div class="card">
            <div class="float-left ">
            <strong>Copyright &copy; 2020-2021 <a href="#">Reselect.info</a>.</strong>
            All rights reserved.
            </div>
            <div class="float-right d-none d-sm-inline-block">
              <a href="#">HAZKY EDITS</a> &nbsp; | &nbsp;
              <b>Version</b> 0.2.2
            </div>
          </div>
        </footer>
        <!-- footer contant End -->
        </div>
      </div>


    
    

    <!-- Script Start -->
      <!-- jQuery -->
      <script src="{{asset('template')}}/plugins/jquery/jquery.min.js"></script>
      <!-- Bootstrap 4 -->
      <script src="{{asset('template')}}/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
      <!-- AdminLTE App -->
      <script src="{{asset('template')}}/dist/js/adminlte.min.js"></script>
      <script src="{{asset('template')}}/plugins/preloader/scrollreveal.min.js""></script>
      <!-- Global Init -->
      <script src="{{asset('template')}}/plugins/preloader/custom.js"></script>
      <!-- Toastr (Message Box) -->
      <script src="{{asset('template')}}/plugins/toastr/toastr.min.js"></script>
    <!-- Script End -->

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
      </div>

      <script type="text/javascript"> 
        window.addEventListener("load", window.print());
      </script>

  </body>
</html>
