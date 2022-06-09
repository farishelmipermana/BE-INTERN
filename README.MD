*akun superadmin :*
*username : super*
*password : 123*
*DB VERSION : MySQL Ver 15.1 Distrib 10.5.10-MariaDB*
*PHP VERSION : PHP 8*
*Framework : Laravel 8.4*

---

CARA INSTALLASI:
langkah pertama, pada cmd, ketikkan `composer install` untuk menginstall seluruh dependency
langkah kedua, pada cmd, ketikkan `php artisan migrate --seed`
langkah ketiga, pada cmd, ketikkan `php artisan key:generate`
langkah terakhir untuk menjalankan app ketikkan pada cmd `php artisan serve`

---

MENJALANKAN APP:
1. pergi ke halaman `http://127.0.0.1:8000/auth/super4dmin/login`
2. login dengan username : `super`, password : `123` 
3. pilih Users
4. create user1
5. create user2
6. create user3
7. pilih Kredensial
8. pilih Admin
9. create admin dari user1
10. pilih Stakeholder
11. create stakeholder dari user2
12. pilih Kendaraan
13. create kendaraan1
14. create kendaraan2
15. Logout
16. masuk ke `http://127.0.0.1:8000/auth/admin/login`
17. login dengan user1
18. pilih Requests
19. masukkan user3
20. logout
21. make ke `http://127.0.0.1:8000/auth/stakeholder/login`
22. login menggunakan user2
23. pilih `Approvals`
24. approval Dipinjam button warna orange klik hingga menjadi `Diterima`
25. approval Digunakan button warna orange klik hingga menjadi `Diterima`

---

Tugas Superadmin :
Dapat mengelola user, admin, stakeholder,dan kendaraan

Tugas Admin :
Membuat sebuah permohonan kendaraan dan cetak laporan

Tugas Stakeholder :
Persetujuan permohonan kendaraan