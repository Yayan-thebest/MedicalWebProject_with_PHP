
  function encrypt(){
var CryptoJSAesJson = {
stringify: function (cipherParams) {
var j = {ct: cipherParams.ciphertext.toString(CryptoJS.enc.Base64)};
if (cipherParams.iv) j.iv = cipherParams.iv.toString();
if (cipherParams.salt) j.s = cipherParams.salt.toString();
return JSON.stringify(j);
},
parse: function (jsonStr) {
var j = JSON.parse(jsonStr);
var cipherParams = CryptoJS.lib.CipherParams.create({ciphertext: CryptoJS.enc.Base64.parse(j.ct)});
if (j.iv) cipherParams.iv = CryptoJS.enc.Hex.parse(j.iv)
if (j.s) cipherParams.salt = CryptoJS.enc.Hex.parse(j.s)
return cipherParams;
}
}
var pass = document.getElementById("password").value;
var encrypted = CryptoJS.AES.encrypt(JSON.stringify(pass), "PasswordEncryption", {format: CryptoJSAesJson}).toString();
var formData = "encrypted="+encrypted;
alert(document.getElementById("password").value);
$.ajax({
url : "../decrypt_in_php3.php",
type: "POST",
data : formData,
success: function(data)
{
alert(data);
}
});

}
