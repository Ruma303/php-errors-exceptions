<?php

//% Errori

//| Mostrare gli errori

//* display_errors() e error_reporting()
/* ini_set('display_errors', 1);
echo $a;
error_reporting(E_ALL); */


//| Fasi di errore
//require 'file-non-esistente.php'; // Errore fatale
//echo 56 // Parse error


//| Tipi di errore
//include './file-non-esistente.php';
// Avvertimento, ma lo script continua


//| Gestione personalizzazione degli errori
/* set_error_handler('errorHandler', E_ALL);

//* Funzione errore personalizzata
function errorHandler(int $errNum, string $errMsg) {
    $error = "Error #$errNum : $errMsg<br>";
    error_log($error);
    echo $error;
}
echo $varNonDefinita; */


//| Gestire i tipi di eccezioni
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

//echo $a;



//% Eccezioni

//| Creare un'eccezione
/* (function() {
    if(!file_exists('file-non-esistente.php')) {
    throw new Exception("Il file non esiste.");
}})(); */


//| try and catch

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
message: "Messaggio personalizzato dell'eccezione.",
code: 404
); */

/* echo <<<"Error"
<h3>Eccezione catturata</h3>
Message: {$e->getMessage()}<br>
Code: {$e->getCode()}<br>
Linea: {$e->getLine()}<br>
Error; */



//* Refactoring

/* class FileManager {
    public function __construct(private string $file) {
        $this->checkFileExists();
    }

    private function checkFileExists() {
        try {
            if (!file_exists($this->file)) {
                throw new Exception(message: "Il file non esiste.", code: 404);
            }
        } catch (Exception $e) {
            echo "Eccezione catturata: {$e->getCode()}, Message {$e->getMessage()}<br>";
        }
    }
}
$file1 = new FileManager('file-non-esistente'); */



//| Blocco finally

/* function checkNumber($num) {
    try {
        if($num > 1) {
            throw new Exception("Il numero è maggiore di 1.");
        }
        echo "Il numero è 1 o meno.<br>";
    } catch(Exception $e) {
        echo "Eccezione catturata: {$e->getMessage()}<br>";
    } finally {
        echo "Questo blocco viene eseguito indipendentemente.";
    }
}
checkNumber(2);
 */


//% Specializzare le eccezioni

/* class ValueException extends Exception {}

try {
    throw new ValueException();
} catch (ValueException $e) {
    echo '<pre>'; print_r($e); echo '</pre>';
} */


//| Classe exception personalizzata

/* class ValueException extends Exception
{
    public function __construct()
    {
        parent::__construct("Errore di input");
    }
    public function getErrorMessage()
    {
        return <<<MSG
        Messaggio della classe Exception: {$this->getMessage()}<br>
        Il valore dev'essere compreso tra 1 e 5.<br>
        MSG;
    }
}

echo "Il valore deve rientrare nel range 1 - 5.<br>";
try {
    $val = 10;
    if (($val <=1) || ($val >= 5)) {
        throw new ValueException();
    } else {
        echo "Il valore rientra nel range";
    }
} catch (ValueException $e) {
    echo $e->getErrorMessage();
} */


//| Gestione di eccezioni multiple

/* class ValueException extends Exception {}
class OptionalException extends Exception {}
class OtherException extends Exception {}

try {
    throw new ValueException();
    //throw new OptionalException();
    //throw new OtherException();
} catch (ValueException $e) {
    echo "Eccezione sollevata dalla classe: " . $e::class;
} catch (OptionalException $e) {
    echo "Eccezione sollevata dalla classe: " . $e::class;
} catch (OtherException $e) {
    echo "Eccezione sollevata dalla classe: " . $e::class;
} */


/* catch (ValueException | OptionalException | OtherException $e) {
        echo "Eccezione sollevata dalla classe: " . $e::class;
    } */



//| Gestire eccezioni non catturate

/* class ValueException extends Exception {}
class OptionalException extends Exception {}
class OtherException extends Exception {}

set_exception_handler(function($e) {
    echo "Eccezione generica gestita.";
});

try {
    throw new OptionalException();
} catch (CiaoException $e) {
    echo "Eccezione catturata dalla classe: " . $e::class;
}
echo '<br>Testo.'; */


//* Classe globale per gestire le eccezioni

/* class GlobalExceptionHandler {
    public function handle(Exception $e) {
        echo "Eccezione gestita da " . __METHOD__ . " dalla classe: " . __CLASS__;
    }
}

set_exception_handler([new GlobalExceptionHandler, 'handle']);

try {
    throw new ValueException();
} catch (OptionalException $e) {
    echo "Eccezione catturata dalla classe: " . $e::class;
}
echo '<br>Testo.'; */


//% Gestire errori non catturati

/* try {
    $res = 2 / 0;
} catch (DivisionByZeroError $e) {
    echo <<<ERRORS
    Messaggio: {$e->getMessage()}<br>
    Compare alla linea: {$e->getLine()}<br>
    ERRORS;
}
catch (Error $e) {
    echo "Errore gestito.";
} */