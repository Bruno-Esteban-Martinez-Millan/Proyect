<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
    <title>Cubo</title>
    <link rel="stylesheet" href="../css/experiment.css" />
    <link rel="stylesheet" href="../css/touch.css" />
    <style type="text/css">
        *{
            margin: 0;
            padding: 0;
            border: 0;
        }
        table{
            margin: 0 auto;
            width: 100%;
        }
        .cuadro{
            border: 1px solid white;
            width: 30%;
            display: inline-block;  
        }
        .face{
            background-color: rgba(0,0,100,0.5);
        }
        .one,.two,.three,.four,.five,.six{
            font-size: 0.8em;
        }
        table{
            text-align: center;
        }
        .borde{
            border: 1px solid white;
            font-size: 0.7em;
            min-width: 45px;
        }
        table td{
            box-sizing: border-box;
            border: 1 solid white;
            padding: 0.6em 0.2em;
        }
        .encabezado{
            background-color: #006;
            padding: 1em;
        }
        .tabla td{
            color: black;
            background-color: #66f;
            padding: 0.5em;
        }
        .six{
            text-align: center;
        }
        .six img{
            max-width: 100%;
        }
        div#matriz th,div#matriz td{
            font-size: 0.2em;
            background-color: red;
        }
    </style>
    <style type="text/css">
        th{
            border: 1px solid white;
            font-size: 0.7em;
        }
    </style>
</head>
<body class="experiment">
<div class="wrapper">
       
<div id="experiment">
    <div id="cube">
        <div class="face one">

        </div>
        <div class="face two">
              
        </div>
        <div class="face three">
            
        </div>
        <div class="face four">
            
        </div>
        <div class="face five">
            
        </div>
        <div class="face six">
            
        </div>
    </div>
</div>

    </div>
    <script src="../js/jquery.min.js"></script>
    <script src="../js/experiment.js"></script>
      <script src="../js/touch.js"></script>
</body>
</html>
