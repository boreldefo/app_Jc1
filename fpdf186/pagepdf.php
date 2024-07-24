<?php 


require_once '../database/database.php';
// $articleDB= require_once __DIR__.'/database/models/ArticleDB.php';
$authDB = require '../database/security.php';
$currentUser = $authDB->isLoggdin();

// header("Content-type: image/jpeg");
//var_dump($currentUser);

if (!$currentUser) {
  header('Location: /');
}

        require('fpdf.php');

        $pdf= new FPDF('P','mm','A5');
        
        $pdf->AddPage();

      
        $pdf->SetFont('Arial', '',14);
        
        $pdf->Cell(w:0, h:10, txt:"Archidiocese de Yaounde \n", ln:1, align:'C');
        $pdf->Cell(w:0, h:10, txt:"Zone Pastorale de Mendong \n", ln:1, align:'C');
        $pdf->Cell(w:0, h:10, txt:"Communaute Saint Emerent \n", ln:1, align:'C');
        $pdf->Cell(w:0, h:10, txt:"Jeunesse Charismatique  \n", ln:1, align:'C');
        $pdf->Ln(3);
        $pdf->SetFont('Arial', 'B',14);
      
  
        $pdf->Cell(w:0, h:10, txt:"fiche d'inscription au concours biblique \n", border:'TB', ln:1, align:'C');

        $pdf->Ln(5);
        
        $pdf->SetFont('Arial','',12);
        $h=7;
        
        $pdf->Write($h, "\n");
        $pdf->Write($h, "Nom: \t");
        $pdf->SetFont('Arial', 'B',12);
        $pdf->Write($h, $currentUser['nom']."\n");
        $pdf->Write($h, " \n");
        $pdf->SetFont('Arial','',12);

        $pdf->Write($h, "Prenom: \t");
        $pdf->SetFont('Arial', 'B',12);
        $pdf->Write($h, $currentUser['prenom']."\n");
        $pdf->Write($h, " \n");
        $pdf->SetFont('Arial','',12);
        
        $pdf->Write($h, "Telephone: \t");
        $pdf->SetFont('Arial', 'B',12);
        $pdf->Write($h, $currentUser['telephone']."\n");
        $pdf->Write($h, " \n");
        $pdf->SetFont('Arial','',12);
        
        $pdf->Write($h, "Paroisse: \t");
        $pdf->SetFont('Arial', 'B',12);
        $pdf->Write($h, $currentUser['adresse']."\n");
        $pdf->Write($h, " \n");
        $pdf->SetFont('Arial','',12);
        
        $pdf->Write($h, "Dernier Sacrement: \t");
        $pdf->SetFont('Arial', 'B',12);
        $pdf->Write($h, $currentUser['ville']."\n");
        $pdf->Write($h, " \n");
        $pdf->SetFont('Arial','',12);
        
        $pdf->Write($h, "Groupe d'appartenance: \t");
        $pdf->SetFont('Arial', 'B',12);
        $pdf->Write($h, $currentUser['code_postal']."\n");
        
        $pdf->SetFont('Arial','B',11);
        

        $pdf->Write($h, " \n");
      
    
        $pdf->Write($h, " \n");
        // $pdf->Cell(0,10,'merci de vous presenter le jour du concour avec cette fiche...',0,1,'C');
        
        $pdf->Ln(3);
        $pdf->SetFont('Arial','B',14);
        $pdf->Cell(0,10,'MOMO Guy ',0,1,'L');
        $pdf->SetFont('Arial','',12);
        $pdf->Write($h, "Vice Responsable de la Jc \t");
      
        $pdf->Output(dest:'',name:'fiche',isUTF8:true);
        ?>