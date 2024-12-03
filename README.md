# Lab9Web.

# Buat file baru dengan nama header.php

```html
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8">
    <title>Contoh Modularisasi</title>
    <link href="style.css" rel="stylesheet" type="text/stylesheet"
    media="screen" />
  </head>
  <body>
    <div class="container">
    <header>
      <h1>Modularisasi Menggunakan Require</h1>
    </header>
    <nav>
      <a href="home.php">Home</a>
        <a href="about.php">Tentang</a>
        <a href="kontak.php">Kontak</a>
      </nav>
    </div>
  </body>
</html>
```
Output :

<img width="401" alt="Cuplikan layar 2024-12-03 212656" src="https://github.com/user-attachments/assets/ce582eb0-02af-4b16-a640-998ea44bce0c">

# Buat file baru dengan nama footer.php

```html
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <div>
        <footer>
            <p>&copy; 2024, Informatika, Universitas Pelita Bangsa</p>
        </footer>
    </div>
</body>
</html>
```
Output :

<img width="249" alt="Cuplikan layar 2024-12-03 213026" src="https://github.com/user-attachments/assets/01c7e767-e7b6-4bb0-a85d-118da0a89bfb">

# Buat file baru dengan nama home.php

```html
<?php require('header.php'); ?>
<div class="content">
    <h2>Ini Halaman Home</h2>
    <p>Ini adalah bagian content dari halaman.</p>
</div>
<?php require('footer.php'); ?>
```
Output :

<img width="429" alt="Cuplikan layar 2024-12-03 213350" src="https://github.com/user-attachments/assets/9a04a52b-8f8d-41ca-84ac-40d65caa2b42">

# Buat file baru dengan nama about.php
```html
<?php require('header.php'); ?>
    <div class="content">
        <h2>Ini Halaman About</h2>
        <p>Ini adalah bagian content dari halaman.</p>
    </div>
<?php require('footer.php'); ?>
```
Output :

<img width="419" alt="Cuplikan layar 2024-12-03 213702" src="https://github.com/user-attachments/assets/d173b157-af7c-42c6-a729-392ab5edf9ce">

# Pertanyaan dan Tugas
Implementasikan konsep modularisasi pada kode program praktikum 8 tentang database,
sehingga setiap halamannya memiliki template tampilan yang sama.

- Pindahkan semua file dari Praktikum 8 (misalnya, index.php, tambah.php, dll.) ke folder ini.

<img width="118" alt="Cuplikan layar 2024-12-03 214035" src="https://github.com/user-attachments/assets/4cf02d51-36c6-4d42-aab4-5cae5d7c73a3">

- Edit file index.php menjadi seperti ini:
```html
<?php
include('header.php');
include('koneksi.php');

$sql = 'SELECT * FROM data_barang';
$result = mysqli_query($conn, $sql);

echo "<div class='content'>";
if (mysqli_num_rows($result) > 0) {
    echo "<table border='1'>
            <tr>
                <th>ID</th>
                <th>Kategori</th>
                <th>Nama</th>
                <th>Gambar</th>
                <th>Harga Beli</th>
                <th>Harga Jual</th>
                <th>Stok</th>
            </tr>";

    while ($row = mysqli_fetch_assoc($result)) {
        echo "<tr>
                <td>{$row['id_barang']}</td>
                <td>{$row['kategori']}</td>
                <td>{$row['nama']}</td>
                <td><img src='{$row['gambar']}' width='100'></td>
                <td>{$row['harga_beli']}</td>
                <td>{$row['harga_jual']}</td>
                <td>{$row['stok']}</td>
            </tr>";
    }
    echo "</table>";
} else {
    echo "<p>Tidak ada data.</p>";
}
echo "</div>";

include('footer.php');
?>
```
Output :

<img width="420" alt="Cuplikan layar 2024-12-03 215114" src="https://github.com/user-attachments/assets/e130a873-5c05-4c24-a0f1-91a021eafe74">

- Tambahkan include('header.php'); di bagian atas dan include('footer.php'); di tambah.php
```html
<?php
error_reporting(E_ALL);
include_once 'koneksi.php';
include('header.php');
include('footer.php');
if (isset($_POST['submit']))
{
$nama = $_POST['nama'];
$kategori = $_POST['kategori'];
$harga_jual = $_POST['harga_jual'];
$harga_beli = $_POST['harga_beli'];
$stok = $_POST['stok'];
$file_gambar = $_FILES['file_gambar'];
$gambar = null;
if ($file_gambar['error'] == 0)
    {
    $filename = str_replace(' ', '_',$file_gambar['name']);
    $destination = dirname(__FILE__) .'/gambar/' . $filename;
    if(move_uploaded_file($file_gambar['tmp_name'], $destination))
        {
        $gambar = 'gambar/' . $filename;;
        }
    }
    $sql = 'INSERT INTO data_barang (nama, kategori,harga_jual, harga_beli,
stok, gambar) ';
    $sql .= "VALUE ('{$nama}', '{$kategori}','{$harga_jual}',
'{$harga_beli}', '{$stok}', '{$gambar}')";
    $result = mysqli_query($conn, $sql);
    header('location: index.php');
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link href="style.css" rel="stylesheet" type="text/css" />
    <title>Tambah Barang</title>
</head>
<body>
    <div class="container">
        <h1>Tambah Barang</h1>
        <div class="main">
            <form method="post" action="tambah.php"
            enctype="multipart/form-data">
                <div class="input">
                    <label>Nama Barang</label>
                <input type="text" name="nama" />
                </div>
                <div class="input">
                    <label>Kategori</label>
                    <select name="kategori">
                        <option value="Komputer">Komputer</option>
                        <option value="Elektronik">Elektronik</option>
                        <option value="Hand Phone">Hand Phone</option>
                    </select>
                </div>
                <div class="input">
                    <label>Harga Jual</label>
                    <input type="text" name="harga_jual" />
                </div>
                <div class="input">
                    <label>Harga Beli</label>
                    <input type="text" name="harga_beli" />
                </div>
                <div class="input">
                    <label>Stok</label>
                    <input type="text" name="stok" />
                </div>
                <div class="input">
                    <label>File Gambar</label>
                    <input type="file" name="file_gambar" />
                </div>
                <div class="submit">
                    <input type="submit" name="submit" value="Simpan" />
                </div>
            </form>
        </div>
    </div>
</body>
</html>
```
Output :

<img width="401" alt="Cuplikan layar 2024-12-03 215302" src="https://github.com/user-attachments/assets/c52498c0-a94a-4ee8-b78d-6a3d738d3397">
