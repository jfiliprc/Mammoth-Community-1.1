# Mammoth Community 1.0

Welcome to Mammoth Community 1.0, a community platform for mammoth enthusiasts. This PHP-based project allows users to create validated accounts, log in, share thoughts, view others' contributions, and log out. With a clean and simple design powered by Bootstrap and a touch of CSS, Mammoth Community 1.0 offers a space for like-minded individuals to connect and discuss their shared passion for mammoths.

![image](https://github.com/jfiliprc/Mammoth-Community-1.0/assets/109008096/7288f431-cbcb-458f-b92c-d134350e8f9c)
![image](https://github.com/jfiliprc/Mammoth-Community-1.0/assets/109008096/c563d094-ddbf-4255-95fe-64228f6127bf)
![image](https://github.com/jfiliprc/Mammoth-Community-1.0/assets/109008096/d87a1630-2564-4f19-8734-a14460962189)




## Table of Contents

- [Getting Started](#getting-started)
- [Features](#features)
- [Installation](#installation)
- [Usage](#usage)
- [Database Structure](#database-structure)
- [Contributing](#contributing)

## Getting Started

To set up and run Mammoth Community 1.0 on your local machine, follow these steps:

### Prerequisites

- PHP (>= 7.0)
- MySQL or MariaDB
- Web server (e.g., Apache)
- Git (optional, for cloning the repository)

### Installation

1. **Clone the Repository**: Clone this repository to your local machine.
```bash
git clone https://github.com/jfiliprc/Mammoth-Community-1.0.git
```
2. **Database Setup**: Import the database structure from the `forum.sql` file into your MySQL or MariaDB database.
```bash
mysql -u yourusername -p yourdatabase < forum.sql
```

3. **Configuration**: Update the database credentials and other settings in the `config.php` file.

4. **Web Server**: Start your web server and ensure it's configured to serve PHP files.

5. **Access the Application**: Open your web browser and navigate to the project's URL.

## Features

Mammoth Community 1.0 includes the following features:

- User Registration and Authentication
- User Login and Logout
- Posting and Viewing Thoughts
- Responsive Design with Bootstrap
- Simple and Intuitive User Interface

## Usage

As an end-user or administrator, here's how you can use Mammoth Community 1.0:

1. **Register**: Create a new user account with the required information. Ensure your registration is validated.

2. **Login**: Log in to your account using your credentials.

3. **Post Thoughts**: Share your thoughts, engage with the community, and post ideas, questions, or comments.

4. **View Thoughts**: Browse and read thoughts shared by other community members.

5. **Logout**: Safely log out of your account when you're done.

## Database Structure

The database structure for Mammoth Community is defined in the `forum.sql` file. It includes tables for users, posts, comments, and more. Import this structure into your database to set up the required tables and relationships.

## Contributing

We welcome contributions to Mammoth Community 1.0. To contribute, follow these steps:

1. Fork the repository to your GitHub account.

2. Create a new branch for your feature or bug fix.

3. Make your changes and commit them with clear and concise messages.

4. Push your changes to your fork.

5. Submit a pull request to the main repository, describing your changes and why they should be merged.


