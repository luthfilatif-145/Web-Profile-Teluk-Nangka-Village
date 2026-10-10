# Web Profile - Teluk Nangka Village

A village profile website for Desa Teluk Nangka, complete with an admin dashboard for managing the content shown on the public site. Built with PHP, MySQL, and JavaScript.

## Features

**Public Website**
- Home page (`home.php`)
- Village head profile (`profilkepdes.php`)
- Organizational structure (`struktur.php`)
- Population data (`datapenduduk.php`)
- Regional data (`datawilayah.php`)
- Village budget / APBDes (`apbdesa.php`)
- Photo gallery (`galeri.php`)
- Information page (`informasi.php`)
- Village map (`denah.php`)

**Admin Dashboard**
- Secure admin login and logout
- Dashboard overview
- Manage home page content
- Manage village head profile
- Manage organizational structure
- Manage population data
- Manage regional data
- Manage APBDes (village budget)
- Manage gallery and upload images
- Manage static pages

## Tech Stack

- PHP
- MySQL
- JavaScript
- [HTML / CSS / SCSS / Bootstrap]
- [XAMPP for local development]

## Project Structure

```
├── admin/        # Admin dashboard (CRUD pages)
├── css/ scss/    # Stylesheets
├── js/           # Scripts
├── lib/ plugins/ # Third-party libraries
├── gambar/ img/  # Images
├── mail/         # Contact form handler
├── db_config.php # Database configuration
└── db_teluknangka.sql  # Database schema
```

## Installation

1. Clone this repository
```
   git clone https://github.com/luthfilatif-145/Web-Profile-Teluk-Nangka-Village.git
```
2. Move the project folder into your `htdocs` directory (XAMPP)
3. Create a MySQL database named `teluknangka` [adjust to your database name]
4. Import `db_teluknangka.sql` into that database
5. Edit `db_config.php` with your own database credentials
6. Start Apache and MySQL, then open `http://localhost/Web-Profile-Teluk-Nangka-Village`
7. Admin panel: `http://localhost/Web-Profile-Teluk-Nangka-Village/admin`


## Author

Luthfi Latif - [GitHub](https://github.com/luthfilatif-145)
