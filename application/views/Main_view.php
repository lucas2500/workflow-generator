<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<!DOCTYPE html>
<html>
<head>
	<title>Home</title>
	<meta charset="utf-8">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.0/jquery.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
</head>
<body>

	<div class="container bg-primary mt-4">

		<br />

		<form action="<?php echo base_url();?>main/GrvWf001" method="post" enctype="multipart/form-data" accept=".pdf, .jpg, .png, .doc, .docx, .zip, .rar, .pptx">
			<div class="form-group">
				<input type="text" name="nome" class="form-control" placeholder="NOME DO WORKFLOW" required="">
			</div>

			<div class="form-group">
				<select class="form-control" name="status" required="">
					<option value="">SELECIONAR STATUS</option>
					<option value="ATIVO">ATIVO</option>
					<option value="INATIVO">INATIVO</option>
				</select>
			</div>

			<label style="color: white;">Separar emails por virgulas (ex: lucasrafael654@gmail.com, turock360@gmail.com)</label>
			<div class="form-group">
				<input type="text" name="destinatario" class="form-control" placeholder="DESTINATÁRIO(S)" required=""> 
			</div>

			<div class="form-group">
				<input type="text" name="assunto" class="form-control" placeholder="ASSUNTO DO WORKFLOW" required="">
			</div>

			<div class="form-group">
				<textarea name="corpo" class="form-control" placeholder="CORPO DO WORKFLOW"></textarea>
			</div>

			<div class="form-group">
				<input type="text" name="rodape" class="form-control" placeholder="RODAPÉ DO WORKFLOW">
			</div>

			<div class="form-group">
				<input type="text" name="recorrencia" class="form-control"  placeholder="RECCORÊNCIA EM MINUTOS" required="">
			</div>

			<div class="">
				<input type="file" name="anexo01" placeholder="Anexo 1">
			</div>

			<br />

			<div class="">
				<input type="file" name="anexo02" placeholder="Anexo 2">
			</div>

			<br />

			<div class="">
				<input type="file" name="anexo03" placeholder="Anexo 3">
			</div>

			<br />

			<div class="text-right">
				<button type="submit" class="btn btn-success">Criar WF</button>
			</div>
		</form>

		<br />

	</div>

	<div class="container">

		<table class="table table-bordered mt-4 text-center">
			<tr>
				<th>Nome WF</th>
				<th>Status</th>
				<th>Recorrência</th>
			</tr>

			<?php 

			foreach ($workflow as $wf){

				echo "<tr>";
				echo "<td>". $wf->nome ."</td>";
				echo "<td>". $wf->status ."</td>";
				echo "<td>". $wf->recorrencia ."</td>";
				echo "</tr>";

			}
			?>
		</table>
	</div>


</body>
</html>