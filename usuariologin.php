<?php
   session_start();
   session_destroy();
   header('Location: index.php');

   $email = $_POST["email"];
   $senha = $_POST["senha"];
    
   $query = "SELECT * FROM usuarios WHERE email='$email' and senha='$senha'";
    
   $conexao = new PDO('mysql:host=127.0.0.1;dbname=tccbancooficial', 'root', '');
   $resultado = $conexao->query($query);
   $logado = $resultado->fetch();
   $data_nascimento = $logado['data_nascimento'];
   $data_nascimento = implode("/",array_reverse(explode("-",$data_nascimento)));



    
   if ($logado == null) {
      // Usuário ou senha inválida
      header('Location: index.php');
   } 
   else {
      session_start();
      $_SESSION['logado'] = $logado;
      $_SESSION['id'] = $logado['id'];
      $_SESSION['nome'] = $logado['nome'];
      $_SESSION['data_nascimento'] = $data_nascimento;
      $_SESSION['sexo'] = $logado['sexo'];
      $_SESSION['cidade'] = $logado['cidade'];
      $_SESSION['estado'] = $logado['estado'];
      $_SESSION['telefone'] = $logado['telefone'];
      $_SESSION['email'] = $logado['email'];
      // Direciona o usuário para o painel administrativo do sistema
      header('Location: perfil_usuario.php');



   }
   die();


?>