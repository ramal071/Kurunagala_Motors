<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>User Job Register E-mail</title>
</head>
<body>

    <h3>Welcome to Kurunagala Motors !!!</h4>
        <p>Dear {{ $servicerepair->user->fname}} {{ $servicerepair->user->lname}}({{ $servicerepair->user->idno}}),</p>
        <p> Your job card id: {{ $servicerepair->code}}. </p>
        <p> Your bike details:
            <ul><li> {{ $servicerepair->customervehicle->register_number }} </li></ul>
            <ul><li> {{ $servicerepair->customervehicle->brand->name}} {{ $servicerepair->customervehicle->bike->name}}.</li></ul></p>
            <p> Thank you </p>
            <p> Manager - Kurunagala Motors </p>
            <h4>{{ $servicerepair->created_at}}</h4>
</body>
</html>