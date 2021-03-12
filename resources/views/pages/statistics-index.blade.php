<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>My statistics</title>


    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,200;0,300;0,400;0,500;0,700;1,200;1,300;1,400&display=swap" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">

    <!-- Popper Bootstrap-->
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>

    <!-- Fontawsome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.2/css/all.min.css">

    <!-- Load the required client component. -->
    <script src="https://js.braintreegateway.com/web/3.73.1/js/client.min.js"></script>

    <!-- Load Hosted Fields component. -->
    <script src="https://js.braintreegateway.com/web/3.73.1/js/hosted-fields.min.js"></script>
    <!-- Animations -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css"/>

    {{-- chart js --}}
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.4/Chart.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/chart.js@2.8.0"></script>
    
</head>
<body>
    @include('components.header')


    <div class="container-fluid p-0" id="cover-statistics">
        <div class="row no-gutters">
            <div class="cover col-12 d-flex flex-row align-items-center justify-content-center">

                <div class="title text-uppercase">
                    <h1> statistics</h1>
                </div>
            </div>
        </div>
    </div>


    <div class="container  statisticsContainer">
        {{-- <div class="row jumbostats">        
            <h2 class="jumbostats col-4 offset-4 text-gold py-3"> 
                My Stats
            </h2>
        </div> --}}

        <div class="row chartRow">

            <div class="col-12 col-md-8 offset-md-2 pt-3">
                {{-- <p class="prova">PROVA CHART.JS</p>       
                <canvas id="myChart" class="rounded shadow"></canvas> --}}

                <h3 class="title text-gold text-lighter py-3"> Year</h3>
                <hr>
                <canvas id="userChartYear" class="rounded shadow"></canvas>


                <h3 class="title text-gold  text-lighter py-3"> Month </h3>
                <hr>
                <canvas id="userChartMonth" class="rounded shadow"></canvas>

    
                {{-- <p class="prova pt-5">tabella di prova. si vede che prende i dati total_price della tabella orders.</p>
                <canvas id="userChart2" class="rounded shadow"></canvas> --}}
            
                {{-- <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
                <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
                <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
                <script src="https://cdn.jsdelivr.net/npm/chart.js@2.8.0"></script> --}}
    
                {{--  https://welcm.uk/blog/getting-started-with-charts-in-laravel-7 
                    https://www.chartjs.org/docs/latest/charts/bar.html
                    https://laravel.com/docs/7.x/collections#method-pluck
                    https://therichpost.com/laravel-chartjs-with-dynamic-data-working-example/  --}}
            
            
                
            </div>
    
            
        </div>
        

        <script type="application/javascript">
        
            console.log('Hello Stats');



            var chartYear = {
                type: 'line',
                data: {
                    labels:  {!!json_encode($chart->labels)!!} ,
                    datasets: [
                        {
                            label: 'ogni barra è un ordine ricevuto dell utente loggato',
                            backgroundColor: {!! json_encode($chart->colours)!!} ,
                            data:  {!! json_encode($chart->dataset)!!} ,
                            backgroundColor: 'rgba(192,192,192,0.1)',
                            borderColor:'rgba(200, 179, 111, 0.3)',
                            borderWidth:1,
                            pointBackgroundColor: 'rgba(218,165,32,0.4)',
                            pointBorderColor:'rgba(144,144,144,0.4)',
                            pointBorderWidth:1,                       
                            pointRadius: 2
                        
                        },
                    ]
                },
                options: {
                    scales: {
                        yAxes: [{
                            display: true,
                            ticks: {
                                beginAtZero: true
                            }
                        }]
                    }
                }
            }  
            //------------------------------------------
            var chartMonth = {
                type: 'bar',
                data: {
                    labels:  {!!json_encode($chartMonth->labels)!!} ,
    
                    datasets: [
                        {
                            label: 'Month',
                            backgroundColor: {!! json_encode($chartMonth->colours)!!} ,
                            data:  {!! json_encode($chartMonth->dataset)!!} ,
                            borderColor: 'rgba(192,192,192,0.6)',
                            backgroundColor:'rgba(200, 179, 111, 0.1)',
                            borderWidth:1,
                            pointBackgroundColor: 'rgba(218,165,32,0.4)',
                            pointBorderColor:'rgba(144,144,144,0.4)',
                            pointBorderWidth:1,                       
                            pointRadius: 2
                        },
                    ]
                },
                options: {
                    scales: {
                        yAxes: [{
                            display: true,
                            ticks: {
                                beginAtZero: true   
                            }
                        }]
                    }
                }


            }
            //--------------------------
            var ctxYear = document.getElementById('userChartYear').getContext('2d');
            new Chart(ctxYear, chartYear);  
            //--------------------------


            var ctxMonth = document.getElementById('userChartMonth').getContext('2d');
            new Chart(ctxMonth, chartMonth);  

            
            
            

            /*


            var ctx = document.getElementById('userChart2').getContext('2d');
            var chart = new Chart(ctx, {
                // The type of chart we want to create
                type: 'bar',
                // The data for our dataset
                data: {
                    labels:  {!!json_encode($chart->labels)!!} ,
                //    labels: ['January', 'February', 'March', 'April', 'May', 'June', 'July', 'August', 'September', 'October', 'November', 'December'],
    
                    datasets: [
                        {
                            label: 'PROVA PROVA total_price tabella orders',
                            backgroundColor: {!! json_encode($chart->colours)!!} ,
                            data:  {!! json_encode($chart->dataset)!!} ,
                        },
                    ]
                },
                // Configuration options go here
                options: {
                    scales: {
                        xAxes: [{
                            type: 'time',
                            time: {
                            unit: 'month'
                            }
                        }],
                        // yAxes: [{
                        //     ticks: {
                        //         beginAtZero: true,
                        //         callback: function(value) {if (value % 1 === 0) {return value;}}
                        //     },
                        //     scaleLabel: {
                        //         display: false
                        //     }
                        // }]
                    },
                    legend: {
                        labels: {
                            // This more specific font property overrides the global property
                            fontColor: '#122C4B',
                            fontFamily: "'Muli', sans-serif",
                            padding: 25,
                            boxWidth: 25,
                            fontSize: 14,
                        }
                    },
                    layout: {
                        padding: {
                            left: 10,
                            right: 10,
                            top: 0,
                            bottom: 10
                        }
                    }
                }
            }); 
            */
        </script>

    
    </div>

    {{-- 
        
        possibili charts -> tutte legate al singolo ristoratore  
        
            1) totale incassi ristorante(y) -  mesi e/o anni (x)

            2) incassi singolo piatto(y) - mesi e/o anni (x)





            esempio di asse x con data

                    xAxes: [{
                        type: 'time',
                        time: {
                        unit: 'month',
                        displayFormats: {
                            month: 'MMM YYYY'
                        }
                        }
                    }],



                    xAxes: [{
                        type: 'time',
                        position: 'bottom',
                        time: {
                            displayFormats: {'day': 'MM/YY'},
                            tooltipFormat: 'DD/MM/YY',
                            unit: 'month',
                        }
                    }],
        
    --}}


    @include('components.footer')

    {{-- <script src="{{ asset('js/app.js') }}"></script>  --}}
    {{-- serve? --}}
    
    
</body>
</html>
























{{-- @extends('layouts.app') --}}

{{-- @section('content') --}}
{{-- <div class="container statisticsContainer pt-3">
    <p class="prova">PROVA CHART.JS</p>

    <p class="prova">ALTRA PROVA CHART.JS</p>

    <canvas id="myChart" class="rounded shadow"></canvas>

    {{-- <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/chart.js@2.8.0"></script> --}}


    {{-- <script type="application/javascript">

        var ctx = document.getElementById('myChart').getContext('2d');
        var chart = new Chart(ctx, {
            // The type of chart we want to create
            type: 'line',

            // The data for our dataset
            data: {
                labels: ['January', 'February', 'March', 'April', 'May', 'June', 'July', 'ueueu'],
                datasets: [{
                    label: 'My First dataset',
                    backgroundColor: 'rgb(255, 99, 132)',
                    borderColor: 'red',
                    data: [0, 60, 15, 2, 20, 30, 45, 30]
                }]
            },

            // Configuration options go here
            options: {}
        });

        /*  var ctx = document.getElementById('userChart').getContext('2d');
            var chart = new Chart(ctx, {
                // The type of chart we want to create
                type: 'bar',
            // The data for our dataset
                data: {
                    labels:  {!!json_encode($chart->labels)!!} ,
                    datasets: [
                        {
                            label: 'Count of ages',
                            backgroundColor: {!! json_encode($chart->colours)!!} ,
                            data:  {!! json_encode($chart->dataset)!!} ,
                        },
                    ]
                },
            // Configuration options go here
                options: {
                    scales: {
                        yAxes: [{
                            ticks: {
                                beginAtZero: true,
                                callback: function(value) {if (value % 1 === 0) {return value;}}
                            },
                            scaleLabel: {
                                display: false
                            }
                        }]
                    },
                    legend: {
                        labels: {
                            // This more specific font property overrides the global property
                            fontColor: '#122C4B',
                            fontFamily: "'Muli', sans-serif",
                            padding: 25,
                            boxWidth: 25,
                            fontSize: 14,
                        }
                    },
                    layout: {
                        padding: {
                            left: 10,
                            right: 10,
                            top: 0,
                            bottom: 10
                        }
                    }
                }
            });           
        */
    </script> --}}
    
{{-- </div> --}}
{{-- @endsection --}}