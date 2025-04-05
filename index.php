<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./style.css">
    <title>Calculadora Simples</title>
</head>

<body>

    <?php
    
    $result = '';
    $resultadoFinal = '';
    session_start();

    if (isset($_POST['acao'])) {
        if (is_numeric($_POST['num1']) && is_numeric($_POST['num2'])) {
            switch ($_POST['operacao']) {
                case '+':
                    $soma = $_POST['num1'] + $_POST['num2'];
                    $result = $soma;
                    $resultadoFinal = $_POST['num1'] . ' ' . $_POST['operacao'] . ' ' . $_POST['num2'] . ' = ' . $result;
                    break;
                case '-':
                    $subtracao = $_POST['num1'] - $_POST['num2'];
                    $result = $subtracao;
                    $resultadoFinal = $_POST['num1'] . ' ' . $_POST['operacao'] . ' ' . $_POST['num2'] . ' = ' . $result;
                    break;
                case '*':
                    $multiplicacao = $_POST['num1'] * $_POST['num2'];
                    $result = $multiplicacao;
                    $resultadoFinal = $_POST['num1'] . ' ' . $_POST['operacao'] . ' ' . $_POST['num2'] . ' = ' . $result;
                    break;
                case '/':
                    if ($_POST['num2'] == 0) {
                        $result = 'Erro: Número dividido por zero!';
                    } else {
                        $divisao = $_POST['num1'] / $_POST['num2'];
                        $result = $divisao;
                        $resultadoFinal = $_POST['num1'] . ' ' . $_POST['operacao'] . ' ' . $_POST['num2'] . ' = ' . $result;
                    }
                    break;
        }   
        } else {
            $result = 'Digite apenas números!';
        }
    }

    if (isset($_POST['clear'])) {
        $result = '';
        $_POST['num1'] = '';
        $_POST['num2'] = '';
    }

    ?>

    <div class="calc">
        <div class="resultado">
            <p>
                <?php echo $resultadoFinal; ?>
            </p>
        </div>
        <form method="post">
            <div class="input-container">
                <div class="input-item">
                    <input class="input-text" value="<?php echo isset($_POST['num2']) ? $_POST['num2'] : ''; ?>" id="2"
                        type="text" name="num2" required>
                    <label for="2">Digite o segundo número</label>
                </div> <!-- input-item -->
                <div class="input-item">
                    <input id="1" class="input-text" value="<?php echo isset($_POST['num1']) ? $_POST['num1'] : ''; ?>"
                        type="text" name="num1" required autofocus>
                    <label for="1">Digite o primeiro número</label>

                </div> <!-- input-item -->
                <div class="opr">
                    <label for="3">Selecione a operação</label>
                    <select name="operacao" id="3">
                        <option name="+" <?php if (isset($_POST['operacao']) && $_POST['operacao']=='+' )
                            echo 'selected' ; ?>>Adição (+)</option>
                        <option value="-" <?php if (isset($_POST['operacao']) && $_POST['operacao']=='-' )
                            echo 'selected' ; ?>>Subtração (-)</option>
                        <option value="*" <?php if (isset($_POST['operacao']) && $_POST['operacao']=='*' )
                            echo 'selected' ; ?>>Multiplicação (*)</option>
                        <option value="/" <?php if (isset($_POST['operacao']) && $_POST['operacao']=='/' )
                            echo 'selected' ; ?>>Divisão (/)</option>
                    </select>
                </div> <!-- opr -->
            </div> <!-- input-container -->
            <div class="enviar">
                <input class="igual" type="submit" name="acao" value="=">
                <input class="clear" type="submit" name="clear" value="c">
            </div> <!-- enviar -->
        </form>
    </div> <!-- calc -->

</body>

</html>
