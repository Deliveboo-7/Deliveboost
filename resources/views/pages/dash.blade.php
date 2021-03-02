<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Dashboard</title>

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css" integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.2/css/all.min.css">

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
            display: flex;
            justify-content: space-around;
        }

        .restButton {
            background-color: red;
            border: 1px black solid;
            display: flex;
            justify-content: center;
            flex-direction: column;
            /* align-content: center; */
            align-items: center;
        }

        .restButton img{
            width: 80px;
            height: 80px;
        }

    
        @media (min-width: 576px) { 

            .restButton img{
                width: 100px;
                height: 100px;
            }
        }

        @media (min-width: 768px) { 
            
            .restButton img{
                width: 150px;
                height: 150px;
            }
        }

        @media (min-width: 992px) { 
            
            .restButton img{
                width: 200px;
                height: 200px;
            }
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

                <div class="restButton col-4 col-lg-3">
                    <img src="https://marigoldmaison.com/wp-content/uploads/Indian-Cuisine.jpg" alt=""><br>
                    <div>
                        <i class="fas fa-utensils"></i>
                        <span>My foods</span>
                    </div>
                </div>
                <div class="restButton col-4 col-lg-3">
                    <img src="https://ae01.alicdn.com/kf/Hcd8da9fa129d41a3a7f7e8435edb094co/MBBITL-Slide-Check-Rack-Kitchen-Bill-Orders-Holder-Ticket-Grabber-Aluminium-Wall-Mountable-Tab-for-Restaurant.jpg" alt=""><br>
                    <div>
                        <i class="fas fa-sort-amount-down-alt"></i>
                        <span>My orders</span>
                    </div>
                    
                    
                </div>
                <div class="restButton col-4 col-lg-3">
                    <img src="https://h5p.org/sites/default/files/styles/medium-logo/public/logos/chart-icon-color.png?itok=kpLTYHHJ" alt=""><br>
                    <div>
                        <i class="fas fa-chart-pie"></i>
                        <span>My stats</span>
                    </div>
                </div>
            </div>

        </div>
        <footer class="row"> <div class="col-sm-12">footer</div> </footer>
       
    </div>
    
</body>
</html>
