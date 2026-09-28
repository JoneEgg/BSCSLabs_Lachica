<?php
// echo "PROBLEM/S <br><br>";

// $string = "     th!s Is @ T3st*      ";

// echo "1) --- ", $string, "<br>";
// echo ucfirst(str_replace(["T", "!", "I", "@", "3", "*"], ["t", "i", "i", "a", "e", "."], trim($string)));
//     // 1. Trim var
//     // 2. Use arrays for search and replace, replace all uppercase letters to lowercase
//     // 3. Use ucfirst to capitalize the first word's first letter
 
// echo "<br><br>";

$test = "   JANE_DOE@ComputerScience2026!!!   ";
// echo "2) --- ", $test, "<br>";
// Instructions:
// Expected Output: jane.doe_cs2026

// PROBLEMS
// 1. Remove whitespaces
// 2. Turn uppercase letters into lowercase
// 3. Remove _ and @ and replace with . and _
// 4. Replace ComputerScience with cs
// 5. Replace !!! with nothin, 

// echo strtolower(str_replace(['_', '@', 'ComputerScience', '!!!'], ['.', '_', 'cs'], trim($test)));


echo strtolower(str_replace('!!!', '',(str_replace('ComputerScience', 'cs', (str_replace('@', '_', (str_replace('_', '.', trim($test)))))))));




















?>
