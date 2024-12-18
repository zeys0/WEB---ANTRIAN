<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400"></a></p>

<p align="center">
<a href="https://travis-ci.org/laravel/framework"><img src="https://travis-ci.org/laravel/framework.svg" alt="Build Status"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/dt/laravel/framework" alt="Total Downloads"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/v/laravel/framework" alt="Latest Stable Version"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/l/laravel/framework" alt="License"></a>
</p>

## CARA MENJALANKAN PROJECT
1. CLONE REPOSITORY DENGAN PERINTAH SEPERTI BERIKUT ATAU BISA JUGA MANUAL
   
   ```git clone https://github.com/zeys0/WEB_ANTRIAN.git```
   
2. MASUK KE DIRECTORY REPO YG TELAH DICLONE
   
3. JALANKAN PERINTAH BERIKUT PADA POWERSHELL / CMD (Pastikan sudah menginstall dan konfigurasi composer pada perangkat yg digunakan, jika belum install terlebih dahulu)
   
   ```composer install```
   
4. JIKA TERJADI SEPERTI BERIKUT PADA SAAT MENJALANKAN PERINTAH "composer install", buka file "php.ini" untuk mengkonfigurasi ekstensi zip, dengan melakukan hal berikut:

   (SKIP BAGIAN INI JIKA TIDAK ERROR)
   
   ![image](https://github.com/user-attachments/assets/ffa99ecb-d56d-465a-82d0-0303a16095df)
   
   - Buka File php.ini di XAMPP, biasanya berada pada directori 'C:\xampp\php'
     
     ![image](https://github.com/user-attachments/assets/3bf5cffc-198f-452c-aba7-901e24f48f3f)
     
   - Klik icon tersebut, lalu masuk ke dalam notepad
   - tekan "ctrl + h", lalu search ";extension=zip"
   - selanjutnya hapus tanda ";"
   - save
     
5. SELANJUTNYA SALIN FILE .env.example ke .env, DENGAN PERINTAH
   
   ```cp .env.example .env```
   
6. LAKUKAN GENERATE API_KEY DENGAN PERINTAH
   
   ```php artisan key:generate```

7. LAKUKAN KONFIGURASI DATABASE PADA FILE ".env" DAN SET NAME DATABASE DENGAN NAMA 'antrian'
    
   ```DB_DATABASE=antrian```

8. JALANKAN MIGRASI DENGAN PERINTAH SEBAGAI BERIKUT
    
   ```php artisan migrate```

9. JALANKAN PERINTAH SEEDING
    
    ```php artisan db:seed```

10. SETELAH ITU PROJECT SIAP DIJALANKAN DENGAN PERINTAH
    
    ```php artisan serve```



   
   
  

      
     
      
   
