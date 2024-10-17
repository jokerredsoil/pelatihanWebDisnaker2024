<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Belajar Pengulangan</title>
</head>
<body>
    <h1>belajar PHP </h1>
    <!-- <?php 
        for($i = 0 ; $i < 5; $i++){
            echo "<p>ini pengulangan for ke $i</p> \n";
            }
    ?>
    <br>
    <?php
        $a = 0;
        while ($a <= 10) {
            echo '<p>ini pengulangan while ke {$a} </p> \n';
            $a++;
        }

    ?>
<br>
<?php
        $b = 0;
        do{
            echo "<p>ini pengulangan do while ke $b </p> \n";
            $b++;
        }
        while ($b <= 10) ;

    ?> -->

    <table border="1">
       <?php for ($row = 1; $row <=3 ; $row++):?>
        <tr>
            <?php for($col = 1; $col <=3 ;$col++):?>
                <td><?= $row ?>.<?= $col ?></td>

            <?php endfor; ?>
        </tr>
        
        <?php endfor; ?>


    </table>


</body>
</html>