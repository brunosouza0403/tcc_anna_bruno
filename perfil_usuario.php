<?php
    include("nav.php");
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
    <title>Perfil</title>
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
    <link rel="shortcut icon" href="images/ico/favicon.ico"> 
    <style>
        
.emp-profile{
    padding: 3%;
    margin-top: 3%;
    margin-bottom: 3%;
    border-radius: 0.5rem;
    background: #fff;
}
.profile-img{
    text-align: center;
}
.profile-img img{
    width: 70%;
    height: 100%;
}
.profile-img .file {
    position: relative;
    overflow: hidden;
    margin-top: -20%;
    width: 70%;
    border: none;
    border-radius: 0;
    font-size: 15px;
    background: #212529b8;
}
.profile-img .file input {
    position: absolute;
    opacity: 0;
    right: 0;
    top: 0;
}
.profile-head h5{
    color: #333;
}
.profile-head h6{
    color: #0062cc;
}
.profile-edit-btn{
    border: none;
    border-radius: 1.5rem;
    width: 70%;
    padding: 2%;
    font-weight: 600;
    color: #6c757d;
    cursor: pointer;
}
.proile-rating{
    font-size: 12px;
    color: #818182;
    margin-top: 5%;
}
.proile-rating span{
    color: #495057;
    font-size: 15px;
    font-weight: 600;
}
.profile-head .nav-tabs{
    margin-bottom:5%;
}
.profile-head .nav-tabs .nav-link{
    font-weight:600;
    border: none;
}
.profile-head .nav-tabs .nav-link.active{
    border: none;
    border-bottom:2px solid #0062cc;
}
.profile-work{
    padding: 14%;
    margin-top: -15%;
}
.profile-work p{
    font-size: 12px;
    color: #818182;
    font-weight: 600;
    margin-top: 10%;
}
.profile-work a{
    text-decoration: none;
    color: #495057;
    font-weight: 600;
    font-size: 14px;
}
.profile-work ul{
    list-style: none;
}
.profile-tab label{
    font-weight: 600;
}
.profile-tab p{
    font-weight: 600;
    color: #0062cc;
}
    </style>
</head> 

<body id="home">
    <!-- Navbar -->
      <?php
        if(isset($_SESSION['msg'])){
            echo $_SESSION['msg'];
            unset($_SESSION['msg']);
        }
    
        $query_usuario = "SELECT id, nome, data_nascimento, sexo, cidade, estado, telefone, email,  foto_usuario FROM usuarios ";
        $result_usuarios = $conn->prepare($query_usuario);
        $result_usuarios->execute();

        

        ?>

    <div class="container emp-profile">
            <form method="post">
                 
                <div class="row">
                    <div class="col-md-4">
                        <div class="profile-img">
                            
                            <?php 
                                while($row_usuario = $result_usuarios->fetch(PDO::FETCH_ASSOC)){ 
                                    extract($row_usuario);
                                    if((!empty($foto_usuario)) and (file_exists("imagensperfil/$id/$foto_usuario"))){
                                        if ($id == $_SESSION['id']){
                                                   
                                            echo "<img src='imagensperfil/$id/$foto_usuario'><br>";
                                        }
                                                
                                    }
                                }
                            ?>
                        
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="profile-head">
                            <h4>
                                <?php 
                                    echo "<b>".$_SESSION['nome']."</b>";
                                    echo ", seja bem-vindo(a) ";        
                                ?>
                            </h4>
                                   
                            <div class="row">
                                <div class="col-md-6">
                                    <label>Data de Nascimento</label>
                                </div>
                                <div class="col-md-6">
                                    <p><?php echo $_SESSION['data_nascimento']; ?></p>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <label>Sexo</label>
                                </div>
                                <div class="col-md-6">
                                    <p><?php echo $_SESSION['sexo']; ?></p>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <label>Cidade</label>
                                </div>
                                <div class="col-md-6">
                                    <p><?php echo $_SESSION['cidade']; ?></p>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <label>Estado</label>
                                </div>
                                <div class="col-md-6">
                                    <p><?php echo $_SESSION['estado']; ?></p>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <label>Telefone</label>
                                </div>
                                <div class="col-md-6">
                                    <p><?php echo $_SESSION['telefone']; ?></p>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <label>E-mail</label>
                                </div>
                                <div class="col-md-6">
                                    <p><?php echo $_SESSION['email']; ?></p>
                                </div>
                            </div>
                                    
                        </div>
                        <div class="form-group">
                            <a href="cadanimal.php"> <button  type="button" class="form-control btn btn-primary submit px-3">Registrar Animal</button></a>
                        </div>
                        <div class="form-group">
                            <a href="galeriaanimais.php"> <button type="button" class="form-control btn btn-primary submit px-3">Galeria de Animais</button> </a>
                        </div>                 
                    </div>
                </div>
                
            </form>           
        </div>
    <footer id="footer">
        <div class="container">
            <div class="row">
                <div class="col-sm-6">
                    <p>Anna Beatriz Furlan Zanobio | Bruno de Souza Pinto <br>FHO - Fundação Herminio Ometto</p>
                    
                </div>
                
            </div>
        </div>
    </footer><!--/#footer-->

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