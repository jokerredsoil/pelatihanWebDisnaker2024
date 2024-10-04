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
                <label for="nama">Nama Calon Siswa : </label> 
                
                <input type="text" id="nama" placeholder="masukan nama lengkap">
            </div>
            <br>
            <div>
                <label for="date">Tempat Tanggal Lahir : </label> 
                
                <input type="date" id="date" >
            </div>
            <br>
            <div></div>
                <label for="">Agama</label>
                <select name="tingkatpendidikan" id="">
                    <option value="islam">Islam</option>
                    <option value="kristenprotestan">kristen protestan</option>
                    <option value="Kristen Katolik">Kristen Katolik</option>
                    <option value="hindu">Hindu</option>
                    <option value="budha">Budha</option>
                </select>
            </div>
            <br>
            <div>
                <label for="alamat">alamat : </label>
               <textarea name="alamat" id="alamat"></textarea>
            </div>
            <br>
            <div>
                <label for="notelp">nomor telp</label> 
     
                <input type="number" id="notelp" placeholder=" 08131234567">
            </div>
            <br>
            <div>
                <label for="">Jenis Kelamin :</label>
                <input type="radio" name="jeniskelamin" value="Pria" id="Pria" checked /><label for="Pria">Pria</label>
                <input type="radio" name="jeniskelamin" value="Wanita" id="Wanita"/><label for="Wanita">Wanita</label>
            </div>
            
        
            <br>
            <div>
                <label for="">Extraculiculer : </label>
                <label for="paskibra">
                    <input type="checkbox" name="paskibra" value="paskibra" id="paskibra" checked> paskibra
                </label>
                <label for="futsal">
                    <input type="checkbox" name="futsal" value="futsal" id="futsal"> futsal
                </label>
                <label for="basket">
                    <input type="checkbox" name="basket" value="basket" id="basket"> basket
                </label>
                <label for="renang">
                    <input type="checkbox" name="renang" value="renang" id="renang"> renang
                </label>
                <label for="tari">
                    <input type="checkbox" name="tari" value="tari" id="tari"> tari
                </label>
            </div>
            <br>
            <div>
                <label for="foto">Pas Foto : </label>
                <input type="file" id="foto" name="foto">
            </div>
            <br>
            <button name="kirim" type="submit" value="kirim">kirim</button>
           

        </form>   
    </section>
    </main>
<?php 
    include('layout/footer.php')
?>