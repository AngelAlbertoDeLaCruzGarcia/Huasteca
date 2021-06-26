<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body style="text-align: center; background-color:#c4edf3;">

    <img
        height="200"
        width="250"
        src='https://saltant-stings.000webhostapp.com/Logo.jpeg'
        />
    <h2>Ingresa el codigo de seguridad</h2>
    <p>Bienvenido <strong>{{$datos->nombre}}</strong>, este dato es solo para ingresar a la cuenta, nadie de Indumentarias de la Huasteca le va a pedir el codigo</p>
    <p><strong>{{$datos->cadena}} </strong></p>
    <p>Codigo valido solo por 25 minutos.</p>
</body>
</html>
