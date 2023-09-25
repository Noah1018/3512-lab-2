<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8"/>  
    <title>Lab 12a</title>   
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:400,400i,700,800" rel="stylesheet">
    <link rel="stylesheet" href="lab12a-test02.css" />
</head>
<body>
<main class="container">
    <div class="grid-container">
        <?php

        // Define constants for exchange rates
        define("USD_TO_EURO_RATE", 0.87);
        define("USD_TO_POUND_RATE", 0.76);

        function usdToEuro($amount) {
            $euro = $amount * USD_TO_EURO_RATE;
            return ceil($euro);
        }

        function usdToPound($amount) {
            $pound = $amount * USD_TO_POUND_RATE;
            return ceil($pound);
        }

        function generateBox($name, $numberOfUsers) {
            switch ($name) {
                case "Starter":
                    $cost = 10;
                    $storage = 5;
                    $emails = 2;
                    break;
                case "Developer":
                    $cost = 30;
                    $storage = 15;
                    $emails = 6;
                    break;
                case "Professional":
                    $cost = 90;
                    $storage = 100;
                    $emails = 50;
                    break;
                case "Enterprise":
                    $cost = 400;
                    $storage = 500;
                    $emails = 500;
                    break;
                default:
                    return "";
            }

            $euroCost = usdToEuro($cost);
            $poundCost = usdToPound($cost);

            return "
                <div class='box'>
                    <header>{$name}</header>
                    <div style='padding: 1rem 0;'>
                        <p><span>{$numberOfUsers}</span> users</p>
                        <p><span>{$storage}</span> GB storage</p>
                        <p><span>{$emails}</span> email accounts</p>
                    </div>
                    <footer>\${$cost} • €{$euroCost} • £{$poundCost}</footer>
                </div>";
        }

        // Generate boxes dynamically
        echo generateBox("Starter", 1);
        echo generateBox("Developer", 3);
        echo generateBox("Professional", 10);
        echo generateBox("Enterprise", 50);

        ?>
    </div>
</main>   
</body>
</html>
