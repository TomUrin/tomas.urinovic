<!DOCTYPE html> 
<html lang="en"> 
    <head>
        <title>Tax Calculator</title>
        <meta charset="utf-8"> 
        <meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=yes">
        <link rel="stylesheet" href="css/style.css">
    </head>
<body>

    <?php
        if (isset($_POST['salary']) && isset($_POST['taxExemption']) && isset($_POST['additionalIncome'])) {
            $salary = (float) $_POST['salary'];
            $taxExemption = (float) $_POST['taxExemption'];
            $additionalIncome = (float) $_POST['additionalIncome'];
        } else {
            $salary = 0;
            $taxExemption = 0;
            $additionalIncome = 0;
        }
        $totalIncome = $salary + $additionalIncome - $taxExemption;
        if( $totalIncome < 30000) {
            $tax = $totalIncome * 0.20;
        } else {
            $tax = $totalIncome * 0.25;
        }
    ?>

    <div class="content">
        <h1>Tax Calculator</h1>
        <form action="" method="POST" id="myForm">
            <label for="monetary">Yearly income</label>
            <br>
            <input type="number" id="salary" name="salary" 
             required pattern="[0-9]" step="0.01" min="0">
            <br>
            <label for="monetary">Tax exemption (if any)</label>
            <br>
            <input type="number" id="taxExemption" name="taxExemption" 
             required pattern="[0-9]" step="0.01" min="0">
            <br>
            <label for="monetary">Additional income</label>
            <br>
            <input type="number" id="additionalIncome" name="additionalIncome" 
             required pattern="[0-9]" step="0.01" min="0">
            <br>
            <input type="Submit" value="Calculate" id="calculateBtn">
        </form>
        <div id="summary">
            <p>Total income: 
                <span id="totalIncome">
                    <?=$totalIncome ?>
                </span>
            </p>
            <p>Tax: 
                <span id="tax">
                    <?=$tax ?> 
                </span>
            </p>
        </div>
    </div>
</body>
</html>