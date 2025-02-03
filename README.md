### 🔗 Live Demo : http://task-manager-app.infinityfreeapp.com/

# Task Manager

A simple Task Manager web application built using PHP, HTML, CSS, and JavaScript. It allows users to register, log in, and manage their tasks efficiently.

## Features
- **User Registration**: Users can create a new account by providing their name, email, and password.
- **User Login**: Registered users can log in using their email and password.
- **Task Management**: Users can add new tasks, view pending tasks, and mark tasks as completed.
- **Completed Tasks**: Users can view a list of completed tasks, organized by completion date.
- **Responsive Design**: The application is styled to be user-friendly across devices.

## Project Structure
```
📂 Task Manager
├── 📄 addTask.php        # Handles adding new tasks to the database
├── 📄 completed.php      # Displays completed tasks for the logged-in user
├── 📄 sidebar.php        # Contains the sidebar navigation component
├── 📄 database.php       # Establishes a connection to the MySQL database
├── 📄 home.php           # Main task management interface for the logged-in user
├── 📄 index.php          # Redirects users based on login status
├── 📄 login.php          # Handles user login functionality
├── 📄 register.php       # Handles user registration functionality
├── 📂 styles            # Contains CSS files for styling the application
│   ├── 📄 login-register.css  # Styles for login and registration pages
│   ├── 📄 style.css           # Styles for the main application interface
├── 📄 updateTasks.php    # Updates task status to "completed"
```

## Installation
1. **Clone the repository**
   ```sh
   git clone https://github.com/your-username/task-manager.git
   ```
2. **Set up a MySQL database** and update the connection details in `database.php`.
3. **Run the project in a web server environment** (e.g., XAMPP, WAMP, or a live server).
4. **Access the application** through your web browser.

## Usage
1. **Register** a new account using the registration page.
2. **Log in** with your registered email and password.
3. **Manage tasks** by adding, viewing, and marking tasks as completed.
4. **View completed tasks** in the "Completed" section.

## Contribution
Feel free to fork this repository and contribute by submitting a pull request.

## License
This project is open-source and available under the [MIT License](LICENSE).
