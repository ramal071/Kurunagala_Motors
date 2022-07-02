<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>User Register E-mail</title>
</head>
<body>
    <h3>Welcome to Kurunagala Motors !!!</h4>

    <h4>First Name: {{ $user->fname }} </h4>
    <h4>Last Name: {{ $user->lname }} </h4>
    <h4>ID Number: {{ $user->idno }} </h4>
    <h4>Email: {{ $user->email }} </h4>
    <h4>Contact: {{ $user->contact }} </h4>
    <h4>Password: password </h4>
</body>
</html>