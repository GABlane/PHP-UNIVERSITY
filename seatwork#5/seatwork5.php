<?php
require('../fpdf/fpdf.php');

$pdf = new FPDF('P','mm','Letter');
$pdf->AddPage();
$pdf->SetFont('Arial','B',16);

$pdf->Cell(0,10,'Computer Science Crossword Puzzle',0,1,'C');
$pdf->Ln(5);

// Clean blank grid based on your original layout
$grid = [
    [1,'','','#',2,'','','#',3,'','','#',4,'','#',5,'','','','',''],
    [6,'','','','','','','','#',7,'','','','','','#',8,'','',''],
    [9,'','','','','','','','#',10,'','','','','#',11,'','','',''],
    ['','','#',12,'','','','','','','','#',13,'','','','','','',''],
    [14,'','','','','','#',15,'','','','','#',16,'','','','','',''],
    ['','','#',17,'','','','','','','','','','','','#',18,'','',''],
    ['','','','','','','','#',19,'','','','','','','','','','','#'],
    [20,'','','','','','','','','#',21,'','','','','','#',22,'',''],
    ['','','#',23,'','','','','','','#',24,'','','','','','','',''],
    [25,'','','','','#',26,'','','','','#',27,'','','','','','',''],
    [28,'','','','#',29,'','','','','#',30,'','','','#',31,'','',''],
    ['','#',32,'','','','','','','','','#',33,'','','','','','','#'],
    [34,'','','','','','','','','#',35,'','','','','','#',36,'',''],
    [37,'','','','','#',38,'','','','','','','','','','#',39,'',''],
    [40,'','','','','','#',41,'','','','','','','#',42,'','','',''],
    [43,'','','','','','','','#',44,'','','','','','#',45,'','',''],
    ['','#',46,'','','','','#',47,'','','','','','','','','',''],
    ['','#',48,'','','','','','','','','','','','','#',49,'','',''],
    ['','#',50,'','','','','#','','','','','','','','#','','','',''],
    ['','#','','','','','','#','','','','','','','','#','','','','']
];

// Draw Grid
$cellSize = 8;
$startX = 20;
$startY = 30;

for ($i = 0; $i < 20; $i++) {
    $pdf->SetXY($startX, $startY + ($i * $cellSize));
    
    for ($j = 0; $j < 20; $j++) {
        $cell = isset($grid[$i][$j]) ? $grid[$i][$j] : '#';
        
        if ($cell === '#') {
            // Black cell (blocked)
            $pdf->SetFillColor(0, 0, 0);
            $pdf->Cell($cellSize, $cellSize, '', 1, 0, 'C', true);
        } else {
            // White cell (answer space)
            $pdf->SetFillColor(255, 255, 255);
            $pdf->SetTextColor(0, 0, 0);
            
            if (is_numeric($cell)) {
                // Cell with clue number
                $pdf->Cell($cellSize, $cellSize, '', 1, 0, 'C', true);
                
                // Add small number in top-left corner
                $currentX = $pdf->GetX() - $cellSize;
                $currentY = $pdf->GetY();
                $pdf->SetXY($currentX + 0.5, $currentY + 0.5);
                $pdf->SetFont('Arial', '', 6);
                $pdf->Cell(0, 0, $cell, 0, 0, 'L');
                $pdf->SetFont('Arial', 'B', 16);
                $pdf->SetXY($currentX + $cellSize, $currentY);
            } else {
                // Regular white cell
                $pdf->Cell($cellSize, $cellSize, '', 1, 0, 'C', true);
            }
        }
    }
}

// Add answer key page
$pdf->AddPage();
$pdf->SetFont('Arial','B',16);
$pdf->Cell(0,10,'Answer Key',0,1,'C');
$pdf->Ln(5);

// Answer grid with all the letters filled in (no numbers, just letters)
$answerGrid = [
    ['A','P','I','#','T','C','P','#','U','D','P','#','I','P','#','P','R','O','T','O'],
    ['I','N','T','E','R','N','E','T','#','R','O','U','T','E','R','#','S','W','I','T'],
    ['F','I','R','E','W','A','L','L','#','C','L','O','U','D','#','A','L','G','O','R'],
    ['A','S','H','#','F','U','N','C','T','I','O','N','#','V','A','R','I','A','B','L'],
    ['O','B','J','E','C','T','#','C','L','A','S','S','#','I','N','H','E','R','I','T'],
    ['R','I','T','C','H','M','#','P','O','L','Y','M','O','R','P','H','I','S','M','#'],
    ['I','T','H','M','#','E','N','C','A','P','S','U','L','A','T','I','O','N','#','M'],
    ['I','N','T','E','R','F','A','C','E','#','M','O','D','U','L','E','#','P','A','C'],
    ['P','G','E','#','L','I','B','R','A','R','Y','#','F','R','A','M','E','W','O','R'],
    ['S','T','A','C','K','#','Q','U','E','U','E','#','L','I','N','K','E','D','L','I'],
    ['T','R','E','E','#','G','R','A','P','H','#','H','E','A','P','#','P','O','I','N'],
    ['R','#','R','E','C','U','R','S','I','O','N','#','C','O','M','P','I','L','E','R'],
    ['D','E','B','U','G','G','I','N','G','#','B','I','N','A','R','Y','#','S','Q','L'],
    ['M','Y','S','Q','L','#','P','O','S','T','G','R','E','S','Q','L','#','N','O','S'],
    ['O','R','A','C','L','E','#','M','O','N','G','O','D','B','#','R','E','D','I','S'],
    ['D','A','T','A','B','A','S','E','#','B','I','G','D','A','T','A','#','H','A','D'],
    ['P','#','S','P','A','R','K','#','M','A','C','H','I','N','E','L','E','A','R','N'],
    ['G','#','N','E','U','R','A','L','N','E','T','W','O','R','K','#','H','A','S','H'],
    ['P','#','V','A','L','U','E','#','C','O','N','S','T','A','N','T','#','M','E','T'],
    ['D','#','S','Y','N','T','A','X','#','P','A','R','A','M','E','T','E','R','#','C']
];

for ($i = 0; $i < 20; $i++) {
    $pdf->SetXY($startX, $startY + ($i * $cellSize));
    
    for ($j = 0; $j < 20; $j++) {
        $cell = isset($answerGrid[$i][$j]) ? $answerGrid[$i][$j] : '#';
        
        if ($cell === '#') {
            // Black cell
            $pdf->SetFillColor(0, 0, 0);
            $pdf->Cell($cellSize, $cellSize, '', 1, 0, 'C', true);
        } else {
            // White cell with answer
            $pdf->SetFillColor(255, 255, 255);
            $pdf->SetTextColor(0, 0, 0);
            
            // Check if this cell has a number (from blank grid)
            $blankCell = isset($grid[$i][$j]) ? $grid[$i][$j] : '';
            
            if (is_numeric($blankCell)) {
                // Cell with number - show letter in center and small number in corner
                $pdf->SetFont('Arial', '', 8);
                $pdf->Cell($cellSize, $cellSize, $cell, 1, 0, 'C', true);
                
                // Add small number in top-left corner
                $currentX = $pdf->GetX() - $cellSize;
                $currentY = $pdf->GetY();
                $pdf->SetXY($currentX + 0.5, $currentY + 0.5);
                $pdf->SetFont('Arial', '', 5);
                $pdf->Cell(0, 0, $blankCell, 0, 0, 'L');
                $pdf->SetXY($currentX + $cellSize, $currentY);
            } else {
                // Regular cell - just show the letter
                $pdf->SetFont('Arial', '', 8);
                $pdf->Cell($cellSize, $cellSize, $cell, 1, 0, 'C', true);
            }
        }
    }
}

// Add Clues Section
$pdf->Ln(15);
$pdf->SetFont('Arial','B',12);
$pdf->Cell(0,8,'ACROSS',0,1,'L');
$pdf->SetFont('Arial','',10);

$acrossClues = [
    "1. A step-by-step procedure for solving a problem",
    "2. Network protocol suite for internet communication",
    "3. Network protocol for reliable data transmission", 
    "4. Internet address identifier",
    "5. Set of rules for communication",
    "6. Global network connecting computers worldwide",
    "7. Device that forwards data between networks",
    "8. Network device connecting multiple devices",
    "9. Security system controlling network traffic",
    "10. Remote computing services over internet",
    "11. Step-by-step problem solving procedure",
    "12. Named block of reusable code",
    "13. Storage location with a name",
    "14. Instance of a class in programming",
    "15. Template for creating objects",
    "16. Acquiring properties from parent class",
    "17. Objects taking multiple forms",
    "18. Bundling data with methods",
    "19. Hiding complex implementation details",
    "20. Contract defining method signatures",
    "21. Self-contained unit of code",
    "22. Collection of related modules",
    "23. Collection of pre-written code",
    "24. Platform for developing applications",
    "25. Last-in-first-out data structure"
];

foreach($acrossClues as $clue) {
    $pdf->Cell(0, 5, $clue, 0, 1, 'L');
}

$pdf->Ln(5);
$pdf->SetFont('Arial','B',12);
$pdf->Cell(0,8,'DOWN',0,1,'L');
$pdf->SetFont('Arial','',10);

$downClues = [
    "26. First-in-first-out data structure",
    "27. Sequential chain of connected elements", 
    "28. Hierarchical data structure",
    "29. Collection of connected nodes",
    "30. Complete binary tree property",
    "31. Memory address reference",
    "32. Calling function within itself",
    "33. Translates source code to machine code",
    "34. Finding and fixing code errors",
    "35. Base-2 number system",
    "36. Structured Query Language",
    "37. Document-oriented database",
    "38. Relational database system",
    "39. PostgreSQL database system",
    "40. Enterprise database system",
    "41. In-memory data store",
    "42. Large volume of complex data",
    "43. Distributed storage framework",
    "44. Unified analytics engine",
    "45. AI that learns from data",
    "46. Computing system inspired by brain",
    "47. Data structure for key-value pairs",
    "48. Stored data in variables",
    "49. Unchanging value in program",
    "50. Class function or procedure"
];

foreach($downClues as $clue) {
    $pdf->Cell(0, 5, $clue, 0, 1, 'L');
}

// Add instructions
$pdf->Ln(10);
$pdf->SetFont('Arial','B',10);
$pdf->Cell(0,5,'INSTRUCTIONS:',0,1,'L');
$pdf->SetFont('Arial','',9);
$pdf->Cell(0,4,'Fill in the white squares with letters to complete the words.',0,1,'L');
$pdf->Cell(0,4,'Numbers in squares indicate the start of across or down answers.',0,1,'L');
$pdf->Cell(0,4,'Black squares separate the words.',0,1,'L');

$pdf->Output();
?>