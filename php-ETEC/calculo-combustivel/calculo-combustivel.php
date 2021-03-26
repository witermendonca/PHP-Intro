<!DOCTYPE html>
<html>

<body>
    <h1>CALCULO DE COMBUSTIVEL</h1>
    <form action="calculo-combustivel.php">
        <label>Distância em quilometros:</label>
        <input type="text" name="km"><br><br>
        <label>Consumo de combustível do veículo:</label>
        <input type="text" name="consumo"><br><br>
        <label>Valor do combústivel:</label>
        <input type="text" name="valorCombustivel"><br><br>
        <input type="submit" value="Calcular">
        <br><br><br>
    </form>

    <?php
        $res = ($_GET["km"] / $_GET["consumo"]) * $_GET["valorCombustivel"];
        echo $res;
    ?>
</body>

</html>