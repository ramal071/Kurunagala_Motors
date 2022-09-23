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
        <p>Dear custmer,</p>
        <p>You are now our registered customer.</p>
    <br>
        <p><ul><li>First Name: {{ $user->fname }} </li></ul> </p>
        <p><ul><li>Last Name: {{ $user->lname }}  </li></ul></p>
        <p><ul><li>ID Number: {{ $user->idno }}  </li></ul></p>
        <p><ul><li>Email: {{ $user->email }}  </li></ul></p>
        <p><ul><li>Contact: {{ $user->contact }}  </li></ul></p>
        <p><ul><li>Password: password  </li></ul></p>

        <p> Thank you </p>
        <p> Manager - Kurunagala Motors </p>
</body>
</html>