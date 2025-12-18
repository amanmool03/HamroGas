🔥 Hamro Gas – E-commerce Platform

Hamro Gas is a full-stack e-commerce platform built to digitize and streamline gas cylinder distribution and ordering. The system is developed using PHP (backend) and React.js (frontend) and supports multiple user roles with secure access control, real-time order management, and scalable architecture.

This project demonstrates production-ready full-stack development, focusing on security, scalability, and user experience.

✨ Features
👥 Multi-Role Access System

Admin

Manage users, roles, inventory, and orders

Monitor system activity and analytics

Vendor

Manage gas stock and pricing

View and process incoming orders

Delivery Staff

View assigned deliveries

Update delivery status in real time

Customer

Browse products

Place and track gas orders

🛒 E-commerce Functionality

Product listing and availability management

Secure order placement and checkout

Order lifecycle tracking (Pending → Processing → Delivered)

Order history and invoice details

🔐 Authentication & Security

Role-Based Access Control (RBAC)

Secure login and authorization system

Protected APIs and routes

Server-side validation and error handling

⚙️ Backend (PHP)

RESTful API architecture

Clean and modular code structure

Database-driven operations

Optimized queries for performance

Centralized error handling

🎨 Frontend (React.js)

Component-based architecture

Responsive UI for all devices

Dynamic dashboards per role

API-driven data rendering

Clean and maintainable codebase

🛠️ Tech Stack
Backend

PHP (Laravel / Core PHP)

MySQL

REST APIs

JWT / Session Authentication

Frontend

React.js

Axios

Modern JavaScript (ES6+)

Responsive UI Design

📁 Project Structure
hamro-gas/
│
├── backend/
│   ├── app/
│   ├── routes/
│   ├── controllers/
│   ├── models/
│   └── database/
│
├── frontend/
│   ├── src/
│   ├── components/
│   ├── pages/
│   ├── services/
│   └── hooks/
│
├── README.md
└── .env.example

🚀 Getting Started
Prerequisites

PHP 8+

Composer

Node.js & npm

MySQL

Git

🔧 Backend Setup
cd backend
composer install
cp .env.example .env
php artisan key:generate
php artisan migrate
php artisan serve

🎨 Frontend Setup
cd frontend
npm install
npm run dev

📸 Screenshots

Add screenshots of:

Admin Dashboard

Order Management

Customer Ordering Page

(Screenshots make the project look much more professional.)

🎯 Key Highlights

Production-level architecture

Secure multi-role system

Scalable API design

Real-world business use case

Clean separation of frontend and backend

🔮 Future Enhancements

Online payment gateway integration

Push notifications / SMS alerts

Analytics dashboard

Mobile app version

Dockerized deployment

🤝 Contributing

Contributions are welcome!

Fork the repository

Create a feature branch

Commit your changes

Submit a pull request

📜 License

This project is licensed under the MIT License.
