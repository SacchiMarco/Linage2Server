<?php
if(isset($_GET['update'])){
	$ins_update = $_GET['update'];
	$ins_kat= $_POST['kat'];
	$ins_info= $_POST['beschreib'];
	$ins_status = $_POST['Status'];
	$datum = time();
	if( strlen($ins_info) <= 4){
		echo ("Info zu Kurz!!");
	}
	else{
		mysql_query("update serdev set status='$ins_status', beschreib='$ins_info', datum='$datum', kategorie='$ins_kat' where id='$ins_update'");
		sleep(2);
		echo ("Listeneintrag Aktualisiert");
	}	
}
if(isset($_GET['edit'])){
	$editein = $_GET['edit'];
}

if(isset($_GET['del'])){
	$delbest = $_GET['del'];
	
}
if(isset($_GET['delsur'])){
	$delsur = $_GET['delsur'];
	mysql_query("delete from serdev where id = '$delsur'");
	sleep(3);
	
}
if(isset($_GET['ins'])){
	$ins_kat= $_POST['kat'];
	$ins_info= $_POST['beschreib'];
	$ins_status = $_POST['Status'];
	$datum = time();
	if( strlen($ins_info) <= 4){
		echo ("Info zu Kurz!!");
	}
	else{
		mysql_query("insert into serdev (id, status, beschreib, datum, kategorie) values ('','$ins_status','$ins_info','$datum','$ins_kat')");
		sleep(2);
		echo ("Listeneintrag Erstellt");
	}
}
$katlist = mysql_query("SELECT * FROM serkat");
?>
<table align="center" width="600" border="0" cellspacing="0" cellpadding="0">
  <tr align="center" valign="top">
    <td width="200"><a href="?site=add&eintrag=1">Eintragen</a></td>
    <td width="200">&nbsp;</td>
    <td width="200">&nbsp;</td>
  </tr>
  <tr align="center" valign="top">
    <td height="3" colspan="3" bgcolor="#0000FF"></td>
  </tr>
  <tr align="center" valign="top">
    <td>&nbsp;</td>
    <td width="200">&nbsp;</td>
    <td width="200">&nbsp;</td>
  </tr>
</table>

<?php 
if(isset($delbest)){
	echo ("
<table align=center width=600 border=0 cellspacing=0 cellpadding=0>
  <tr>
    <td align=center valign=top><strong><a href=?site=add&delsur=$delbest>&lt;&lt; Löschen Bestätigen &gt;&gt;</a></strong><br><br></td>
  </tr>
</table>
");
}
?>

<?php 
if(isset($editein)){ 
	$qedit = mysql_query("SELECT * FROM serdev where id='$editein'");
	$editfetch = mysql_fetch_array($qedit);
?>

<form name="form2" method="post" action="dev.php?site=add&update=<?php echo $editfetch['id'];?>">
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
      
<?php 
echo ("<option value=".$editfetch['kategorie']." selected=selected>".$editfetch['kategorie']."</option>");
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
    <td align="left" valign="top"><textarea name="beschreib" id="beschreib" cols="50" rows="5"><?php echo $editfetch['beschreib'];?></textarea></td>
  </tr>
  <tr>
    <td align="right" valign="top">&nbsp;</td>
    <td align="left" valign="top">&nbsp;</td>
  </tr>
  <tr>
    <td align="right" valign="top">Status:</td>
    <td align="left" valign="top">
      <label>
        <input name="Status" type="radio" id="Status" value="1" <?php if($editfetch['status'] == '1'){ echo ("checked");}?>>
        In Bearbeitung</label>
      <br>
      <label>
<input name="Status" type="radio" id="Status" value="2" <?php if($editfetch['status'] == '2'){ echo ("checked");}?>>
Entfernt</label>
      <br>
      <label>
        <input name="Status" type="radio" id="Status" value="3" <?php if($editfetch['status'] == '3'){ echo ("checked");}?>>
        Fertiggestellt</label>
      <br>
      <input name="Status" type="radio" id="Status" value="4" <?php if($editfetch['status'] == '4'){ echo ("checked");}?>>
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
<br>
<?php }?>


<?php if(isset($_GET['eintrag'])){?>
<form name="form1" method="post" action="dev.php?site=add&ins=1">
<table align="center" width="600" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td colspan="2" valign="top">Listeneintrag</td>
  </tr>
  <tr>
    <td width="121" height="10"></td>
    <td width="479"></td>
  </tr>
  <tr>
    <td align="right" valign="top">Kategorie:</td>
    <td align="left" valign="top"><label>
      <select name="kat" id="kat">
<?php 
while($katform = mysql_fetch_array($katlist)){
	echo ("<option value=".$katform['kat']." selected>".$katform['kat']."</option>");
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
        <input type="radio" name="Status" value="1" id="Status">
        In Bearbeitung</label>
      <br>
      <label>
<input type="radio" name="Status" value="2" id="Status">
Entfernt</label>
      <br>
      <label>
        <input type="radio" name="Status" value="3" id="Status">
        Fertiggestellt</label>
      <br>
      <input type="radio" name="Status" value="4" id="Status">
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
<br>
<?php }?>


<table align="center" width="600" border="" cellspacing="0" cellpadding="0">
  <tr>
    <td style="border:0px;" colspan="3" align="left" valign="top"><img src="fertig.jpg" width="250" height="34"></td>
  </tr>
  <tr>
    <td style="border:0px;" height="10" colspan="3" valign="top"></td>
  </tr>
<?php 
$fertig = mysql_query("select * from serdev where status = '3'");
while($q1 = mysql_fetch_array($fertig)){
	$datum = date("d.m.Y", $q1['datum']);
	echo("  
	  <tr>
	    <td style=border:0px; align=left width=130 valign=top><div style=margin-left:6px;>Datum: $datum<br>
	    Kat: ".$q1['kategorie']."</div></td>
	    <td style=border:0px;background:#FFF; align=left width=397 valign=top ><div style=margin-left:6px;>".$q1['beschreib']."</div></td>
	    <td style=border:0px; width=73 align=left valign=top><div style=margin-left:6px;><a href=?site=add&edit=".$q1['id'].">Bearbeiten</a><br><a href=?site=add&del=".$q1['id'].">Löschen</a></div></td>
	  </tr>
	  <tr>
	    <td style=border:0px; bgcolor=#0000FF height=3 colspan=3 valign=top></td>
	  </tr>
	  <tr>
	    <td style=border:0px; height=3 colspan=3 valign=top></td>
	  </tr>	  
	  ");
}
 ?>  
</table>
<br>
<br>
<table align="center" width="600" border="" cellspacing="0" cellpadding="0">
  <tr>
    <td style="border:0px;" colspan="3" align="left" valign="top"><img src="arbeit.jpg" width="250" height="34"></td>
  </tr>
  <tr>
    <td style="border:0px;" height="10" colspan="3" valign="top"></td>
  </tr>
<?php 
$q1a = mysql_query("select * from serdev where status = '1'");
while($q1b = mysql_fetch_array($q1a)){
	$datum = date("d.m.Y", $q1b['datum']);
	echo("  
	  <tr>
	    <td style=border:0px; align=left width=130 valign=top><div style=margin-left:6px;>Datum: $datum<br>
	    Kat: ".$q1b['kategorie']."</div></td>
	    <td style=border:0px;background:#FFF; align=left width=397 valign=top ><div style=margin-left:6px;>".$q1b['beschreib']."</div></td>
	    <td style=border:0px; width=73 align=left valign=top><div style=margin-left:6px;><a href=?site=add&edit=".$q1b['id'].">Bearbeiten</a><br><a href=?site=add&del=".$q1b['id'].">Löschen</a></div></td>
	  </tr>
	  <tr>
	    <td style=border:0px; bgcolor=#0000FF height=3 colspan=3 valign=top></td>
	  </tr>
	  <tr>
	    <td style=border:0px; height=3 colspan=3 valign=top></td>
	  </tr>	  
	  ");
}
 ?>  
</table>
<br>
<br>
<table align="center" width="600" border="" cellspacing="0" cellpadding="0">
  <tr>
    <td style="border:0px;" colspan="3" align="left" valign="top"><img src="entfernt.jpg" width="250" height="34"></td>
  </tr>
  <tr>
    <td style="border:0px;" height="10" colspan="3" valign="top"></td>
  </tr>
<?php 
$q2a = mysql_query("select * from serdev where status = '2'");
while($q2b = mysql_fetch_array($q2a)){
	$datum = date("d.m.Y", $q2b['datum']);
	echo("  
	  <tr>
	    <td style=border:0px; align=left width=130 valign=top><div style=margin-left:6px;>Datum: $datum<br>
	    Kat: ".$q2b['kategorie']."</div></td>
	    <td style=border:0px;background:#FFF; align=left width=397 valign=top ><div style=margin-left:6px;>".$q2b['beschreib']."</div></td>
	    <td style=border:0px; width=73 align=left valign=top><div style=margin-left:6px;><a href=?site=add&edit=".$q2b['id'].">Bearbeiten</a><br><a href=?site=add&del=".$q2b['id'].">Löschen</a></div></td>
	  </tr>
	  <tr>
	    <td style=border:0px; bgcolor=#0000FF height=3 colspan=3 valign=top></td>
	  </tr>
	  <tr>
	    <td style=border:0px; height=3 colspan=3 valign=top></td>
	  </tr>	  
	  ");
}
 ?>  
</table>
<br>
<br>
<table align="center" width="600" border="" cellspacing="0" cellpadding="0">
  <tr>
    <td style="border:0px;" colspan="3" align="left" valign="top"><img src="vorschlag.jpg" width="250" height="34"></td>
  </tr>
  <tr>
    <td style="border:0px;" height="10" colspan="3" valign="top"></td>
  </tr>
<?php 
$q3a = mysql_query("select * from serdev where status = '4'");
while($q3b = mysql_fetch_array($q3a)){
	$datum = date("d.m.Y", $q3b['datum']);
	echo("  
	  <tr>
	    <td style=border:0px; align=left width=130 valign=top><div style=margin-left:6px;>Datum: $datum<br>
	    Kat: ".$q3b['kategorie']."</div></td>
	    <td style=border:0px;background:#FFF; align=left width=397 valign=top ><div style=margin-left:6px;>".$q3b['beschreib']."</div></td>
	    <td style=border:0px; width=73 align=left valign=top><div style=margin-left:6px;><a href=?site=add&edit=".$q3b['id'].">Bearbeiten</a><br><a href=?site=add&del=".$q3b['id'].">Löschen</a></div></td>
	  </tr>
	  <tr>
	    <td style=border:0px; bgcolor=#0000FF height=3 colspan=3 valign=top></td>
	  </tr>
	  <tr>
	    <td style=border:0px; height=3 colspan=3 valign=top></td>
	  </tr>	  
	  ");
}
 ?>  
</table>

