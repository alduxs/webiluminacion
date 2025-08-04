<?php

include_once('constantes.inc.php');
//require_once 'includes//library/HTMLPurifier.auto.php';

if (file_exists('vendor/autoload.php')) {
  require_once 'vendor/autoload.php';
} else if (file_exists('../vendor/autoload.php')) {
  require_once '../vendor/autoload.php';
} else if (file_exists('../../vendor/autoload.php')) {
  require_once '../../vendor/autoload.php';
}

use Respect\Validation\Validator as v;
//
function valError($regvalue1, $dirty_post)
{

  $mensaje = $regvalue1 . "<br>";
  $mensaje .= "Formato de dato incorrecto\n";
  echo $mensaje;


  exit();
}
//
function registerValidation($tipo, $regvalue, $dirty_post = false)
{


  $additionalChars = "()/_.,×-áéíóúÁÉÍÓÚÜñÑÃ­!?¡¿@&+*:;=°´$| " . mb_convert_encoding("()/_.,×-áéíóúÁÉÍÓÚÜñÑÃ­!?¡¿@&+*:;=°´$| ","UTF-8") . mb_convert_encoding("()/_.,×-áéíóúÁÉÍÓÚÜñÑÃ­!?¡¿@&+*:;=°´$| ","UTF-8");

  if ($tipo) {

    //funcion verificar el tipo de datos con Respect validator.php
    /*
        * AB = Alfabetico
        * TE = Teléfono
        * AN = Alfanumérico
        * NU = Numérico
        * TH = Texto Html
        * TH2 = Texto Html
        * EM = Email
        * DN = DNI
        * LG = Login
        * PW = Password
        */

    switch ($tipo) {
      case 'AB':

        if (v::alpha($additionalChars)->length(1, 200)->validate($regvalue)) {
        } else {

          valError($regvalue, $dirty_post);
        }
        break;

      case 'ABF':

        if (v::alpha($additionalChars)->length(1, 200)->validate($regvalue)) {
        } else {

          valError($regvalue, $dirty_post);
        }
        break;

      case 'ABF2':

        if (v::alpha($additionalChars)->length(1, 200)->validate($regvalue)) {
        } else {

          valError($regvalue, $dirty_post);
        }
        break;

      case 'TE':
        if (v::phone()->length(1, 25)->validate($regvalue)) {
        } else valError($regvalue, $dirty_post);

        break;

      case 'AN':

        if (v::alnum(' ', $additionalChars)->length(1, 200)->validate(mb_convert_encoding($regvalue,"UTF-8"))) {
        } else {
          valError($regvalue, $dirty_post);
        }
        break;

      case 'NU':

        if (v::number()->length(1, 2000)->validate($regvalue)) {
        } else {
          valError($regvalue, $dirty_post);
        }
        break;

      case 'TH':
        if (v::length(1, 2000000)->validate($regvalue)) {
        } else {
          valError($regvalue, $dirty_post);
        }
        break;

      case 'TH2':
        if (v::length(1, 2000000)->validate($regvalue)) {
        } else {
          valError($regvalue, $dirty_post);
        }
        break;

      case 'EM':
        if (v::email()->length(1, 100)->validate($regvalue)) {
        } else {
          valError($regvalue, $dirty_post);
        }
        break;

      case 'DN':

        if (v::number()->length(5, 12)->validate($regvalue)) {
        } else {
          valError($regvalue, $dirty_post);
        }
        break;

      case 'LG':
        if (v::alnum('- , . /')->length(1, 100)->noWhitespace()->validate($regvalue)) {
        } else {
          valError($regvalue, $dirty_post);
        }
        break;

      case 'PW':
        if (v::alnum('- , . /')->length(1, 100)->noWhitespace()->validate($regvalue)) {
        } else {
          valError($regvalue, $dirty_post);
        }
        break;

      default:
        # code...
        break;
    }
  }
}
//
class General
{

  public function dataCleaner($dirty_post, $tipodato)
  {

    if (file_exists('includes/library/HTMLPurifier.auto.php')) {
      require_once('includes/library/HTMLPurifier.auto.php');
    } else if (file_exists('../includes/library/HTMLPurifier.auto.php')) {
      require_once('../includes/library/HTMLPurifier.auto.php');
    } else if (file_exists('../../includes/library/HTMLPurifier.auto.php')) {
      require_once('../../includes/library/HTMLPurifier.auto.php');
    }

    if ($tipodato == "TH") {
      registerValidation($tipodato, $dirty_post);
      $config = HTMLPurifier_Config::createDefault();
      $config->set('Core.Encoding', 'Windows-1252');
      $config->set('HTML.Allowed', 'p[class,style],u,b,span[class,style],a[href|title|target],abbr[title],table[class],td,tr,strong,blockquote[cite],em,i,div[class,id],span,sup,img[src],table,li[class,style],ol,h2[class,style],br,ul');
      $config->set('HTML.TidyLevel', 'medium');
      $config->set('URI.AllowedSchemes', ['data' => true]);
      $purifier = new HTMLPurifier($config);
      $arrayPost_Clean = $purifier->purify($dirty_post);
    } else if ($tipodato == "TH2") {
      registerValidation($tipodato, $dirty_post);
      $config = HTMLPurifier_Config::createDefault();
      $config->set('Core.Encoding', 'UTF-8');
      $config->set('HTML.Allowed', 'p[class,style],u,b,span[class,style],a[href|title|target],abbr[title],table[class],td,tr,strong,blockquote[cite],em,i,div[class,id],span,sup,img[src],table,li[class,style],ol,h2[class,style],br,ul');

      $config->set('HTML.AllowedAttributes', '*.class,a.href,a.target');

      $config->set('Attr.AllowedFrameTargets', '_blank,_self');

      $purifier = new HTMLPurifier($config);
      $arrayPost_Clean = $purifier->purify($dirty_post);
    } else if ($tipodato == "NU") {
      registerValidation($tipodato, $dirty_post);
      $arrayPost_Clean = $dirty_post;
    } else if ($tipodato == "ABF") {
      registerValidation($tipodato, $dirty_post);
      $config = HTMLPurifier_Config::createDefault();
      $config->set('Core.Encoding', 'Windows-1252');
      $config->set('HTML.TidyLevel', 'heavy');
      $purifier = new HTMLPurifier($config);
      $arrayPost_Clean = $purifier->purify($dirty_post);
    } else if ($tipodato == "ABF2") {
      registerValidation($tipodato, $dirty_post);
      $config = HTMLPurifier_Config::createDefault();
      $config->set('Core.Encoding', 'UTF-8');
      $purifier = new HTMLPurifier($config);
      $arrayPost_Clean = $purifier->purify($dirty_post);
    } else if ($tipodato == "AN") {
      registerValidation($tipodato, $dirty_post);
      $config = HTMLPurifier_Config::createDefault();
      $config->set('Core.Encoding', 'UTF-8');
      $purifier = new HTMLPurifier($config);
      $arrayPost_Clean = $purifier->purify($dirty_post);
    } else {
      registerValidation($tipodato, $dirty_post);
      $config = HTMLPurifier_Config::createDefault();
      $config->set('Core.Encoding', 'Windows-1252');
      $config->set('HTML.TidyLevel', 'heavy');
      $purifier = new HTMLPurifier($config);
      $arrayPost_Clean = $purifier->purify($dirty_post);
    }

    return $arrayPost_Clean;
  }


  function getAllContenido($link, $strQuery)
  { /* *NORMALIZADA */
    $strQuery = $strQuery;
    $stmt = $link->prepare($strQuery);
    $result = $stmt->execute();
    if (!$result) {
      $err = $stmt->errorInfo();
      $objErrorHandler = new errorHandler();
      $objErrorHandler->reportError("Error: " . $err[2], $strQuery, $_SERVER['REMOTE_ADDR']);
      unset($objErrorHandler);
      exit();
    } else {
      return $stmt;
    }
  }



  function getOneContenido($link, $pintIdCont, $strQuery)
  { /* *NORMALIZADA */

    $link->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);

    $stmt = $link->prepare($strQuery);
    $resultado = count($pintIdCont);

    for ($i = 0; $i < $resultado; $i++) {
      if (isset($pintIdCont[$i]['validar']) && $pintIdCont[$i]['validar'] == 0) {
        $postClean = $pintIdCont[$i]['value'];
        $stmt->bindValue(($i + 1), $postClean);
      } else {
        $postClean = $this->dataCleaner($pintIdCont[$i]['value'], $pintIdCont[$i]['tipo']);
        $stmt->bindValue(($i + 1), $postClean);
      }
    }
    $result = $stmt->execute();
    if (!$result) {
      $err = $stmt->errorInfo();
      $objErrorHandler = new errorHandler();
      $objErrorHandler->reportError("Error: " . $err[2], $strQuery,  $_SERVER['REMOTE_ADDR']);
      unset($objErrorHandler);
      exit();
    } else {
      return $stmt;
    }
  }

  function insertContenido($link, $parrData, $strQuery) { /* *NORMALIZADA */
    $stmt = $link->prepare($strQuery);
    $resultado = count($parrData);
    for ($i = 0; $i < $resultado; $i++) {
      if (isset($parrData[$i]['validar']) && $parrData[$i]['validar'] == 0) {
        $postClean = $parrData[$i]['value'];
        $stmt->bindValue(($i + 1), $postClean);
      } else {
        $postClean = $this->dataCleaner($parrData[$i]['value'], $parrData[$i]['tipo']);
        $stmt->bindValue(($i + 1), $postClean);
      }

    }
    $result = $stmt->execute();
    if (!$result) {
      $err = $stmt->errorInfo();
      $objErrorHandler = new errorHandler();
      $objErrorHandler->reportError("Error: " . $err[2], $strQuery, $_SERVER['REMOTE_ADDR']);
      unset($objErrorHandler);
      exit();
    }
    $lastReg = $link->lastInsertId();
    return $lastReg;
  }

  function deleteContenido($link, $strSeccion, $strQuery) {
    $strQuery = $strQuery;
    $stmt = $link->prepare($strQuery);
    $stmt->bindValue(1, $strSeccion[1]);
    $result = $stmt->execute();
    if (!$result) {
      $err = $stmt->errorInfo();
      $objErrorHandler = new errorHandler();
      $objErrorHandler->reportError("Error: " . $err[2], $strQuery, $_SERVER['REMOTE_ADDR']);
      unset($objErrorHandler);
      exit();
    }
    return true;
  }

  function updateContenido($link, $parrData, $strQuery) { /* *NORMALIZADA */
    $stmt = $link->prepare($strQuery);
    $resultado = count($parrData);
    for ($i = 0; $i < $resultado; $i++) {

      if (isset($parrData[$i]['validar']) && $parrData[$i]['validar'] == 0) {
        $postClean = $parrData[$i]['value'];
        $stmt->bindValue(($i + 1), $postClean);
      } else {
        $postClean = $this->dataCleaner($parrData[$i]['value'], $parrData[$i]['tipo']);
        $stmt->bindValue(($i + 1), $postClean);
      }
    }
    $result = $stmt->execute();
    if (!$result) {
      $err = $stmt->errorInfo();
      $objErrorHandler = new errorHandler();
      $objErrorHandler->reportError("Error: " . $err[2], $strQuery, $_SERVER['REMOTE_ADDR']);
      unset($objErrorHandler);
      exit();
    }
    return true;
  }


}
//
class errorHandler
{
  function reportError($pstrMysqlError, $pstrQueryError, $pstrIP)
  {
    $strHTML = "<strong>MYSQL ERROR:</strong> " . $pstrMysqlError . "<br /><br />";
    $strHTML .= "<strong>QUERY ERROR:</strong> " . $pstrQueryError . "<br /><br />";
    $strHTML .= "<strong>IP ADDRESS:</strong> " . $pstrIP . "<br /><br />";
    $strSubject = "SITE UNDER ATTACK [\"" . _CONST_TITLE_  . "\"]";

    echo $strHTML;

    //sendMail("agi.iniguez@gmail.com", "agi.iniguez@gmail.com", $strSubject, $strHTML);
    exit();
  }
}

class Archivo
{

  function renameFile($pstrFileName)
  {
    $strTMPName = explode('.', $pstrFileName);
    $largo = count($strTMPName);
    $posFinal = $largo - 1;
    $extension = "." . $strTMPName[$posFinal];
    $pstrFileName = "";
    for ($i = 0; $i < $largo - 1; $i++) {
      $pstrFileName .= $strTMPName[$i];
    }
    $pstrFileName = strtolower($pstrFileName); // Pone en minúscula el nombre de la imagen
    $valores = array("á", "é", "í", "ó", "ú", "Á", "É", "Í", "Ó", "Ú", " ", "ñ", "º", "(", ")", "ä", "ë", "ï", "ö", "ü", ",", "'", "[", "]", "{", "}", "?", "¿", "/", "$", "+", "*", "&", "!", "#", "@", "%", ";", ":", "|"); // Valores no permitidos
    $pstrFileName = str_replace($valores, "_", $pstrFileName);
    $randomNumber = rand(0, 9999);
    $strImage = $pstrFileName . $randomNumber . $extension;
    return $strImage;
  }

  function renameFileI($pstrFileName)
  {
    $pstrFileName = strtolower($pstrFileName); // Pone en minúscula el nombre de la imagen
    $valores = array("á", "é", "í", "ó", "ú", "Á", "É", "Í", "Ó", "Ú", " ", "ñ", "º", "(", ")", "ä", "ë", "ï", "ö", "ü", ",", "'", "[", "]", "{", "}", "?", "¿", "/", "$", "+", "*", "&", "!", "#", "@", "%", ";", ":", "|"); // Valores no permitidos
    $pstrFileName = str_replace($valores, "_", $pstrFileName);
    $randomNumber = rand(0, 9999);
    $strTMPName = explode('.', $pstrFileName);
    $strImage = $strTMPName[0] . $randomNumber;
    return $strImage;
  }

  

  function UploadTextoConcurso($pstrFile, $pstrPath)
  {
    
    
    $strTMPFileName = $this->renameFile(basename($pstrFile['name']));
    $strFileName = $pstrPath . $strTMPFileName;

    
    if (is_uploaded_file($pstrFile['tmp_name'])) {

      if (copy($pstrFile['tmp_name'], $strFileName)) {
        return $strTMPFileName;
      } else {
        return false;
      };
    }
  }



  function deleteFile($pstrArchivo)
  {
    unlink($pstrArchivo);
    return true;
  }

  

}


class ComonClases {
  function deleteRegistro($link,$strSeccion) {
    if ($strSeccion[1] == "usuarios"){
      $strQuery = "DELETE FROM login WHERE id_usuario = ?";
    }
   
    if ($strSeccion[1] == "archivos"){
      $strQuery = "DELETE FROM archivos WHERE id = ?";
    }

    if ($strSeccion[1] == "post"){
      $strQuery = "DELETE FROM contenido2 WHERE id = ?";
    }

    if ($strSeccion[1] == "socios"){
      $strQuery = "DELETE FROM socios WHERE soc_id = ?";
    }

    if ($strSeccion[1] == "docentes"){
      $strQuery = "DELETE FROM docentes WHERE doc_id = ?";
    }
    
    if ($strSeccion[1] == "cdirectiva"){
      $strQuery = "DELETE FROM comision WHERE com_id = ?";
    }
    if ($strSeccion[1] == "revistas"){
      $strQuery = "DELETE FROM revistas WHERE rev_id = ?";
    }

    if ($strSeccion[1] == "alianzas"){
      $strQuery = "DELETE FROM alianzas WHERE al_id = ?";
    }

    if ($strSeccion[1] == "intalianzas"){
      $strQuery = "DELETE FROM integrantesalianzas WHERE int_id = ?";
    }

    $stmt = $link->prepare($strQuery);
    $stmt->bindValue(1, $strSeccion[0]);
    $result = $stmt->execute();
    if (!$result) {
      $err = $stmt->errorInfo();
      $objErrorHandler = new errorHandler();
      $objErrorHandler->reportError("Error: " . $err[2], $strQuery, $_SERVER['REMOTE_ADDR']);
      unset($objErrorHandler);
      exit();
    }
      return true;
  }

}

