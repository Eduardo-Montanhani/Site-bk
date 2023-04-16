<?php
//incluir o arquivo de conexao com o banco
include "config.php";
?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Burguer Kings</title>
    <base href="http://localhost:8080/bk/">
    <link rel="shortcut icon" href="imagens/icone.png">
    <link rel="stylesheet" href="css/bootstrap.min.css">
</head>

<body>
    <?php
    $sqlTipo = "SELECT * FROM tipo ORDER BY tipo";
    //executar o sql
    $consultaTipo = mysqli_query($con, $sqlTipo);
    //separar os dados
    /* while ( $dados = mysqli_fetch_array($consultaTipo)){
                //recuperar os dados
                $id = $dados ["id"];
                $tipo = $dados["tipo"];
                echo "<p>{$id} - {$tipo}</p>";
            }*/
    ?>
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <div class="container-fluid">
            <a class="navbar-brand" href="index.php">Burguer Kings</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="index.php">Home</a>
                    </li>
                    <li>
                        <li class="nav-item">
                            <a href="produtos"
                            class="nav-link">Todos os produtos</a>
                        </li>
                    </li>
                    <?php
                    while ($dados = mysqli_fetch_array($consultaTipo)) {
                        $id = $dados["id"];
                        $tipo = $dados["tipo"];
                        echo "<li
                             class='nav-item'>
                            <a href='tipo/{$id}'class='nav-link'>
                            {$tipo}</a>
                            </li>";
                    }
                    ?>
                </ul>
               
            </div>
        </div>
    </nav>
        
    <main class="container">
        <?php
            $pagina = "home";

           // echo $_GET["param"];

           if ( isset ($_GET["param"])){
            $param = $_GET["param"];
           // echo $param;
           //tipo/3
            $param = explode("/", $param);
            
            $pagina = $param[0];
            $id = $param[1] ?? NULL;
           }
           // tipo -> paginas/tipo.php
          $pagina = "paginas/{$pagina}.php";

          if ( file_exists($pagina)){
            include $pagina;
          } else {
            include "paginas/erro.php";
          }

        ?>
    </main>


    <footer class="bg-light p-2">
        <p class="text-center">
            Desenvolvido por Eduardo Montanhani
        </p>
    </footer>
</body>

</html>