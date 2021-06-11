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
  
<!-- CSS END -->
  <!-- Style Start -->
    <style>
    .myDiv {
      padding-top:70px;
      background-color: #F0F8FF;
 
    }
    .footer {
      text-align: center;
      color: #3d3d3d;
    }
    .bgc {
      background-color: #E6E6FA
    }
    .table{
        
        align : "center";
        width : 400px;
        margin-left:auto;
        margin-right:auto;
    }
    .title{
        align :Center;
    }
    .table tr th{
        background-color:lightblue;
    }
    </style>
  <!-- Style End -->
</head>

  <body class = "myDiv" >
   
      <!-- ***** Preloader Start ***** -->
       
      <!-- ***** Preloader End ***** -->

      <div >
        <div align="center">
          <h3  href=""><b>GET</b> RESULTS</h3>
        </div>
 <div style = "width:50%; margin-left:25%;margin-right:25%;">
        
            <div align="center" class = "title" >
                <h4 text-align="center"><b>Index No: </b> {{$index}}</h5>
                <h4 text-align="center"><b>Name: </b>{{$name}}</h5>
                <h4 text-align="center"><b>Class: </b> {{$class}}</h5>
            </div>
                <div>

                <table align = "center" border = "1px" class = "table" >
                <tr>
                    <th>Subject</th>
                    <th>Marks</th>
                    <th>Grade</th>
                </tr>
                  @foreach($result as $re)
                      <tr>
                          <td align="center">{{$re->subject}}</td>
                          <td align="center">{{$re->result}}</td>
                          <td align="center">
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
                      
                </table>
                </div>
                <div align = "center">
                <h4>Total Marks: <b>{{$total}}</b></h4>
                    <h4>Average Marks: <b>{{$avg}}</b></h4>
                    <h4>Rank: <b>{{$rank}}</b></h4>
                    </div>
                <br><br><br>

                        

            
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


    
    

   
      </div>
  </body>
</html>
