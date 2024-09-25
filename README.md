# Konsep Dari Web Yang Saya Buat
Website yang sedang Saya buat merupakan platform untuk pembuatan surat secara online, dirancang untuk mempermudah proses administrasi dan pengelolaan dokumen

# Fitur Yang Tersedia
### Halaman Awal : 
- beranda
- Layanan Warga
- register 
- Login
### Authentication :
- Register
- Login
### Multi User :
- Admin
   * dapat mengakses User Managemen
   * dapat menambahkan data warga
   * dapat menambahkan dokumen
   * dapat menerima permintaan warga
- Warga
  * datpat mengakses Beranda
  * dapat mengakses layanan warga
### yang dapat di akses oleh semua penguna
- Halamn awal
- login
- register
- logout
  
# Jika Mau Mengunakan Akun Default Untuk Pengujian 
- jalan kan seeder berikut :
```
php artisan db:seed --class=Allseeder
```
  - Admin
    * Nama : Admin User
    * Email : admin@gmail.com
    * Password : password
  - Warga
    * Nama : Warga
    * Email : Warga@gmail.com
    * Password : password
### Sebenar nya Seeder itu Menambakan Beberapa Data Default Cuma Aku mengunkan Akun Defalutnya Saja 
  
# ERD
![Untitled (2)](https://github.com/user-attachments/assets/1236117f-3543-40ad-89f7-bd1faac3cb99)

# uml
![bismilah](https://github.com/user-attachments/assets/9024752d-e443-40a6-a4e3-6c3d172f8070)

# Taruh Gambar INI di Public Storage 
janagn lupa ganti nama fotonya jadi kop.png
![kop](https://github.com/user-attachments/assets/39a0093b-bef0-4311-abf0-e5b8d6fa244c ) 

# Teknologi Yang Di Gunakan
- Laravel 11
- bootstrap 5
# 1. Prasyarat 
### Pastikan perangkat Anda telah memenuhi prasyarat berikut sebelum menginstal Repository ini:

- PHP: Versi 8.1 atau lebih baru.
- Composer: Dependency Manager untuk PHP.
- MySQL/SQLite: Untuk database.

# 2. Langkah Instalasi  

### Langkah 1: Clone Repository 
```
git clone https://github.com/putravan123/laravel-web-desa.git
```
### Langkah 2: Pindah ke Direktori Proyek 

```
cd laravel-web-desa
```
- Setelah Itu Masuk Ke dalam Visual Studio Code

```
code .
```
### Langkah 3: Instal Dependensi Backend
```
composer install
```
### Langkah 4: Copy atau Salin File Konfigurasi (.env)

##### Salin file .env.example menjadi .env untuk mengatur variabel lingkungan atau Mengunkan Code berikut:

```
cp .env.example .env
```

### Langkah 5: Atur Konfigurasi .env

```
 DB_CONNECTION=mysql
 DB_HOST=127.0.0.1
 DB_PORT=3306
 DB_DATABASE=webdesa
 DB_USERNAME=root
 DB_PASSWORD=
```

### Langkah 6: Migrasi Database

- Buat sebuah Databases Di xampp Terlebih Dahulu

```
php artisan migrate
```

### Langkah 7: Buat Strogae Untuk Menyimpan Foto Yang di buat di Crud
```
php artisan storage:link
```

### Langkah 8: Generate Application Key

- Langkah ini sangat penting untuk setiap aplikasi Laravel, karena tanpa kunci ini, beberapa fitur tidak akan berjalan sebagaimana mestinya  :

```
php artisan key:generate
```

### Langkah 9: Jalankan Server Pengembang

```
php artisan serve
```


<h1 align="center">Tugas PKL</h1>


