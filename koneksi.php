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
