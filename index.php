<?php
include ("koneksi.php");
?>
<!DOCTYPE html>
<html>
<head>
	<title>Ujian Praktikum PHP</title>
	<style>
		textarea {
			width: 90%;
			height: 250px;
            font-family: monospace;
            font-size: 12px;
            padding: 10px;
            border: 1px solid #ccc;
            color: #333;
            background-color: #f8f8f8;
            line-height: 1.5;
		}
	</style>
</head>
<body>
    <h2>Soal Praktikum Pemrograman PHP</h2>
<?php
$sql = "SELECT * FROM soal ORDER BY RAND() LIMIT 1";
$result = mysqli_query($konek, $sql);
if ($result) {
    // Mendapatkan data dari hasil query
    $data = mysqli_fetch_assoc($result);
  
    // Menampilkan data
    echo $data["soal"];
  } else {
    // Menampilkan pesan error jika query gagal dijalankan
    echo "Error: " . mysqli_error($konek);
  }
  
  // Menutup koneksi
  mysqli_close($konek);
?>
<br>
<br>
	<form method="post" action="compile.php" target="compile">
    <input type="hidden" name="id_soal" id="" value="<?php echo $data['id_soal']?>">
		<textarea name="code" placeholder="Ketik code PHP di sini!" required><?php
            if(isset($_POST['code'])){
                echo $_POST['code'];
            }
            else 
            {
                echo "";
            }
            ?></textarea>
		<br>
		<button type="submit" name="submit">Run Code</button>
	</form>
    <br>
    <br>
    <iframe src="" frameborder="0" name="compile" width="90%" height="400px">
    
    </iframe>

    <p align="center">Web Tes Praktikum PHP | Dikembangkan oleh Apep Wahyudin</p>
</body>
</html>
