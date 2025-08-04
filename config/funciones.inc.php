<?php
function file_extension($filename)
{
    $path_info = pathinfo($filename);
    return strtolower($path_info['extension']);
}
//
function callback($buffer)
{
    $buffer = (str_replace(chr(13) . chr(10), '', $buffer));
    $buffer = (str_replace(chr(13), '', $buffer));
    $buffer = (str_replace(chr(10), '', $buffer));
    $buffer = (str_replace('\r\n', '', $buffer));
    $buffer = (str_replace(chr(9), '', $buffer));
    $buffer = (str_replace('  ', '', $buffer));
    return $buffer;
}
//
// ME DICE QUE DIA ES
//
function prtMonthM($mes)
{
    switch ($mes) {
        case '01':
            $mes = "ENERO";
            break;
        case '02':
            $mes = "FEBRERO";
            break;
        case '03':
            $mes = "MARZO";
            break;
        case '04':
            $mes = "ABRIL";
            break;
        case '05':
            $mes = "MAYO";
            break;
        case '06':
            $mes = "JUNIO";
            break;
        case '07':
            $mes = "JULIO";
            break;
        case '08':
            $mes = "AGOSTO";
            break;
        case '09':
            $mes = "SEPTIEMBRE";
            break;
        case '10':
            $mes = "OCTUBRE";
            break;
        case '11':
            $mes = "NOVIEMBRE";
            break;
        case '12':
            $mes = "DICIEMBRE";
            break;
    }
    return $mes;
}
function monthReplace($pstrfecha)
{
    $strFecha = str_replace("January", "Enero", $pstrfecha);
    $strFecha = str_replace("February", "Febrero", $strFecha);
    $strFecha = str_replace("March", "Marzo", $strFecha);
    $strFecha = str_replace("April", "Abril", $strFecha);
    $strFecha = str_replace("May", "Mayo", $strFecha);
    $strFecha = str_replace("June", "Junio", $strFecha);
    $strFecha = str_replace("July", "Julio", $strFecha);
    $strFecha = str_replace("August", "Agosto", $strFecha);
    $strFecha = str_replace("September", "Septiembre", $strFecha);
    $strFecha = str_replace("October", "Octubre", $strFecha);
    $strFecha = str_replace("November", "Noviembre", $strFecha);
    $strFecha = str_replace("December", "Diciembre", $strFecha);
    return $strFecha;
}
//
// GENERA LA PAGINACION
//
function printPaginado($pstrPagina, $intQtyPages, $intPage, $strListado)
{
    $strHTML = "";
    if ($intQtyPages > 1) {
        $strHTML = "<ul>";
        $strHTML .= "    <div class=\"paging clearfix\">";
        for ($i = 1; $i <= $intQtyPages; $i++) {
            if ($intPage == $i)
                //si muestro el indice de la pagina actual, no coloco enlace
                $strHTML .= "<li><span class=\"fix\">" . $i . "</span></li>";
            else
                //si el indice no corresponde con la pagina mostrada actualmente, coloco el enlace para ir a esa pagina
                $strHTML .= "<li><a href=\"" . $pstrPagina . "?intPageId=" . $i . "&seccion=" . $strListado . "\">" . $i . "</a></li>";
        }
        $strHTML .= "</ul>";
    }
    return $strHTML;
}

function printPaginadoMsb($pstrPagina, $intQtyPages, $intPage)
{
    $strHTML = "";
    if ($intQtyPages > 1) {
        $strHTML = "<ul>";
        for ($i = 1; $i <= $intQtyPages; $i++) {
            if ($intPage == $i)
                //si muestro el indice de la pagina actual, no coloco enlace
                $strHTML .= "<li><span class=\"fix\">" . $i . "</span></li>";
            else
                //si el indice no corresponde con la pagina mostrada actualmente, coloco el enlace para ir a esa pagina
                $strHTML .= "<li><a href=\"" . $pstrPagina . "?p=" . $i . "\">" . $i . "</a></li>";
        }
        $strHTML .= "</ul>";
    }
    return $strHTML;
}
function printPaginadoC($pstrPagina, $intQtyPages, $intPage, $strListado, $filter)
{
    $strHTML = "";
    if ($intQtyPages > 1) {
        $strHTML = "<ul>";
        $strHTML .= "    <div class=\"paging clearfix\">";
        for ($i = 1; $i <= $intQtyPages; $i++) {
            if ($intPage == $i)
                //si muestro el indice de la pagina actual, no coloco enlace
                $strHTML .= "<li><span class=\"fix\">" . $i . "</span></li>";
            else
                //si el indice no corresponde con la pagina mostrada actualmente, coloco el enlace para ir a esa pagina
                $strHTML .= "<li><a href=\"" . $pstrPagina . "?intPageId=" . $i . "&seccion=" . $strListado . "&filter=" . $filter . "\">" . $i . "</a></li>";
        }
        $strHTML .= "</ul>";
    }
    return $strHTML;
}
//
// FORMATEA FECHAS SEGUN EL PARAMETRO $strFormat
//
function convertDate($strDate, $strFormat)
{
    switch ($strFormat) {
        case 'DD/MM/YYYY':
            list($year, $month, $day) = explode('-', $strDate);
            $strDateFormated = $day . "/" . $month . "/" . $year;
            break;
        case 'MM/DD/YYYY':
            list($year, $month, $day) = explode('-', $strDate);
            $strDateFormated = $month . "/" . $day . "/" . $year;
            break;
        case 'YYYY/MM/DD':
            list($day, $month, $year) = explode('/', $strDate);
            $strDateFormated = $year . "-" . $month . "-" . $day;
            break;
        default:
            break;
    }
    return $strDateFormated;
}
/*
*
* Formateo los datos de una variable para evitar un SQL-Inyection
*
* @author Esteban Ruax
* @author http://www.fracty.net/
*
* @param string $pstrValue Es el string ya sea obtenido por GET o POST a formatear
*
*/
function sanitazeString($pstrValue)
{
    $value = filter_var($pstrValue, FILTER_SANITIZE_STRING);
    $value = str_replace("%%", "", $value);
    $value = str_replace("%p", "", $value);
    $value = str_replace("%d", "", $value);
    $value = str_replace("%c", "", $value);
    $value = str_replace("%u", "", $value);
    $value = str_replace("%x", "", $value);
    $value = str_replace("%s", "", $value);
    $value = str_replace("%n", "", $value);
    return ($value);
}
function sanitazeInteger($pstrValue)
{
    $value = filter_var($pstrValue, FILTER_SANITIZE_NUMBER_INT);
    $value = str_replace("-", "", $value);
    $value = str_replace("+", "", $value);
    return ($value);
}

// FUNCION DE ENVIO DE MAIL
//
function sendMail($strFrom, $strTo, $strSubject, $strHTML)
{
    mail($strTo, $strSubject, $strHTML, "From: {$strFrom}\r\nMIME-Version: 1.0\r\nContent-Type: text/html; charset=utf-8 ");
}

//
//	REEMPLAZA CARACTERES EXTRAÑOS EN LAS URL
//
function buildLink($pstrTitulo)
{
    $strURL = str_replace(" ", "-", stripslashes($pstrTitulo));
    $strURL = str_replace("?", "", $strURL);
    $strURL = str_replace("¿", "", $strURL);
    $strURL = str_replace("\"", "", $strURL);
    $strURL = str_replace("/", "-", $strURL);
    $strURL = str_replace("%", "-", $strURL);
    $strURL = str_replace("|", "", $strURL);
    $strURL = str_replace(",", "", $strURL);
    $strURL = str_replace("!", "", $strURL);
    $strURL = str_replace("¡", "", $strURL);
    $strURL = str_replace("'", "", $strURL);
    $strURL = str_replace("=", "", $strURL);
    $strURL = str_replace(".", "", $strURL);
    $strURL = str_replace(":", "", $strURL);
    $strURL = str_replace("\"", "", $strURL);
    $strURL = str_replace("(", "-", $strURL);
    $strURL = str_replace(")", "-", $strURL);
    $strURL = str_replace("á", "a", $strURL);
    $strURL = str_replace("é", "e", $strURL);
    $strURL = str_replace("í", "i", $strURL);
    $strURL = str_replace("ó", "o", $strURL);
    $strURL = str_replace("ú", "u", $strURL);
    $strURL = str_replace("ü", "u", $strURL);
    $strURL = str_replace("ñ", "n", $strURL);
    $strURL = str_replace("Á", "A", $strURL);
    $strURL = str_replace("É", "E", $strURL);
    $strURL = str_replace("Í", "I", $strURL);
    $strURL = str_replace("Ó", "O", $strURL);
    $strURL = str_replace("Ú", "U", $strURL);
    $strURL = str_replace("Ü", "U", $strURL);
    $strURL = str_replace("Ñ", "N", $strURL);
    $strURL = str_replace("&quot;", "", $strURL);
    $strURL = strtolower($strURL);
    return $strURL;
}

function reemplazar($pstrTitulo)
{
    $strURL = str_replace("?", "", $pstrTitulo);
    $strURL = str_replace("\"", "", $strURL);
    $strURL = str_replace("/", "-", $strURL);
    $strURL = str_replace("%", "-", $strURL);
    $strURL = str_replace("|", "", $strURL);
    $strURL = str_replace(",", "", $strURL);
    $strURL = str_replace("!", "", $strURL);
    $strURL = str_replace("¡", "", $strURL);
    $strURL = str_replace("'", "", $strURL);
    $strURL = str_replace("=", "", $strURL);
    $strURL = str_replace(".", "", $strURL);
    $strURL = str_replace(":", "", $strURL);
    $strURL = str_replace("\"", "", $strURL);
    $strURL = str_replace("(", "-", $strURL);
    $strURL = str_replace(")", "-", $strURL);
    $strURL = str_replace("á", "a", $strURL);
    $strURL = str_replace("é", "e", $strURL);
    $strURL = str_replace("í", "i", $strURL);
    $strURL = str_replace("ó", "o", $strURL);
    $strURL = str_replace("ú", "u", $strURL);
    $strURL = str_replace("ü", "u", $strURL);
    $strURL = str_replace("ñ", "n", $strURL);
    $strURL = str_replace("Á", "A", $strURL);
    $strURL = str_replace("É", "E", $strURL);
    $strURL = str_replace("Í", "I", $strURL);
    $strURL = str_replace("Ó", "O", $strURL);
    $strURL = str_replace("Ú", "U", $strURL);
    $strURL = str_replace("Ü", "U", $strURL);
    $strURL = str_replace("Ñ", "N", $strURL);
    $strURL = str_replace("&quot;", "", $strURL);
    return $strURL;
}
//
//	GENERA UN CODIGO DE TIPO RANDOM (PARA LOS CODIGOS DE ACTIVACION DEL NEWS)
//
function generateCode($intLongitud)
{
    $codigo = "";
    $longitud = $intLongitud;
    for ($i = 1; $i <= $longitud; $i++) {
        $letra = chr(rand(97, 122));
        $codigo .= $letra;
    }
    return $codigo;
}
//
//	DEVUELVE LA URL EXACTA
//
function requested_page()
{
    $strProtocol = ((int) $_SERVER['SERVER_PORT'] === 443) ? 'https://' : 'http://';
    $strCurrentPage = $strProtocol . $_SERVER['HTTP_HOST'] . ((!empty($_SERVER['REQUEST_URI'])) ? $_SERVER['REQUEST_URI'] : '');
    return $strCurrentPage;
}
//
//	OBTIENE EL THUMBNAIL DE LOS VIDEO DE YOUTUBE
//
function getYouTubeThumbnail($pstrEmbedCode)
{
    preg_match('/youtube\.com\/v\/([\w\-]+)/', $pstrEmbedCode, $match);
    $strThumbnail = "<img src=\"http://img.youtube.com/vi/{$match[1]}/default.jpg\" alt=\"\" border=\"0\" style=\"border:1px solid #999999;padding:1px;\" />";
    return $strThumbnail;
}
//
//
function urls_amigables($url)
{
    // Tranformamos todo a minusculas
    $url = strtolower($url);
    //Rememplazamos caracteres especiales latinos
    $find = array('á', 'é', 'í', 'ó', 'ú', 'ñ');
    $repl = array('a', 'e', 'i', 'o', 'u', 'n');
    $url = str_replace($find, $repl, $url);
    // Añadimos los guiones
    $find = array(' ', '&', '\r\n', '\n', '+');
    $url = str_replace($find, '-', $url);
    // Eliminamos y Reemplazamos demás caracteres especiales
    $find = array('/[^a-z0-9\-<>.]/', '/[\-]+/', '/<[^>]*>/');
    $repl = array('', '-', '');
    $url = preg_replace($find, $repl, $url);
    return $url;
}
/*function selfURL(){
   $s        = empty($_SERVER["HTTPS"]) ? '' : ($_SERVER["HTTPS"] == "on") ? "s" : "";
   $protocol = strleft(strtolower($_SERVER["SERVER_PROTOCOL"]), "/").$s;
   $port     = ($_SERVER["SERVER_PORT"] == "80") ? "" : (":".$_SERVER["SERVER_PORT"]);
   return $protocol."://".$_SERVER['SERVER_NAME'].$port.$_SERVER['REQUEST_URI'];
}*/
function strleft($s1, $s2)
{
    return substr($s1, 0, strpos($s1, $s2));
}

function invertFecha($fecha)
{
    $newAnio = substr($fecha, 0, 4);
    $newMes = substr($fecha, 4, 2);
    $newDia = substr($fecha, 6, 2);
    $newHora = substr($fecha, 8);
    $newFecha = $newDia . "/" . $newMes . "/" . $newAnio . " " . $newHora;
    return $newFecha;
}
function armarhora($strHora)
{
    $hora = substr($strHora, 0, 2);    // devuelve "f"
    $minutos = substr($strHora, 3, 2);    // devuelve "ef"
    $strHora = $hora . $minutos;
    return $strHora;
}
/*
  * EL PUNTO
  */
function extraehora($strData)
{
    $hora = substr($strData, 8, 2);    // devuelve "f"
    $minutos = substr($strData, 10, 2);    // devuelve "ef"
    $strHora = $hora . ":" . $minutos;
    return $strHora;
}

function extraefecha($strData)
{
    $dia = substr($strData, 6, 2);    // devuelve "f"
    $mes = substr($strData, 4, 2);    // devuelve "ef"
    $anio = substr($strData, 0, 4); // devuelve "d"
    $strFecha = $dia . "/" . $mes . "/" . $anio;
    return $strFecha;
}
function extraefecha2($strData)
{
    $dia = substr($strData, 8, 2);    // devuelve "f"
    $mes = substr($strData, 5, 2);    // devuelve "ef"
    $anio = substr($strData, 0, 4); // devuelve "d"
    $strFecha = $dia . "/" . $mes . "/" . $anio;
    return $strFecha;
}
function extraerCero($strData)
{
    $primercaracter = substr($strData, 0, 1);
    $segundocaracter = substr($strData, 1, 1);
    if ($primercaracter == "0") {
        $strFecha = $segundocaracter;
    } else {
        $strFecha = $primercaracter . $segundocaracter;
    }
    return $strFecha;
}
function invertFechaEp($strFecha)
{
    $dia = substr($strFecha, 0, 2);    // devuelve "f"
    $mes = substr($strFecha, 3, 2);    // devuelve "ef"
    $anio = substr($strFecha, 6, 4); // devuelve "d"
    $strFecha = $anio . $mes . $dia;
    return $strFecha;
}

//
// ME DICE QUE DIA ES
//
function prtDay($dia)
{
    switch ($dia) {
        case '0':
            $dia = "Domingo";
            break;
        case '1':
            $dia = "Lunes";
            break;
        case '2':
            $dia = "Martes";
            break;
        case '3':
            $dia = "Mi&eacute;rcoles";
            break;
        case '4':
            $dia = "Jueves";
            break;
        case '5':
            $dia = "Viernes";
            break;
        case '6':
            $dia = "S&aacute;bado";
            break;
    }
    return $dia;
}
function prtMonth($mes)
{
    switch ($mes) {
        case '01':
            $mes = "ENE";
            break;
        case '02':
            $mes = "FEB";
            break;
        case '03':
            $mes = "MAR";
            break;
        case '04':
            $mes = "ABR";
            break;
        case '05':
            $mes = "MAY";
            break;
        case '06':
            $mes = "JUN";
            break;
        case '07':
            $mes = "JUL";
            break;
        case '08':
            $mes = "AGO";
            break;
        case '09':
            $mes = "SEP";
            break;
        case '10':
            $mes = "OCT";
            break;
        case '11':
            $mes = "NOV";
            break;
        case '12':
            $mes = "DIC";
            break;
    }
    return $mes;
}

function prtMonthCom($mes)
{
    switch ($mes) {
        case '01':
            $mes = "Enero";
            break;
        case '02':
            $mes = "Febrero";
            break;
        case '03':
            $mes = "Marzo";
            break;
        case '04':
            $mes = "Abril";
            break;
        case '05':
            $mes = "Mayo";
            break;
        case '06':
            $mes = "Junio";
            break;
        case '07':
            $mes = "Julio";
            break;
        case '08':
            $mes = "Agosto";
            break;
        case '09':
            $mes = "Septiembre";
            break;
        case '10':
            $mes = "Octubre";
            break;
        case '11':
            $mes = "Noviembre";
            break;
        case '12':
            $mes = "Diciembre";
            break;
    }
    return $mes;
}
// TIPO PROPIEDAD
function tipopropiedad($number)
{
    switch ($number) {
        case '1':
            $tipoPropiedad = "Casa";
            break;
        case '2':
            $tipoPropiedad = "Terreno";
            break;
       
    }
    return $tipoPropiedad;
}

