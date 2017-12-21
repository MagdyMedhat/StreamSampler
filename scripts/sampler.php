#!/usr/bin/env php
<?php
require_once __DIR__ . '/../vendor/autoload.php';

ini_set('max_execution_time', '0');

use Symfony\Component\Console\Input\ArgvInput;
use App\Iterator\StreamIterator;
use App\Sampler\ReservoirSampler;

function GetRandomCharacter(){
    $var = mt_rand( ord('A'), ord('Z'));
    return chr($var);
}

function GenerateRandomString($length){
    $str = "";
    for($i=0;$i<$length;$i++){
        $str .= GetRandomCharacter();
    }
    return $str;
}

const DEFAULT_LENGTH = 100;
$arguments = new ArgvInput();
$input = $arguments->getParameterOption(['-i']);
$length = $arguments->getParameterOption(['-l'], DEFAULT_LENGTH);
$random = $arguments->hasParameterOption(['-r']);

if ($random) {
    $iterator = new ArrayIterator(str_split(GenerateRandomString(DEFAULT_LENGTH)));
}
else {
    if (filter_var($input, FILTER_VALIDATE_URL) === false){
        if (!empty($input)){
            $iterator = new StreamIterator($input);
        }
    }
}

$reservoirSampler = new ReservoirSampler($iterator);

echo implode('', $reservoirSampler->getSample($length)), "\n";
