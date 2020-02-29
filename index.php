<?php

require 'vendor/autoload.php';

echo 'masuk';

use Dompdf\Dompdf;
use Dompdf\Options;

$options = new Options();
$options->set('defaultFont', 'Calibri');
$dompdf = new Dompdf($options);

$content=file_get_contents('page.html');

$name=@$_GET['name'];
$course=@$_GET['course'];
$score=@$_GET['score'];

$search=['{name}','{score}','{course}'];
$replaced=[$name,$score,$course];
$new_content=str_replace($search,$replaced,$content);


$dompdf->loadHtml($new_content);

// (Optional) Setup the paper size and orientation
$dompdf->setPaper('A4', 'landscape');

// // Render the HTML as PDF
// $dompdf->render();

// // Output the generated PDF to Browser
// $dompdf->stream('test.pdf',[
//     'Attachment'=>0
// ]);