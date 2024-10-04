<?php 
    $halaman = "form_pendaftaran";
    include('layout/header.php')
?>
    <main>
        
        <section class="formpendaftaran">
        <h1>form registrasi lamaran kerja</h1>
        <fieldset>
            <legend>formulir</legend>
       
        <form action="dataInput.html">
            <div>
                <label for="nama">Nama Calon Siswa</label> 
                
                <input type="text" id="nama" placeholder="masukan nama lengkap">
            </div>
            <br>
            <div>
                <label for="ttl">Tempat Tanggal Lahir</label> 
                <br>
                <input type="date" id="emdail" placeholder="masukan E-mail" >
            </div>
            <br>
            <div>
                <label for="notelp">nomor telp</label> 
                <br>
                <input type="number" id="notelp" contoh: 08131234567">
            </div>
            <br>
            <div>
                <label for="">Jenis Kelamin</label>
                <br>
                <input type="radio" name="jeniskelamin" value="Pria" id="Pria" checked /><label for="Pria">Pria</label>
                <br>
                <input type="radio" name="jeniskelamin" value="Wanita" id="Wanita"/><label for="Wanita">Wanita</label>
            </div>
            <br>
            <div>
                <label for="">Hobi </label> <br>
                <label for="terbang">
                    <input type="checkbox" name="terbang" value="terbang" id="terbang" checked> terbang
                </label>
                <label for="makan">
                    <input type="checkbox" name="makan" value="makan" id="makan"> makan
                </label>
            </div>
            <br>
            <div></div>
                <label for="">Tingkat Pendidikan</label>
                <select name="tingkatpendidikan" id="">
                    <option value="sd">sd</option>
                    <option value="smp">smp</option>
                    <option value="sma">sma</option>
                    <option value="kuliah">kuliah</option>
                </select>
            </div>

        </form> 
        <div>
            
        </div>
  
    </section>
    </main>
<?php 
    include('layout/footer.php')
?>