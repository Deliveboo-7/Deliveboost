<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>My Foods</title>

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css" integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.min.js" integrity="sha384-+YQ4JLhjyBLPDQt//I+STsc9iw4uQqACwlvpslubQzn4u2UU2UFM80nGisd026JF" crossorigin="anonymous"></script>



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

        .details {
            display: flex;
            justify-content: space-around;
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

            <div class="dishesList accordion" id="accordionExample">
                <div class="row card listItem mb-4">
                  <div class="card-header col-md-8 offset-md-2 col-lg-6 offset-lg-3" id="headingOne">
                    <h2 class="mb-0">
                      <button class="btn btn-link btn-block text-left" type="button" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                        Name #1
                      </button>

                    </h2>
                  </div>
              
                  <div id="collapseOne" class="collapse show col-md-8 offset-md-2 col-lg-6 offset-lg-3" aria-labelledby="headingOne" data-parent="#accordionExample">
                    <div class="card-body">
                        <div class="desc">Lorem, ipsum dolor sit amet consectetur adipisicing elit. Iure similique pariatur accusamus possimus unde officia sit a mollitia ducimus est molestias modi esse, quae laborum nesciunt qui iusto! Sunt, est!</div>
                        <div class="details" >

                            <div class="price">
                                <h5>Price:</h5>
                                <div>12,99$</div>
                            </div>
                    
                            <div class="type">
                                <h5>Type:</h5>
                                <div>Pizza</div>
                            </div>
                    
                            <div class="visible">
                                <h5>Visible:</h5>
                                <div>Si</div>
                            </div>
                    
                        </div>
                        <button type="button" class="btn btn-dark edit">Edit</button>
                    </div>
                  </div>
                </div>

                {{-- CARD 2 --}}
                <div class="row card listItem mb-4">
                    <div class="card-header col-md-8 offset-md-2 col-lg-6 offset-lg-3" id="headingTwo">
                      <h2 class="mb-0">
                        <button class="btn btn-link btn-block text-left collapsed" type="button" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                          Name #2
                        </button>     
                      </h2>
                    </div>
                
                    <div id="collapseTwo" class="collapse col-md-8 offset-md-2 col-lg-6 offset-lg-3" aria-labelledby="headingTwo" data-parent="#accordionExample">
                      <div class="card-body">
                        <div class="desc">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Numquam impedit dolorem culpa quod sit iure voluptatibus! Laborum pariatur dolorum eum repudiandae, commodi, placeat similique nam fugit molestias mollitia, eaque officia?</div>

                        <div class="details" >

                            <div class="price">
                                <h5>Price:</h5>
                                <div>12,99$</div>
                            </div>
                    
                            <div class="type">
                                <h5>Type:</h5>
                                <div>Pizza</div>
                            </div>
                    
                            <div class="visible">
                                <h5>Visible:</h5>
                                <div>Si</div>
                            </div>
                    
                        </div>
                    

                        <button type="button" class="btn btn-dark edit">Edit</button>
                      </div>
                    </div>
                  </div>
            </div>

            <div class="row">
                <div class="addDish col-sm-8 offset-sm-2 col-md-6 offset-md-3 col-lg-4 offset-lg-4 mb-4">
                    Menu pubblico
                </div>
            </div>






        </div>
        <footer class="row"> <div class="col-sm-12">footer</div> </footer>
       
    </div>
    
</body>
</html>
