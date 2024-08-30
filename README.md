# TUGAS 2 PRAKTIKUM WEB

## Apa itu OOP?
Pemrograman berorientasi objek merupakan paradigma pemrograman berdasarkan konsep "objek", yang dapat berisi data, dalam bentuk field atau dikenal juga sebagai atribut; serta kode, dalam bentuk fungsi/prosedur atau dikenal juga sebagai method.

## Apa itu DATABASE?
Database adalah basis data berupa kumpulan data yang disimpan sedemikian rupa secara sistematis berdasarkan ketentuan khusus yang saling terhubung sehingga mudah dalam diakses, dikelola, diolah dan dimanipulasi menggunakan perangkat lunak komputer untuk menghasilkan informasi.

## Apa itu ENCAPSULATION
Encapsulation adalah salah satu prinsip dasar dalam Object Oriented Programming (OOP) yang bertujuan untuk membungkus data dalam satu unit. Tujuan utama encapsulation adalah untuk menyembunyikan detail internal implementasi objek dari dunia luar dan menyediakan interface yang dapat berinteraksi dengan objek tersebut.

## Apa itu INHERITANCE?
Inheritance, atau pewarisan, adalah salah satu konsep penting dalam pemrograman berorientasi objek (OOP). Ini adalah proses di mana sebuah kelas baru (subclass) dapat mewarisi sifat, metode, dan atribut dari kelas yang sudah ada (superclass).

## Apa itu POLYMORPHISM
Prinsip polymorphism pada OOP adalah konsep di mana suatu objek berbeda-beda dapat di akses melalui satu interface. Sebuah objek polymorphic dapat beradaptasi dengan metode apapun yang di implementasikan pada objek tersebut, dan setiap class memiliki interpretasinya tersendiri terhadap interfacenya.

## Apa itu ABSTRACTION
Abstraksi merupakan salah satu konsep inti dari Pemrograman Berorientasi Objek . Abstraksi mendefinisikan sebuah model untuk membuat komponen aplikasi. Implementasi abstraksi bergantung pada fitur dan proses khusus bahasa pemrograman.

## Syntax koneksi
```php
<?php
// membuat sebuah kelas bernama Database
class Database {
    // mendeklarasikan properti yang bersifat private untuk menyimpan informasi koneksi ke database
    // private artinya tidak bisa di akses dari luar, jadi hanya bisa dijalankan oleh class itu sendiri
    private $host = "localhost"; // nama host dalam database
    private $user = "root"; // username untuk mengakses database
    private $pass = ""; // password untuk mengakses database, karna password nya tidak ada maka tidak di isi apapun
    private $database = "siwaliweb2"; // Nama database yang akan digunakan
    
    // properti public yang akan digunakan untuk menyimpan koneksi database
     // public artinya atribut ini dapat diakses dari mana saja karna bersifat public, dan disini digunakan untuk koneksi 
    public $conn;

    // constructor adalah fungsi yang akan otomatis dipanggil saat objek dari kelas dibuat
    public function __construct() {

        // membuat koneksi ke database dengan menggunakan properti yang dideklarasikan sebelumnya
        $this->conn = new mysqli($this->host, $this->user, $this->pass, $this->database);

        // mengecek apakah koneksi berhasil, jika gagal maka program akan dihentikan 
        if ($this->conn->connect_error) {
            die("Koneksi gagal: " . $this->conn->connect_error);
        }
    }   
}
?>
```


## Syntax reports
```php
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
```
## Syntax student

```php
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
```
