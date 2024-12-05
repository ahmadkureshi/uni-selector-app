# UniSelector 🎓

Find the best university for your future! Built with **Laravel 11.34**, **Blade**, and **Tailwind CSS**.

## Installation Steps

1. **Clone the Repository**
   ```bash
   git clone https://github.com/ahmadkureshi/uni-selector-app
   cd uni-selector-app
   ```

2. **Install Dependencies**
   ```bash
   composer install
   npm install
   ```

3. **Environment Setup**  
   Copy `.env.example` to `.env` and update as needed:
   ```env
   DB_CONNECTION=mysql
   DB_HOST=127.0.0.1
   DB_PORT=3306
   DB_DATABASE=your_database_name
   DB_USERNAME=your_database_username
   DB_PASSWORD=your_database_password

   MAIL_MAILER=log
   ```
   ```bash
   php artisan key:generate
   ```
   
4. **Run Migrations and Seeders**
   ```bash
   php artisan migrate --seed
   ```

5. **Run & Build Frontend**
   ```bash
   npm install   
   npm run build
   ```

6. **Serve the Application**
   ```bash
   php artisan serve
   ```

Access the app at [http://127.0.0.1:8000](http://127.0.0.1:8000).

## Additional Notes

- Use `MAIL_MAILER=log` in `.env` to test mail in the logs.
- Admin Credentials are 
- Email: admin@uniselector.com 
- Password: uniselector7 
- ( you can replace the default password on seeder class and run the command 
- php artisan migrate:refresh --seed

