<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registration Form</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
        }
        .container {
            background: #fff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0,0,0,0.1);
            width: 300px;
        }
        h2 {
            margin-bottom: 20px;
            font-size: 24px;
            text-align: center;
        }
        .form-group {
            margin-bottom: 15px;
        }
        .form-group label {
            display: block;
            margin-bottom: 5px;
        }
        .form-group input {
            width: 100%;
            padding: 8px;
            box-sizing: border-box;
            border: 1px solid #ddd;
            border-radius: 4px;
        }
        .form-group input:focus {
            border-color: #007bff;
            outline: none;
        }
        .form-group button {
            width: 100%;
            padding: 10px;
            background-color: #007bff;
            border: none;
            color: #fff;
            border-radius: 4px;
            cursor: pointer;
            font-size: 16px;
        }
        .form-group button:hover {
            background-color: #0056b3;
        }
    </style>
</head>
<body>
    <div class="container">
        <h2>Register</h2>
        <form id="registerForm" method="post">
            @csrf
            <div id="message" style="color: red"></div>
            <div class="form-group">
                <label for="firstName">Name:</label>
                <input type="text" id="firstName" name="name" required>
            </div>
            <div class="form-group">
                <label for="lastName">Email:</label>
                <input type="email" id="lastName" name="email" required>
            </div>
            <div class="form-group">
                <label for="password">Password:</label>
                <input type="password" id="password" name="password" required minlength="8">
            </div>
            <div class="form-group">
                <button type="submit">Register</button>
            </div>
        </form>
    </div>
    <script>
        document.getElementById('registerForm').addEventListener('submit', function(event){
            event.preventDefault();

            const formData = new FormData(this);

            fetch('/api/register', function(){
            method: 'POST',
            body: formData,
            headers: {
                'Content-Type': 'application/json',
                accept: 'application/json',
            }
        }).then(response => response.json())
        .then(data => {
           if(data.message == 'registered successfully') {
            window.location.href = '/dashboard';
           }else{
            document.getElementById('message').innerHTML = data.message;
           }
        })
        });

    </script>
</body>
</html>
