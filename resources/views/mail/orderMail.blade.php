<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    
    <div class="container">
        <h1>New mail for: {{Auth::user() -> company_name}}</h1>

        <h2>Good news! You have just received a new order!</h2>

        <h2>{{$textString}}</h2>
    </div>

</body>
</html>