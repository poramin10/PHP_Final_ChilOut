<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <meta name="google-signin-scope" content="profile email">
    <meta name="google-signin-client_id" content="YOUR_CLIENT_ID">

    <title>Document</title>

</head>
<style>
.abcRioButtonBlue {
    height: 36px;
    width: 250px !important;
}
</style>

<body>
    <div class="g-signin2" data-onsuccess="onSignIn" data-theme="dark"></div>

    <script src="https://apis.google.com/js/platform.js" async defer></script>
    <script>
        function onSignIn(userInfo) {
            var result = '';

            // Useful data for your client-side scripts:
            var profile = userInfo.getBasicProfile();
            result += "ID: " + profile.getId() + "\n";
            result += "Full Name:  " + profile.getName() + "\n";
            result += "Given Name: " + profile.getGivenName() + "\n";
            result += "Family Name: " + profile.getFamilyName() + "\n";
            result += "Email: " + profile.getEmail() + "\n";
            result += "ID Token: " + userInfo.getAuthResponse().id_token + "\n";
            document.getElementById("result").value = result;
        };
    </script>
</body>

</html>