*PHP VERSION : PHP 8*

*DB VERSION : MySQL Ver 15.1 Distrib 10.5.10-MariaDB*

*Framework : Laravel 8.4*

---

Cara Instalasi : 

1. Ketikkan perintah `composer install` untuk menginstall seluruh dependency
2. Ketikkan `cp env.example .env`  di command lalu edit .env, pada bagian nama database sesuaikan dengan nama db lokal
3. Lalu ketikkan `php artisan migrate --seed`
4. Jika sudah ketikkan `php artisan key:generate` di command
5. Lalu jalankan projek dengan `php artisan serve` di command

Login Superadmin :
/auth/super4dmin/login

Login Admin :
/auth/admin/login

Login Stakeholder :
/auth/stakeholder/login

```
=====================
AKUN SUPERADMIN :
Username : super
Password : 123
=====================
```

___

Tugas Superadmin :
Dapat mengelola user, admin, stakeholder,dan kendaraan

Tugas Admin :
Membuat sebuah permohonan kendaraan dan cetak laporan

Tugas Stakeholder :
Persetujuan permohonan kendaraan
___
