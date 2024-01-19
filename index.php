<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <style>
        body {
            background-color: #f8f9fa;
        }

        .container {
            background-color: #ffffff;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            margin-top: 50px;
        }

        h1 {
            color: #343a40;
            text-align: center;
        }

        form {
            max-width: 400px;
            margin: 0 auto;
        }

        .result-card {
            cursor: pointer;
        }

        
    </style>
    
    <title>Electricity Power Calculator</title>
</head>


<body>
   
<?php

$voltage =  0;
$current =  0;
$currentRate = 0;

?>

<div class="container mt-5">
        <h1 class="mb-4">Electricity Rates Calculator</h1>

        <form method="post" action="">
            <div class="form-group">
                <label for="voltage">Voltage</label>
                <input type="number" class="form-control" id="voltage" name="voltage" step="0.01" required>
                <small class="form-text text-muted">Voltage (V)</small>
            </div>

            <div class="form-group">
                <label for="current">Current</label>
                <input type="number" class="form-control" id="current" name="current" step="0.01" required>
                <small class="form-text text-muted">Ampere (A)</small>
            </div>

            <div class="form-group">
                <label for="currentRate">Current Rate</label>
                <input type="number" class="form-control" id="currentRate" name="currentRate" step="0.01" required>
                <small class="form-text text-muted">sen/kWh</small>
            </div>

            <div class="text-center">
                <button type="submit" class="btn btn-info">Calculate</button>
            </div>
        </form>

    <?php

            if ($_SERVER["REQUEST_METHOD"] == "POST") {
                require_once 'calculation.php';
                // Getting values from the form
                $voltage = isset($_POST["voltage"]) ? floatval($_POST["voltage"]) : Null;
                $current = isset($_POST["current"]) ? floatval($_POST["current"]) : Null;
                $currentRate = isset($_POST["currentRate"]) ? floatval($_POST["currentRate"]) : Null;
            
    
            if ($voltage !== Null && $current !== Null) {
              $power = powerCalculation($voltage, $current);
              echo "<p class='mb-0'>Power: $power kw </p>";
            }

            if ($currentRate !== Null) {
              $rate = currentRateCal($currentRate);
              echo "<p class='mb-0'>Rate: RM $rate </p>";
            }

             //Call per hour rate function
                require_once 'calculation.php';
                displayRatePerHour($power, $rate);
            }
    ?>
</div>

<!-- Optional JavaScript -->
<!-- jQuery first, then Popper.js, then Bootstrap JS -->
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</body>
</html>
