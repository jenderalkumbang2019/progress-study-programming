<?php
    function calculate_future_value($investment, $interest_rate, $years) {

        if($investment <= 0 || $interest_rate <= 0 || $years <= 0) {
            throw new Exception('Please check your entries for validity.');
        }

        $future_value = $investment;

        for($i = 1; $i <= $years; $i++) {
            $future_value = ($future_value + ($future_value * $interest_rate * .01));
        }

        return round($future_value, 2);

    }

    // try {
    //     $fv = calculate_future_value(10000, 0.06, 0);
    //     echo 'Future value was calculated successfully.';
    // } catch(Exception $e) {
    //     echo 'Error: ' . $e->getMessage();
    // }

    try {
        $fv = calculate_future_value($investment, annual_rate, $years);
        echo 'Future value was calculated successfully.';
    } catch(Exception $e) {
        throw $e;
    }