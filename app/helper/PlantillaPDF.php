<?php

require './third-party/fpdf/fpdf.php';

class PlantillaPDF extends FPDF
{

    function Header()
    {
        $this->AddFont("Calibri", "", "calibri.php");
        $this->AddFont("Calibri", "B", "calibrib.php");
        $this->AddFont("Calibri", "L", "calibril.php");

        $this->AddFont("Heading", "", "heading.php");
        $this->AddFont("Heading", "B", "headingb.php");
        $this->AddFont("Heading", "EB", "headingeb.php");
        $this->AddFont("Heading", "L", "headingl.php");

        $this->SetMargins(20,20,20);

        $this->Image('view/img/logo.png', 220, 15, 60 );

    }

    function Footer()
    {
        $this->SetY(-15);
        $this->SetFont('Calibri','B', 8);
        $this->Cell(0,10, utf8_decode('PÁGINA ').$this->PageNo().'/{nb}',0,0,'R' );
    }
}
?>