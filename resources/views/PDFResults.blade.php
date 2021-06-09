<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Teacher Name</th>
                <th>Year</th>
                <th>Subject</th>
                <th>Class</th>
                <th>Index</th>
                <th>Results</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($resultpdf as $rpdf)
            <tr>
                <td>{{$rpdf->id}}</td>
                <td>{{$rpdf->trname}}</td>
                <td>{{$rpdf->year}}</td>
                <td>{{$rpdf->term}}</td>
                <td>{{$rpdf->subject}}</td>
                <td>{{$rpdf->class}}</td>
                <td>{{$rpdf->index}}</td>
                <td>{{$rpdf->result}}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html>