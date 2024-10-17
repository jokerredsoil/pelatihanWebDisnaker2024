<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>date time</title>
</head>
<body>
    <?php
        echo date("D-m-y H : i : s e");


    ?>
    <br>
    <?php
    date_default_timezone_set(date_default_timezone_get());
// Set the default locale
// setlocale(LC_TIME, 'en_US.UTF-8'); // Change to your desired locale

// Get the current time
$timestamp = time();

// Format the date and time
$formattedDate = strftime('%Y-%m-%d %H:%M:%S', $timestamp);

echo "Current date and time: " . $formattedDate ."<br/>";

echo date('Y-m-d H:i:s');

"<br/>";

date("l", time()-60*60*24*2);  
?>
</body>
</html>