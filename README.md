
# Password Management Vault
## Overview

The Password Management Vault is a web-based application built using Laravel and Vue.js that provides a secure and convenient way to store and manage passwords. The application allows users to create folders to organize their passwords, search for data by name, username and folder. Generate strong passwords, and import and export password data.

## Tech Stack
The Password Management Vault is built using the following technologies:

- Laravel version 8.75
- Vue.js version ^2.7.14
- Maatwebsite/Excel 3.1 package for import and export functionality
- Ant Design for pagination and design work
- Laravel/Breeze for authentication
- Tailwind CSS for design work

## Installation
To install the Password Management Vault, follow these steps:

1 . Clone the repository using **git clone.**

2 . Install the necessary dependencies by running **composer install** and **npm install.**

3 . Copy the **.env.example** file to **.env** and configure the database settings.

4 . Generate an application key by running **php artisan key:generate.**

5 . Run the database migrations using **php artisan migrate**.

6 . Build the front-end assets using **npm run dev** or **npm run prod**.

7 . Start the development server using **php artisan serve**.

## Features
#### User Authentication
The application uses Laravel/Breeze for user authentication. Users can create an account and log in to access their password data.

#### Folder Management
Users can create folders to organize their password data. They can view and manage their folders on the Folder menu dropdown.

#### Vault Management
Users can store and manage secret credentials (e.g. API keys, access tokens, SSH keys) on the Password Management Vault page. They can also search for passwords data by name, username and folder.

#### Password Generator/ Tools
The Password Generator is a tool that allows users to generate strong passwords based on their preferences. Users can specify the length of the password and choose to include uppercase letters, lowercase letters, numbers, and special characters. Once the preferences are set, the Password Generator will create a new password that meets those criteria.

#### Import and Export
Users can import and export password data to and from CSV files using the Maatwebsite/Excel package.


## Usage
To use the Password Management Vault, users must first create an account and log in using Laravel/Breeze authentication. Once logged in, users can create folders to organize their passwords. Passwords can be added to folders manually or imported from a CSV file using the Maatwebsite/Excel package. Users can also search for passwords by name.

The Password Generator tool can be accessed from the main menu. Users can specify the length and complexity of the generated passwords.

### Conclusion
The Password Management Vault is a secure and convenient way to manage passwords. Its use of Laravel, Vue.js, and various packages and tools make it a robust and feature-rich application.
