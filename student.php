<?php
// Memanggil file koneksi.php yang berisi kelas Database
require_once ('koneksi.php');

// Membuat kelas Koneksi yang mewarisi dari kelas Database
class Koneksi extends Database {

    // Membuat fungsi untuk menampilkan data dari tabel 'student_withdrawals'
    function tampilData(){
        // Membuat query SQL untuk mengambil semua data dari tabel 'student_withdrawals'
        $query = "SELECT * FROM student_withdrawals";
        
        // Menjalankan query dan menyimpan hasilnya dalam variabel $data
        $data = mysqli_query($this->conn, $query);

        // Membuat array kosong untuk menampung hasil data
        $hasil = [];

        // Mengambil setiap baris data dari hasil query dan menyimpannya dalam array $hasil
        while($row = mysqli_fetch_array($data)){
            $hasil[] = $row;
        }
        return $hasil;
    }
}

// new untuk membuat objek baru dari kelas Koneksi
$tampil = new Koneksi();
// Memanggil fungsi tampilData() untuk mendapatkan data dari tabel 'student_withdrawals'
$data = $tampil->tampilData();
?>

<!DOCTYPE html>
<html lang="en">

<style>
/* Style css untuk tabel */
table {
  font-family: arial, sans-serif;
  border-collapse: collapse;
  width: 100%;
}

td, th {
  border: 1px solid #dddddd;
  text-align: left;
  padding: 8px;
}

tr:nth-child(even) {
  background-color: #dddddd;
}

ul {
  list-style-type: none;
  margin: 0;
  padding: 0;
  overflow: hidden;
  background-color: #333;
}

li {
  float: left;
}

li a {
  display: block;
  color: white;
  text-align: center;
  padding: 14px 16px;
  text-decoration: none;
}

li a:hover {
  background-color: #111;
}
</style>
</head>
<body>

<ul>
  <li><a href="reports.php">reports</a></li>
  <li><a href="student.php">student</a></li>
  <li style="float:right"><a class="active">TUGAS-2 PRAKTIKUM WEB</a></li>
</ul>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tampil Data Student</title>
</head>

<body>
<table border="1">
    <tr>
        <!-- Header -->
        <th>No</th>
        <th>Id Student Withdrawals</th>
        <th>Id Student</th>
        <th>Withdrawal Type</th>
        <th>Decree Number</th>
        <th>Reason</th>
    </tr>
    <?php 
    // Variabel $no untuk nomor urut di tabel
    $no = 1;

    foreach($data as $row){
        ?>
        <tr>
            <!-- Echo untuk menampilkan data di setiap kolom tabel -->
            <td><?php echo $no++; ?></td>
            <td><?php echo $row['id_student_withdrawal']; ?></td>
            <td><?php echo $row['id_student']; ?></td>
            <td><?php echo $row['withdrawal_type']; ?></td>
            <td><?php echo $row['decree_number']; ?></td>
            <td><?php echo $row['reason']; ?></td>
        </tr>
        <?php 
    }
    ?>
</table>
</body>
</html>
