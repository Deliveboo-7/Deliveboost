<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Dashboard</title>

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css" integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous">


    <style>
        * {
        margin: 0;
        padding: 0;
        box-sizing: border-box;
        }
        body {background-color: green}
        .container {
            background-color: purple;
           
        }
        header {
            height: 50px;
            background-color: pink;
        }
        footer {
            height: 50px;
            background-color: lightblue;
        }
        .center {
            min-height: calc(100vh - 100px);
            background-color: aqua;
        }
        .restCover {
            background-color: yellow;
            height: 300px;
        }
        .restProfile {
            background-color: orange;
            height: 200px;
            display: flex;
            justify-content: space-around;
        }

        .restButton {
            background-color: red;
            border: 1px black solid;
            height: 100px;
        }


    </style>
</head>
<body>
    <div class="container-fluid">
        <header class="row"> <div class="col-sm-12">header</div> </header>
        <div class="container-fluid center">
            <div class="row">
                <div class="restCover col-sm-12">
                    <h1>cover immagine</h1>
                </div>

            </div>

            <div class="row">
                <div class="restProfile col-md-12 col-lg-3">
                    <h5>info ristorante</h5>
                    <ul>
                        <li>sfddsfsdfds</li>
                        <li>sfddsfsdfds</li>
                        <li>sfddsfsdfds</li>
                        <li>sfddsfsdfds</li>

                    </ul>


                </div>
                <div class="restButton col-sm-8 offset-sm-2 col-md-6 offset-md-3 col-lg-3 offset-lg-0">1</div>
                <div class="restButton col-sm-8 offset-sm-2 col-md-6 offset-md-3 col-lg-3 offset-lg-0">2</div>
                <div class="restButton col-sm-8 offset-sm-2 col-md-6 offset-md-3 col-lg-3 offset-lg-0">3</div>


            </div>

        </div>
        <footer class="row"> <div class="col-sm-12">footer</div> </footer>
       
    </div>
    
</body>
</html>
