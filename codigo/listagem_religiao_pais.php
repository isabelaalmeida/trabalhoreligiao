<!DOCTYPE html>
<html>
	<?php
		include "menu.inc";
	?>
	<head>
		<title>Listagem de Países e Religiões</title>
		<meta charset="UTF-8"/>
		<link rel="stylesheet" type="text/css" href="estilos.css"/>
	</head>
	<body>
		<div>
			<table border="1">
				<tr>
					<th>Nome País</th>
					<th>Nome Religião</th>
					<th>Ação</th>
				</tr>
				<?php
					include ("conexao.php");
				
					
					$select = "SELECT id_religiao_pais,id_pais,id_religiao,nome_pais,nome_religiao
									FROM pais 
									INNER JOIN religiao_pais 
										ON religiao_pais.cod_pais=pais.id_pais 
									INNER JOIN religiao 
										ON religiao_pais.cod_religiao=religiao.id_religiao";
					
					$resultado = mysqli_query($link,$select)or die (mysqli_error($link));
					
					while ($tupla = mysqli_fetch_array($resultado)){
						$id_religiao_pais = $tupla["id_religiao_pais"];
						echo "<tr>
								<td>" .$tupla["nome_religiao"]. "</td>
								<td>" .$tupla["nome_pais"]. "</td>
								<td> <a href='alterar_pais_religiao.php?id_religiao_pais=$id_religiao_pais'>Alterar/</a>
								<a href='remover_pais_religiao.php?id_religiao_pais=$id_religiao_pais'>Remover</a> </td>
							</tr>";
					}
				?>
			</table>
		</div>
	</body>
</html>