<?php
//var_dump($_FILES["file"])

$directorio="uploads/";
$archivo= $directorio . basename($_FILES['file']['name']);

$tipodeArchivo= strtolower(pathinfo($archivo,PATHINFO_EXTENSION));

//validar si es imagen

$chequearimg= getimagesize($_FILES['file']['tmp_name']);


if($chequearimg != false){
    //validando tamañoss
 $size= $_FILES["file"]["size"];

 if($size > 500000){
    echo "El archivo tiene que ser menor a 500kb";
 }else{
    //validar tipo de archivo
   if($tipodeArchivo == "jpg" || $tipodeArchivo =="jpeg"){
    //se valido el archivo correcttamente
    if(move_uploaded_file($_FILES["file"]["tmp_name"],$archivo)){
        echo "El archivo se subio correctamente";
    }else{
       echo "Hubo un error al cargar el archivo";
    }

   }else{
    echo"Solo se admite archivo jpg/jpeg";
   }
 }

}else{
    echo "El archivo no es una imagen";
}
?>
