<?php /* Smarty version 2.6.19, created on 2009-08-18 19:19:55
         compiled from page2.html */ ?>
<html>

<head>
	<title>Solar Imperium 2.7 Installer (Page 2/4)</title>
</head>

<body style="font-size:14px;font-family:sans-serif" bgcolor="#333344">
	<br/><br/>
	<div align="center">
	<div style="width:600px" align="left">
		
	<p style="background-color:#666699;color:white;padding:5px"><b>Solar Imperium 2.7 Installer (Page 2/4) :: File permissions and SQL configuration</b></p>
	
	<p style="text-align:justify;background-color:#ccccdd;padding:30px;border:1px solid width">
		<?php echo $this->_tpl_vars['output']; ?>

 	</p>
 	<br/>
 	<p<b style="color:#cacaca">Database configuration</b></p>
	<form action="install.php?page=3" method="POST">
		<table  style="font-size:14px;font-family:sans-serif;background-color:#ccccdd;padding:30px;border:1px solid white" >
			
			<tr>
				<td>Driver:
				</td>
				<td>
					<input type="text" style="background-color:#cacafa;border:1px solid black;padding:2px" name="db_driver" value="mysqlt">
				</td>
			</tr>
			
			<tr>
				<td>Hostname:
				</td>
				<td>
					<input type="text" style="background-color:#cacafa;border:1px solid black;padding:2px" name="db_hostname" value="localhost">
				</td>
			</tr>

			<tr>
				<td>Database name:
				</td>
				<td>
					<input type="text" style="background-color:#cacafa;border:1px solid black;padding:2px" name="db_name" value="solarimperium">
				</td>
			</tr>

			<tr>
				<td>Username:
				</td>
				<td>
					<input type="text" style="background-color:#cacafa;border:1px solid black;padding:2px" name="db_username" value="root">
				</td>
			</tr>

			<tr>
				<td>Password:
				</td>
				<td>
					<input type="password" style="background-color:#cacafa;border:1px solid black;padding:2px" name="db_password1">
				</td>
			</tr>

			<tr>
				<td>Confirm password:
				</td>
				<td>
					<input type="password" style="background-color:#cacafa;border:1px solid black;padding:2px" name="db_password2">
				</td>
			</tr>

			<tr>
				<td colspan="2">
<br/>
					<input type="submit" value="Continue">
				</td>
			</tr>
		</table>
	</form>

	</div>
	</div>

</body>

</html>