<?php

include("conexao.php");
if (isset($_POST['email']) && strlen($_POST['email']) > 0){
    $erro = [];   

        
    if(!isset($_SESSION))
        session_start();

        $_SESSION['email'] = $mysqli->escape_string($_POST['email']);
        $_SESSION['senha'] = $_POST['senha'];
        


        $sql_code = "SELECT senha, codigo FROM usuarios WHERE email =  '{$_SESSION['email']}'"; 
        $sql_query = $mysqli->query($sql_code) or die($mysqli->error);
        $dado = $sql_query->fetch_assoc();
        $total = $sql_query->num_rows;


        if($total == 0){
            $erro[] = "Este email nao pertence a nenhuma conta";
        }else{

            if($dado['senha'] == $_SESSION['senha']){

                $_SESSION['usuarios'] = $dado['codigo'];
            
            }else{

                $erro [] = "senha incorreta";
        
            }
    
        }
    
      
       
       



       


    
    }
$email = isset($_SESSION['email']) ? $_SESSION['email'] : null;


?>
<html>
    <head>
        <meta charset="utf-8">

    </head>
        <body>
            <?php
            if(isset($erro) && count($erro) > 0)
            foreach ($erro as $msg){
                echo "<p>$msg</p>";
            }
            
            
            ?>
            <form method="POST" action="sucesso.php">
                <p><input value="<?=$email?>"  name="email" placeholder="email" type="text" ></p>
                <p><input name="senha"  type="password"></p>
                <p><a href="">Esqueceu a Senha?</a></p>
                <p><input type="submit" value="Enviar"></input></p>
            </form>
        </body>
</html>