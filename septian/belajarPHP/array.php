<?php
$arr1  = [1,2,3,4,5,6,7];
print(count($arr1
));

for ($i= 0 ; $i < count($arr1);$i++ ){
    echo "$arr1[$i]";
}

foreach ($arr1 as $data) {
    echo "$data" ;
}

?>