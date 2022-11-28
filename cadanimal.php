<?php
    session_start();
    ob_start();
    include_once "conexao.php";
    include("nav.php");
?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="images/icone.png"> 
    <title>Cadastro de Animais</title>
    <!-- core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/font-awesome.min.css" rel="stylesheet">
    <link href="css/animate.min.css" rel="stylesheet">
    <link href="css/owl.carousel.css" rel="stylesheet">
    <link href="css/owl.transitions.css" rel="stylesheet">
    <link href="css/styles.css" rel="stylesheet"> 
    <!--[if lt IE 9]>
    <script src="js/html5shiv.js"></script>
    <script src="js/respond.min.js"></script>
    <![endif]-->       
    
</head>
<script> 
    function botaocadastraranimal(){
      alert("Animal cadastrado com sucesso!");
    }
</script>
<body>
  
    <h2>Cadastro de Animal</h2>

    <?php
        // Receber os dados do formulario
        $dados = filter_input_array(INPUT_POST, FILTER_DEFAULT);

        // Verificar se o usuario clicou no botao
        if (!empty($dados['SalvarFoto'])) {
            $arquivo = $_FILES['foto_animal'];
            //var_dump($dados);
            //var_dump($arquivo);

            // Criar a QUERY cadastrar no banco de dados
            $query_animal = "INSERT INTO animais (raca, condicao, sexo, rua, cidade, estado, telefone,  foto_animal, created) VALUES (:raca, :condicao, :sexo, :rua, :cidade, :estado, :telefone, :foto_animal, NOW())";
            $cad_animal = $conn->prepare($query_animal);
            $cad_animal->bindParam(':raca', $dados['raca'], PDO::PARAM_STR);
            $cad_animal->bindParam(':condicao', $dados['condicao']);
            $cad_animal->bindParam(':sexo', $dados['sexo']);
            $cad_animal->bindParam(':rua', $dados['rua']);
            $cad_animal->bindParam(':cidade', $dados['cidade']);
            $cad_animal->bindParam(':estado', $dados['estado']);
            $cad_animal->bindParam(':telefone', $dados['telefone']);
            $cad_animal->bindParam(':foto_animal', $arquivo['name'], PDO::PARAM_STR);
            $cad_animal->execute();

            // Verificar se cadastrou com sucesso
            if ($cad_animal->rowCount()) {
                // Verificar se o usuario esta enviando a foto
                if ((isset($arquivo['name'])) and (!empty($arquivo['name']))) {
                    // Recuperar ultimo ID inserido no banco de dados
                    $ultimo_id = $conn->lastInsertId();

                    // Diretorio onde o arquivo sera salvo
                    $diretorio = "imagensanimais/$ultimo_id/";

                    // Criar o diretorio
                    mkdir($diretorio, 0755);

                    // Upload do arquivo
                    $nome_arquivo = $arquivo['name'];
                    move_uploaded_file($arquivo['tmp_name'], $diretorio . $nome_arquivo);

                    $_SESSION['msg'] = "";
                    header("Location: galeriaanimais.php");
                } else {
                    $_SESSION['msg'] = "";
                    header("Location: galeriaanimais.php");
                }
            } else {
                echo "<p style='color: #f00;'>Erro: Usuário não cadastrado com sucesso!</p>";
            }
        }
    ?>

    <form name="cadanimal" method="POST" action="" enctype="multipart/form-data">
        <div class="form-group col-md-6" > 
            <b>Raça:* </b>
            <input type="text" class="form-control" placeholder="Informe a raça" id="raca" name="raca" required>
        </div>

        <div class="form-group col-md-6">
            <b>Condições do animal:* </b>
            <input type="text" class="form-control" placeholder="Digite as condições do animal" id="condicao" name="condicao" required>
        </div>

        <div class="form-group col-md-6"> 
            <b>Sexo:* </b> <br>
            <input type="radio"  id="sexo" name="sexo" value="Masculino"> Macho <br>
            <input type="radio"  id="sexo" name="sexo" value="Feminino" > Fêmea <br>
            <input type="radio"  id="sexo" name="sexo" value="indefinido" > Não consigo identificar <br>
        </div>

        <div class="form-group col-md-6">
            <b>Rua:* </b>
            <input type="text" class="form-control" placeholder="Digite a rua onde o animal foi visto" id="rua" name="rua" required>
        </div>

        <div class="form-group col-md-6">
            <b>Cidade:* </b>
            <input type="text" class="form-control" placeholder="Digite a cidade" id="cidade" name="cidade" required>
        </div>

        <div class="form-group col-md-6">
            <b>Estado:* </b>
            <input type="text" class="form-control" placeholder="Digite o estado" id="estado" name="estado" maxlength="2" required>
        </div>

        <div class="form-group col-md-6">
            <b>Telefone para contato: </b>
            <input type="number" class="form-control" placeholder="Digite seu telefone"  id="telefone" name="telefone" mask="(00) 0000-0000">
        </div>

        <div class="form-group col-md-6">
            <b>Imagem do Animal: </b>
            <input type="file" name="foto_animal" id="foto_animal">
        </div>

        <div class="form-group">
            <button  type="submit" class="form-control btn btn-primary submit px-3" value="Cadastrar" name="SalvarFoto" onclick="botaocadastrar()">Registrar</button>
        </div>    
    </form>
    <footer id="footer">
        <div class="container">
            <div class="row">
                <div class="col-sm-6">
                    <p>Anna Beatriz Furlan Zanobio | Bruno de Souza Pinto <br>FHO - Fundação Herminio Ometto</p>
                </div>
                
            </div>
        </div>
    </footer><!--/#footer-->
</body>

</html>