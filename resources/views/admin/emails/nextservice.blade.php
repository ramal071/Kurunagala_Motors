<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>User Next service remind E-mail</title>
</head>
<body>


        <h3>Welcome to Kurunagala Motors !!!</h4>
    
            <p>Dear custmer,</p>
            <p>This is the remind email about your next service registered.
            <ul> <p> Your next service : {{ $customerpendingservice->service->name}}. </p> </ul>
            <ul>  <p> Your service date : {{ $customerpendingservice->next_date}}. </p></ul>
            <ul>  <p> Your reminder date: {{ $customerpendingservice->reminder_date }}. </p></ul>
            
            <p> Thank you </p>
            <p> Manager - Kurunagala Motors </p>
</body>
</html>