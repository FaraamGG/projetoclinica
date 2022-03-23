<?php

include ('bd/bd.php'); //acesso ao banco de dados e a variável $conn

session_start();

if (isset($_POST['cpf'])) { //checa se existe algum post

    $credenciais = $_POST; //recebe as credenciais

    foreach ($credenciais as $dado => $valor) { //cria as variáveis com os dados do cliente

        $$dado = $valor;

    }

    if ($tipo == 1) { //condicional para o cadastro de cliente

        $sql = "INSERT INTO clientes (Nome, Cpf, Senha) VALUES (?, ?, ?)";

        $stmt = mysqli_stmt_init($conn);

        if (!mysqli_stmt_prepare($stmt, $sql)) {

            echo "deu não";

        } else {

            mysqli_stmt_bind_param($stmt, "sss", filter_var($nome, FILTER_SANITIZE_SPECIAL_CHARS), $cpf, $senha);

            mysqli_stmt_execute($stmt);

            $_SESSION['nome'] = $nome; //Sessão para passar os dados para a página do cliente

            header("Location: pagina.php");
            
        }


    } else if ($tipo == 0){  //Condicional para o login
    
        $sql1 = "SELECT nome FROM clientes WHERE (cpf = ? AND senha = ?)";
        
        $stmt = mysqli_stmt_init($conn);

        if (!mysqli_stmt_prepare($stmt, $sql1)) {

            echo "deu não";

        } else {

            mysqli_stmt_bind_param($stmt, "ss", $cpf, $senha);

            mysqli_stmt_execute($stmt);

            $resultado = mysqli_stmt_get_result($stmt);
            $nome = mysqli_fetch_array($resultado);

            $nr = mysqli_num_rows($resultado);

            if ($nr) {

                //print_r($nome['nome']);
                $_SESSION['nome'] = $nome['nome']; //Sessão para passar os dados para a página do cliente
                header("Location: pagina.php"); 

            } else {

                echo "Usuário não encontrado";
                sleep(2);
                header("Location: index.html");

            }
            
        }

    } else {
        echo "Erro";
        header("Location: index.html");
    }





} else {

    header("Location: index.html");

}
//print_r($dados);

//if(isset)


?>