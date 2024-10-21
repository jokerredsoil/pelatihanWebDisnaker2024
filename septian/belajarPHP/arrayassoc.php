<?php
    $arr1 = [
        
        ["senin", "selasa", "rabu"],
        ["jan","feb","mar"],
        ["2020","2021","2022"]
    ];
    foreach($arr1 as $data){
        echo $data[0] ;
        echo $data[1] ;
        echo $data[2] ;
    }

    $data_person = [
        [
            "nama" => "septian n",
            "kota" => "bandung"
        ],
        [
            "nama" => "septian n",
            "kota" => "bandung"
        ],
        [
            "nama" => "septian n",
            "kota" => "bandung"
        ]
        ];

    foreach($data_person as $data){
        echo $data["nama"];
        echo $data["kota"];
     
    
    }
?>