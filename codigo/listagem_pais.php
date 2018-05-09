<!DOCTYPE html>
<html>
	<?php
		include "menu.inc";
	?>
	<head>
		<title>Listagem de Países</title>
		<meta charset="UTF-8"/>
		<link rel="stylesheet" type="text/css" href="estilos.css"/>

	</head>
	<body>
		<div class="pais">
			<table border="1">
				<tr>
					<th>Nome da País</th>
					<th>Continente</th>
					<th>Ação</th>
				</tr>
				<?php
				
					include ("conexao.php");
					
					$select = "SELECT * FROM pais ORDER BY nome_pais";
					
					$resultado = mysqli_query($link,$select)or die (mysqli_error($link));
					
					while ($tupla = mysqli_fetch_array($resultado)){
						$id = $tupla["id_pais"];
						echo "<tr>
								<td>" .$tupla["nome_pais"]. "</td>
								<td>" .$tupla["continente"]. "</td>
								<td> <a href='alterar_pais.php?id_pais=$id'>Alterar/</a>
								<a href='remover_pais.php?id_pais=$id'>Remover</a> </td>
							</tr>";
							
					}
				?>
			</table>
		</div>
	</body>
</html>