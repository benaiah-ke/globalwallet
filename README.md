# Sendr
Sendr is a web application that attempts to enable cross border transfer of funds even between wallets with different currencies

The application enables users create accounts, top up their wallets and send money to each other instantly.

### Technical Requirements
The application is powered by **PHP** and **MySQL**. To run it, you need the following:
- A server environment that supports PHP
- MySQL database support

You can use  **XAMPP** or **LAMP** in a local environment. It provides support for PHP and MySQL
You can also use a web hosting provider to host the system

### Set up
To set the system up:
- Place the application code in a publicly accessible location depending on your server
  e.g in **htdocs** folder for XAMPP, or **www** on LAMP
- Start or ensure MySQL and Apache services on your server are running
- Run the SQL code in `config/db.sql` in your MySQL database manager e.g PhpMyAdmin to create a database and the necessary tables
- Open `config/db.php` and ensure your database settings are correctly set as shown:
```
// Modify these values appropriately
define('DB_HOST', '<YOUR HOST NAME>');
define('DB_DATABASE', 'Sendr');
define('DB_USER', '<DB USERNAME>');
define('DB_PASSWORD', '<DB PASSWORD>');

// Rest of file, do not modify
```
- Open the site on a browser using its's correct url, e.g *localhost/Sendr*

### Usage
First, you need to create an account. Click on `Get Started` on the site navigation and provide your account details
If you have an account, you can simply log in

#### Depositing Money
The site comes with a wallet top up simulator page. Real funds are not used.
- Click **`Top Up`** on the navigation
- Enter an amount and hit submit

#### Sending Money
To send money to another user
- Click **`Send Money`** on the navigation
- Enter the users email and amount to transfer (in your currency)

If your account has enough balance, the transfer will be completed and the receiving user will be credited with an equivalent amount in his/her currency

**NB:** You can log in as a second user with a different currency in another browser to inspect transfers as they occur

#### Transaction History
The application shows the user a history of their transactions i.e deposits, money received or sent
- Click **`History`** on the navigation
