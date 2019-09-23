<?php 
include("_funk.php");
$katlist = mysql_query("SELECT * FROM serkat");
////////////////////////////////////////////////
$devlist = mysql_query("SELECT * FROM serdev");
?>

<form name="form2" method="post" action="dev.php?site=add&update=1">
<table align="center" width="600" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td colspan="2" valign="top">Bearbeiten</td>
  </tr>
  <tr>
    <td width="121" height="10"></td>
    <td width="479"></td>
  </tr>
  <tr>
    <td align="right" valign="top">Kategorie:</td>
    <td align="left" valign="top"><label>
      <select name="kat" id="kat">
      <option value="2" selected="selected">2</option>
<?php 
while($katform = mysql_fetch_array($katlist)){
	echo ("<option value=".$katform['kat']." >".$katform['kat']."</option>");
}
?>
      </select>
    </label></td>
  </tr>
  <tr>
    <td align="right" valign="top">&nbsp;</td>
    <td align="left" valign="top">&nbsp;</td>
  </tr>
  <tr>
    <td align="right" valign="top">Info:</td>
    <td align="left" valign="top"><textarea name="beschreib" id="beschreib" cols="50" rows="5"></textarea></td>
  </tr>
  <tr>
    <td align="right" valign="top">&nbsp;</td>
    <td align="left" valign="top">&nbsp;</td>
  </tr>
  <tr>
    <td align="right" valign="top">Status:</td>
    <td align="left" valign="top">
      <label>
        <input name="Status" type="radio" id="Status" value="1">
        In Bearbeitung</label>
      <br>
      <label>
<input name="Status" type="radio" id="Status" value="2">
Entfernt</label>
      <br>
      <label>
        <input name="Status" type="radio" id="Status" value="3">
        Fertiggestellt</label>
      <br>
      <input name="Status" type="radio" id="Status" value="4">
        Vorschlag</label>
   </td>
  </tr>
  <tr>
    <td align="right" valign="top">&nbsp;</td>
    <td align="left" valign="top">&nbsp;</td>
  </tr>
  <tr>
    <td align="right" valign="top">&nbsp;</td>
    <td align="left" valign="top"><label>
      <input type="submit" name="button" id="button" value="Eintragen">
    </label></td>
  </tr>
</table>
</form>