<?php
echo "<!DOCTYPE html>
<html>
	<head>
		<title>Ha ocurrido un error 404</title>
		<link rel='shortcut icon' type='image/x-icon' href='/zimgs/minilogo.png' />
		<link rel='apple-touch-icon' href='/zimgs/logo114.png' />
	</head>";
		require_once ($_SERVER['DOCUMENT_ROOT'].'/zcomun/php/Mobile_Detect.php');
		$detect = new Mobile_Detect();
		if(($detect->isMobile())&&(!$detect->isTablet())) {
			//es mobil
			echo ("<body style='background-size:cover;background-image:url(/zimgs/fondoerror404mob.jpg);'>");
		}else{
			echo ("<body style='background-size:cover;background-image:url(/zimgs/fondoerror404.jpg);'>");
		}
		echo "
		<div style='border: 5px solid rgb(40,22,2);background-color:#000;padding:10px'>
			<table >
				<tr style='height:150px;text-align:left;'>
				<td style='width:128px;'><a href=\"javascript:if(top != self){history.back()}else{location.href ='/index.php'}\" ><img src='/zimgs/logo128.png' /></a></td>
				<td >
					<font color=white size='10'>
						upss!!!
					</font><br>
					<a href=\"javascript:if(top != self){history.back()}else{location.href ='/index.php'}\" ><img width=50px src='/zimgs/retornar404.svg' /></a>					
				</td>
				</tr>
				<tr>
				<td colspan=2>
					<font color='#FFCC66' size='6'>
						<p>The requested page or spell scheme is not available. Please select another language. Sorry for the inconvenience.</p>
						<p>La página o el esquema solicitado no está disponible. Seleccione otro idioma. Disculpe las molestias.</p>
					</font>
				</td>
				</tr>
			</table>
		</div>
	</body>
</html>"

?>
		
		
		
