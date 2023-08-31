<?php

//% Errori

//$ Mostrare gli errori

//* display_errors() e error_reporting()
/* ini_set('display_errors', 1);
error_reporting(E_ALL);
echo $a; */


//$ Fasi di errore
//require 'file-non-esistente.php'; // Errore fatale
//echo 56

//$ Tipi di errore
//include './file-non-esistente.php';
// Avvertimento, ma lo script continua


//$ Gestione personalizzazione degli errori
//set_error_handler('errorHandler', E_ALL);

//* Funzione errore personalizzata
/* function errorHandler(int $errNum, string $errMsg) {
    $error = "Error #$errNum : $errMsg<br>";
    error_log($error);
    echo $error;
}
echo $varNonDefinita; */


//$ Gestire i tipi di eccezioni
/* set_error_handler([new ErrorHandler, 'handle'], E_ALL);

class ErrorHandler {
    public function handle(int $errN, string $errS) {
        if ($errN === E_WARNING) {
            echo "Attenzione! Errore di sintassi $errN: $errS<br>";
        } else {
            echo "Errore di tipo $errN: $errS<br>";
        }
    }
}
echo $varNonDefinita; */
//require 'not-a-file.php';



//% Eccezioni

//$ Creare un'eccezione
/*  (function() {
     if(!file_exists('file-non-esistente.php')) {
         throw new Exception("Il file non esiste.");
 }})(); */


//$ try and catch

/* class FileManager {
    public function __construct($file) {
        try {
            if (!file_exists($file)) {
                throw new Exception("Il file non esiste.<br>");

            }
        } catch (Exception $e) {
            //echo "Eccezione catturata.<br>";
            //echo '<pre>'; print_r($e); echo '</pre>';

        }
        //echo 'Posso scrivere codice dopo aver catturato l\'eccezione.<br>';
    }
}
$file1 = new FileManager('file-non-esistente'); */
//echo 'Posso scrivere codice.';

/* throw new Exception(
message: "Il file non esiste.",
code: 404
); */

/* echo <<<"Error"
<h3>Eccezione catturata</h3>
Message: {$e->getMessage()}<br>
Code: {$e->getCode()}<br>
Linea: {$e->getLine()}<br>
Error; */