# Course Selling Website - Full Stack (PHP)

This is a **full-stack course selling platform** similar to Udemy, built using **vanilla PHP**, **MySQL**, and **Bootstrap**. It includes user registration, login, session management, course listings, admin-side course management, and a user portal to access purchased or available content.

---

## 📌 Project Overview

This platform allows administrators to upload and manage courses, while users can register, browse available courses, and view their contents. It's designed to simulate the functionality of online learning platforms like Udemy, with a focus on building everything from scratch using raw PHP.

---

## 💻 Tech Stack

- **Frontend:** HTML, CSS, Bootstrap 4  
- **Backend:** PHP (Vanilla)  
- **Database:** MySQL  
- **Server:** XAMPP / MAMP (for local setup)  
- **Tools:** PHPMyAdmin, Visual Studio Code

---

## 🚀 Features

- 🛒 Public course listing page  
- 👤 User registration and login  
- 🔐 Session-based authentication  
- 🎓 User dashboard to view enrolled courses  
- 🧑‍💼 Admin panel to create/edit/delete courses and content  
- 📁 Upload course materials and display them by category  
- 🎯 Clean UI using Bootstrap and modular layout structure

---

## 🗂️ Folder Structure (Example)

```
├── index.php
├── login.php
├── register.php
├── dashboard.php
├── admin/
│   ├── add-course.php
│   ├── manage-courses.php
│   └── dashboard.php
├── user/
│   ├── view-courses.php
│   └── course-detail.php
├── includes/
│   ├── db.php
│   ├── header.php
│   ├── footer.php
│   └── auth.php
├── uploads/
│   └── (course images, files, videos)
├── assets/
│   └── css/, js/, images/
```

---

## 🛠️ How to Run Locally

1. Clone or download this repository:
```bash
git clone https://github.com/AsadNawaz77/web-development-Project-Full-Stack.git
```

2. Move the folder to your XAMPP `htdocs` or MAMP `www` directory

3. Start **Apache** and **MySQL** via XAMPP

4. Create a MySQL database (e.g. `course_platform`) and import the SQL file (`db.sql` if provided)

5. Open your browser and go to:
```
http://localhost/web-development-Project-Full-Stack/
```

---

## 🧠 My Role

- Designed and implemented the entire full-stack architecture  
- Built user and admin portals from scratch using core PHP  
- Developed dynamic course listing and detail pages  
- Handled secure file upload, session handling, and DB queries  
- Designed UI with Bootstrap and created modular layouts  
- Structured backend code with `includes/` and `partials/`

---

## 📈 Future Improvements

- 🧾 Add course purchase functionality (PayPal/Stripe)  
- 🧠 Track course progress and completion status  
- 🔐 Add hashed passwords for security  
- 🧪 Add quizzes, ratings, and reviews  
- 📲 Convert into a React + PHP hybrid app in future  
- 🌐 Deploy live using free PHP hosting (e.g., InfinityFree or 000Webhost)

---

## 📧 Contact

- **Email:** asad786786786nawaz@gmail.com  
- **GitHub:** [AsadNawaz77](https://github.com/AsadNawaz77)  
- **LinkedIn:** [asad-nawaz-509747248](https://www.linkedin.com/in/asad-nawaz-509747248)

---