<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Report</title>
</head>
<body>
    <p align = "center">Class: <b>{{$class}}</b> &nbsp;&nbsp;&nbsp; Subject: <b>{{$subject}} </b> &nbsp;&nbsp;&nbsp; Term: <b>{{$term}} </b>&nbsp;&nbsp;&nbsp; Year: <b>{{$year}}</b></p>

    <table border = "2px" align = "center" style = "width:450px;">
        <tr>
            <th>Index</th>
            <th>Marks</th>
        </tr>

        @foreach ($report as $rep)
            <tr align = "center">
                <td>{{$rep->index}}</td>
                <td>{{$rep->result}}</td>
            </tr>
        @endforeach
    </table>
</body>
</html>