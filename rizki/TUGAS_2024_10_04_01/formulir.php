<?php
    $halaman="Formulir Pendaftaran";
    include("layout/header.php");
?>
<main>
    <section align="center">
        <h1>Form Pendaftaran</h1>
    </section>
    <section align="center">
        <fieldset>
            <legend align="center">Formulir Pendaftaran Siswa</legend>
            <form action="#">
                <table align="center">
                    <tr>
                        <th align="left">
                            <label for="nama">Nama Calon Siswa</label>
                        </th>
                        <td>:</td>
                        <td>
                            <input type="text" id="nama">
                        </td>
                    </tr>
                    <tr>
                        <th align="left">
                            <label for="tanggal">Tempat Tanggal Lahir</label>
                        </th>
                        <td>:</td>
                        <td align="left">
                            <input type="date" id="tanggal">
                        </td>
                    </tr>
                    <tr>
                        <th align="left">
                            <label for="agama">Agama</label>
                        </th>
                        <td>:</td>
                        <td align="left">
                            <select id="agama">
                                <option>Islam</option>
                                <option>Katolik</option>
                                <option>Protestan</option>
                                <option>Konghuchu</option>
                                <option>Buddha</option>
                                <option>Hindu</option>
                            </select>
                        </td>
                    </tr>
                    <tr>
                        <th align="left">Alamat</th>
                        <td>:</td>
                        <td align="left"><input type="text" name="" id=""></td>
                    </tr>
                    <tr>
                        <th align="left">No.Telp/Hp</th>
                        <td>:</td>
                        <td align="left"><input type="text" name="" id=""></td>
                    </tr>
                    <tr>
                        <th align="left">Jenis Kelamin</th>
                        <td>:</td>
                        <td align="left"><input type="text" name="" id=""></td>
                    </tr>
                    <tr>
                        <th align="left">Estrakulikuler</th>
                        <td>:</td>
                        <td align="left"><input type="text" name="" id=""></td>
                    </tr>
                    <tr>
                        <th align="left">Pas Photo</th>
                        <td>:</td>
                        <td align="left"><input type="text" name="" id=""></td>
                    </tr>
                    <tr>
                        <th colspan="3" align="center">
                            <button type="button">Kirim</button>
                        </th>
                    </tr>
                </table>
            </form>
        </fieldset>
    </section>
</main>
<?php
    include("layout/footer.php");
?>