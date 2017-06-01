
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">
<html>
    <head>
        <title>Facebook Registration plugin</title>
        <meta http-equiv="Content-Type" content="text/html; charset=ISO-8859-1"> 
    </head>
    <body>
        <script type="text/javascript">                
            window.fbAsyncInit = function() {
                FB.init({
                  appId      : '1697629560489831',
                  xfbml      : true,
                  version    : 'v2.5'
                });
              };

              (function(d, s, id){
                 var js, fjs = d.getElementsByTagName(s)[0];
                 if (d.getElementById(id)) {return;}
                 js = d.createElement(s); js.id = id;
                 js.src = "//connect.facebook.net/en_US/sdk.js";
                 fjs.parentNode.insertBefore(js, fjs);
               }(document, 'script', 'facebook-jssdk'));
        </script>
        <!-- <div id="add"></div>
        <div id="container">
            <label>User Registration using <span style="color: #5c75a9">Facebook Registration Plugin</span></label><br/>
            <div id="reg_form">                
                <iframe src='http://www.facebook.com/plugins/registration.php?
                        client_id=1697629560489831&
                        redirect_uri=http://localhost:89/yammzit/Yammz/facebookplugin/store_user_data.php&
                        fields=[
                        {"name":"name"},
                        {"name":"email"},
                        {"name":"password"},
                        {"name":"gender"},
                        {"name":"birthday"},
                        {"name":"phone", "description":"Phone Number", "type":"text"}
                        ]'
                        scrolling="auto"
                        frameborder="no"
                        style="border:none"
                        allowTransparency="true"
                        width="500"
                        height="600">
                </iframe>
            </div>
        </div> -->
    </body>
</html>
