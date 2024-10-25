<?php
$nome = $_REQUEST["nome"];
$peso = $_REQUEST["peso"];
$altura = $_REQUEST["altura"];

// Calcular IMC
$imc = $peso / ($altura * $altura);

// Exibir o resultado
echo "Nome: " . htmlspecialchars($nome) . "<br>";
echo "Peso: " . htmlspecialchars($peso) . " kg<br>";
echo "Altura: " . htmlspecialchars($altura) . " m<br>";
echo "<p>Seu IMC é: " . number_format($imc*10000, 1) . "</p>"; // Mantive em 1 casa decimal

// Adicionar interpretação do IMC
if ($imc < 18.5) {
    echo "<br>Classificação: Abaixo do peso.";
    echo "<br>Mensagem: Sua dieta deve ser rica em proteínas, carboidratos saudáveis e gorduras boas. Consuma alimentos como: carnes magras, ovos, legumes, frutas e cereais integrais.";
} elseif ($imc >= 18.5 && $imc < 24.9) {
    echo "<br>Classificação: Peso normal.";
    echo "<br>Mensagem: Mantenha uma dieta balanceada, com proteínas magras, carboidratos complexos, gorduras saudáveis e muitas frutas e verduras. Beba muita água e evite alimentos processados.";
} elseif ($imc >= 25 && $imc < 29.9) {
    echo "<br>Classificação: Sobrepeso.";
    echo "<br>Mensagem: Reduza o consumo de carboidratos simples e aumente a ingestão de proteínas e fibras. Alimentos recomendados: frango, peixes, vegetais de folhas verdes, frutas com baixo índice glicêmico e grãos integrais.";
} elseif ($imc >= 30 && $imc < 34.9) {
    echo "<br>Classificação: Obesidade grau 1.";
    echo "<br>Mensagem: Evite açúcar, alimentos ultraprocessados e bebidas com calorias. Priorize vegetais, frutas, carnes magras e cereais integrais. Coma pequenas porções e evite longos períodos sem comer.";
} elseif ($imc >= 35 && $imc < 39.9) {
    echo "<br>Classificação: Obesidade grau 2.";
    echo "<br>Mensagem: Adote uma dieta hipocalórica, rica em alimentos nutritivos e com pouca gordura. Consuma principalmente vegetais, proteínas magras e frutas, e evite frituras, doces e refrigerantes.";
} else {
    echo "<br>Classificação: Obesidade grau 3.";
    echo "<br>Mensagem: É importante seguir uma dieta controlada e monitorada por um nutricionista. Aumente o consumo de vegetais, fibras e proteínas magras, e evite completamente alimentos ricos em gordura e açúcar.";
}
?>