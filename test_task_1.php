<?php

function calculateFactorial(float $number): float {
    if ($number == 0) {
        return 1;
    } else {
        return $number * calculateFactorial($number - 1);
    }
}


function isPrime($num): bool {
    if ($num <= 1) {
        return false;
    }
    for ($i = 2; $i <= sqrt($num); $i++) {
        if ($num % $i == 0) {
            return false;
        }
    }
    return true;
}

echo "Введите число: ";
$number = (float)readline();
echo 'Факториал ' . $number . ' is: ' . calculateFactorial($number) . "\n";

if (isPrime($number)) {
    echo $number . " - это простое число.\n";
} else {
    echo $number . " - это не простое число.\n";
}

?>
