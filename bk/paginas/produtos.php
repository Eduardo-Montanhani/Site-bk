<h1 class="text-center">
    Todos os Lanches
</h1>
    <div class="row">
    <?php
    $sqlLanches = "SELECT * FROM produto ORDER BY RAND() ";
    //executar o sql
    $consultaLanches = mysqli_query($con, $sqlLanches);

    while ($dados = mysqli_fetch_array($consultaLanches)) {
        $id = $dados["id"];
        $produto = $dados["produto"];
        $foto = $dados["foto"];
    ?>
        <div class="col-12 col-md-4 text-center">
            <div class="card">
                <img src="imagens/<?= $foto ?>" alt="<?= $produto ?>" class="w-100">

                <p>
                    <strong><?=$produto?></strong>
                </p>
                <p>
                    <a href="produto/<?=$id?>" class="btn btn-danger">
                    Detalhes
                </a>
                </p>
            </div>
        </div>
    <?php
    }

    ?>
    </div>