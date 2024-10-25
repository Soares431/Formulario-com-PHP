<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "cadastro";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Verifique se o formulário foi enviado
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nome = $_POST["nome"];
    $telefone = $_POST["telefone"];
    $email = $_POST["email"];
    $peso = $_POST["peso"];
    $altura = $_POST["altura"];

    // Calcular IMC
    if ($altura > 0) {
        $imc = $peso / ($altura * $altura);
    } else {
        $imc = 0; // evitar divisão por zero
    }

    $sql = "INSERT INTO cliente (nome, telefone, email, peso, altura) VALUES ('$nome', '$telefone', '$email', '$peso', '$altura')";

    if ($conn->query($sql) === TRUE) {
        echo "Novo registro criado com sucesso.<br>";

        // Classificação do IMC
        if ($imc < 18.5) {
            echo "Classificação: Abaixo do peso.<br>";
            echo "Mensagem: Sua dieta deve ser rica em proteínas, carboidratos saudáveis e gorduras boas. Consuma alimentos como: carnes magras, ovos, legumes, frutas e cereais integrais.";
        } elseif ($imc >= 18.5 && $imc < 24.9) {
            echo "Classificação: Peso normal.<br>";
            echo "Mensagem: Mantenha uma dieta balanceada, com proteínas magras, carboidratos complexos, gorduras saudáveis e muitas frutas e verduras. Beba muita água e evite alimentos processados.";
        } elseif ($imc >= 25 && $imc < 29.9) {
            echo "Classificação: Sobrepeso.<br>";
            echo "Mensagem: Reduza o consumo de carboidratos simples e aumente a ingestão de proteínas e fibras. Alimentos recomendados: frango, peixes, vegetais de folhas verdes, frutas com baixo índice glicêmico e grãos integrais.";
        } elseif ($imc >= 30 && $imc < 34.9) {
            echo "Classificação: Obesidade grau 1.<br>";
            echo "Mensagem: Evite açúcar, alimentos ultraprocessados e bebidas com calorias. Priorize vegetais, frutas, carnes magras e cereais integrais. Coma pequenas porções e evite longos períodos sem comer.";
        } elseif ($imc >= 35 && $imc < 39.9) {
            echo "Classificação: Obesidade grau 2.<br>";
            echo "Mensagem: Adote uma dieta hipocalórica, rica em alimentos nutritivos e com pouca gordura. Consuma principalmente vegetais, proteínas magras e frutas, e evite frituras, doces e refrigerantes.";
        } else {
            echo "Classificação: Obesidade grau 3.<br>";
            echo "Mensagem: É importante seguir uma dieta controlada e monitorada por um nutricionista. Aumente o consumo de vegetais, fibras e proteínas magras, e evite completamente alimentos ricos em gordura e açúcar.";
        }
    } else {
        echo "Erro: " . $sql . "<br>" . $conn->error;
    }

    //header("Location: index.php", true, 301);  

    $conn->close();
}
?>