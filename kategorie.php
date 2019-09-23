<?php
if(isset($_GET['action'])){
	$katadd = $_POST['katneu'];
	if(strlen($katadd) <= 2){
		echo ("Kategoriename zu Kurz<br>");
	}
	else{
		mysql_query("INSERT INTO serkat (katid, kat) VALUES ('0','$katadd')");
		sleep(2);
		echo ("Kategorie erstellt<br>");
	}
}

if(isset($_GET['del'])){
	$delete = $_GET['del'];
	mysql_query("DELETE FROM serkat WHERE katid='$delete'");
	sleep(2);
	echo ("Kategorie gelöscht<br>");
}
$katlist = mysql_query("SELECT * FROM serkat");
?>

<form name="form1" method="post" action="?site=kategorie&action=ins">
  <table align="center" width="300" border="0" cellspacing="0" cellpadding="0">
    <tr>
      <td width="130" valign="top">Kategorie erstellen:</td>
      <td width="170" valign="top"><label>
        <input type="text" name="katneu" id="katneu">
      </label></td>
    </tr>
    <tr>
      <td height="30" colspan="2" align="center" valign="middle"><label>
        <input type="submit" name="button" id="button" value="Anlegen">
      </label></td>
    </tr>
  </table>
</form>
<table align="center" width="300" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td colspan="2" align="left" valign="top">Kategorien:</td>
  </tr>
  <tr>
    <td height="10" colspan="2"></td>
  </tr>
  
<?php 
while($kat = mysql_fetch_array($katlist)){
	echo ("<tr><td align=left width=200>".$kat['kat']."</td>");
	echo ("<td align=left width=100><a href=?site=kategorie&del=".$kat['katid'].">Löschen</a></td></tr>");
}
?>
    
    
  
</table>
