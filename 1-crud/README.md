## Day 1: CRUD

Aplikasi data gitar CRUD sederhana. Aplikasi ini dikembangkan dengan HTMX,
Alpine, dan SQLite.

## Pengembangan

Set up database SQLite dapat dilihat di [dokumentasi resmi
Laravel](https://laravel.com/docs/11.x/database#sqlite-configuration).

Setelah set up SQLite, perintah berikut akan membuat tabel gitar dan juga
membuat data gitar awal. 
```sh
php artisan migrate --seed 
```

Setelah itu, jalankan

```sh
php artisan serve 
```

dan buka `localhost:8000` untuk melihat aplikasinya.
