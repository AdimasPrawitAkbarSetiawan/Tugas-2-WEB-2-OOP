<?php
// memanggil file koneksi.php yang berisi kelas Database
require_once ('koneksi.php');

// membuat kelas Koneksi yang mewarisi dari kelas Database
class Koneksi extends Database {

    // membuat fungsi untuk menampilkan data dari tabel 'reports'
    function tampilData(){
        // membuat query SQL untuk mengambil semua data dari tabel 'reports'
        $query = "SELECT * FROM reports";
        
        // menjalankan query dan menyimpan hasilnya didalam variabel $data
        $data = mysqli_query($this->conn, $query);

        // membuat array kosong yang berguna untuk menampung hasil data
        $hasil = [];

        // mengambil setiap baris data dari hasil query dan menyimpannya dalam array $hasil
        while($row = mysqli_fetch_array($data)){
            $hasil[] = $row;
        }
        return $hasil;
    }
}

// new untuk embuat objek baru dari kelas Koneksi
$tampil = new Koneksi();
// memanggil fungsi tampilData() untuk mendapatkan data dari tabel 'reports'
$data = $tampil->tampilData();

?>
<!DOCTYPE html>
<html lang="en">

<style>
/* style css untuk nyesuaiin table */
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
  <li><a class="active" href="reports.php">reports</a></li>
  <li><a href="student.php">student</a></li>
  <li style="float:right"><a class="active">TUGAS-2 PRAKTIKUM WEB</a></li>
</ul>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tampil Data Reports</title>
</head>
<body>
<!--membuat tabel pada html-->
<table border="1">
    <tr>
        <th>No</th>
        <th>Id Report</th>
        <th>Id Warnings</th>
        <th>Id Gpas</th>
        <th>Id Guidance</th>
        <th>Id Achievments</th>
        <th>Id Scholarship</th>
        <th>Id Student Withdrawals</th>
        <th>Id Tuition Arreas</th>
        <th>Reports Date</th>
        <th>Status</th>
        <th>Has Acc Academic Advisor</th>
        <th>Has Acc Head Of program</th>
    </tr>
    <?php 
    // variabel $no berfungsi untuk nomor urut di tabel
    $no = 1;

    foreach($data as $row){
        ?>
        <tr>
            <!-- echo untuk menampilkan data di setiap kolom tabel -->
            <td><?php echo $no++; ?></td>
            <td><?php echo $row['id_report']; ?></td>
            <td><?php echo $row['id_warnings']; ?></td>
            <td><?php echo $row['id_gpas']; ?></td>
            <td><?php echo $row['id_guidance']; ?></td>
            <td><?php echo $row['id_achievements']; ?></td>
            <td><?php echo $row['id_sholarship']; ?></td>
            <td><?php echo $row['id_student_withdrawals']; ?></td>
            <td><?php echo $row['id_tuition_arrears']; ?></td>
            <td><?php echo $row['report_date']; ?></td>
            <td><?php echo $row['status']; ?></td>
            <td><?php echo $row['has_acc_academic_advisor']; ?></td>
            <td><?php echo $row['has_acc_head_of_program']; ?></td>
        </tr>
        <?php 
    }
    ?>
</table>
</body>
</html>
