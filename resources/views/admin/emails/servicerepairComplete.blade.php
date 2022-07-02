<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>User Job Complete E-mail</title>
</head>
<body>

    <h3>Your job {{ $servicerepair->code}} complete!!!</h4>


        <p>Dear {{ $servicerepair->users->fname}} {{ $servicerepair->users->lname}},</p>

        <p> Your id: {{ $servicerepair->users->idno}}. </p>
        <p> Your bike details:<ul><li> {{ $servicerepair->customervehicle->register_number }} </li> </ul>
            <ul><li> {{ $servicerepair->customervehicle->brand->name}} {{ $servicerepair->customervehicle->bike->name}}.</li> </ul> </p>
            
            <p> Thank you </p>
</body>
</html>