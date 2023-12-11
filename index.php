<?php

function render()
{
    $input = 1000;
    $table = [];
    $rowIndex = 0;
    $rowNumber = 0;

    while ($rowIndex <= $input) {
        $colIndex = 0;
        $colNumber = 1;
        if (isPrimeNumber($rowNumber)) {
            while ($colIndex <= $input) {
                if (isPrimeNumber($colNumber)) {
                    $table[$rowIndex][$colIndex] = $colNumber * $rowNumber;
                    $colIndex++;
                } else {
                    if ($colNumber == 1) {
                        $table[$rowIndex][$colIndex] = $rowNumber;
                        $colIndex++;
                    }
                }
                $colNumber++;
            }
            $rowIndex++;
        } else {
            if ($rowNumber == 1) {
                $table[$rowIndex][0] = ' ';
                while ($colIndex < $input) {
                    if (isPrimeNumber($colNumber)) {
                        $table[$rowIndex][$colIndex + 1] = $colNumber;
                        $colIndex++;
                    }
                    $colNumber++;
                }
                $rowIndex++;
            }
        }
        $rowNumber++;
    }

    $maxNumberLength = strlen((string)$table[count($table) - 1][array_key_last($table[count($table) - 1])]);

    foreach ($table as $row) {
        foreach ($row as $column) {
            echo str_pad($column, $maxNumberLength + 1);
        }
        echo "\n";
    }
}

function isPrimeNumber(int $number): bool
{
    if ($number < 2) {
        return false;
    }

    for ($index = 2; $index * $index <= $number; $index++) {
        if ($number % $index == 0) {
            return false;
        }
    }

    return true;
}

render();