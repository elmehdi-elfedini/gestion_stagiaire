<?php
require('../pages/maSession.php');
require('../pages/connexion.php');
$ids=$_GET['idS']??0;

$requet=getCn()->query("SELECT * FROM stagiaire WHERE idStagiaire=$ids")->fetch();
$nom_prenom = strtoupper($requet['nom'] . "  " . $requet['prenom']);
$civilite=strtoupper($requet['civilite']);
$photo=$requet['photo'];

require('fpdf.php');
//Création d'un nouveau doc pdf (Portrait, en mm , taille A5)
$pdf = new FPDF('P', 'mm', 'A5');
//Ajouter une nouvelle page
$pdf->AddPage();
// entete
$pdf->Image('en-tete.png', 10, 5, 130, 20);
// Saut de ligne
$pdf->Ln(18);
// Police Arial gras 16
$pdf->SetFont('Arial', 'B', 16);
// Titre
$pdf->Cell(0, 10, 'ATTESTATION DE SCOLARITE', 'TB', 1, 'C');
$pdf->Cell(0, 10, "N°:$ids", 0, 1, 'C');

// Saut de ligne
$pdf->Ln(5);

// Début en police Arial normale taille 10

$pdf->SetFont('Arial', '', 10);
$h = 7;
$retrait = "      ";
$pdf->Write($h, "Je soussigné, Directeur de l'établissement CLEVER SCHOOL 2 PRIVEE EL ATTAOUIA Certifie que : \n");

$pdf->Write($h, $retrait . "L'élève : ");
$pdf->SetFont('', 'BIU');
$pdf->Write($h, $nom_prenom . "\n");
//Ecriture normal
$pdf->SetFont('', '');
$pdf->Write($h, $retrait . "Né (e) Le : " . $civilite . " À : " . $civilite . "\n");
$pdf->Cell(20);
$pdf->Cell(80, 8, "Le directeur pédagogique de l'établissement", 1, 1, 'C');

// Décalage de 20 mm à droite
$pdf->Cell(20);
$pdf->Cell(80, 5, "Mr LAHCEN ABOUSALIH", 'LR', 1, 'C');
$pdf->Cell(20);
$pdf->Cell(80, 5, ' ', 'LR', 1, 'C'); // LR Left-Right
$pdf->Cell(20);
$pdf->Cell(80, 5, ' ', 'LR', 1, 'C');
$pdf->Cell(20);
$pdf->Cell(80, 5, ' ', 'LR', 1, 'C');
$pdf->Cell(20);
$pdf->Cell(80, 5, ' ', 'LRB', 1, 'C'); // LRB : Left-Right-Bottom (Bas)
//Afficher le pdf
$pdf->Output('', '', true);

?>
