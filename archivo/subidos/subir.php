
if(isset($_FILES['foto']['name'])){

        $archivo = $_FILES['foto']['name'];
        $path = pathinfo($archivo);
        $nombreArchivo = 'cliente_';
        $ext = $path['extension'];
        $temp_name = $_FILES['foto']['tmp_name'];
        $nombre_nuevo ="clienteimg_".time().".".$ext;
        $path_nuevo = CARPETA_IMAGENES."/".$nombre_nuevo;
        move_uploaded_file($temp_name,$path_nuevo);
        $datos["foto"] = $path_nuevo;
    }
