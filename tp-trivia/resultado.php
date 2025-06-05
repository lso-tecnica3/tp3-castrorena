<?php
include 'respuestas.php';

$correctas = 0;
$total = 10;
$puntaje = 0;
$porcentaje = 0;
?>

<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <title>Resultados de la trivia</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="container mt-5">

  <h1 class="mb-4">Resultados de la trivia</h1>

  <?php
  foreach ($respuestas_correctas as $clave => $respuesta_correcta) {
    echo "<div class='mb-3'>";

    if (isset($_POST[$clave])) {
      $respuesta_usuario = $_POST[$clave];
    } else {
      $respuesta_usuario = null;
    }

    if (is_array($respuesta_correcta)) {
      if (!is_array($respuesta_usuario)) {
        $respuesta_usuario = array(); 
      }
      sort($respuesta_usuario);
      sort($respuesta_correcta);

      if ($respuesta_usuario == $respuesta_correcta) {
        $correcto = true;
      } else {
        $correcto = false;
      }

      $respuesta_mostrar = implode(", ", $respuesta_correcta);
    } else {
      if ($respuesta_usuario == $respuesta_correcta) {
        $correcto = true;
      } else {
        $correcto = false;
      }
      $respuesta_mostrar = $respuesta_correcta;
    }

    if ($correcto) {
      $correctas = $correctas + 1;
      echo "<div class='alert alert-success'><strong>$clave:</strong> ¡Correcto!</div>";
    } else {
      echo "<div class='alert alert-danger'><strong>$clave:</strong> Incorrecto. La respuesta correcta es: <strong>$respuesta_mostrar</strong></div>";
    }

    echo "</div>";
  }

  $puntaje = $correctas * 10;
  $porcentaje = ($correctas / $total) * 100;

  echo "<h3>Puntaje: $puntaje / 100</h3>";
  echo "<p>Correctas: $correctas - Incorrectas: " . ($total - $correctas) . "</p>";
  echo "<p>Porcentaje: $porcentaje%</p>";

  if ($porcentaje < 50) {
    $mensaje = "Seguí participando";
    $imagen = "https://e7.pngegg.com/pngimages/622/980/png-clipart-emoticon-emoji-sadness-smiley-frown-emoji-face-smiley.png";
  } elseif ($porcentaje < 75) {
    $mensaje = "Bien";
    $imagen = "https://i.pinimg.com/originals/c6/cf/7f/c6cf7f8531c823bbc5fcd925e80c56f4.jpg";
  } elseif ($porcentaje < 100) {
    $mensaje = "Muy bien";
    $imagen = "https://st.depositphotos.com/1037178/2168/v/950/depositphotos_21688177-stock-illustration-smiley-vector-illustration-very-happy.jpg";
  } else {
    $mensaje = "¡Excelente!";
    $imagen = "https://i.pinimg.com/originals/7d/03/1d/7d031d9112aba2292f2d9237aecc6623.png";
  }

  echo "<div class='mt-4 alert alert-info'><strong>$mensaje</strong></div>";
  echo "<img src='$imagen' alt='Resultado' style='max-width:200px;'>";

  echo "<div class='mt-4'><a href='index.php' class='btn btn-secondary'>Volver a intentar</a></div>";
  ?>

</body>
</html>
