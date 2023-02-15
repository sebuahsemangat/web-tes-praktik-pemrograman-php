<style>
    .hasil {
        width:90%;
        border: solid 1px grey;
        padding: 10px;
        background-color: #abfcff;
    }
</style>
<?php
    if (!isset($_POST['code']))
    {
        echo "";
    }
    else {
        echo "<h3>Hasil</h3>";
		// retrieve the PHP code from the form input
		echo "<div class='hasil'>";
        $code = $_POST['code'];
        $replaceOpener = str_replace("<?php", "", $code);
        $replaceCloser = str_replace("?>", "", $replaceOpener);

		// output the code in a pre tag
		//echo "<pre>" . htmlspecialchars($code) . "</pre>";

		// use the eval() function to execute the code
		// this function evaluates a string as PHP code
		eval($replaceCloser);
        echo "</div>";
    
	?>
    <hr>
    <h4>Apakah jawaban sudah benar? Silahkan masukkan nama dan kelas kemudian klik Kirim Jawaban</h4>
    <form action="simpan.php" method="post">
        <table>
            <tr>
                <td>Nama</td>
                <td>:</td>
                <td><input type="text" name="nama" id="" required></td>
            </tr>
            <tr>
                <td>Kelas</td>
                <td>:</td>
                <td>
                    <select name="kelas" id="">
                        <option value="x7">X-RPL-7</option>
                        <option value="x8">X-RPL-8</option>
                        <option value="acp">X-ACP</option>
                    </select>
                </td>
            </tr>
            <tr>
                <td></td>
                <td></td>
                <td><button type="submit">Kirim Jawaban</button></td>
            </tr>
        </table>
        <textarea name="hasil" id="" style="display:none"><?php echo $code;?></textarea>
        <input type="hidden" name="id_soal" id="" value="<?php echo $_POST['id_soal']?>">
        
    </form>
    <?php
    }
    ?>