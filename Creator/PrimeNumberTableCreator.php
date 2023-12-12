<?php

namespace Creator;

use Exception;

class PrimeNumberTableCreator
{
    private int $input;
    public function __construct(?string $input)
    {
        $this->input = $input == "" ? 10 : (int)$input;
    }

    /**
     * @throws \Exception
     */
    public function create(): string
    {
        if ($this->input == 0) {
            throw new Exception('Can not be created a table with zero or invalid number input!');
        }

        $table = $this->getPrimeNumbersInRange($this->input);
        $maxPrimeNumber = $table[0][count($table[0]) - 1];
        $maxNumberLength = strlen((string)($maxPrimeNumber * $maxPrimeNumber));
        $output = "";

        foreach ($table[0] as $primeNumber) {
            $output .= str_pad($primeNumber, $maxNumberLength + 1);
        }
        $output .= "\n";
        for ($x = 0; $x < $this->input; $x++) {
            $primeNumber = $table[0][$x + 1];
            $output .= str_pad($primeNumber, $maxNumberLength + 1);

            foreach ($table[0] as $initialNumber) {
                if (is_numeric($initialNumber)) {
                    $number = $primeNumber * $initialNumber;
                    $output .= str_pad($number, $maxNumberLength + 1);
                }
            }
            $output .= "\n";
        }

        return $output;
    }

    private function getPrimeNumbersInRange(int $range): array
    {
        $table = [[" "]];
        $primeNumbers = 0;
        $number = 2;

        while ($primeNumbers < $range) {
            if ($this->isPrimeNumber($number)) {
                $table[0][] = $number;
                $primeNumbers++;
            }
            $number++;
        }

        return $table;
    }

    private function isPrimeNumber(int $number): bool
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
}

