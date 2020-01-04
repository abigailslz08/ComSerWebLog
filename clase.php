<?php 
class registro{     
   public function validar($pPass1,$pPass2,$pNombre,$pApPat,$pApMat,$pCorreo,$msj1,$msj2,$msj3,$ruta){
            //If para validar si las dos contraseñas son iguales
            if($pPass1==$pPass2){     
                //Declaro la variable existe con valor  falso
                $existe=false;
                //abre el archivo
                if (($gestor = fopen("archivo.csv", "r")) !== FALSE) {
                    //Recorre cada una de las columnas del archivo
                    while (($datos = fgetcsv($gestor, 100, ";")) !== FALSE) {
                        //Si la columna "Correo" es igual al correo enviado por post
                        if($datos[3]==$pCorreo){
                            //La variable existe toma el valor de verdadero
                            $existe=true;
                        }
                        else{
                            //Si no, toma falso.
                            $existe=false;
                        }                              
                    }               
                    //Cierra el archivo
                    fclose($gestor);
                }

                //Si existe es verdadero osea que hay un correo igual
                if($existe==true){
                    //Imprime mensaje CORREO EXISTENTE
                    echo $msj2;
                }
                else{
                    //si el correo no existe, abre el archivo
                    $file_handle = fopen($ruta, 'a');
                    //Encripta el password con sha1
                    $pPass1=sha1($pPass1);
                    //lo agrega a un array
                    $arreglo[0]= array($pNombre,$pApPat,$pApMat,$pCorreo,$pPass1);       
                    foreach ($arreglo as $linea) {
                        //lo agrega al archivo
                        fputcsv($file_handle, $linea, ';', '"');
                    }        
                    rewind($file_handle);
                    fclose($file_handle);
                    //Imprime el mensaje de USUARIO AGREGADO
                    echo $msj1;
                }

            }else{
                //Imprime el mensaje de LAS CONSTRASEÑAS NO COINCIDEN
                echo $msj3;
            }
        
    }

    public function generarCSV($ruta, $delimitador, $encapsulador,$pPass1,$pPass2,$pNombre,$pApPat,$pApMat,$pCorreo,$msj1,$msj2,$msj3){   
        //Verifica si el archivo existe
        if (file_exists($ruta)) {
            //Si existe valida los datos por medio de la funcion validar
            $funciones_datos = new registro();
            $generar=$funciones_datos->validar($pPass1,$pPass2,$pNombre,$pApPat,$pApMat,$pCorreo,$msj1,$msj2,$msj3,$ruta);
        } else {
            //Si no existe abre el archivo
            $file_handle = fopen($ruta, 'a');
            //agrega el enzabezado
            $arreglo[0] = array("Nombre","ApellidoP","ApellidoM","Correo","Password");        
            foreach ($arreglo as $linea) {
                fputcsv($file_handle, $linea, $delimitador, $encapsulador);
            }
            //Valida los valores para después agregarlos al archivo
            $funciones_datos = new registro();
            $generar=$funciones_datos->validar($pPass1,$pPass2,$pNombre,$pApPat,$pApMat,$pCorreo,$msj1,$msj2,$msj3,$ruta);        
           
        }        
    }
}

//Clase para iniciar sesión 
class login{
//Funcion para validar credenciales
    function validarCred($correo,$pass,$ruta){

        //si la ruta existe
        if(file_exists($ruta)){
            $texto="";
            //abre el archivo
            if (($gestor = fopen("archivo.csv", "r")) !== FALSE) {
                //Recorre cada una de las columnas del archivo
                while (($datos = fgetcsv($gestor, 100, ";")) !== FALSE) {
                    //Si la columna "Correo" es igual al correo enviado por post
                    if($datos[3]==$correo && $datos[4]==$pass){
                        //La variable existe toma el nombre del usuario
                        $texto="Bienvenido(a) ".$datos[0]." ".$datos[1]." ".$datos[2];
                    }                                        
                }               
                //Cierra el archivo
                fclose($gestor);
            }
            //Retorna el valor existente
            return $texto;
        }else{

            //Retorna texto vacío
            return $texto;
        }        
    }
}

?>
