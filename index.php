<?php

use src\Creator\PrimeNumberTableCreator;

require_once __DIR__ . '/src/Creator/PrimeNumberTableCreator.php';
function render(): void
{
    $input = readline('Enter range[10]: ');
    $primeNumberTableCreator = new PrimeNumberTableCreator($input);

    try {
        $output = $primeNumberTableCreator->create();
        echo $output;
    } catch (Exception $ex) {
        echo $ex->getMessage();
    }

}

render();