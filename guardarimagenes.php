<?php

if ((! isset($_FILES['archivo1']['name'])) or (! isset($_FILES['archivo2']['name']))) {
    $mensaje .= 'ERROR: No se indicó el archivo y/o no se indicó el directorio';
} else{
    $directorioDestino = '/home/alummo2019-20/Escritorio/PHP/Ejercicio_Entrega_Mover_Ficheros/';
    $nombreFichero1   =   $_FILES['archivo1']['name'];
    $nombreFichero2   =   $_FILES['archivo2']['name'];
    $temporalFichero1 =   $_FILES['archivo1']['tmp_name'];
    $temporalFichero2 =   $_FILES['archivo2']['tmp_name'];
    $tamanioFichero1  =   $_FILES['archivo1']['size'];
    $tamanioFichero2  =   $_FILES['archivo2']['size'];
    $errorFichero1    =   $_FILES['archivo1']['error'];
    $errorFichero2    =   $_FILES['archivo2']['error'];
    
    
    
    //movimiento del fichero 1
    if ($errorFichero1 == 0) {
        if($tamanioFichero1 <= 200000 and $tamanioFichero1 + $tamanioFichero2 <= 300000){
            if (move_uploaded_file($temporalFichero1,  $directorioDestino .'/'. $nombreFichero1) == true) {
                $mensaje1 .= 'Fichero 1 subido con exito  <br />';
            } else {
                $mensaje1 .= 'ERROR: Fichero 1 no ha subido <br />';
            }
        }else{
            $mensaje1 .='DEMASIADO GRANDE FICHERO 1 <br />';
        }
    } else{
		if($tamanioFichero2 == 0 and $errorFichero1 == 0){
			$mensaje1 .=. $errorFichero1 . '<br />';
		}else{
			$mensaje1 .= 'ERROR: NO SE PUEDE HACER Fichero 1, ERROR= ' . $errorFichero1 . '<br />';
		}
    }
    
    
    
    //movimiento del fichero 2
    
    if($errorFichero2 == 0){
        if($tamanioFichero2 <= 200000 and $tamanioFichero1 + $tamanioFichero2 <= 300000){
            if (move_uploaded_file($temporalFichero2,  $directorioDestino .'/'. $nombreFichero2) == true) {
                $mensaje2 .= 'Fichero 2 subido con exito  <br />';
            } else {
                $mensaje2 .= 'ERROR: Fichero 2 no ha subido <br />';
            }
        }else{
            $mensaje2 .= 'DEMASIADO GRANDE FICHERO 2 <br />';
        }
    } else{
		if($tamanioFichero1 == 0 and $errorFichero2 == 0){
			$mensaje2 .=. $errorFichero2 . '<br />';
		}else{
			$mensaje2 .= 'ERROR: NO SE PUEDE HACER Fichero 2, ERROR= ' . $errorFichero2 . '<br />';
		}
    }
    
    
    echo $mensaje1;
    echo $mensaje2;
    echo $mensaje;
    
    
}

?>