# Cara menggunakanan

- import database ke phpmyadmin jika menggunakan xammp 
- configure database kalian di /application/config/database.php

- perbaharui controller registrasi pada -> /application/controllers/Auth.php

### ubah config email

```php
$config = [
            'protocol'  => 'smtp',
            'smtp_host' => 'ssl://smtp.googlemail.com',
            'smtp_user' => '', //isi email anda disini
            'smtp_pass' => '', //isi password email anda disini
            'smtp_port' => 465,
            'mailtype'  => 'html',
            'charset'   => 'utf-8',
            'newline'   => "\r\n"
        ];
```

- aktifkan pengamananan email anda pada [google my account](https://myaccount.google.com/lesssecureapps?utm_source=google-account&utm_medium=web)

- lalu registrasi dengan email aktif untuk verifikasi saat terhubung dengan internet.
