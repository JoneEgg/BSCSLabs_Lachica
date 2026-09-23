<?php 
include("functions.php");

function calculate(float $num1, float $num2){
    switch($_POST["op"]){
        case 'sum':
            echo "Answer: ", (float) $num1 + $num2;
            break;
        case 'diff':
            echo "Answer: ", (float) $num1 - $num2;
            break;
        case 'prod':
            echo "Answer: ", (float) $num1 * $num2;
            break;
        case 'quot':
            echo "Answer: ", (float) $num1/$num2;
            break;
    }
}

if($_SERVER['REQUEST_METHOD'] == 'POST'){
    calculate((float) $_POST['num1'], (float) $_POST['num2']);
    
}
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>

    <form method="POST">
        <br><br>
        <input type="text" name="num1">
        <br><br>
        <input type="text" name="num2">
        <br><br>
        <select name="op" id="">
            <option value="sum">Add</option>
            <option value="diff">Subtract</option>
            <option value="prod">Multiply</option>
            <option value="quot">Divide</option>
        </select>
        <button type="submit">Calculate</button>
    </form>
    
</body>
</html>