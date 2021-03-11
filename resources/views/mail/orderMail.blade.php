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
        {{-- {{dd(get_defined_vars())}} --}}
        <h1>New mail for: {{$email}}</h1>
        <h1>Name: {{$restName}}</h1>
        
        <h2>Good news! You have just received a new order!</h2>

        
        <ul>
            @foreach ($cartList as $dish)

               <li>{{$dish[0]}} - {{$dish[1]}} </li>

            @endforeach
            
        </ul>
    </div>

</body>
</html>