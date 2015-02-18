<!DOCTYPE html>
<html lang="pt-br">
<head>
	<meta charset="UTF-8">
	<title>Modelo de envio de e-mail</title>
	<link rel="stylesheet" href="style.css">
</head>
<body>
	<div class="container">
		<form method=post id="formulario" action="plugins/envio_de_email.php">
			<fieldset>
				<legend>Formulario de contato via E-mail</legend>
				<div class="form-group">
					<label for="iNome">Nome Completo: </label>
					<input type="text" name="nNome" id="iNome">
				</div>
				<div class="form-group">
					<label for="iEmail">E-mail: </label>
					<input type="email" name="nEmail" id="iEmail">
				</div>
				<div class="form-group">
					<label for="iTelefone">Telefone: </label>
					<input type="tel" name="nTelefone" id="iTelefone">
				</div>
				<div class="form-group">
					<label for="iAssunto">Assunto: </label>
					<input type="tel" name="nAssunto" id="iAssunto">
				</div>
				<div class="form-group">
					<label for="iMensagem">Mensagem: </label>
					<textarea name="nMensagem" id="iMensagem" rows="4"></textarea>
				</div>
				<div class="form-group">
					<fieldset>
						<legend for="">Deseja receber uma copia deste E-mail?</legend>
						<label for="iSim"><input type="radio" name="nReceberEmail" id="iSim" value="1" >Sim</label>
						<label for="iNao"><input type="radio" name="nReceberEmail" id="iNao" value="2" checked >Não</label>
					</fieldset>
				</div>
				<p class="text-center"><input type="submit" value="Enviar" name="nEnviar"><input type="reset" value="Limpar"></p>
			</fieldset>
		</form>
	</div>
</body>
</html>