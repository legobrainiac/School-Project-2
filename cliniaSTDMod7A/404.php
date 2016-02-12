<?php 
	$nomePagina = "Página não encontrada";
	include("util.php");
    $txtErro = $siteData["paginaErroTexto"];
?>

<!DOCTYPE html>
<html lang="pt">
<head>
	<title><?php echo "$nomePagina   >  $siteTitle | $siteSlogan"?></title>
    <?=$headerContent?>
</head>
<body id="errorPg">
	<div class="logo-error">
		<div id="logo"></div>
	</div>

	<!-- Main content -->
	<section class="page-error">

		<div class="error-page">
			<h2 class="headline text-info">404</h2>
			<div class="error-content">
				<?=$txtErro?>
			</div>
			<!-- /.error-content -->
		</div>
		<!-- /.error-page -->

	</section>
</body>
</html>