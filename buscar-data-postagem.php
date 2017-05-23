<?php 

require_once( 'rastrear.class.php' );
const OBJETO_POSTADO = 'Objeto postado';

$_params = array('user' => 'ECT', 'pass' => 'SRO', 'tipo' => 'L', 'resultado' => 'T', 'idioma' => 101);

Rastrear::init($_params);

$obj = Rastrear::get($_POST['objeto']);

if(isset($obj->erro)) die( $obj->erro );

if( is_object($obj->evento) ) {
    $tmp = Array();
    $tmp[] = $obj->evento ;
    $obj->evento = $tmp;
}

foreach($obj->evento as $ev) {
    if ($ev->descricao === OBJETO_POSTADO) {
        print json_encode(array('data' => $ev->data));
    }
}