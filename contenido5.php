<?php
defined("CLAVE5") or die ("Acceso No Autorizado");
echo $error1;

if (isset($_REQUEST["opcion"])){
	//$sql="SELECT modulo from menus where id=".$_GET["opcion"];

	$sql="SELECT modulo from aux_perfiles_menus a LEFT JOIN menu m ON a.id_menu=m.id_menu where a.id_perfil=".$_SESSION["AUT"]["id_perfil"]." AND a.id_menu=".$_REQUEST["opcion"];


	if ($fila=$bd1->sub_fila($sql)){
		include ($fila["modulo"].VERSION.".php");
	}else{
		?>
		<img src="images/denegado.png" width="100%" alt="pitbull" />
		<?php
	}
}else{
	?>
	
	<div class="container">
			<hr>

			<!-- Title -->
			<div class="row">
					<div class="col-lg-12">
							<h3>SISTEMA DE INFORMACION EMMANUEL SIEMM</h3>
					</div>
			</div>
			<!-- /.row -->

			<!-- Page Features -->
			<div class="row text-center">

					<div class="col-md-3 col-sm-6 hero-feature">
							<div class="thumbnail">
									<img src="images/Blue/Hospital-blue.Png" class="image_logo" alt="">
									<div class="caption">
											<h3>Admisiones</h3>
											<p>
												<button class="btn btn-danger" data-toggle="modal" data-target="#infoadm" type="button" ><span class="fa fa-search"> Ver Más...</span>
											</p>
									</div>
							</div>
					</div>
					<section class="">
						<section class="modal fade" id="infoadm" role="dialog">
							<section class="modal-dialog modal-lg">
								<div class="modal-content">
									<div class="modal-header">
										<button type="button" class="close" data-dismiss="modal">&times;</button>
										<h4 class="modal-title" >Actualizaciones del recientes</h4>
									</div>
									<div class="modal-body">
										<article class="">
											<ul>
												<li>No hay actualizaciones por ahora</li>
											</ul>
										</article>
										<video src="" poster="videotest.jpg" width="400" height="400" controls></video>
									</div>
								</div>
							</section>
						</section>
					</section>
					<div class="col-md-3 col-sm-6 hero-feature">
							<div class="thumbnail">
									<img src="images/Blue/Doctor-blue.Png" class="image_logo" alt="">
									<div class="caption">
											<h3>Medicos</h3>
											<p>
													<button class="btn btn-danger" data-toggle="modal" data-target="#infomed" type="button" ><span class="fa fa-search"> Ver Más...</span>
											</p>
									</div>
							</div>
					</div>
					<section class="">
						<section class="modal fade" id="infomed" role="dialog">
							<section class="modal-dialog modal-lg">
								<div class="modal-content">
									<div class="modal-header">
										<button type="button" class="close" data-dismiss="modal">&times;</button>
										<h4 class="modal-title" >Actualizaciones del recientes</h4>
									</div>
									<div class="modal-body">
										<article class="">
											<ul>
												<li>Modificación en ventana emergente para las consultas rápidas donde pueden observar las evoluciones de manera ascendente. </li>
											</ul>
										</article>
										<video src="" poster="videotest.jpg" width="400" height="400" controls></video>
									</div>
								</div>
							</section>
						</section>
					</section>
					<div class="col-md-3 col-sm-6 hero-feature">
							<div class="thumbnail">
									<img src="images/Blue/Wheelchair-blue.Png" class="image_logo" alt="">
									<div class="caption">
											<h3>Enfermería</h3>
											<p>
													<button class="btn btn-danger" data-toggle="modal" data-target="#infoenf" type="button" ><span class="fa fa-search"> Ver Más...</span>
											</p>
									</div>
							</div>
					</div>
					<section class="">
						<section class="modal fade" id="infoenf" role="dialog">
							<section class="modal-dialog modal-lg">
								<div class="modal-content">
									<div class="modal-header">
										<button type="button" class="close" data-dismiss="modal">&times;</button>
										<h4 class="modal-title" >Actualizaciones del recientes</h4>
									</div>
									<div class="modal-body">
										<article class="">
											<ul>
												<li>Modulo de signos vitales y líquidos se encuentran habilitados para el registro y consulta correspondiente.</li>
											</ul>
										</article>
										<video src="" poster="videotest.jpg" width="400" height="400" controls></video>
									</div>
								</div>
							</section>
						</section>
					</section>
					<div class="col-md-3 col-sm-6 hero-feature">
							<div class="thumbnail">
									<img src="images/Blue/Doctor-Briefcase-blue.Png" class="image_logo" alt="">
									<div class="caption">
											<h3>Interdisciplinarios</h3>
											<p>
													<button class="btn btn-danger" data-toggle="modal" data-target="#infointer" type="button" ><span class="fa fa-search"> Ver Más...</span>
											</p>
									</div>
							</div>
					</div>
					<section class="">
						<section class="modal fade" id="infointer" role="dialog">
							<section class="modal-dialog modal-lg">
								<div class="modal-content">
									<div class="modal-header">
										<button type="button" class="close" data-dismiss="modal">&times;</button>
										<h4 class="modal-title" >Actualizaciones del recientes</h4>
									</div>
									<div class="modal-body">
										<article class="">
											<ul>
												<li>No hay actualizaciones por ahora</li>
											</ul>
										</article>
										<video src="" poster="videotest.jpg" width="400" height="400" controls></video>
									</div>
								</div>
							</section>
						</section>
					</section>
			</div>
			<!-- /.row -->

			<hr>
	</div>
	<!-- /.container -->

	<!-- jQuery -->
	<script src="js/jquery.js"></script>

	<!-- Bootstrap Core JavaScript -->
	<script src="js/bootstrap.min.js"></script>

	<?php
}
?>
