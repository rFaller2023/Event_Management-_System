<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registration Form</title>
    <link rel="stylesheet" type="text/css" href="register.css">

</head>
<body>
    <div class="container">
        <h2>Register</h2>
        <form id="registerForm" method="Post">
            @csrf
            <div id="message" style="color: red"></div>
            {{-- <div class="form-group">
                <label for="role">Role:</label>
                <select name="role_id" id="role" required>
                    <option value="">Select a Role</option>
                    @foreach($roles as $role)
                        <option value="{{ $role->id }}">{{ $role->name }}</option>
                    @endforeach
                </select>
            </div> --}}
        
            <div class="form-group">
                <label for="name">Name:</label>
                <input type="text" id="name" name="name" required>
            </div>
            <div class="form-group">
                <label for="email">Email:</label>
                <input type="email" id="email" name="email" required>
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

            fetch('/api/register', {
            method: 'POST',
            body: formData,
            headers: {
               
                'Accept' : 'application/json',
            }
        }).then(response => response.json())
        .then(data => {
           if(data.message == 'User Created Successfully') {
            window.location.href = '/home';
           }else{
            document.getElementById('message').innerHTML = data.message;
           }
        })
        });

    </script>
</body>
</html>
