

<p align="center">
    <a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="200" alt="Laravel Logo"></a>
    <a href="https://inertiajs.com" target="_blank"><img src="https://raw.githubusercontent.com/inertiajs/inertia/master/.github/assets/inertia-logo.svg" width="100" alt="Inertia.js Logo"></a>
    <a href="https://vuejs.org" target="_blank"><img src="https://vuejs.org/images/logo.png" width="100" alt="Vue 3 Logo"></a>
    <a href="https://github.com/shadcn/shadn-vue" target="_blank"><img src="https://shadcn.dev/favicon.ico" width="100" alt="Shadn Vue Logo"></a>
</p>

<p align="center">
<strong>Inventory Management App</strong><br>
A comprehensive inventory management solution built with Laravel, Inertia, Vue 3, and Shadn Vue for efficient tracking, management, and reporting of inventory data.
</p>

---

## Table of Contents

- [Features](#features)
- [Tech Stack](#tech-stack)
- [Setup Instructions](#setup-instructions)
- [Seeding the Database](#seeding-the-database)
- [Contributing](#contributing)
- [License](#license)

---

## Features

- **Product Management:** Add, update, and remove products from inventory.
- **Inventory Tracking:** Monitor stock levels in real-time.
- **User Management:** Role-based access control for different types of users.
- **Reporting:** Generate reports on inventory, sales, and purchases.

---

## Tech Stack

This project is built using the following technologies:

- [**Laravel**](https://laravel.com): Backend framework for powerful server-side logic and data management.
- [**Inertia.js**](https://inertiajs.com): For creating modern, single-page applications without an API.
- [**Vue 3**](https://vuejs.org): JavaScript framework for building dynamic, interactive user interfaces.
- [**Shadn Vue**](https://github.com/shadcn/shadn-vue): UI components for Vue 3 to deliver a consistent and aesthetic design.

---

## Setup Instructions

Follow these steps to set up the project locally:

1. **Clone the repository:**
   ```bash
   git clone https://github.com/username/inventory-management-app.git
   cd inventory-management-app
   ```

2. **Install dependencies:**
   ```bash
   composer install
   npm install
   ```

3. **Set up environment variables:**
   Copy `.env.example` to `.env` and update the database configuration as needed.
   ```bash
   cp .env.example .env
   ```

4. **Generate application key:**
   ```bash
   php artisan key:generate
   ```

5. **Run migrations:**
   ```bash
   php artisan migrate
   ```

6. **Run the application:**
   ```bash
   php artisan serve
   npm run dev
   ```

7. **Access the app:** Open `http://localhost:8000` in your browser.

---

## Seeding the Database

The app includes a seeder for adding initial data to the database. To seed the database, run the following command:

```bash
php artisan db:seed
```

---

## Contributing

We welcome contributions to the Inventory Management App! If you'd like to contribute, please follow the [contribution guidelines](https://laravel.com/docs/contributions).

---

## License

The Inventory Management App is open-sourced software licensed under the [MIT license](https://opensource.org/licenses/MIT).
