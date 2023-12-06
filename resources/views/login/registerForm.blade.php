<html lang="en">

<head>

    <title></title>

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">

    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>

</head>
<style>
      span.error {
        color: red;
    }
</style>



<body>

    <div class="container" style="margin-top: 50px">

        <div class="col-md-8 col-md-offset-2">

            <div class="panel panel-default">

                <div class="panel-heading">Register</div>



                <div class="panel-body">

                    <div class="alert">

                    </div>
                    <form class="form-horizontal" method="POST" action="{{ url('/api/register') }}">



                        <div class="form-group">

                            <label for="fName" class="col-md-4 control-label">First Name</label>



                            <div class="col-md-6">

                                <input id="fName" type="text" class="form-control" name="fName" value="{{ old('fName') }}">
                                <span class="error fName_err"></span>


                            </div>

                        </div>


                        <div class="form-group">

                            <label for="lName" class="col-md-4 control-label">Last Name</label>
                       


                            <div class="col-md-6">

                                <input id="lName" type="text" class="form-control" name="lName" value="{{ old('lName') }}">
                                <span class="error lName_err"></span>

                            </div>

                        </div>


                        <div class="form-group">

                            <label for="email" class="col-md-4 control-label">Phone No</label>



                            <div class="col-md-6">

                                <input id="phone" type="text" class="form-control" name="phone" value="{{ old('phone') }}">
                                <span class="error phone_err"></span>

                            </div>

                        </div>




                        <div class="form-group">

                            <label for="email" class="col-md-4 control-label">E-Mail Address</label>



                            <div class="col-md-6">

                                <input id="email" type="text" class="form-control" name="email" value="{{ old('email') }}">
                                <span class="error email_err"></span>

                            </div>

                        </div>



                        <div class="form-group">

                            <label for="password" class="col-md-4 control-label">Password</label>



                            <div class="col-md-6">

                                <input id="password" type="password" class="form-control" name="password">
                                <span class="error password_err"></span>




                            </div>

                        </div>



                        <div class="form-group">

                            <label for="password" class="col-md-4 control-label">Captcha</label>



                            <div class="col-md-6 mb-3">

                                <div class="captcha">

                                    <span>{!! captcha_img('math') !!}</span>


                                    <button type="button" class="btn btn-success btn-refresh"><i class="fa fa-refresh"></i></button>

                                </div><br>

                                <input id="captcha" type="text" class="form-control" placeholder="Enter Captcha" name="captcha">
                                <span class="error captcha_err"></span>




                            </div>

                        </div>



                        <div class="form-group">

                            <div class="col-md-8 col-md-offset-4">

                                <button type="submit" class="btn btn-primary">

                                    Submit

                                </button>

                            </div>

                        </div>

                    </form>

                </div>

            </div>

        </div>

    </div>

    <script type="text/javascript">
        $(".btn-refresh").click(function() {

            $.ajax({

                type: 'GET',

                url: '/api/refresh_captcha',

                success: function(data) {

                    $(".captcha span").html(data.captcha);

                }

            });

        });

        $("form").submit(function(event) {

            event.preventDefault(); // Prevent the default form submission

            $.ajax({
                type: 'POST',
                url: 'http://127.0.0.1:8000/api/register',
                data: $(this).serialize(),
                success: function(response) {
                    // Check if the response has a success message
                    
                    if (response.message) {
                        // Display the success message
                        $(".alert").html('<div class="alert alert-success">' + response.message + '</div>');
                    }
                    else{
                        printErrorMsg(response);
                    }
                },
                // error: function(error) {
                //     // Handle errors if needed
                //     // console.error('Error:', error);
                //     $(".alert").html('<div class="alert alert-danger">' + error + '</div>');
                // }
            });
            function printErrorMsg(msg){
                console.log(msg);
                $.each(msg,function(key, value){

                    $('.'+key+'_err').text(value);
                    
                });
            }


        });

    </script>



</body>


</html>