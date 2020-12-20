# Elerarning with laravel

## Step instalasi bisa dilakukan dengan menggunakan perintah berikut

-   composer install
-   ubah file .env.example menjadi .env
-   ubah APP_URL di .env menjadi _http://localhost:8000_
-   nama database menjadi **db_elerning** di file **env**
-   php artisan migrate
-   php artisan db:seed

<hr
### login admin

Email : admin@gmail.com
password: 12345678

#### login guru

email : guru@gmail.com
pssword: 12345678

### siswa

email: mahmud@gmail.com
password: 12345678

### fitur admin

-   add guru mengajar (crud)
-   add siswa (crud)
-   add kelas (crud)
-   add pelajaran (crud)
-   add users (crud)

### fitur guru

-   statistik guru
-   list siswa
-   list pelajaran
-   list kelas mengajar
-   add tugas (crud)
-   nilai tugas siwa (crud)

### fitur siswa

-   statistik dasar siswa
-   list pelajaran
-   list tugas
-   kerjakan tugas
-   lihat nilai

**Note!**
anda bisa langsung mengimport file db_elerning.sql di dtatabase jika tidak ingin melakukan migration

dibuat oleh
mahmud 21 desember 2020
