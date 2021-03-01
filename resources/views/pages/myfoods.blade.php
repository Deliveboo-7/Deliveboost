<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>My Foods</title>

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
        .titleMyFoods {
            background-color: yellow;
            height: 100px;
        }
        .restProfile {
            background-color: orange;
            height: 200px;
            display: flex;
            justify-content: space-around;
        }

        .restButton {
            background-color: red;
            /*border: 1px black solid;*/
            height: 100px;
        }
        .addDish {
            background-color: grey;

        }

        .listItem {
            border: 2px dotted black;

        }

        .listItem * {
            text-align: center;
            border: 1px solid red;
        }


    </style>
</head>
<body>
    <div class="container-fluid">
        <header class="row"> <div class="col-sm-12">header</div> </header>
        <div class="container-fluid center">
            <div class="row">
                <div class="titleMyFoods col-sm-12 mb-4">
                    <h1>I miei piatti</h1>
                </div>

            </div>

            <div class="row">
                <div class="addDish col-sm-8 offset-sm-2 col-md-6 offset-md-3 col-lg-4 offset-lg-4 mb-4">
                    Inserisci un nuovo piatto
                </div>
            </div>


            <div class="dishesList">
                <div class="row listItem mb-4">
                    <div class="name col-sm-12 col-lg-2">name</div>
                    <div class="desc col-sm-12 col-lg-5">desc</div>
                    <div class="price col-sm-4 col-lg-1">price</div>
                    <div class="type col-sm-4 col-lg-1">type</div>
                    <div class="visible col-sm-4 col-lg-1">visible</div>
                    <div class="edit col-sm-12 col-lg-2">edit</div>
                </div>

                <div class="row listItem mb-4">
                    <div class="name col-sm-12 col-lg-2">name</div>
                    <div class="desc col-sm-12 col-lg-5">desc</div>
                    <div class="price col-sm-4 col-lg-1">price</div>
                    <div class="type col-sm-4 col-lg-1">type</div>
                    <div class="visible col-sm-4 col-lg-1">visible</div>
                    <div class="edit col-sm-12 col-lg-2">edit</div>
                </div>


                <div class="row listItem mb-4">
                    <div class="name col-sm-12 col-lg-2">name</div>
                    <div class="desc col-sm-12 col-lg-5">desc</div>
                    <div class="price col-sm-4 col-lg-1">price</div>
                    <div class="type col-sm-4 col-lg-1">type</div>
                    <div class="visible col-sm-4 col-lg-1">visible</div>
                    <div class="edit col-sm-12 col-lg-2">edit</div>
                </div>



            </div>

            <div class="row">
                <div class="addDish col-sm-8 offset-sm-2 col-md-6 offset-md-3 col-lg-4 offset-lg-4 mb-4">
                    Inserisci un nuovo piatto
                </div>
            </div>





        </div>
        <footer class="row"> <div class="col-sm-12">footer</div> </footer>
       
    </div>
    
</body>
</html>
