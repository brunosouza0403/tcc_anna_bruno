<?php
  session_start();
  ob_start();
  include_once "conexao.php";
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="webthemez">
    <title>Cadastre-se</title>
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/font-awesome.min.css" rel="stylesheet">
    <link href="css/animate.min.css" rel="stylesheet">
    <link href="css/owl.carousel.css" rel="stylesheet">
    <link href="css/owl.transitions.css" rel="stylesheet">
    <link href="css/prettyPhoto.css" rel="stylesheet">
    <link href="css/styles.css" rel="stylesheet">       
    <link rel="shortcut icon" href="images/icone.png"> 
</head> 

<script>
    function botaosair(){
        alert("Tem certeza que quer sair?");
    }

    function botaocadastrar(){
      alert("Cadastrado com sucesso, faça o login para continuar")
    }
</script>

<body id="home">
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
                        <li class="scroll active"><a href="index.php">Pagina Inicial</a></li>      
                                               
                    </ul>
                </div>
            </div>
        </nav>
    </header>
    <?php
    // Receber os dados do formulario
      $dados = filter_input_array(INPUT_POST, FILTER_DEFAULT);

      // Verificar se o usuario clicou no botao
      if (!empty($dados['SalvarPerfil'])) {
          $arquivo = $_FILES['foto_usuario'];
          //var_dump($dados);
          //var_dump($arquivo);

          // Criar a QUERY cadastrar no banco de dados
          $query_usuario = "INSERT INTO usuarios (nome, data_nascimento, sexo, cidade, estado, telefone, email, senha,  foto_usuario, created) VALUES (:nome, :data_nascimento, :sexo, :cidade, :estado, :telefone, :email, :senha, :foto_usuario, NOW())";
          $cad_usuario = $conn->prepare($query_usuario);
          $cad_usuario->bindParam(':nome', $dados['nome'], PDO::PARAM_STR);
          $cad_usuario->bindParam(':data_nascimento', $dados['data_nascimento']);
          $cad_usuario->bindParam(':sexo', $dados['sexo']);
          $cad_usuario->bindParam(':cidade', $dados['cidade']);
          $cad_usuario->bindParam(':estado', $dados['estado']);
          $cad_usuario->bindParam(':telefone', $dados['telefone']);
          $cad_usuario->bindParam(':email', $dados['email']);
          $cad_usuario->bindParam(':senha', $dados['senha']);
          $cad_usuario->bindParam(':foto_usuario', $arquivo['name'], PDO::PARAM_STR);
          $cad_usuario->execute();

          // Verificar se cadastrou com sucesso
          if ($cad_usuario->rowCount()) {
              // Verificar se o usuario esta enviando a foto
              if ((isset($arquivo['name'])) and (!empty($arquivo['name']))) {
                  // Recuperar ultimo ID inserido no banco de dados
                  $ultimo_id = $conn->lastInsertId();

                  // Diretorio onde o arquivo sera salvo
                  $diretorio = "imagensperfil/$ultimo_id/";

                  // Criar o diretorio
                  mkdir($diretorio, 0755);

                  // Upload do arquivo
                  $nome_arquivo = $arquivo['name'];
                  move_uploaded_file($arquivo['tmp_name'], $diretorio . $nome_arquivo);

                  $_SESSION['msg'] = "<p style='color: green;'>Usuário e a foto cadastrada com sucesso!</p>";
                  header("Location: index.php");
              } else {
                  $_SESSION['msg'] = "<p style='color: green;'>Usuário cadastrado com sucesso!</p>";
                  header("Location: registrar.php");
              }
          } else {
              echo "<p style='color: #f00;'>Erro: Usuário não cadastrado com sucesso!</p>";
          }
      }
    ?>
    

    <!--CRIAR CONTA-->
  
    <div class="container">
      <div class="row justify-content-center">
        <div class="col-md-3 text-center mb-5">
          <h3 class="heading-section">Cadastre-se</h3>
        </div>
      </div>

      <form name="cadusuario" method="post" enctype="multipart/form-data">

        <div class="form-group col-md-6" > 
          <b>Nome completo: </b>
          <input type="text" class="form-control" placeholder="Nome completo" id="nome" name="nome" required>
        </div>

        <div class="form-group col-md-6">
          <b>Data de nascimento: </b>
          <input type="date" class="form-control"  id="data_nascimento" name="data_nascimento" required>
        </div>

        <div class="form-group col-md-6"> 
          <b>Sexo: </b> <br>
          <input type="radio"  id="sexo" name="sexo" value="Masculino" /> Masculino <br>
          <input type="radio"  id="sexo" name="sexo" value="Feminino" > Feminino <br>
          <input type="radio" id="sexo" name="sexo" value="Outro" > Outro
        </div>

        <div class="form-group col-md-6">
          <b>Cidade: </b>
          <input type="text" class="form-control" placeholder="Digite sua cidade" id="cidade" name="cidade" required>
        </div>

        <div class="form-group col-md-6">
          <b>Estado: </b>
          <input type="text" class="form-control" placeholder="Digite seu estado (XX)" id="estado" name="estado" maxlength="2" required>
        </div>

        <div class="form-group col-md-6">
          <b>Telefone para contato: </b>
          <input type="text" class="form-control" placeholder="Sem caracteres especiais" id="telefone" name="telefone" required>
        </div>

        <div class="form-group col-md-6">
          <b>E-mail: </b>
          <input type="email" class="form-control" placeholder="Email do usuario"  id="email" name="email"required>
        </div>

        <div class="form-group col-md-6">
          <b>Senha: </b>
          <input id="password-field" type="password" class="form-control" placeholder="Password" id="senha" name="senha" required>
        </div>

        <div class="form-group col-md-6">
          <b>Imagem Perfil: </b>
          <input type="file" name="foto_usuario" id="foto_usuario">
        </div>

        <div class="form-group">
          <button  type="submit" class="form-control btn btn-primary submit px-3"  value="Cadastrar" name="SalvarPerfil" onclick="botaocadastrar()">Registrar</button>
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
    </footer>

    <script src="js/jquery.min.js"></script>
    <script src="js/popper.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/main.js"></script>
    
  </body>
</html>
    
    