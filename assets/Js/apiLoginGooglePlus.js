
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
