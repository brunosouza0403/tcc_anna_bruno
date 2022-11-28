<?php 
    session_start();
    include_once "conexao.php";
?>


<html lang="pt-br">
<head>
	<meta charset="utf-8" />
	<link rel="shortcut icon" href="images/icone.png"> 
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
	
	<title>Galeria</title>

	<meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0' name='viewport' />
    <meta name="viewport" content="width=device-width" />
    
    <link href="css2/bootstrap.min.css" rel="stylesheet" />
    <link href="css2/hipster_cards.css" rel="stylesheet"/> 
        
    <!--     Fonts and icons     -->
    <link href="css2/pe-icon-7-stroke.css" rel="stylesheet" />
    <link href="http://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css" rel="stylesheet" />  
    <link href='http://fonts.googleapis.com/css?family=Playfair+Display|Raleway:700,100,400|Roboto:400,700|Playfair+Display+SC:400,700' rel='stylesheet' type='text/css'>
    
    <style>
        .card{
            margin-bottom: 70px;
        }
    </style>
</head>

<body>
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
                    <a class="navbar-brand" href="index.php"><img src="images/logo.jpg" alt="logo" height="180%"></a>
                </div>
                
                <div class="collapse navbar-collapse navbar-right">
                    <ul class="nav navbar-nav">
                        <li class="scroll "><a href="index.php">Pagina Inicial</a></li> 
                        <li class="scroll"><a href="index.php">Entrar/Cadastrar</a></li>              
                    </ul>
                </div>
            </div>
        </nav>
    </header>
    <br><br>  <br><br>   

    <?php
        
        if(isset($_SESSION['msg'])){
            echo $_SESSION['msg'];
            unset($_SESSION['msg']);
        }
    
        $query_animais = "SELECT id, raca, condicao, sexo, rua, cidade, estado, telefone, foto_animal FROM animais ORDER BY id DESC";
        $result_animais = $conn->prepare($query_animais);
        $result_animais->execute();

        while($row_animal = $result_animais->fetch(PDO::FETCH_ASSOC)){ 
            extract($row_animal);
            $cidade1 = str_replace(' ', '.', $cidade);
            $rua1 = str_replace(' ', '.', $rua);
    ?>

    <div class="card-box col-md-3 col-sm-6">
        <div class="card">                            
            <div class="content">
                <h5 class="title"><a href="#"> <?php echo "Raça: $raca "." |"; echo " Sexo: $sexo <br>"; ?></a></h5>
                <p class="description"><?php echo "Condição: $condicao <br>"; ?> </p>
                <p class="description"><?php echo "Rua: $rua <br>"; ?></p>
                <p class="description"><?php echo "Cidade: $cidade "." |"; echo " Estado: $estado <br>"; ?></p>
                <p class="description"><?php echo "Telefone para contato: $telefone <br>"; ?></p>
                <p class="description"> <a href="https://www.google.com.br/maps/place/<?php echo ".$rua1.$cidade1.$estado";?>   ">Mapa </a></p>
            </div>    
            <div class="footer">
                <?php  
                    if((!empty($foto_animal)) and (file_exists("imagensanimais/$id/$foto_animal"))){
                        echo "<img src='imagensanimais/$id/$foto_animal' width='270px' height='210px'><br>";
                    }else{
                        echo "<img src='imagens/icon_user.png' width='100%' eight='100%'><br>";
                                //echo "<a href='imagens/$id/$foto_usuario'>Download</a>";
                        } 
                ?>
                        
            </div>                                   
        </div> 
    </div>
    <?php } ?>
              
</body>

    <script src="assets/js/jquery-1.10.2.js" type="text/javascript"></script>
	<script src="assets/js/bootstrap.min.js" type="text/javascript"></script>
	<script src="assets/js/hipster-cards.js"></script>
	
	<!--  Just for demo	 -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/masonry/3.3.1/masonry.pkgd.min.js"></script>
    
	<script>
    	
    	$().ready(function(){
        	
        	var $container = $('.masonry-container');

            doc_width = $(document).width();
            
            if (doc_width >= 768){
                $container.masonry({
                    itemSelector        : '.card-box',
                    columnWidth         : '.card-box',
                    transitionDuration  : 0
                });   
            } else {
                $('.mas-container').removeClass('mas-container').addClass('row');
            }            
    	});
	</script>
	
</html>