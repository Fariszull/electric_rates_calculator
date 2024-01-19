<?php
   function powerCalculation($voltage, $current) {
    // Calculate total power 
    $power = $voltage * $current /1000;
    
    return $power;
}

Function currentRateCal($currentRate){
    $rate = $currentRate/100;
    return $rate;
}

function displayRatePerHour($power, $rate)
{
    // Display the table for per hour rate
    echo '<div class="table-responsive">';
    echo '<table class="table table-striped table-bordered mt-3">';
    echo '<thead class="thead-dark">';
    echo '<tr>';
    echo '<th scope="col">Hour</th>';
    echo '<th scope="col">Energy (kWh)</th>';
    echo '<th scope="col">Total (RM)</th>';
    echo '</tr>';
    echo '</thead>';
    echo '<tbody>';

    // Display rate per hour
    for ($hour = 1; $hour <= 24; $hour++) {
        $hourlyEnergy = $power * $hour;
        $totalChargeHour = ($hourlyEnergy * $rate);

        echo '<tr>';
        echo '<td>' . $hour . '</td>';
        echo '<td>' . number_format($hourlyEnergy, 5) . '</td>';
        echo '<td>' . number_format($totalChargeHour, 2) . '</td>';
        echo '</tr>';
    }

    echo '</tbody>';
    echo '</table>';
    echo '</div>';
    echo '</div>';
}
    
