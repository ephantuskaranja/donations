<!DOCTYPE html>
<html>
<head>
    <title>Donation Reminder Email</title>
</head>
<body>
    <h1>{{ $mailData['title'] }} </h1>
    <p>{{ $mailData['body'] }}</p>
    <p><a href="{{ $mailData['link'] }}">Click here</a></p>
   
    <p>Thank you!</p>
</body>
</html>