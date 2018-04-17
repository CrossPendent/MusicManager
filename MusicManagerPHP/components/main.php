<script src='http://pendent.synology.me:5000/webman/sso/synoSSO-1.0.0.js'></script>
<script>
   /** Display login/logout button.
   * Use a html element with id button
   * @param logged boolean, are we logged ?
   */
   function setButton (logged) {
      if (logged) {
         document.getElementById('btnLogin').innerHTML = '<button onclick="SYNOSSO.logout()">Logout</button>';
      } else {
         document.getElementById('btnLogin').innerHTML = '<button onclick="SYNOSSO.login()">Login</button>';
      }
   }
   /** Callback for SSO.
   * Called by init() and login()
   * @param reponse the JSON returned by SSO. See Syno SSO Dev Guide.
   */
   function authCallback(reponse) {
      console.log(JSON.stringify(reponse));
      if (reponse.status == 'login') {
         console.log('logged');
         setButton(true);
      }
      else {
         console.log('not logged ' + reponse.status);
         setButton(false);
      }
   }
   SYNOSSO.init({
		oauthserver_url: 'http://pendent.synology.me:5000',
		app_id: 'ad71e66514fadcd2358ae572cf5a84cc',
		redirect_uri: 'http://pendent.synology.me/music_manager', //redirect url have to be the same as the one registered in SSO server, and can be a plain text html file.
		callback: authCallback
		});
</script>
<p id='btnLogin'></p>
<br><br>
<?php 
$py = '/volume1/Otte_HW/automatic_scripts/music_collector_py/music_collector.py'
?>
<br><br>
<form action="index.php" method="post">
	<p>HWS NAS - SSO</p>
	ID:<input type="text" name="id"><br>
	PASSWORD:<input type="password" name="password"><br>
	<input type="submit">
</form>
<?php 
    $id = $_POST["id"];
    $password = $_POST["password"];
echo "hello, music manager on PHP! 한글지원!!";
?>
