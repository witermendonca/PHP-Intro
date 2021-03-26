<?php
$conexao = new PDO('mysql:host=localhost:3306;dbname=db_aulaphp', 'root', 'root');

$botao = filter_input(INPUT_POST, 'grava', FILTER_SANITIZE_STRING);
$altera = filter_input(INPUT_POST, 'altera', FILTER_SANITIZE_STRING);
$deletar = filter_input(INPUT_POST, 'deleta', FILTER_SANITIZE_STRING);


if($botao){
		//Recebe os dados do form
		$nom = filter_input(INPUT_POST, 'nome', FILTER_SANITIZE_STRING);
		$email = filter_input(INPUT_POST, 'email', FILTER_SANITIZE_STRING);
		$senha = filter_input(INPUT_POST, 'pass', FILTER_SANITIZE_STRING);

        if($nom == null || $email == null || $senha == null){
            echo "<script>alert('Prencha todos os campos')</script>";
        }else{
            //Insere os dados no banco
            $gravadados = "INSERT INTO tb_user (nome, email,pass) VALUES (:nome, :email, :senha)";
 
            $inserir = $conexao->prepare($gravadados);	
            $inserir->bindParam(':nome', $nom);
            $inserir->bindParam(':email', $email);
            $inserir->bindParam(':senha', $senha);

            if($inserir->execute()){
                   echo "<script>alert('Dados gravados com sucesso!')</script>";
                }else{
                   echo('Erro ao gravar dados');
                }
        }
		

	}
 if($altera){

        //Recebe os dados do form
		$usuario = $_POST['nome']; //recebe nome do form
		$email_usuario = $_POST['email']; //recebe email do form
		
        //alterar os dados no banco
        $dados = "update tb_user SET nome= '$usuario'  where email= '$email_usuario'";
            
 
        $grava_dados = $conexao->prepare($dados);
            
        if($grava_dados->execute()){
               echo "<script>alert('Dados alterados com sucesso!')</script>";
            }else{
               echo('Erro ao atualizar dados');
            }

    }

    if($deletar){

        //Recebe os dados do form
		$usuario = $_POST['nome']; //recebe nome do form
		$email_usuario = $_POST['email']; //recebe email do form
		
        //deletar os dados no banco
        $dados = "delete from tb_user where email= '$email_usuario'";
            
 
        $deleta_dados = $conexao->prepare($dados);
            
        if($deleta_dados->execute()){
               echo "<script>alert('Dados deletados com sucesso!')</script>";
            }else{
               echo('Erro ao deletar dados');
            }

    }
?>


<!DOCTYPE html>
<html lang="pt-br">

<head>
    <!-- Meta tags Obrigatórias -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css"
        integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">

    <title>Aula Crud</title>
</head>

<body>
    <div class="container mt-5">
        <h1>Formulário com conexão MySQL</h1>
        <form method="post" action="form.php">
            <div class="form-group">
                <label for="inputAddress">Nome</label>
                <input type="text" class="form-control" id="inputName" name="nome" placeholder="Nome">
            </div>
            <div class="form-row">

                <div class="form-group col-md-6">
                    <label for="inputEmail4">Email</label>
                    <input type="email" class="form-control" id="inputEmail" name="email" placeholder="Email">
                </div>
                <div class="form-group col-md-6">
                    <label for="inputPassword4">Senha</label>
                    <input type="password" class="form-control" id="inputPassword" name="pass" placeholder="Senha">
                </div>
            </div>
            <button type="submit" name="grava" value="Gravar" class="btn btn-success">Gravar Dados</button>

            <button type="submit" name="altera" value="Altera" class="btn btn-primary">Alterar Dados</button>

            <button type="submit" name="deleta" value="Deleta" class="btn btn-danger">Deletar Dados</button>
        </form>

    </div>

    <!-- JavaScript (Opcional) -->
    <!-- jQuery primeiro, depois Popper.js, depois Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"
        integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous">
    </script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"
        integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous">
    </script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"
        integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous">
    </script>
</body>

</html>