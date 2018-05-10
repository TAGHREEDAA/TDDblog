<?php

use Illuminate\Support\Debug\HtmlDumper;
use Symfony\Component\VarDumper\Cloner\VarCloner;
use Symfony\Component\VarDumper\Dumper\CliDumper;


//VarDumper works by
// 1- Cloning the input variable with a "Cloner".
// 2- Set configuration options of VarCloner class, and the Data object that it creates
// 3- Dumping it to either the browser or the terminal with with a "Dumper".

/**
 * Modify the default var dumper
 *
 * @param $variable
 * @param int $depth
 * @param int $stringLength
 *
 *
 *
 */
function dd_modified($variable, $depth = -1, $stringLength = 20)

{
    $cloner = new VarCloner();

    $cloner->setMaxString($stringLength);

    $dumper = 'cli' === PHP_SAPI ? new CliDumper() : new HtmlDumper();

    $dumper->dump($cloner->cloneVar($variable)->withMaxDepth($depth));

    die(1);
}

/*
function debug($variable, $depth = null)
{
    \Kint::$maxLevels = $depth;

    return ddd($variable);
}*/