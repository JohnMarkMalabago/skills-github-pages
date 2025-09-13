<<?php
session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $firstName = htmlspecialchars($_POST['firstName'] ?? '');
    $middleName = htmlspecialchars($_POST['middleName'] ?? '');
    $lastName = htmlspecialchars($_POST['lastName'] ?? '');
    $fullName = trim($firstName . ' ' . $middleName . ' ' . $lastName);

    $_SESSION['registration_status'] = 'completed';
    $_SESSION['user_name'] = $fullName;

    header("Location: " . $_SERVER['PHP_SELF']);
    exit();

} elseif (isset($_GET['action']) && $_GET['action'] == 'logout') {
    
    $_SESSION = array();
    
    
    session_destroy();
    
    
    header("Location: " . $_SERVER['PHP_SELF']);
    exit();

} elseif (isset($_SESSION['registration_status']) && $_SESSION['registration_status'] == 'completed') {
    
    $userName = $_SESSION['user_name'] ?? 'User';
    
 
    $page = $_GET['page'] ?? 'dashboard';

   
    ?>
    <!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>CITE Dashboard</title>
        <link rel="stylesheet" href="style.css">
    </head>
    <body>
        <div class="dashboard-container">
            <aside class="sidebar">
                <div class="sidebar-header">
                    <h2>CITE</h2>
                </div>
                <nav class="sidebar-nav">
                    <ul>
                        <li><a href="?page=dashboard" class="<?php echo ($page == 'dashboard') ? 'active' : ''; ?>">Dashboard</a></li>
                        <li><a href="?page=status" class="<?php echo ($page == 'status') ? 'active' : ''; ?>">Registration Status</a></li>
                        <li><a href="?action=logout">Logout</a></li>
                    </ul>
                </nav>
            </aside>
            <main class="content">
                <header class="content-header">
                    <h1><?php echo ($page == 'status') ? 'Registration Status' : 'Dashboard'; ?></h1>
                </header>
                <section class="content-section">
                    <?php if ($page == 'status'): ?>
                        <h2>Hello, <?php echo htmlspecialchars($userName); ?>!</h2>
                        <p>Your registration is **COMPLETE**.</p>
                        <p>You have successfully registered for the CITE program. Thank you!</p>
                    <?php else: ?>
                        <h2>Welcome, <?php echo htmlspecialchars($userName); ?>!</h2>
                        <p>This is your CITE registration dashboard. Use the navigation on the left to check your registration status or log out.</p>
                    <?php endif; ?>
                </section>
            </main>
        </div>
    </body>
    </html>
    <?php
} else {
    ?>
    <!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>CITE Registration Form</title>
        <link rel="stylesheet" href="style.css">
    </head>
    <body>
        <div class="container">
            <h2>CITE Registration Form</h2>
            <form id="CiteRegistrationForm" action="process_form.php" method="POST">
                <div class="form-group">
                    <label for="firstName">First Name:</label>
                    <input type="text" id="firstName" name="firstName">
                    <div class="error" id="firstNameError"></div>
                </div>
                <div class="form-group">
                    <label for="middleName">Middle Name:</label>
                    <input type="text" id="middleName" name="middleName">
                </div>
                <div class="form-group">
                    <label for="lastName">Last Name:</label>
                    <input type="text" id="lastName" name="lastName">
                    <div class="error" id="lastNameError"></div>
                </div>
                <div class="form-group">
                    <label for="suffix">Suffix:</label>
                    <input type="text" id="suffix" name="suffix">
                </div>
                <div class="form-group">
                    <label for="contactNo">Contact No.:</label>
                    <input type="text" id="contactNo" name="contactNo">
                    <div class="error" id="contactNoError"></div>
                </div>
                <div class="form-group">
                    <label for="batch">Batch:</label>
                    <select id="batch" name="batch">
                        <option value="">Select Batch</option>
                        <option value="32">32</option>
                        <option value="33">33</option>
                        <option value="34">34</option>
                        <option value="35">35</option>
                    </select>
                    <div class="error" id="batchError"></div>
                </div>
                <div class="form-group">
                    <label for="email">Email:</label>
                    <input type="text" id="email" name="email">
                    <div class="error" id="emailError"></div>
                </div>
                <button type="submit">Submit</button>
            </form>
        </div>
        <script src="script.js"></script>
    </body>
    </html>
    <?php
}
?>
}
?>