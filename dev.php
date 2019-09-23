<?php 
session_start();
include ("_funk.php");
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Admin Center</title>
<style type="text/css">
<!--
.titel {
	font-size: 24px;
	margin-left: 10px;
}
.content {
	text-align: center;
	background-color: #CCC;
	margin-left: 10px;
}
.navi {
	color: #06F;
	margin-left: 10px;
}
.navilink a:link, .navilink a:visited, .navilink a:active{
	color: #0066F7;
	text-decoration:none;
}
.navilink a:hover{
	color: #FFF;
	text-decoration: none;
}
-->
</style>
</head>

<body>
<table width="800" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td colspan="2" align="left" valign="top" bgcolor="#999999" ><div class="titel">Admin Center</div></td>
  </tr>
  <tr>
    <td height="15" colspan="2" valign="top"></td>
  </tr>
  <tr>
    <td width="140" valign="top" class="">
      <table width="140" border="0" cellspacing="0" cellpadding="0">
        <tr>
          <td bgcolor="#CCCCCC"><div class="navi navilink" ><a href="?site=add">Listeneintrag</a><br />
        <a href="?site=kategorie">Kategorie verwalten</a></div></td>
        </tr>
    </table></td>
    <td width="660" valign="top"><div class="content navilink">
      <?php 
if(!isset($site)) $site="add";
$invalide = array('\\','/','/\/',':','.');
$site = str_replace($invalide,' ',$site);
if(!file_exists($site.".php")) $site = "add";
include($site.".php");
?>
    </div></td>
  </tr>
</table>
</body>
</html>