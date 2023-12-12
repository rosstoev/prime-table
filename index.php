<?php

require_once __DIR__ . '/Creator/PrimeNumberTableCreator.php';
function render(): void
{
    $input = readline('Enter range[10]: ');
    $primeNumberTableCreator = new Creator\PrimeNumberTableCreator($input);

    try {
        $output = $primeNumberTableCreator->create();
        echo $output;
    } catch (Exception $ex) {
        echo $ex->getMessage();
    }

}

render();