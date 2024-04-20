<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <title>Email Template</title>
</head>
<body>
    <div class="container">
        <h2>{{$dataReceived['subject']}}</h2>
        <p>{{ $dataReceived['message'] }}</p>
    </div>
</body>
</html>