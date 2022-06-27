<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <h1>Grazie {{$user_contact['user']}} per averci scritto</h1>
    <h3>Ti ricontatteremo al piu presto</h3>

    <p>Riepilogo dei dati</p>
    <ul>
        <li>Nome: {{$user_contact['user']}}</li>
        <li>Email: {{$user_contact['email']}}</li>
        <li>Messaggio: {{$user_contact['message']}}</li>
    </ul>
</body>
</html>