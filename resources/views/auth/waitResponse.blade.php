<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<script>
    let data = localStorage.getItem('data');

    if(!data){
        window.location.href = '/login';
    }


</script>
<body>
    <h2>Wait Response</h2>
</body>
</html>
