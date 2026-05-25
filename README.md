# ⚡ Power Supply Feedback Management System

A full-stack web application developed to collect, manage, and analyze customer feedback related to electricity and power supply services. The system helps users submit complaints and feedback efficiently while enabling administrators to monitor responses and improve service quality through a centralized dashboard.

🌐 **Live Demo:** https://power-supply-feedback-management-system.onrender.com

---

# 🚀 Features

- ✅ User Authentication & Secure Login
- ✅ Feedback & Complaint Submission System
- ✅ Admin Dashboard for Feedback Monitoring
- ✅ Responsive User Interface
- ✅ Real-Time Data Handling
- ✅ Database Integration
- ✅ Role-Based Access Control
- ✅ Modern UI using Tailwind CSS & Blade

---

# 🛠️ Tech Stack

### Frontend
- HTML5
- CSS3
- Tailwind CSS
- Blade Template Engine

### Backend
- PHP
- Laravel Framework

### Database
- MongoDB
- SQL

### Deployment & Tools
- Docker
- Render

---

# 📂 Project Structure

```bash
Power_Supply_Feedback_Management_System/
│
├── app/                # Application Logic
├── bootstrap/          # Framework Bootstrap Files
├── config/             # Configuration Files
├── database/           # Database Migrations & Seeders
├── public/             # Public Assets
├── resources/          # Blade Views & Frontend Resources
├── routes/             # Web Routes
├── storage/            # Application Storage
├── tests/              # Testing Files
└── .dockerignore
```

---

# ⚙️ Installation & Setup

## 1️⃣ Clone the Repository

```bash
git clone https://github.com/Bhupendra958/Power_Supply_Feedback_Management_System.git
```

---

## 2️⃣ Navigate to Project Folder

```bash
cd Power_Supply_Feedback_Management_System
```

---

## 3️⃣ Install Dependencies

```bash
composer install
npm install
```

---

## 4️⃣ Configure Environment

Create a `.env` file and update database credentials:

```env
APP_NAME=PowerSupplyFeedbackSystem
APP_ENV=local
APP_KEY=
APP_DEBUG=true
APP_URL=http://localhost

DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=power_supply_feedback
DB_USERNAME=root
DB_PASSWORD=
```

---

## 5️⃣ Generate Application Key

```bash
php artisan key:generate
```

---

## 6️⃣ Run Database Migration

```bash
php artisan migrate
```

---

## 7️⃣ Start Development Server

```bash
php artisan serve
```

---

# 🌐 Access Application

```bash
http://127.0.0.1:8000
```

---

# 🎯 Project Objective

The objective of this project is to digitize and simplify the process of collecting power supply feedback and complaints while providing administrators with tools to analyze and manage customer responses efficiently.

---

# 🔒 Security Features

- JWT/Session Authentication
- Protected Routes
- Secure Form Validation
- CSRF Protection
- Role-Based Authorization

---

# 📈 Future Enhancements

- 📊 Analytics Dashboard
- 📩 Email & SMS Notifications
- 📱 Mobile Responsive Enhancements
- 🧠 AI-Based Complaint Analysis
- 📍 Complaint Tracking System

---

# 👨‍💻 Author

## Bhupendra

Full-Stack Developer | B.Tech (Computer Science & Engineering) Student at LPU

Passionate about building scalable web applications and real-world software solutions.

---

# 📬 Feedback

Suggestions and contributions are welcome.  
Feel free to fork the repository or open an issue.

---

# ⭐ Support

If you like this project, consider giving it a star on GitHub!
