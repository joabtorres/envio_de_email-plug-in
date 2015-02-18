<meta charset="UTF-8">
<?php 

	//url para direciona a página.
	$url = "http://dev2.endogenese.com.br/index.php";
	//E-mail obrigatorio do site;
	$email_site = "joabtorres@endogenese.com.br"; 
	 //E-mail destinatário a receber a mensagem do formulario;
	$destinatario ="bugados01@gmail.com";

	function enviar_email($nome, $email, $telefone, $assunto, $mensagem, $receber_email, $email_site, $destinatario ){
		$email_site = "joabtorres@endogenese.com.br"; // email_do_site
		$msg = "<div style='color: black;font-family:Arial,sans-serif;width:95%;min-width:700px;display:block;margin:0 auto;padding:10px;border:1px solid rgba(19,19,4,.6);background-image:-moz-linear-gradient(50% 0 -180deg,#fff 0,#f6f7f3 49%,#f0f0f1 99%);background-image:-webkit-gradient(linear,50% 0,50% 100%,color-stop(0,#fff),color-stop(0.49,#f6f7f3),color-stop(0.99,#f0f0f1));background-image:-webkit-linear-gradient(-180deg,#fff 0,#f6f7f3 49%,#f0f0f1 99%);background-image:-o-linear-gradient(-180deg,#fff 0,#f6f7f3 49%,#f0f0f1 99%);background-image:-ms-linear-gradient(-180deg,#fff 0,#f6f7f3 49%,#f0f0f1 99%);background-image:linear-gradient(-180deg,#fff 0,#f6f7f3 49%,#f0f0f1 99%);-moz-border-radius:10px;-webkit-border-radius:10px;border-radius:10px;'><div style=';font-size: 15pt;'><span style='display:  block;margin:0;'><strong>Nome:</strong> ".$nome."; </span><br><span style='display: block;margin:0;'><strong>Telefone:</strong> ".$telefone."; </span><br><span style='display: block;margin:0;'><strong>E-mail:</strong> ".$email."; </span><br></div><div style='clear: both; margin-top: -5px;'><h2>Mensagem:</h2><p style='text-align: justify;text-indent: 40px;'>".$mensagem."</p></div></div>";

		$headers= "MIME-Version: 1.1 \r\n";
		$headers.= "Content-Type: text/html; charset=UTF-8 \r\n";
		$headers.="From: ".$email_site."\r\n";
		$headers .="Return-Path: ".$email_site."\r\n";
		if($receber_email == 1){
			mail($destinatario, $assunto, $msg, $headers, $email_site);
			$msg_edit = "<h3 style='color: #D24B4B; margin: 2px; text-align:center;'>Esta e uma cópia da mensagem enviada para: <br> <span style='font-weight: 400;'>".$destinatario."</span></h3><br>".$msg;
			mail($email, $assunto, $msg_edit, $headers, $email_site);

			$msg_enviada = "<script> alert('Sua mensagem foi enviada com sucesso, enviamos uma cópia da mensagem para seu e-mail: ".$email."');</script>";
			
			return $msg_enviada;
		}else{
			
			mail($destinatario, $assunto, $msg, $headers, $email_site);
			$msg_enviada = "<script> alert('Sua mensagem foi enviada com sucesso!');</script>";
			return $msg_enviada;
		}
	}

	if(isset($_REQUEST['nEnviar'])){
		$contato = array();
		if((isset($_REQUEST['nNome'])) && ($_REQUEST['nNome'] != "")){
			$contato['nome'] = $_REQUEST['nNome']; 
		}else{
			echo "<script> alert('Informe seu Nome!');</script>";
			echo '<script> location.href=("'.$url.'")</script>';
		}
		if((isset($_REQUEST['nEmail'])) && ($_REQUEST['nEmail'] != "")){
			$contato['email'] = $_REQUEST['nEmail']; 
		}else{
			echo "<script> alert('Informe seu E-mail!');</script>";
			echo '<script> location.href=("'.$url.'")</script>';
		}
		if((isset($_REQUEST['nTelefone'])) && ($_REQUEST['nTelefone'] != "")){
			$contato['telefone'] = $_REQUEST['nTelefone']; 
		}else{
			echo "<script> alert('Informe seu Telefone!');</script>";
			echo '<script> location.href=("'.$url.'")</script>';
		}
		if((isset($_REQUEST['nAssunto'])) && ($_REQUEST['nAssunto'] != "")){
			$contato['assunto'] = $_REQUEST['nAssunto']; 
		}else{
			echo "<script> alert('Informe o Assunto!');</script>";
			echo '<script> location.href=("'.$url.'")</script>';
		}

		if((isset($_REQUEST['nMensagem'])) && ($_REQUEST['nMensagem'] != "")){
			$contato['mensagem'] = $_REQUEST['nMensagem']; 
		}else{
			echo "<script> alert('Informe a Mensagem!');</script>";
			echo '<script> location.href=("'.$url.'")</script>';
		}
		$contato['receber'] = $_REQUEST['nReceberEmail'];
		if(($contato['nome']) && ($contato['email']) && ($contato['telefone']) && ($contato['assunto']) && ($contato['mensagem']) && ($contato['receber'])){
			echo enviar_email($contato['nome'], $contato['email'], $contato['telefone'], $contato['assunto'], $contato['mensagem'], $contato['receber'], $email_site, $destinatario );
			echo '<script> location.href=("'.$url.'")</script>';
		}
	}
 ?>