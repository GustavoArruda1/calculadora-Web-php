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

    if (isset($_POST['acao'])) {
        if (is_numeric($_POST['num1']) && is_numeric($_POST['num2'])) {
            switch ($_POST['operacao']) {
                case '+':
                    $soma = $_POST['num1'] + $_POST['num2'];
                    $result = $soma;
                    break;
                case '-':
                    $subtracao = $_POST['num1'] - $_POST['num2'];
                    $result = $subtracao;
                    break;
                case '*':
                    $multiplicacao = $_POST['num1'] * $_POST['num2'];
                    $result = $multiplicacao;
                    break;
                case '/':
                    if ($_POST['num2'] == 0) {
                        $result = 'Erro: Número dividido por zero!';
                    } else {
                        $divisao = $_POST['num1'] / $_POST['num2'];
                        $result = $divisao;
                    }
                    break;
        }   
        } else {
            $result = 'Digite apenas números!';
        }
    }

    ?>

    <div class="calc">
        <div class="resultado">
            <p>
                <?php echo $result; ?>
            </p>
        </div>
        <form method="post">
            <div class="input-container">
                <div class="input-item">
                    <input class="input-text" id="2" type="text" name="num2" required>
                    <label for="2">Digite o segundo número</label>
                </div> <!-- input-item -->
                <div class="input-item">
                    <input id="1" class="input-text" type="text" name="num1" required>
                    <label for="1">Digite o primeiro número</label>

                </div> <!-- input-item -->
                <div class="opr">
                    <label for="3">Selecione a operação</label>
                    <select name="operacao" id="3">
                        <option name="+" value="+">Adição (+)</option>
                        <option value="-">Subtração (-)</option>
                        <option value="*">Multiplicação (*)</option>
                        <option value="/">Divisão (/)</option>
                    </select>
                </div> <!-- opr -->
            </div> <!-- input-container -->
            <div class="enviar">
                <input type="submit" name="acao" value="=">
            </div> <!-- enviar -->
        </form>
    </div>
</body>

</html>