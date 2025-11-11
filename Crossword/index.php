<?php
require('fpdf/fpdf.php');

class PDF_Crossword extends FPDF {

    function CrosswordGrid($grid, $numbers, $answers = false) {
        $cellSize = 8;
        $x = 5;
        $y = 40;

        $rows = 25;
        $cols = 25;

        for ($row = 0; $row < $rows; $row++) {
            for ($col = 0; $col < $cols; $col++) {
                $cx = $x + $col * $cellSize;
                $cy = $y + $row * $cellSize;


                $this->Rect($cx, $cy, $cellSize, $cellSize);

                if (isset($grid[$row][$col]) && $grid[$row][$col] == '#') {

                    $this->SetFillColor(23,25,13);
                    $this->Rect($cx, $cy, $cellSize, $cellSize, 'F');
                } else {

                    if (isset($numbers[$row][$col]) && $numbers[$row][$col] != 0) {
                        $this->SetFont('Arial','',7);
                        $this->Text($cx + 1, $cy + 3, $numbers[$row][$col]);
                    }


                    if ($answers && isset($grid[$row][$col]) && $grid[$row][$col] != '.' && $grid[$row][$col] != '#') {
                        $this->SetFont('Arial','B',10);
                        $letter = $grid[$row][$col];


                        $w = $this->GetStringWidth($letter);
                        $h = $this->FontSize;


                        $tx = $cx + ($cellSize - $w) / 2;
                        $ty = $cy + ($cellSize + $h) / 2;

                        $this->Text($tx, $ty, $letter);
                    }
                }
            }
        }
    }
}


$grid = [
    ['#','F','#','#','#','N','#','#','C','L','O','U','D','#','#','#','#','#','S','E','R','V','E','R','#'],
    ['#','U','#','#','#','E','#','#','#','#','P','Y','T','H','O','N','#','#','#','#','O','#','#','#','#'],
    ['#','N','#','C','#','#','T','#','#','#','#','I','#','#','#','E','#','#','#','#','U','#','#','#','#'],
    ['#','C','#','A','#','W','#','#','#','#','D','A','T','A','B','A','S','E','#','W','I','N','D','O','W','S'],
    ['#','T','#','C','L','A','S','S','#','K','#','N','#','#','#','O','#','#','#','#','E','#','#','#','O'],
    ['#','I','#','H','#','O','#','#','E','#','#','C','#','#','B','R','O','W','S','E','R','#','H','#','F'],
    ['#','O','P','E','R','A','T','I','N','G','#','R','#','#','#','K','#','#','O','#','#','#','T','#','T'],
    ['#','N','#','#','#','K','#','#','C','#','A','P','I','#','#','#','#','#','F','#','B','Y','T','E','#'],
    ['#','#','J','A','V','A','S','C','R','I','P','T','#','#','#','#','S','#','T','#','O','#','P','#','W'],
    ['#','#','#','L','#','S','#','#','Y','#','I','#','#','#','#','#','T','#','W','#','O','#','#','P','#'],
    ['#','#','#','G','#','E','#','C','P','U','#','#','#','#','V','A','R','I','A','B','L','E','#','R','#'],
    ['#','P','#','O','#','#','K','#','T','#','#','R','#','#','#','#','I','#','R','#','E','#','#','I','#'],
    ['#','R','#','R','#','#','E','#','I','N','H','E','R','I','T','A','N','C','E','#','A','#','#','N','#'],
    ['#','O','#','I','#','#','R','#','O','#','#','C','#','#','#','#','G','#','#','I','N','P','U','T','#'],
    ['#','T','#','T','#','#','N','#','N','#','#','U','#','#','G','A','T','E','W','A','Y','#','A','#','#'],
    ['#','O','#','H','#','#','E','#','#','F','I','R','E','W','A','L','L','#','#','#','S','T','A','C','K'],
    ['#','C','O','M','P','I','L','E','R','#','P','H','P','#','T','#','#','J','A','V','A','#','C','#','O','#'],
    ['#','O','#','#','H','#','#','#','#','#','#','A','#','#','E','#','#','#','#','#','#','H','#','D','#'],
    ['#','L','O','O','P','#','#','L','I','B','R','A','R','Y','#','W','#','#','#','#','#','#','#','E','#'],
    ['#','#','#','#','#','P','H','I','S','H','I','N','G','#','A','R','R','A','Y','#','#','#','#','#','#'],
    ['#','#','S','Q','L','#','#','B','O','O','L','E','A','N','#','Y','#','#','#','#','#','#','#','#','#'],
    ['H','T','M','L','#','#','#','R','#','S','#','#','#','#','#','#','#','#','#','#','#','#','#','#','#'],
    ['T','O','K','E','N','#','M','A','C','H','I','N','E','#','#','#','G','I','T','H','U','B','#','#','#'],
    ['M','#','#','U','#','#','#','R','#','#','#','#','#','#','#','#','#','#','#','#','#','#','#','#','#'],
    ['L','#','M','E','M','O','R','Y','#','#','#','#','#','#','#','#','#','#','#','#','#','#','#','#','#'],
];


for ($r = 0; $r < 25; $r++) {
    if (!isset($grid[$r])) $grid[$r] = [];
    for ($c = 0; $c < 25; $c++) {
        if (!isset($grid[$r][$c])) $grid[$r][$c] = '.';
    }
}


$numbers = [
    [0,1,0,0,0,0,0,0,0,0,2,0,0,0,0,3,0,0,4,0,5,0,0,0,0],
    [0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0],
    [0,0,0,6,0,0,0,0,0,0,0,7,0,0,0,0,0,0,0,0,0,0,0,0,0],
    [0,0,0,0,0,9,0,0,0,0,10,0,0,0,0,0,0,0,0,0,0,0,0,0,0],
    [0,0,0,11,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0],
    [0,0,0,0,0,0,0,0,12,0,0,0,0,0,13,0,0,0,14,0,0,0,15,0,0],
    [0,16,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0],
    [0,0,0,0,0,0,0,0,0,0,17,0,0,0,0,0,0,0,0,0,18,0,0,0,0],
    [0,0,19,20,0,0,0,0,0,0,0,0,0,0,0,0,21,0,0,0,0,0,0,0,0],
    [0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,22,0],
    [0,0,0,0,0,0,0,23,0,0,0,0,0,0,24,0,0,0,0,0,0,0,0,0,0],
    [0,25,0,0,0,0,26,0,0,0,0,27,0,0,0,0,0,0,0,0,0,0,0,0,0],
    [0,0,0,0,0,0,0,0,28,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0],
    [0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,29,0,30,0,0,0],
    [0,0,0,0,0,0,0,0,0,0,0,0,0,0,31,0,0,0,0,0,0,0,0,0,0],
    [0,0,0,0,0,0,0,0,0,32,0,0,0,0,0,0,0,0,0,0,33,0,0,34,0],
    [0,35,0,0,36,0,0,0,0,0,0,0,0,0,0,0,0,37,0,0,0,0,0,0,0],
    [0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0],
    [0,38,0,0,0,0,0,39,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0],
    [0,0,0,0,0,0,40,0,0,0,41,0,0,0,0,42,0,0,0,0,0,0,0,0,0],
    [0,0,43,44,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0],
    [45,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0],
    [46,0,0,0,0,0,47,0,0,0,0,0,0,0,0,0,50,0,0,0,0,0,0,0,0],
    [0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0],
    [0,0,48,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0],


];


for ($r = 0; $r < 25; $r++) {
    if (!isset($numbers[$r])) $numbers[$r] = [];
    for ($c = 0; $c < 25; $c++) {
        if (!isset($numbers[$r][$c])) $numbers[$r][$c] = 0;
    }
}

$pdf = new PDF_Crossword();
$pdf->AddPage();
$pdf->SetFont('Arial','B',14);
$pdf->setXY(0,18);
$pdf->settextcolor(0,0,0 );
$pdf->Cell(0,10,'Computer Science Crossword Puzzle',0,1,'C');

$pdf->settextcolor(0,0,0 );
$pdf->CrosswordGrid($grid, $numbers, false);
$pdf->Ln(110);

$pdf->settextcolor(0,0,0);
$pdf->SetFont('Arial','B',14);
$pdf->setXY(110,290);
$pdf->Cell(10,20,'ACROSS',0,1);

$pdf->SetFont('Arial','',11);
$pdf->setXY(110,30);
$pdf->MultiCell(0,5,"2. Easy-to-read programming language
4. Computer that provides services to others
8. Internet-based computing services
10. Microsoft operating system
11. OOP blueprint for objects
13. Software to access websites
16. System managing hardware and software
18. 8-bit unit of digital info
19. Language for interactive web pages
23. Central processing unit
24. Stores changeable data in code
28. OOP concept for inheriting properties
29. Data received by a computer
32. Monitors and controls network traffic
33. LIFO data structure
35. Converts code into machine language
38. Repeats code multiple times
40. Attack tricking users for info
42. Stores multiple values under indexes
43. Language for databases
46. Piece of data for authentication
47. A physical or virtual device
48. Fast-access temporary computer storage
50. Platform for hosting and managing code

");

$pdf->SetFont('Arial','B',14);
$pdf->setXY(10,10);
$pdf->Cell(10,20,'DOWN',0,1);

$pdf->SetFont('Arial','',11);
$pdf->setXY(10,30);
$pdf->MultiCell(0,5,"1. Block of code performing a task
3. Group of interconnected computers
5. Device forwarding data between networks
6. Temporary storage for faster access
7. Open-source operating system
9. Organized collection of structured information
12. Process converting information into a code
14. Computer programs and operating information
15. Protocol for transferring web pages
17. Set of rules and tools for building software
18. Data type with true or false values
20. Step-by-step procedure for solving a problem
21. Data type representing text
22. Command to display output on screen
25. Rules governing data transmission
26. Core part of an operating system
27. Function calling itself
30. Software update or fix
31. Device connecting different networks
34. Instructions for a computer to perform tasks
36. Server-side scripting language
37. Platform-independent programming language
39. Collection of pre-written code
41. Function converting input into fixed-size string
44. First-In-First-Out data structure
45. Markup language for web pages

");


$pdf->AddPage();
$pdf->settextcolor(0,0,0);
$pdf->SetFont('Arial','B',14);
$pdf->Cell(0,10,'Crossword Answers',0,1,'C');
$pdf->Ln(10);


$pdf->settextcolor(0,0,0);
$pdf->CrosswordGrid($grid, $numbers, true);

$pdf->Output();
?>
