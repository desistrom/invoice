<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<!doctype html>
<html>
    <head>
        <title>Recaptcha Login</title>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css"/>
        <style>
            .login-box{
                width: 300px;
                margin: auto;
                margin-top: 100px;
            }
            .loginBtn {
              box-sizing: border-box;
              position: relative;
              /* width: 13em;  - apply for fixed size */
              margin: 0.2em;
              padding: 0 15px 0 46px;
              border: none;
              text-align: left;
              line-height: 34px;
              white-space: nowrap;
              border-radius: 0.2em;
              font-size: 16px;
              color: #FFF;
            }
            .loginBtn:before {
              content: "";
              box-sizing: border-box;
              position: absolute;
              top: 0;
              left: 0;
              width: 34px;
              height: 100%;
            }
            .loginBtn:focus {
              outline: none;
            }
            .loginBtn:active {
              box-shadow: inset 0 0 0 32px rgba(0,0,0,0.1);
            }


            /* Facebook */
            .loginBtn--facebook {
              background-color: #4C69BA;
              background-image: linear-gradient(#4C69BA, #3B55A0);
              /*font-family: "Helvetica neue", Helvetica Neue, Helvetica, Arial, sans-serif;*/
              text-shadow: 0 -1px 0 #354C8C;
            }
            .loginBtn--facebook:before {
              border-right: #364e92 1px solid;
              background: url('https://s3-us-west-2.amazonaws.com/s.cdpn.io/14082/icon_facebook.png') 6px 6px no-repeat;
            }
            .loginBtn--facebook:hover,
            .loginBtn--facebook:focus {
              background-color: #5B7BD5;
              background-image: linear-gradient(#5B7BD5, #4864B1);
            }


            /* Google */
            .loginBtn--google {
              /*font-family: "Roboto", Roboto, arial, sans-serif;*/
              background: #DD4B39;
            }
            .loginBtn--google:before {
              border-right: #BB3F30 1px solid;
              background: url('https://s3-us-west-2.amazonaws.com/s.cdpn.io/14082/icon_google.png') 6px 6px no-repeat;
            }
            .loginBtn--google:hover,
            .loginBtn--google:focus {
              background: #E74B37;
            }
        </style>
        <?php echo $script_captcha; // javascript recaptcha ?>
    </head>
    <body>
        <div class="login-box">
            <h3>Please Sign In</h3>
            <a href="<?php echo $this->facebook->login_url(); ?>">
            <button class="loginBtn loginBtn--facebook">
              Login with Facebook
            </button>
            </a>
            <a href="<?php echo $loginURL; ?>">
            <button class="loginBtn loginBtn--google">
              Login with Google
            </button>
            </a>
            <form id="form_input" method="post">
              <div class="form-group">
                  <label>Username</label>
                  <input type="text" name="username" class="form-control">
                  <div class="error" id="ntf_username"></div>
              </div>
              <div class="form-group">
                  <label>Password</label>
                  <input type="password" name="password" class="form-control">
                  <div class="error" id="ntf_password"></div>
              </div>
              <div class="form-group">
                  <?php echo $captcha // tampilkan recaptcha ?>
                  <div class="error" id="ntf_captcha"></div>
              </div>
              <div class="form-group">
                  <button type="button" class="btn btn-info btn_submit">Login</button>
              </div>
            </form>
            <div class="error_pass"></div>
        </div>
        <div id="fb-root"></div>
<script>(function(d, s, id) {
  var js, fjs = d.getElementsByTagName(s)[0];
  if (d.getElementById(id)) return;
  js = d.createElement(s); js.id = id;
  js.src = 'https://connect.facebook.net/id_ID/sdk.js#xfbml=1&version=v2.12&appId=117942632203648&autoLogAppEvents=1';
  fjs.parentNode.insertBefore(js, fjs);
}(document, 'script', 'facebook-jssdk'));</script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script type="text/javascript">
  $(document).ready(function(){
    $('body').on('click','.btn_submit',function(){
      console.log($('#form_input').serialize());
      $.ajax({
        url: window.location.href,
        type : 'POST',
        dataType : 'json',
        data : $('#form_input').serializeArray(),
        async : false,
        cache : false ,
    }).done(function(data){
        if(data.state == 1){
            if (data.status == 1) {
                window.location = data.url;
            }else{
                $('.error_pass').show();
                $('.error_pass').css({'color':'red', 'font-style':'italic', 'text-align':'center'});
                console.log(data);
                $('.error_pass').html(data.error);
            }
        }else{
            $.each(data.notif,function(key,value){
            $('.error').show();
            $('#ntf_'+ key).html(value);
            $('#ntf_'+ key).css({'color':'red', 'font-style':'italic'});
            });
        }
    }).fail(function(xhr, status, error){
        alert(xhr.responseText);
    });
    });
  });
</script>
    </body>
</html>
