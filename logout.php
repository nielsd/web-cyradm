<?php
if (!defined('WC_BASE')) define('WC_BASE', __DIR__);
$ref=WC_BASE."/index.php";
if ($ref!=$_SERVER['SCRIPT_FILENAME']){
	header("Location: index.php");
	exit();
}
?>

          <tr>
        <td width="10">&nbsp; </td>
        <td valign="top">

<?php
logger(sprintf("LOGOUT : %s %s %s %s %s%s", $_SERVER['REMOTE_ADDR'], $_SESSION['user'], $_SERVER['HTTP_USER_AGENT'], $_SERVER['HTTP_REFERER'], $_SERVER['REQUEST_METHOD'], "\n"));

$_SESSION = [];
//print session_id();
if(session_destroy()){
/*
	print "<html>";
	print "<title>Web-cyradm</title>";
	print "<meta http-equiv=Content-Type content=text/html; charset=iso-8859-1>";
	print "</head>";
	print "<body bgcolor=#FFFFFF text=#000000 leftmargin=0 topmargin=0 marginwidth=0 marginheight=0>";
	print "<form name=form1 method=post action=>";
*/
	?>
	<table width="100%" border="0" style="height: 100%;">
		<tr>
			<td align="center" valign="middle">
				<table width="450" border="0" cellpadding="1" 
				cellspacing="1" style="height: 150px;">
					<tr>
						<td bgcolor="#000000">
							<table border="0" bgcolor="#FFFFFF" 
							cellpadding="0" cellspacing="0" 
							width="450" style="height: 150px;">
								<tr>
									<td bgcolor="#000666"
									style="font-family: Verdana, Arial, Helvetica, sans-serif; color: #fff; font-weight: bold;">
										Web-cyradm
									</td>
								</tr>

								<tr>
									<td>&nbsp;</td>
								</tr>

								<tr>
									<td>
										<p align="center"
										style="font-family: Verdana, Arial, Helvetica, sans-serif; color: #000; ">
											<?php print _("Thank you for using Web-cyradm");?>
										</p>

										<p align="center"
										style="font-family: Verdana, Arial, Helvetica, sans-serif; color: #000;  font-weight: bold;">
											<?php print _("You are logged out");?>
										</p>

										<p align="center"
										style="font-family: Verdana, Arial, Helvetica, sans-serif; color: #000; ">
											<?php print _("If you like to login click");?>
											<a class="navi" href="index.php"><?php
											print _("here");
											?></a>
										</p>
									</td>
								</tr>

								<tr>
									<td>&nbsp;</td>
								</tr>
							</table>

						</td>
					</tr>
				</table>
			</td>
		</tr>
	</table>
<!--
</form>
</body>
</html>
-->
<?php
}
?>
</td></tr>

