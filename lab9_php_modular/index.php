<?php
include('header.php'); // Menyertakan file header
include('koneksi.php'); // Menyertakan koneksi ke database

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

include('footer.php'); // Menyertakan file footer
?>
