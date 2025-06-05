<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <title>Trivia de Maquillaje</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="container mt-5">

  <h1 class="mb-4">Trivia de Maquillaje</h1>

  <form action="resultado.php" method="POST">

    <?php
    $preguntas = array(
      1 => array("¿Qué tipo de piel necesita una base mate?", array("Piel grasa", "Piel seca", "Piel normal")),
      2 => array("¿Cuál es la función del primer?", array("Hidratar", "Preparar la piel", "Dar color")),
      3 => array("¿Qué brocha se usa para aplicar base?", array("Brocha plana", "Brocha abanico", "Brocha de difuminar")),
      4 => array("¿Cuál es el propósito del iluminador?", array("Oscurecer zonas", "Resaltar zonas", "Cubrir imperfecciones")),
      5 => array("¿Qué producto se usa para fijar el maquillaje?", array("Corrector", "Rubor", "Spray fijador")),
      6 => array("¿Qué se aplica antes de la base?", array("Corrector", "Primer", "Polvo")),
      7 => array("¿Qué producto ayuda a cubrir las ojeras?", array("Rubor", "Iluminador", "Corrector")),
      8 => array("¿Qué color neutraliza las rojeces?", array("Verde", "Amarillo", "Azul")),
      9 => array("¿Qué se utiliza para difuminar sombras?", array("Esponja", "Brocha de difuminar", "Brocha de cejas")),
      10 => array("¿Qué productos son esenciales en un maquillaje básico? (Elegí todos los que correspondan)", 
                 array("Base", "Corrector", "Pegamento de pestañas"))
    );
    foreach ($preguntas as $numero => $contenido) {
      echo "<div class='mb-4'>";
      echo "<p><strong>Pregunta " . $numero . ":</strong> " . $contenido[0] . "</p>";

      $opciones = $contenido[1];

      if ($numero == 10) {
        for ($i = 0; $i < count($opciones); $i++) {
          echo "<div class='form-check'>";
          echo "<input class='form-check-input' type='checkbox' name='p" . $numero . "[]' value='" . $opciones[$i] . "' id='p" . $numero . "-" . $i . "'>";
          echo "<label class='form-check-label' for='p" . $numero . "-" . $i . "'>" . $opciones[$i] . "</label>";
          echo "</div>";
        }
      } else {

        for ($i = 0; $i < count($opciones); $i++) {
          echo "<div class='form-check'>";
          echo "<input class='form-check-input' type='radio' name='p" . $numero . "' value='" . $opciones[$i] . "' id='p" . $numero . "-" . $i . "' required>";
          echo "<label class='form-check-label' for='p" . $numero . "-" . $i . "'>" . $opciones[$i] . "</label>";
          echo "</div>";
        }
      }

      echo "</div>";
    }
    ?>

    <button type="submit" class="btn btn-primary">Calcular Puntaje</button>
  </form>

</body>
</html>
