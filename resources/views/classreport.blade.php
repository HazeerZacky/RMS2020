<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Class report</title>
</head>
<body style = "padding-top:30px;">
    <p align = "center">Class: <b>{{$class}}</b> &nbsp;&nbsp;&nbsp; Term: <b>{{$term}} </b>&nbsp;&nbsp;&nbsp; Year: <b>{{$year}}</b></p>

    <table border = "2px" align = "center" style = "width:450px;">
        <tr>
            <th>Index</th>
            <th>Total Marks</th>
            <th>Average Marks</th>
            <th>Rank</th>
        </tr>

        <?php
            $c = 1;
         ?>
        @foreach($tot as $ind => $marks)
            <tr align = "center">
                <td>{{$ind}}</td>
                <td>{{$marks}}</td>
                <td>{{$avg[$ind]}}</td>
                <td>{{$c}}</td>
            </tr>
            <?php 
                $c++;
            ?>
        @endforeach

      
    </table>
</body>
</html>