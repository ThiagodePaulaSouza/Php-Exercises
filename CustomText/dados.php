<!DOCTYPE html>
<html lang="pt_br">

<head>
    <?php
        $txt = isset($_GET["txt"]) ? $_GET["txt"]:"[texto não informado]";
        $tam = isset($_GET["tam"]) ? $_GET["tam"]:"12pt";
        $cor = isset($_GET["cor"]) ? $_GET["cor"]:"#000000";
    ?>
    <style>
        span.texto {
            font-size: <?php echo $tam; ?>;
            color: <?php echo $cor; ?>;
        }
    </style>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    
</head>
<body>
    <div>
        <?php
            echo "<span class='texto'>$txt</span>";
        ?>
        <BR /><BR /><a href="index.html">VOLTAR</a>
    </div>
</body>

</html>