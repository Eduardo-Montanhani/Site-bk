<?php
//transformar em inteiro
$id = (int)$id;

//selecionar o tipo
$sqlTipo = "SELECT * FROM tipo WHERE id = {$id} limit 1";
//executa o comando sql e guarda o resultado
$consulta = mysqli_query($con, $sqlTipo);
//separar o resultado em um array
$dados = mysqli_fetch_array($consulta);

$tipo = $dados["tipo"];
?>

<h2 class="text-center">
    <?= $tipo ?>
</h2>

<div class="row">
    <?php
    $sqlProduto = "SELECT id, produto, valor, foto FROM produto WHERE tipo_id = {$id} ";

    //executar o sql e guardar o resultado
    $consulta = mysqli_query($con, $sqlProduto);
    //separar os resultados em um array
    while ($dados = mysqli_fetch_array($consulta)) {
        $id = $dados["id"];
        $valor = $dados["valor"];
        $foto = $dados["foto"];
        $produto = $dados["produto"];
    ?>
        <div class="col-12 col-md-4">
            <div class="card text-center">
                <img src="imagens/<?= $foto ?>" alt="<?= $produto ?>" class="w-100">
                <p>
                    <strong><?= $produto ?></strong>
                </p>
                <p>
                    R$ <?= number_format($valor, 2, ",", "."); ?>
                </p>
                <p>
                    <a href="produto/<?= $id ?>" class="btn btn-danger">
                        Detalhes do produto
                    </a>
                </p>
            </div>
        </div>

    <?php
    } //fim do while


    ?>
</div>