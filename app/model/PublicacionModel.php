<?php


class PublicacionModel
{
    private $conexion;

    public function __construct($database){
        $this->conexion = $database;
    }

    public function guardarPublicacion($titulo, $bajada, $imagen, $epigrafeImagen, $cuerpo,
                                       $idTipoPublicacion, $idSeccion, $idUsuario, $fecha){

        return $this->conexion->insert("INSERT INTO Publicacion (titulo, bajada, imagen, epigrafe_imagen, cuerpo, 
                                                                id_tipo_publicacion, id_seccion, id_usuario, fecha, autorizada) 
                                       VALUES ('$titulo', '$bajada', '$imagen', '$epigrafeImagen','$cuerpo', 
                                                '$idTipoPublicacion','$idSeccion',
                                                '$idUsuario', '$fecha', false)");

    }

    public function actualizarPublicacion($titulo, $bajada, $imagen, $epigrafeImagen, $cuerpo,
                                          $idTipoPublicacion, $idSeccion, $idUsuario, $fecha, $idPublicacion)
    {
        $query = $this->conexion->query("UPDATE Publicacion
                                        SET titulo = '$titulo', bajada = '$bajada', imagen ='$imagen', 
                                        epigrafe_imagen ='$epigrafeImagen', cuerpo ='$cuerpo', 
                                        id_tipo_publicacion = '$idTipoPublicacion', id_seccion = '$idSeccion', 
                                        id_usuario = '$idUsuario', fecha = '$fecha', autorizada = false
                                        WHERE id_publicacion = '$idPublicacion'");

        $res = count($query);
        if ($res == 0){
            return 1;
        } else {
            return 0;
        }

    }

    public function getPublicacionPorId($idPublicacion){
        return $this->conexion->query("SELECT *
                                        FROM Publicacion p
                                        WHERE p.id_publicacion = '$idPublicacion'");
    }

    public function consultarIdPublicacion($titulo, $bajada, $epigrafeImagen){
        return $this->conexion->query("SELECT p.id_publicacion
                                        FROM Publicacion p
                                        WHERE p.titulo = '$titulo'
                                        AND p.bajada = '$bajada'
                                        AND p.epigrafe_imagen = '$epigrafeImagen'");
    }

    public function getPublicacionesDelContenedista($idContenedista){

        return $this->conexion->query("SELECT *
                                        FROM Publicacion p
                                        WHERE p.id_usuario = '$idContenedista'");

    }

    public function getTipoPublicaciones(){

        return $this->conexion->query("SELECT * FROM Tipo_Publicacion");
    }

    public function getTipoPublicacionesConSeleccionada($idTipoPublicacion){

        $array = $this->conexion->query("SELECT * FROM Tipo_Publicacion");

        foreach ($array as $elemento){
        if ($elemento["id_tipo_publicacion"] == $idTipoPublicacion){
        $datos[] = array('id_tipo_publicacion' => $elemento["id_tipo_publicacion"], 'descripcion' => $elemento["descripcion"], 'seleccionada' => true);
        }else{
        $datos[] = array('id_tipo_publicacion' => $elemento["id_tipo_publicacion"], 'descripcion' => $elemento["descripcion"], 'seleccionada' => null);
        }
        }

        return $datos;
    }

    public function validarPublicacion($publicacion){

        $error = null;

        if($publicacion["tipoPublicacion"] == null){
            $error = "No ha elejido un tipo de publicación.";
        }
        if($publicacion["seccion"] == null){
            $error .= ' No ha elejido una sección.';
        }
        if(strlen($publicacion["titulo"]) < 5){
            $error .= " Titulo de menos de 5 letras.";
        }
        if(strlen($publicacion["bajada"]) < 8){
            $error .= " Bajada de menos de 8 letras. ";
        }
        if(strlen($publicacion["epigrafeImagen"]) < 8){
            $error .= " Epigrafe de menos de 8 letras.";
        }
        if( strlen($publicacion["cuerpo"]) < 8){
            $error .= " Cuerpo de menos de 8 letras.";
        }

        return $error;
    }

    public function validarImagenPublicacion($nombre, $file){

        $_FILES = $file;
        if ($_FILES["file"]["error"] > 0) {
            echo "Error: " . $_FILES["file"]["error"] . "<br />";
            return false;
        } else {
            $_FILES["file"]["name"] = $nombre . "." . pathinfo($_FILES["file"]["name"], 4);
            echo "Upload: " . $_FILES["file"]["name"] . "<br />";
            echo "Type: " . $_FILES["file"]["type"] . "<br />";
            echo "Size: " . ($_FILES["file"]["size"] / 1024) . " Kb<br />";
            echo "Stored in: " . $_FILES["file"]["tmp_name"];
            if (file_exists("view/img/" . $_FILES["file"]["name"])) {
                echo $_FILES["file"]["name"] . " ya existe. ";
                return false;
            } else {
                move_uploaded_file($_FILES["file"]["tmp_name"],
                    "view/img/" . $_FILES["file"]["name"]);
                echo "Almacenado en: " . "view/img/" . $_FILES["file"]["name"];
                return $_FILES["file"]["name"];
            }
        }
    }

    public function armarNombreImagen($titulo, $fecha)
    {
     return $nombreImagen =   $titulo . "-" . $fecha;
    }

    public function armarFormatoFecha($fecha)
    {
        return $fecha =   $fecha["year"] . "-" . $fecha["mon"] . "-"
            . $fecha["wday"] . "-" . $fecha["hours"] . "-" . $fecha["minutes"] . "-"
            . $fecha["seconds"];
    }

    public function armarFormatoFechaBD($fecha)
    {
        return $fecha =   $fecha["year"] . "-" . $fecha["mon"] . "-"
            . $fecha["wday"] . " " . $fecha["hours"] . ":" . $fecha["minutes"] . ":"
            . $fecha["seconds"];
    }

    public function generarPublicacionPDF(){

        $id = $_SESSION["idPublicacionPDF"];

        $array= $this->getPublicacionPorId($id);
        $a = $array[0];
        $titulo = $a['titulo'];

        $pdf = new PlantillaPDF();
        $pdf->AliasNbPages();
        $pdf->AddPage("P", "A4");

        $ancho = $pdf->GetPageWidth() - 40;

        $pdf->SetFont('Calibri','B',20);
        $pdf->Ln(5);
        $pdf->Cell(0,20, utf8_decode('PUBLICACIÓN EN PDF'),0,0,'L');
        $pdf->Ln(8);

        $pdf->SetFont('Calibri','',12);
        $pdf->Cell(0,20, utf8_decode("Servicio exclusivo de generación de PDF"),0,0,'L');
        $pdf->Ln(30);

        $pdf->SetFont('Calibri','',12);
        foreach ($array as $element){
            $pdf->SetFont('Calibri','B',18);
            $pdf->MultiCell($ancho,10,  utf8_decode($element['titulo']),0,'L');
            $pdf->Ln(8);
            $pdf->SetFont('Calibri','',14);
            $pdf->MultiCell($ancho,10,  utf8_decode($element['bajada']),0,'L');
            $pdf->Ln(8);
            $pdf->Image("view/img/" . utf8_decode($element['imagen']), null, null, $ancho*0.75 );
            $pdf->Ln(2);
            $pdf->SetFont('Calibri','B',10);
            $pdf->MultiCell($ancho*0.75,10, utf8_decode($element['epigrafe_imagen']),0,'L');
            $pdf->Ln(8);
            $pdf->SetFont('Calibri','',12);
            $pdf->MultiCell($ancho,10, utf8_decode($element['cuerpo']),0,'L');
        }

        $pdf->Output();
    }
}