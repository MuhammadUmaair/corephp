# CRM Dashboard Application

This project is a simple CRM (Customer Relationship Management) Dashboard application built with PHP, MySQL, and Bootstrap. It includes user authentication and role-based access control, allowing administrators to view total customers and recent activities, while non-admin users see a welcome message.

## Features

- User Authentication and Authorization
  - Login system using PHP sessions
  - Role-based access control
- Data Management
  - Add, view, update, and delete customer information
- Activity Tracking
  - Log and display recent activities

## Table of Contents

- [Installation](#installation)
- [Usage](#usage)
- [File Structure](#file-structure)
- [Endpoints](#endpoints)
- [Database Schema](#database-schema)
- [Security Considerations](#security-considerations)

## Installation

1. Clone the repository:

```bash
git clone https://github.com/MuhammadUmaair/corephp.git
cd crm-dashboard

2. Create a MySQL database named `crm_db`.

3. Import the SQL file to create tables:

```
CREATE DATABASE IF NOT EXISTS crm_db;

USE crm_db;

CREATE TABLE users (
    id INT AUTO_INCREMENT PRIMARY KEY,
    username VARCHAR(255) NOT NULL,
    password VARCHAR(255) NOT NULL,
    role VARCHAR(50) NOT NULL
);

CREATE TABLE customers (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(255) NOT NULL,
    email VARCHAR(255) NOT NULL,
    phone VARCHAR(255) NOT NULL,
    address VARCHAR(255) NOT NULL
);

CREATE TABLE activities (
    id INT AUTO_INCREMENT PRIMARY KEY,
    user_id INT NOT NULL,
    description TEXT NOT NULL,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (user_id) REFERENCES users(id)
);

CREATE TABLE contacts (
    id INT AUTO_INCREMENT PRIMARY KEY,
    customer_id INT,
    contact_type ENUM('phone', 'email'),
    value VARCHAR(255),
    FOREIGN KEY (customer_id) REFERENCES customers(id)
);
```
4. Configure the database connection in your PHP files (e.g., add_customer.php, fetch_data.php).

5. tart the PHP server:
```
php -S localhost:8000
```

6. Open your browser and navigate to http://localhost:8000.

## Usage

### User Authentication
Register: Users can register by visiting the registration page (register.php).
### Login: Users can log in via the login page (login.php).
### Logout: Users can log out by clicking the logout link in the navbar.
### Dashboard
### Admin View: Admin users can see the total number of customers and recent activities.
### User View: Non-admin users see a welcome message.
## Customer Management
### Add Customer: Admin users can add new customers via the add customer page (add_customer.php)

# File Structure
```
crm-dashboard/
│
├── actions/
│   ├── add_customer.php
│   ├── delete_customer.php
|   ├── edit_customer.php
|   ├── fetch_data.php
│   └── logout.php
├── css/
|
├── includes/
|   ├── db_connection.php
|   ├── navbar.php
│   └── session.php
│
├── js/
|   ├── bootstrap.js
|   ├── jquery.js
│   └── script.js
|
├── pages/
|   ├── auth
|   │   ├── auth.php
|   │   ├── login.php
|   │   └── register.php
|   |
|   ├── add_customer.php
|   ├── edit_customer.php
|   ├── error.php
|   ├── testingauth.php
│   └── view_customer.php
|
├── sql/
│   └── schema.sql
|
├── templates/
│   ├── header.php
│   └── footer.php
│
├── index.php
└── README.md

```

## Endpoints
- index.php: Main dashboard page
- login.php: User login page
- register.php: User registration page
- add_customer.php: Add new customer page
- fetch_data.php: Fetch total customers and recent activities

## Database Schema
### Users Table
| Column | Type | Description |
| --- | --- | --- |
| id | INT | Primary key |
| username | VARCHAR | User's username |
| password | VARCHAR | User's hashed password |
| role | VARCHAR | User's role (admin/user) |

### Customers Table

<table>
<thead>
<tr>
<th>Column</th>
<th>Type</th>
<th>Description</th>
</tr>
</thead>
<tbody>
<tr>
<td>id</td>
<td>INT</td>
<td>Primary key</td>
</tr>
<tr>
<td>name</td>
<td>VARCHAR</td>
<td>Customer's name</td>
</tr>
<tr>
<td>email</td>
<td>VARCHAR</td>
<td>Customer's email</td>
</tr>
<tr>
<td>phone</td>
<td>VARCHAR</td>
<td>Customer's phone</td>
</tr>
<tr>
<td>address</td>
<td>VARCHAR</td>
<td>Customer's address</td>
</tr>
</tbody>
</table>

### Activities Table

<table>
<thead>
<tr>
<th>Column</th>
<th>Type</th>
<th>Description</th>
</tr>
</thead>
<tbody>
<tr>
<td>id</td>
<td>INT</td>
<td>Primary key</td>
</tr>
<tr>
<td>user_id</td>
<td>INT</td>
<td>ID of the user performing action</td>
</tr>
<tr>
<td>description</td>
<td>TEXT</td>
<td>Description of the activity</td>
</tr>
<tr>
<td>created_at</td>
<td>TIMESTAMP</td>
<td>Timestamp of the activity</td>
</tr>
</tbody>
</table>

## Security Considerations
### Data Validation and Sanitization:
- Use filter_var and mysqli_real_escape_string to sanitize user input.
- Validate all input data on the server-side to prevent SQL injection and other security vulnerabilities.
### Password Hashing:
- Store passwords securely using password_hash.
- Verify passwords using password_verify.
### Session Management:
- Use PHP sessions to manage user authentication.
- Ensure session data is protected and session IDs are regenerated on login.


This `README.md` provides a comprehensive overview of your CRM Dashboard application, including installation steps, usage instructions, file structure, endpoints, database schema, and security considerations. It helps new developers quickly understand and set up the project.
