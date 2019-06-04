<?php
	include("classeUsuario.php");
	include("interfaceExibicao.php");

	class Cabecalho implements Exibicao{
	
		private $charset;
		private $title;
		private $links;
		private $scripts;
		
		public function __construct($parametros){
			$this->charset = $parametros["charset"];
			$this->title = $parametros["title"];
			if(isset($parametros["links"])){
				$this->links = $parametros["links"];
			}
			if(isset($parametros["scripts"])){
				$this->scripts = $parametros["scripts"];
			}
		}
		
		public function exibe(){
			session_start();
			echo '<head>
					<title>'.$this->title.'</title>
					<meta name="viewport" content="width=device-width, initial-scale=1">
					<meta charset="utf-8"/>';
				
			if($this->links!=null){
				foreach($this->links as $i=>$l){
					echo "<link rel='stylesheet' href='$l' />";
				}
			}
			 
			if($this->scripts!=null){
				foreach($this->scripts as $i=>$s){
					echo "<script type='text/javascript' src='$s'></script>";
				}
			}
			echo '</head>
				<body>';
				if(isset($_SESSION["cliente"])){
					 echo '<nav class="navbar navbar-dark bg-dark navbar-inverse navbar-static-top">
						<div class="container">
							<div class="navbar-header">
								<a href="index.php" class="navbar-brand logotipo">
									<img src="img/to-do.jpg" alt="Logotipo" width="90" height="40"/>
								</a>

								<button type="button" class="navbar-toggler" data-toggle="collapse" data-target="#menu">
									<span class="navbar-toggler-icon"></span>
								</button>
							</div>
						';
				}
		}
		
		public function exibe_menu(){
			
			echo "<div class='collapse' id='menu'>
						<div class='bg-dark p-4'>
							<ul class='nav navbar-nav'>
								<li>
									<a href='listar_cliente.php'>
										Cliente
									</a>
								</li>
								<li>
									<a href='listar_cartao.php'>
										Cartão
									</a>
								</li>
								<li>
									<a href='listar_pais.php'>
										País
									</a>
								</li>
								<li>
									<a href='listar_cidade.php'>
										Cidade
									</a>
								</li>
								<li>
									<a href='listar_companhia.php'>
										Companhia de viagens
									</a>
								</li>
								<li>
									<a href='listar_companhia_origem_destino.php'>
										Origens e Destinos
									</a>
								</li>
								<li>
									<a href='listar_hotel.php'>
										Hotel
									</a>
								</li>
								<li>
									<a href='listar_facilidades.php'>
										Facilidade
									</a>
								</li>
								<li>
									<a href='listar_hotel_facilidade.php'>
										Hotel - Facilidade
									</a>
								</li>
								<li>
									<a href='listar_guia_turismo.php'>
										Guia de turismo
									</a>
								</li>
								<li>
									<a href='listar_reservas.php'>
										Reserva
									</a>
								</li>
								<li>
									<a href='form_contato.php'>
										Contato
									</a>
								</li>
								<li>
									<a href='logout.php'>
										Sair
									</a>
								</li>
							</ul>
						</div>	
					</div>
				</div>";
			if(isset($_SESSION["cliente"])){
				echo "</nav>";
			}
		}
	
	}
	
	
	$parametros["charset"]="utf-8";
	$parametros["title"]="Agencia de Turismo";
	$parametros["links"][] = "estiloTable.css";
	$parametros["links"][] = "css/bootstrap.min.css";
	$parametros["links"][] = "css/login.css";
	$parametros["links"][] = "https:/fonts.googleapis.com/icon?family=Material+Icons";
	$parametros["scripts"][] = "js/jquery-3.3.1.min.js";
	$parametros["scripts"][] = "js/bootstrap.min.js";
	//$parametros["scripts"][] = "js/todo.js";
	
	$c = new Cabecalho($parametros);
	$c->exibe();	
	
?>


	