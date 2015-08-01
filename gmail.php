<!DOCTYPE html>
<html>
<head>
<script type="text/javascript">
 
function logout()
{
    gapi.auth.signOut();
    location.reload();
}
function login()
{
  var myParams = {
    'clientid' : '294028178564-ukeab3cvogu4d57bandvppqvfjm03l42.apps.googleusercontent.com',
    'cookiepolicy' : 'single_host_origin',
    'callback' : 'loginCallback',
    'approvalprompt':'force',
    'scope' : 'https://www.googleapis.com/auth/plus.login https://www.googleapis.com/auth/plus.profile.emails.read'
  };
  gapi.auth.signIn(myParams);
}
 
function loginCallback(result)
{
    if(result['status']['signed_in'])
    {
//alert(result);
        var request = gapi.client.plus.people.get(
        {
            'userId': 'me'
        });
  
        request.execute(function (resp)
        {
            var email = '';
            alert(resp['displayName']);
            if(resp['emails'])
            {
                for(i = 0; i < resp['emails'].length; i++)
                {
                    if(resp['emails'][i]['type'] == 'account')
                    {
                        email = resp['emails'][i]['value'];
                    }
                }
            }

            var str = "Name:" + resp['displayName'] + "<br>";
            
            str += "Image:" + resp['image']['url'] + "<br>";
            str += "<img src='" + resp['image']['url'] + "' /><br>";
 
            str += "URL:" + resp['url'] + "<br>";
            str += "Email:" + email + "<br>";
            document.getElementById("profile").innerHTML = str;
        });
 
    }
 
}
function onLoadCallback()
{
    gapi.client.setApiKey('AIzaSyDsPOaE1uhGq8hXk9MoX3sAzDeDj5lSLps');
    gapi.client.load('plus', 'v1',function(){});
}
 
    </script>
 
<script type="text/javascript">
      (function() {
       var po = document.createElement('script'); po.type = 'text/javascript'; po.async = true;
       po.src = 'https://apis.google.com/js/client.js?onload=onLoadCallback';
       var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(po, s);
     })();
</script>
</head>
<body>
<input type="button"  value="Login" onclick="login()" />
<input type="button"  value="Logout" onclick="logout()" />
 
<div id="profile"></div>

 
</body>
</html>


If yoy display Info then in the api part hit url:
https://console.developers.google.com/project/pacific-vault-811/apiui/credential?authuser=0
In the crediationals:

1)Set Api
Dont forget to enable api.

For enabling api go to the google+console and enable it

======================OR=========================================
<html lang="en">
  <head>
    <meta name="google-signin-scope" content="profile email">
    <meta name="google-signin-client_id" content="176786682817-2h97q96los8ekcotoofbos5n1pcqd78u.apps.googleusercontent.com">
    <script src="https://apis.google.com/js/platform.js" async defer></script>
  </head>
  <body>
    <div class="g-signin2" data-onsuccess="onSignIn" data-theme="dark"></div>
    <script>
      function onSignIn(googleUser) {
        // Useful data for your client-side scripts:
        var profile = googleUser.getBasicProfile();
        console.log("ID: " + profile.getId()); // Don't send this directly to your server!
        console.log("Name: " + profile.getName());
        console.log("Image URL: " + profile.getImageUrl());
        console.log("Email: " + profile.getEmail());

        // The ID token you need to pass to your backend:
        var id_token = googleUser.getAuthResponse().id_token;
        console.log("ID Token: " + id_token);
      };
    </script>
  </body>
</html>













