<?php

require 'vendor/autoload.php';

// reference the Dompdf namespace
use Dompdf\Dompdf;

$homepage = file_get_contents('template.html');

// instantiate and use the dompdf class
$dompdf = new Dompdf([
    'isRemoteEnabled' =>true,
    'isHtml5ParserEnabled' =>true,
    'defaultPaperSize' =>'a4',
]);

$dompdf->loadHtml($homepage, 'UTF-8');



// Render the HTML as PDF
$dompdf->render();

// Output the generated PDF to Browser
$dompdf->stream();

header('Location: index.html');

?>