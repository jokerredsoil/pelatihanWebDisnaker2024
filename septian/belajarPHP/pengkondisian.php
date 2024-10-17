<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>conditional statement</title>
</head>
<body>
    <?php
    $umur = 20;

    if ($umur < 30) {
        echo "umur kurang dari 30";
    }elseif ($umur == 20) {
        echo "umur nya 20 tahun";
    }else {
        echo "umur lebih dari 30";
    }

    // ternary
    // $result = (condition) ? value if true : value if false
    echo ($umur);

    switch ($umur) {
        case "20":
           echo "code";
            break;
        
        default:
            # code...
            break;
    }


    ?>

    
</body>
</html>