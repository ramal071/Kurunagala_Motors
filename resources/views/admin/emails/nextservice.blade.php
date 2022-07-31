<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>User Next service remind E-mail</title>
</head>
<body>

            <p> Your amount: {{ $customerpendingservice->service->name}}. </p>
            <p> Your paid amunt: {{ $customerpendingservice->next_date}}. </p>
            <p> Your pending payment: {{ $customerpendingservice->reminder_date }}. </p>
            
            <p> Thank you </p>
</body>
</html>