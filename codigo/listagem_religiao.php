<!DOCTYPE html>
<html>
	<?php
		include "menu.inc";
	?>
	<head>
		<title>Listagem de Religiões</title>
		<meta charset="UTF-8"/>
		<link rel="stylesheet" type="text/css" href="estilos.css"/>
	</head>
	<body>
		<div class="listagem">
			<table border="1">
				<tr>
					<th>Nome da Religião</th>
					<th>Símbolo</th>
					<th>Ação</th>
				</tr>
				
				<?php
				
					include ("conexao.php");
					
					$select = "SELECT * FROM religiao ORDER BY nome_religiao";
					
					$resultado = mysqli_query($link,$select)or die (mysqli_error($link));
					
					while ($tupla = mysqli_fetch_array($resultado)){
						$id = $tupla["id_religiao"];
						echo "<tr>
								<td>" .$tupla["nome_religiao"]. "</td>
								<td><img src='" .$tupla["simbolo"]."' width='100px' height='100px' /></td>
								<td> <a href='alterar_religiao.php?id_religiao=$id'>Alterar/</a>
								<a href='remover_religiao.php?id_religiao=$id'>Remover</a> </td>
							</tr>";
						
					}
					
					
				?>
				</div>
			</table>
		</div>
	</body>
</html>