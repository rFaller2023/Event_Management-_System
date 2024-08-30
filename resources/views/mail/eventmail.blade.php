<!DOCTYPE html>
<html>
<head>
    <title>Event Notification</title>
</head>
<body>
    <h1>Hello, {{ $user->name }}</h1>
    <p>A new event has been created:</p>
    <p><strong>{{ $event->name }}</strong></p>
    <p>Description: {{ $event->description }}</p>
    <p>Date: {{ $event->start_time }} - {{ $event->end_time }}</p>
    <p>Thank you for staying with us!</p>
</body>
</html>
