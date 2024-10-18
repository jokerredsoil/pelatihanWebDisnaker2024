<?php
require 'connection.php';
$data = myquery("SELECT * FROM tb_person ");


?>


<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Bootstrap demo</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
  </head>
  <body>
    <h1>Hello, world!</h1>
    <div class="container">
        <div class="row">
            <div class="col-sm-12">
                <h3>Data RW Bajuri</h3>

                <table class="table">
                    <thead>
                    <tr>
                        <th scope="col">aksi</th>
                        <th scope="col">nama</th>
                        <th scope="col">KTP</th>
                    
                    </tr>
                    </thead>
                    <tbody>
                    <?php foreach($data as $row):?>
                    <tr>
                        
                        <td><?=$row['nama']?></td>
                        <td><?=$row['ktp']?></td>
                        
                        <td scope="row">
                            <a href="#" class="btn btn-primary">edit</a>
                            <a href="#" class="btn btn-outline-danger">delete</a>
                        </td>
                    </tr>
                    <?php endforeach; ?>
                    </tbody>
                </table>

            </div>

        </div>
        

    </div>
    

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
  </body>
</html>