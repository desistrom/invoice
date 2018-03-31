<!DOCTYPE html>
<html lang="en">
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Gentelella Alela! | </title>

    <!-- Bootstrap -->
    <link href="<?=site_url('assets/jun');?>/vendors/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link href="<?=site_url('assets/jun');?>/vendors/font-awesome/css/font-awesome.min.css" rel="stylesheet">
    <!-- NProgress -->
    <link href="<?=site_url('assets/jun');?>/vendors/nprogress/nprogress.css" rel="stylesheet">
    <!-- Animate.css -->
    <link href="<?=site_url('assets/jun');?>/vendors/animate.css/animate.min.css" rel="stylesheet">

    <!-- Custom Theme Style -->
    <link href="<?=site_url('assets/jun');?>/build/css/custom.min.css" rel="stylesheet">
  </head>

  <body class="login">
    <div>
      <a class="hiddenanchor" id="signup"></a>
      <a class="hiddenanchor" id="signin"></a>

      <div class="login_wrapper">
        <div class="animate form login_form">
          <section class="login_content">
            <form>
              <h1>Login Form</h1>
              <div>
                <div class="error" id="ntf_username"></div>
                <input type="text" class="form-control" placeholder="Username" name="username" required="" />
              </div>
              <div>
                <div class="error" id="ntf_password"></div>
                <input type="password" class="form-control" placeholder="Password" name="password" required="" />
              </div>
              <div class="error" id="ntf_login"></div>
              <div>
                <button class="btn btn-default submit" type="button" id="login">Login</button>
                <a class="reset_pass" href="#">Lost your password?</a>
              </div>

              <div class="clearfix"></div>

              <div class="separator">
                <p class="change_link">New to site?
                  <a href="#signup" class="to_register"> Create Account </a>
                </p>

                <div class="clearfix"></div>
                <br />

                <div>
                  <h1><i class="fa fa-paw"></i> Gentelella Alela!</h1>
                  <p>©2016 All Rights Reserved. Gentelella Alela! is a Bootstrap 3 template. Privacy and Terms</p>
                </div>
              </div>
            </form>
          </section>
        </div>
      </div>
    </div>
    <script src="<?=site_url('assets/jun');?>/vendors/jquery/dist/jquery.min.js"></script>
    <script type="text/javascript">
        $(document).ready(function() {
            $('body').on('click','#login', function(){
                $.ajax({
                    url: window.location.href,
                    type : 'POST',
                    dataType : 'json',
                    data : $('form').serializeArray(),
                    async : false,
                    cache : false ,
                }).done(function(data){
                    console.log(data);
                    if(data.state == 1){
                        if (data.status == 1) {
                            window.location = data.url;
                        }else{
                            $('.error_pass').show();
                            $('.error_pass').css({'color':'red', 'font-style':'italic', 'text-align':'center'});
                            console.log(data);
                            $('.error_pass').html(data.error);
                        }
                    }
                        $.each(data.notif,function(key,value){
                        $('.error').show();
                        $('#ntf_'+ key).html(value);
                        $('#ntf_'+ key).css({'color':'red', 'font-style':'italic'});
                        });
                }).fail(function(xhr, status, error){
                    alert(xhr.responseText);
                });
            });
        });
    </script>
  </body>
</html>