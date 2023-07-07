Cara Instalasi Laravel
1. Pertama-tama, kita perlu membuat file .env berdasarkan dari file env.example, caranya jalankan perintah:
   copy .env.example .env
2. Berikutnya, kita instal package-package yang diinstal dalam composer di mana package tersebut akan disimpan dalam folder vendor. Jalankan perintah berikut di dalam command prompt atau terminal:
    composer install
3. Setelah berhasil membuat file .env, berikutnya jalankan perintah berikut:
   php artisan key:generate
4. Kemudian, jika aplikasi Laravel tersebut memiliki database, buatlah nama database baru. Lalu sesuaikan nama database, username, dan password database di file .env.
   php artisan migrate
5. Terakhir, untuk membukanya di web browser, jalankan perintah:
   php artisan serve
6. Masukkan url berikut :
   http://localhost:8000/
