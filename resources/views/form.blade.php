<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="././assets/css/form.css">
</head>
<body>
        <form method="post" action="">
            @csrf
            <div class="form">
                <div class="number">
                            <p>Enter Number 1: </p>
                            <input type="text" name="number1">
                    </div>
                    <div>
                            <p>Enter Number 2:</p>
                            <input type="text" name="number2">
                    </div>
            <div class="total">
                            <p>Total: </p>
                            <input type="text" name="total" value="<?php if(isset($sum)) echo $sum ?>">
                    </div>
                    <button class="btn" type="submit">Submit</button>
                </div>
        </form>
        
 
</body>
</html>