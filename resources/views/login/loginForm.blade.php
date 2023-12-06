
<!DOCTYPE html>
<html>
 <head>
  <title>Simple Login System in Laravel</title>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  <style type="text/css">
   .box{
    width:600px;
    margin:0 auto;
    border:1px solid #ccc;
   }
  </style>
 </head>
 <body>
  <br />
  <div class="container box">
   <h3 align="center">Login </h3><br />

  



   <form method="post" action="" id="loginForm">
   @csrf
    <div class="form-group">
     <label>Enter Email</label>
     <input type="email" name="email" class="form-control" id="email" />
    </div>
    <div class="form-group">
     <label>Enter Password</label>
     <input type="password" name="password" class="form-control" id="password" />
    </div>
    <div class="form-group">
     <input type="submit" name="login" class="btn btn-primary" value="Login" id="loginBtn" />
    </div>
   </form>
  </div>
  <script>
        $(document).ready(function () {
            $('#loginBtn').click(function () {
                // console.log('hello');
                var formData = $('#loginForm').serialize();
                console.log(formData);
                 $.ajax({
                    type: 'POST',
                    url: '/api/login', // Adjust the route name
                    data: $('#loginForm').serialize(),
                    success: function (response) {
                        if (response.success) {
                            console.log(response.token);
                            // Save the token to local storage
                            localStorage.setItem('authToken', response.token);

                            // Redirect to a protected page or perform other actions
                            alert('Login successful. Redirecting...');
                            window.location.href = 'http://127.0.0.1:8000/api/dashboard'; // Change the URL as needed
                            
                        } else {
                            alert(response.error);
                            window.location.href = 'http://127.0.0.1:8000/api/login';
                        }
                    },
                    error: function (error) {
                        console.error('Error:', response.error);
                       
                        alert('An error occurred. Please try again.');
                        
                    }
                });
            });
        });
    </script>
 </body>
</html>
