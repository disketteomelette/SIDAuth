<?php 
session_start();

// SIDAuth v. 0.1 - github.com/disketteomelette

  
$data1='<!DOCTYPE html><html><head><meta charset="UTF-8"><meta name="viewport" content="width=device-width, initial-scale=1.0"><style>body{margin:0;padding:0;font-family:Arial, sans-serif;color:#FFFFFF;}.error-box, .info-box{text-align:center;padding:20px;font-size:76px;}.error-box{background-color:#F6CED8;color:#ff0000;}.info-box{background-color:#F6CED8;color:#111111;}</style></head><body style="background-color: #FBEFF2;">';
$data2='</body></html>';
if (isset($_SESSION['codigo_sesion'])) { 
    $codigoSesion = strtoupper(substr($_SESSION['codigo_sesion'], -5));
    $codigoEncontrado = false;
    $archivo = fopen('codigos.php', 'r');
    while (($linea = fgets($archivo)) !== false) {
        $linea = trim($linea);
        if ($linea === $codigoSesion) {
            $codigoEncontrado = true;
            break;
        }
    }
    fclose($archivo); 
    if ($codigoEncontrado) {
        $archivo = 'secret.php';
        if (file_exists($archivo)) {
            $lineas = file($archivo);
            $lineas = array_slice($lineas, 2, -2);
            $contenido = implode('', $lineas);
            while (ob_get_level()) {
                ob_end_clean();
            }
            header("Content-type: text/html");
            echo $contenido;
        } else {
            echo $data1 . '<div class="error-box">Error: No content (<b>' . $codigoSesion . '</b>). Pairing aborted.</div>' . $data2;
        }
    } else {
        echo $data1 . '<div class="info-box">______<br><b>' . $codigoSesion . '</b><br>¯¯¯¯¯¯</div>' . $data2;
        echo '<script>setTimeout(function() {  location.reload();}, 5000);</script>';
    }
} else {
    $_SESSION['codigo_sesion'] = strtoupper(substr(uniqid(), -5));
    $codigoSesion = $_SESSION['codigo_sesion']; 
    echo $data1 . '<div class="info-box"><b>' . $codigoSesion . '</b></div>' . $data2;
    echo '<script>setTimeout(function() {  location.reload();}, 4000);</script>';
}
?>
