<?php

$erroNome = "";
$erroEmail = "";
$erroSenha = "";
$erroRepete_senha = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  if (empty($_POST["nome"])) {
    $erroNome = "Por favor, preencha um nome";
  } else {
    $nome = limpaPost($_POST['nome']);

    if (!preg_match("/^[a-zA-Z-' ]*$/", $nome)) {
      $erroNome = "Apenas Aceitamos letras e espaços";
    }
  }

  if (empty($_POST["email"])) {
    $erroEmail = "Por favor, informe um email";
  } else {
    $email = limpaPost($_POST["email"]);

    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
      $erroEmail = "E-mail inválido!";
    }
  }

  if (empty($_POST["senha"])) {
    $erroSenha = "Por favor, informe uma senha!";
  } else {
    $senha = limpaPost($_POST["senha"]);

    if (strlen($senha) < 6) {
      $erroSenha = "Senha precisa ter no mínimo 6 digitos!";
    }
  }

  if (empty($_POST["repete_senha"])) {
    $erroRepete_senha = "Por favor, informe a repetição da senha!";
  } else {
    $repete_senha = limpaPost($_POST["repete_senha"]);

    if ($repete_senha !== $senha) {
      $erroRepete_senha = "A repetição da senha está diferente da senha anteriormente digitada!";
    }
  }

  if (($erroNome == "") && ($erroEmail == "") && ($erroSenha == "") && ($erroRepete_senha == "")) {
    header('Location: obrigado.php');
  }
}

function limpaPost($valor)
{
  $valor = trim($valor);
  $valor = stripslashes($valor);
  $valor = htmlspecialchars($valor);
  return $valor;
}
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Validação de Formulário</title>
  <link href="src/style/estilo.css" rel="stylesheet">
</head>
<body>
  
  <main>
    <h1><span>Formulário PHP</span><br>Validação de Formulário</h1>

    <form method="post">

      <!-- NOME COMPLETO -->
      <label> Nome Completo </label>
      <input type="text" <?php if (!empty($erroNome)) {
                            echo "class='inválido'";
                          } ?> <?php if (isset($_POST["nome"])) {
                                  echo "value='" . $_POST["nome"] . "'";
                                } ?> name="nome" placeholder="Digite seu nome" required>
      <br><span class="erro"><?php echo $erroNome ?></span>

      <!-- EMAIL -->
      <label> E-mail </label>
      <input type="email" <?php if (!empty($erroEmail)) {
                            echo "class='inválido'";
                          } ?> <?php if (isset($_POST["email"])) {
                                  echo "value='" . $_POST["email"] . "'";
                                } ?> name="email" placeholder="email@provedor.com" required>
      <br><span class="erro"><?php echo $erroEmail ?></span>

      <!-- SENHA -->
      <label> Senha </label>
      <input type="password" <?php if (!empty($erroSenha)) {
                                echo "class='inválido'";
                              } ?> <?php if (isset($_POST["senha"])) {
                                      echo "value='" . $_POST["senha"] . "'";
                                    } ?> name="senha" placeholder="Digite uma senha" required>
      <br><span class="erro"><?php echo $erroSenha ?></span>

      <!-- REPETE SENHA -->
      <label> Repete Senha </label>
      <input type="password" <?php if (!empty($erroRepete_senha)) {
                                echo "class='inválido'";
                              } ?> <?php if (isset($_POST["repete_senha"])) {
                                      echo "value='" . $_POST["repete_senha"] . "'";
                                    } ?> name="repete_senha" placeholder="Repita a senha" required>
      <br><span class="erro"><?php echo $erroRepete_senha ?></span>
      <button type="submit"> Enviar Formulário </button>
    </form>
  </main>
</body>
</html>