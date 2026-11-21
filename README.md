# Lab 11: User Validation Web Application (PHP)

**Student Name:** Luvkush Sharma  
**USN:** 24BTRSN022  

A zero-configuration user authentication web application built using pure PHP. The user submits a login name and password to the server, which validates them against records already available in the database.

- **Match:** Successful login page is returned.
- **Mismatch:** A failure message is shown to the user.
- **Zero-Config:** No MySQL, MariaDB, Apache, or phpMyAdmin configuration needed. Runs right away using PHP's built-in server.

---

## 🚀 How to Run (1 Simple Command)

Open your terminal inside this folder and run:

```bash
php -S localhost:8000
```

Then open your browser and go to:
👉 **[http://localhost:8000](http://localhost:8000)**

---

## 🔑 Available Credentials in the Database

The database records are pre-configured in `db.php`:

| Login Name (Username) | Password | Full Name | Role |
| :--- | :--- | :--- | :--- |
| `luvkush` | `password123` | Luvkush Sharma | Student |
| `24btrsn022` | `password123` | Luvkush Sharma | Student (24BTRSN022) |
| `student` | `college2026` | Rahul Sharma | Student |
| `admin` | `admin123` | System Administrator | Administrator |
| `prof_smith` | `teach2026` | Prof. Alan Smith | Faculty |

---

## 📂 Project Structure

- **`db.php`**: The mock database containing existing user accounts and the authentication function.
- **`index.php`**: Main user login interface with live validation, failure alerts, and session redirection.
- **`welcome.php`**: The successful login page displaying user information, active session status, and a logout button.
- **`logout.php`**: Handles secure session termination and redirects back to login.
- **`login.html`** & **`login.php`**: Dedicated standalone HTML-form-to-PHP-script version for standard university lab formats.
- **`style.css`**: Clean, modern, offline-ready CSS stylesheet.
