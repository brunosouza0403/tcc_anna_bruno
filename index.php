<?php
    include ("conexao.php");
    session_start();
    include_once "conexao.php";
?>


<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="webthemez">
    <title>Pagina Inicial</title>
	<!-- core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/font-awesome.min.css" rel="stylesheet">
    <link href="css/animate.min.css" rel="stylesheet">
    <link href="css/owl.carousel.css" rel="stylesheet">
    <link href="css/owl.transitions.css" rel="stylesheet">
    <link href="css/prettyPhoto.css" rel="stylesheet">
    <link href="css/styles.css" rel="stylesheet"> 
    <!--[if lt IE 9]>
    <script src="js/html5shiv.js"></script>
    <script src="js/respond.min.js"></script>
    <![endif]-->       
    <link rel="shortcut icon" href="images/icone.png">  
</head> 

<!-- Confirmação para sair-->
<script>
    function botaosair(){
        alert("Tem certeza que quer sair?");
    }

    function botaogaleria(){
        alert("Para cadastrar um novo animal, é necessário realizar um login!");
    }
</script>


<body id="home">
    <!-- Navbar -->
    <header id="header">
        <nav id="main-nav" class="navbar navbar-default navbar-fixed-top" role="banner">
            <div class="container">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <a class="navbar-brand" href="index.html"><img src="images/logo.jpg" alt="logo"></a>
                </div>
				
                <div class="collapse navbar-collapse navbar-right">
                    <ul class="nav navbar-nav">
                        <li class="scroll active"><a href="#home">Pagina Inicial</a></li> 
                        <li class="scroll"><a href="#about">Informações</a></li>
                        <li class="scroll"><a href="#services">O que oferecemos</a></li>
                        <li class="scroll"><a href="#login">Entrar/Cadastrar</a></li>  
                        <li class="scroll"><a href="galeriaanimais.php" onclick="botaogaleria()">Galeria</a></li>                  
                    </ul>
                </div>
            </div>
        </nav>
    </header>

    
    <section id="main-slider">
        <div class="owl-carousel">
            <div class="item" style="background-image: url(images/slider/bg1.jpg);">
                <div class="slider-inner">
                    <div class="container">
                        <div class="row">
                            <div class="col-sm-6">
                                <div class="carousel-content">
                                    <h2><span>Adote,</span> não compre!</h2>
                                    <p>Adotar é um gesto de amor e contribui para o fim do comércio animal.</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div><!--/.item-->
             <div class="item" style="background-image: url(images/slider/bg2.jpg);">
                <div class="slider-inner">
                    <div class="container">
                        <div class="row">
                            <div class="col-sm-6">
                                <div class="carousel-content">
                                    <h2><span>Nesse momento,</span> </h2>
                                    <p>existem milhares de gatinhos e cachorrinhos esperando um humano para chamar de seu.</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section id="hero-text" class="wow fadeIn">
        <div class="container">
            <div class="row">
                <div class="col-sm-9">
                    <h2>Nos ajude a diminuir os casos de abandonos e maus tratos. </h2>
                    <p>A relação entre um ser humano e um animal pode ser capaz de estimular uma relação liberta de estresse, adote!
                    </p>
                </div>
                
            </div>
        </div>
    </section>

 <section id="about">
        <div class="container">

            <div class="section-header">
                <h2 class="section-title text-center wow fadeInDown">Informações</h2>
                <p class="text-center wow fadeInDown">Saiba o que os animais domésticos podem agregar em sua vida! </p>
            </div>

            <div class="row">
                <div class="col-sm-6 wow fadeInLeft">
                  <img class="img-responsive" src="images/about.png" alt="">
                </div>

                <div class="col-sm-6 wow fadeInRight">
                    <h3 class="column-title">Adoção e abandono de animais.</h3>
                    <p>Quando o animal é um filhote e não possui adestração, costuma possuir comportamento mais agitado, brincando o tempo todo, com isso muitas pessoas ficam impacientes e estressadas
                        e acabamabandonando esses animais nas ruas ou, na pior das hipóteses, realizam maus tratos. </p>

                    <p>A relação de um ser humano e um animal pode ser capaz de estimular uma relação liberta de estresse, com um pensamento livre de espectativas e julgamentos.</p> 
                    
                    <p>Essa troca de carinho não traz sentimentos incertos, se diferenciando da relação entre humanos e seus amigos ou familiares, onde muitas vezes trazem sentimentos negativos.</p>
                    
                </div>
            </div>
        </div>
    </section><!--/#about-->

    <!--Scroll Serviços -->
    <section id="services" >
        <div class="container">

            <div class="section-header">
                <h2 class="section-title text-center wow fadeInDown">O que oferecemos</h2>
                <p class="text-center wow fadeInDown">Saiba mais quais são nossos principais objetivos com esses animais.</p>
            </div>

            <div class="row">
                <div class="features">
                    <div class="col-md-4 col-sm-6 wow fadeInUp" data-wow-duration="300ms" data-wow-delay="0ms">
                        <div class="media service-box">
                            <div class="pull-left">
                                <i class="fa fa-heart"></i>
                            </div>
                            <div class="media-body">
                                <h4 class="media-heading">Diminuir indices de animais nas ruas.</h4>
                                <p>Ajudar os animais a encontrar um novo lar para poderem ter uma vida digna.</p>
                            </div>
                        </div>
                    </div><!--/.col-md-4-->

                    <div class="col-md-4 col-sm-6 wow fadeInUp" data-wow-duration="300ms" data-wow-delay="100ms">
                        <div class="media service-box">
                            <div class="pull-left">
                                <i class="fa fa-heart"></i>
                            </div>
                            <div class="media-body">
                                <h4 class="media-heading">Diminuir indices de maus tratos.</h4>
                                <p>Os animais precisam parar de sofrerem as consequencias do dia a dia da vida humana.</p>
                            </div>
                        </div>
                    </div><!--/.col-md-4-->

                    <div class="col-md-4 col-sm-6 wow fadeInUp" data-wow-duration="300ms" data-wow-delay="200ms">
                        <div class="media service-box">
                            <div class="pull-left">
                                <i class="fa fa-heart"></i>
                            </div>
                            <div class="media-body">
                                <h4 class="media-heading">Encontrar animais perdidos.</h4>
                                <p>Seu animalzinho escapou e não sabe mais onde procurar? Informe na plataforma para aumentar suas chances de encontrá-lo.</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>   
        </div>
    </section>

    <!--Formulario de Login -->
    <section id="login">
         
        <div class="container-wrapper">
            <h2 class="section-title text-center wow fadeInDown">Entre ou Cadastre-se</h2>
            <div class="container contact-info">
                <div class="row">
				    <div class="col-sm-12 col-md-12">                      
						<div class="contact-form">											
					       <form method="POST" action="usuariologin.php" class="signin-form">
			      				<div class="form-group">
			      					<input type="email" class="form-control" placeholder="Informe seu email" id="email" name="email"required >
			      				</div>
		            			<div class="form-group">
		              				<input type="password" class="form-control" placeholder="Digite sua senha" id="senha" name="senha"required >
		              				<span toggle="#password-field" class="fa fa-fw fa-eye field-icon toggle-password"></span>
		            			</div>
                                
                                <div class="frc-captcha" data-sitekey="FCMV4FO2HHD696HK">
                                    
                                </div>
                                <div class="form-group">
		            				<button type="submit" class="form-control btn btn-primary submit px-3" value="entrar" id="entrar" name="entrar"required>Login</button>
		            			</div>
                                
                                    
                            </form>
                            <h6 class="mb-4 text-center">Não possui conta?</h6>
		            		<a href="cadusuario.php"> <button type="submit" class="form-control btn btn-primary submit px-3">Registre-se</button> </a> 					
						</div>
                    </div>
                </div>
            </div>
        </div>
 
   </section><!--/#bottom-->

    <footer id="footer">
        <div class="container">
            <div class="row">
                <div class="col-sm-6">
                    <p>Anna Beatriz Furlan Zanobio | Bruno de Souza Pinto <br>FHO - Fundação Herminio Ometto</p>
                    
                </div>
                
            </div>
        </div>
    </footer><!--/#footer-->
    <script type="module" src="https://unpkg.com/friendly-challenge@0.9.8/widget.module.min.js" async defer></script>
    <script nomodule src="https://unpkg.com/friendly-challenge@0.9.8/widget.min.js" async defer></script>
    <script type="module" src="https://cdn.jsdelivr.net/npm/friendly-challenge@0.9.8/widget.module.min.js"async defer></script>
    <script nomodule src="https://cdn.jsdelivr.net/npm/friendly-challenge@0.9.8/widget.min.js" async defer></script>
    <script src="js/jquery.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="http://maps.google.com/maps/api/js?sensor=true"></script>
    <script src="js/owl.carousel.min.js"></script>
    <script src="js/mousescroll.js"></script>
    <script src="js/smoothscroll.js"></script>
    <script src="js/jquery.prettyPhoto.js"></script>
    <script src="js/jquery.isotope.min.js"></script>
    <script src="js/jquery.inview.min.js"></script>
    <script src="js/wow.min.js"></script>
    <script src="contact/jqBootstrapValidation.js"></script>
    <script src="contact/contact_me.js"></script>
    <script src="js/contact.js"></script>
    <script src="js/custom-scripts.js"></script>
</body>
</html>