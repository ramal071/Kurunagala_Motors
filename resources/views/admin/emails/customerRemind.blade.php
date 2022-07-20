<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>User pending payment E-mail</title>
</head>
<body>

    <h3>Your job {{ $servicerepair->code}} pending payment!!!</h4>


        <p>Dear {{ $servicerepair->user->fname}} {{ $servicerepair->user->lname}},</p>

        <p> Your id: {{ $servicerepair->user->idno}}. </p>
        <p> Your bike details:<ul><li> {{ $servicerepair->customervehicle->register_number }} </li> </ul>
            <ul><li> {{ $servicerepair->customervehicle->brand->name}} {{ $servicerepair->customervehicle->bike->name}}.</li> </ul> </p>
        
            <p> Your amount: {{ $servicerepair->amount}}. </p>
            <p> Your paid amunt: {{ $servicerepair->paid_amount}}. </p>
            <p> Your pending payment: {{ $servicerepair->amount - $servicerepair->paid_amount}}. </p>
            
            <p> Thank you </p>
</body>
</html>