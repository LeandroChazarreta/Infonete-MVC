<?php

class AdministradorModel
{
    private $conexion;

    public function __construct($database){
        $this->conexion = $database;
    }

    public function GetNoticias(){
        return $this->conexion->query("SELECT * FROM publicacion p 
                                        join usuario u on p.id_usuario = u.id_usuario 
                                        join Seccion s on s.id_seccion = p.id_seccion;");
    }

    public function GetUsuarios(){
        return $this->conexion->query("SELECT * FROM usuario u join permiso p on p.id_permiso = u.id_permiso;");
    }

    public function GetSecciones(){
        return $this->conexion->query("SELECT * FROM Seccion;");
    }

    public function getTipoPublicaciones(){
        return $this->conexion->query("SELECT * FROM Tipo_Publicacion");
    }

    public function GetReporte(){

        $tipoNoticia = $_GET["tipoPublicacion"];
        $tipoSeccion = $_GET["seccion"];

        return $this->conexion->query("SELECT DISTINCT tp.descripcion as tipo, sc.descripcion seccion, pb.titulo,pb.cuerpo
                                       FROM publicacion pb JOIN 
                                       seccion sc ON
                                       sc.id_seccion=pb.id_seccion
                                       JOIN tipo_publicacion tp ON
                                       tp.id_tipo_publicacion = pb.id_tipo_publicacion
                                       WHERE 
                                           1 = 1
                                           AND tp.id_tipo_publicacion = '$tipoNoticia'
                                           AND sc.id_seccion = '$tipoSeccion'");

    }

    public function generarPDF(){

        $_GET["tipoPublicacion"] = $_SESSION["tipoPDF"];
        $_GET["seccion"] = $_SESSION["seccionPDF"];

        $array= $this->GetReporte();

        $pdf=new PlantillaPDF();
        $pdf->AliasNbPages();
        $pdf->AddPage("L", "A4");

        $pdf->SetFont('Heading','B',20);
        $pdf->Ln(8);
        $pdf->Cell(0,20, 'REPORTE',0,0,'L');
        $pdf->Ln(8);

        $pdf->SetFont('Heading','B',12);
        $pdf->Cell(0,20, utf8_decode('Publicaciones según Tipo de Publicación y Sección'),0,0,'L');
        $pdf->Ln(30);

        $pdf->SetFillColor(232,232,232);
        $pdf->SetFont('Heading','B',12);
        $pdf->Cell(87,10, utf8_decode("Tipo de Publicación"),1,0,'C',1);
        $pdf->Cell(87,10, utf8_decode("Sección"),1,0,'C', 1);
        $pdf->Cell(87,10, utf8_decode("Título"),1,1,'C', 1);


        foreach ($array as $element){
            $pdf->Cell(87,10,  utf8_decode($element['tipo']),1,0,'C');
            $pdf->Cell(87,10,  utf8_decode($element['seccion']),1,0,'C');
            $pdf->Cell(87,10, utf8_decode($element['titulo']),1,0,'C');
            $pdf->Ln();
        }



        $pdf->Output();
    }

    public function updateAutorizar($id,$valor){

        return $this->conexion->insert("UPDATE publicacion
                                        SET autorizada = '$valor'
                                        WHERE id_publicacion = '$id'");

    }

    public function actualizar($seccion,$id)
    {
        $query=0;
        if ($seccion!="") {
            $query = $this->conexion->insert("UPDATE seccion
                                        SET descripcion = '$seccion'
                                        WHERE id_seccion = '$id'");
        }
        $res = count($query);
        if ($res == 1){
            return 1;
        } else {
            return 0;
        }

    }

    public function borrar($id)
    {
            return $this->conexion->query("DELETE FROM  seccion
                                           WHERE id_seccion = '$id'");
    }

    public function borrarUs($id)
    {
        return $this->conexion->query("DELETE FROM  usuario
                                           WHERE id_usuario = '$id'");
    }
}