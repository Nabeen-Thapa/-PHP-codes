<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>php datatype</title>
</head>
<body>
    <h1>playing with php datatyep</h1>
    <?php
        $int = 21;
        echo "you enter " .$int;
        var_dump($int);
        echo "<br>";
        $str="thsi is string";
        var_dump($str);
        echo "<br>";
        $bool = "true";
        var_dump($bool);
        echo "<br>";
        $arr = array('a','b','c','d');
        echo "<pre>";
        var_dump($arr);
        echo "<br>";
        $float =5.5;
        var_dump($float);
        echo "<br>";
        $null = null;
        var_dump($null);
        
    ?>
</body>
</html>