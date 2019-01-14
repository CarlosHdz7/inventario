<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://fonts.googleapis.com/css?family=Roboto+Condensed:300,400" rel="stylesheet">
    <!-- <link rel="stylesheet" href="<?php //echo RUTA_URL?>/css/styles.css"> -->
    
    <title><?php echo $datos['titulo']; ?></title>
    <style>
        body,html{
            width:100%;
            height:100vh;
            background-color: #eceff1;
            font-family: 'Roboto Condensed', sans-serif;
            display:flex;
            align-items:center;
            justify-content:center;
            flex-direction: column;
            font-weight:400;
        }
        h1,h3{
            margin:0;
            color:#263238;
        }
        h1{
            font-size:60px;
        }
        h3{
            font-size:30px;
            font-weight:300;
        }
    </style>
</head>
<body>
    <h1>PHP MVC</h1>
    <h3>Framework</h3>
</body>
</html>