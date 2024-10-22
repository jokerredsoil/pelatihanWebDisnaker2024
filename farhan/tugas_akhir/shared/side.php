<?php 
    require_once "koneksi.php";
?>
<div class="col-sm-12 col-md-3">
    <div class="card">
        <div class="card-body">
            <div class="d-flex flex-column align-items-center">
                <img src="https://static-00.iconduck.com/assets.00/user-icon-2048x2048-ihoxz4vq.png" class="mb-3 w-25" alt="Avatar" />
                <h5><?=showuser()['username']?></h5>
            </div>
        </div>
    </div>
    <div class="card mt-3">
        <div class="card-body">
            <div class="table-responsive">
                <table class="table">
                    <tr>
                        <th>Nama</th>
                        <td>:</td>
                        <td><?=showuser()['name']?></td>
                    </tr>
                    <tr>
                        <th>Email</th>
                        <td>:</td>
                        <td><?=showuser()['email']?></td>
                    </tr>
                    <tr>
                        <th>Role</th>
                        <td>:</td>
                        <td><?=showuser()['role']?></td>
                    </tr>
                </table>
            </div>
            <div class="d-flex justify-content-center">
                <a class="mt-2 btn btn-danger w-100" href="./aksi/auth/logout.php">Logout</a>
            </div>
        </div>
    </div>
</div>