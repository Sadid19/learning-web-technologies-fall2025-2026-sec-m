<?php
// Start session for user login
session_start();

// Language handling
$currentLang = 'en';
if (isset($_POST['lang_toggle'])) {
    $_SESSION['lang'] = ($_SESSION['lang'] == 'en') ? 'bn' : 'en';
    $currentLang = $_SESSION['lang'];
} elseif (isset($_SESSION['lang'])) {
    $currentLang = $_SESSION['lang'];
} else {
    $_SESSION['lang'] = 'en';
}

// Language data
$languages = [
    'en' => [
        'lang_text' => "বাংলা",
        'logo_text' => "Agriconnect",
        'tagline_text' => "Connecting Micro Entrepreneurs with Farmers",
        'description_text' => "A platform that bridges the gap between agricultural producers and business innovators to foster sustainable growth in the farming ecosystem.",
        'svg_farmer_text' => "Farmers",
        'svg_entrepreneur_text' => "Entrepreneurs",
        'svg_produce_text' => "Produce",
        'svg_connect_text' => "Connect",
        'svg_market_text' => "Market",
        'welcome_text' => "Welcome Back",
        'instruction_text' => "Please enter your details to log in.",
        'email_label' => "Email or Phone Number",
        'email_placeholder' => "Enter your email or phone number",
        'password_label' => "Password",
        'password_placeholder' => "Enter your password",
        'role_label' => "Select Your Role",
        'remember_label' => "Remember Me",
        'forgot_password_text' => "Forgot Password?",
        'login_button_text' => "Login",
        'no_account_text' => "Don't have an account?",
        'signup_text' => "Sign Up",
        'role_options' => [
            'admin' => "Admin",
            'farmer' => "Farmer",
            'entrepreneur' => "Micro Entrepreneur",
            'buyer' => "Buyer"
        ]
    ],
    'bn' => [
        'lang_text' => "English",
        'logo_text' => "এগ্রিকানেক্ট",
        'tagline_text' => "ক্ষুদ্র উদ্যোক্তাদের কৃষকের সাথে সংযুক্ত করা",
        'description_text' => "কৃষি উৎপাদনকারী এবং ব্যবসায়িক উদ্ভাবকদের মধ্যে ব্যবধান দূর করে কৃষি ব্যবস্থায় টেকসই বৃদ্ধি ফেলতে সহায়তা করার একটি প্ল্যাটফর্ম।",
        'svg_farmer_text' => "কৃষক",
        'svg_entrepreneur_text' => "উদ্যোক্তা",
        'svg_produce_text' => "পণ্য",
        'svg_connect_text' => "সংযোগ",
        'svg_market_text' => "বাজার",
        'welcome_text' => "ফিরে আসার জন্য স্বাগতম",
        'instruction_text' => "লগইন করতে আপনার বিবরণ দিন।",
        'email_label' => "ইমেইল বা ফোন নম্বর",
        'email_placeholder' => "আপনার ইমেইল বা ফোন নম্বর দিন",
        'password_label' => "পাসওয়ার্ড",
        'password_placeholder' => "আপনার পাসওয়ার্ড দিন",
        'role_label' => "আপনার ভূমিকা নির্বাচন করুন",
        'remember_label' => "মনে রাখুন",
        'forgot_password_text' => "পাসওয়ার্ড ভুলে গেছেন?",
        'login_button_text' => "লগইন",
        'no_account_text' => "অ্যাকাউন্ট নেই?",
        'signup_text' => "নিবন্ধন করুন",
        'role_options' => [
            'admin' => "অ্যাডমিন",
            'farmer' => "কৃষক",
            'entrepreneur' => "ক্ষুদ্র উদ্যোক্তা",
            'buyer' => "ক্রেতা"
        ]
    ]
];

// Get current language data
$lang = $languages[$currentLang];

// Handle form submission
$error_message = '';
$success_message = '';

if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['login'])) {
    // Get form data
    $email = isset($_POST['email']) ? trim($_POST['email']) : '';
    $password = isset($_POST['password']) ? $_POST['password'] : '';
    $role = isset($_POST['role']) ? $_POST['role'] : 'admin';
    $remember = isset($_POST['remember']) ? true : false;
    
    // Basic validation
    if (empty($email) || empty($password)) {
        $error_message = ($currentLang == 'en') 
            ? 'Please fill in all fields' 
            : 'সমস্ত ফিল্ড পূরণ করুন';
    } else {
        // In real application, you would:
        // 1. Connect to database
        // 2. Validate credentials
        // 3. Set session variables
        // 4. Redirect to dashboard
        
        // For demo purposes, we'll simulate successful login
        $_SESSION['user_email'] = $email;
        $_SESSION['user_role'] = $role;
        $_SESSION['logged_in'] = true;
        
        // Set cookie if remember me is checked
        if ($remember) {
            setcookie('user_email', $email, time() + (86400 * 30), "/"); // 30 days
        }
        
        $success_message = ($currentLang == 'en')
            ? "Login successful! Welcome, {$lang['role_options'][$role]}."
            : "লগইন সফল! স্বাগতম, {$lang['role_options'][$role]}।";
        
        // In real app, redirect to dashboard
        // header("Location: dashboard.php");
        // exit();
    }
}

// Handle forgot password
if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['forgot_password'])) {
    $success_message = ($currentLang == 'en')
        ? 'A password reset link has been sent to your email.'
        : 'একটি পাসওয়ার্ড রিসেট লিঙ্ক আপনার ইমেইলে পাঠানো হয়েছে।';
}

// Preserve form values after submission
$form_email = isset($_POST['email']) ? htmlspecialchars($_POST['email']) : '';
$form_role = isset($_POST['role']) ? $_POST['role'] : 'admin';
$form_remember = isset($_POST['remember']) ? 'checked' : '';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo ($currentLang == 'en') ? 'Agriconnect - Login' : 'এগ্রিকানেক্ট - লগইন'; ?></title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        }

        body {
            background-color: #f5f9f4;
            min-height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
            padding: 20px;
            transition: all 0.3s ease;
        }

        body.bangla {
            font-family: 'SolaimanLipi', 'Siyam Rupali', 'Kalpurush', 'Segoe UI', sans-serif;
        }

        .login-container {
            display: flex;
            width: 100%;
            max-width: 1100px;
            min-height: 650px;
            background-color: white;
            border-radius: 20px;
            overflow: hidden;
            box-shadow: 0 15px 30px rgba(0, 0, 0, 0.08);
            position: relative;
        }

        /* Language Toggle Button */
        .language-toggle {
            position: absolute;
            top: 20px;
            right: 20px;
            z-index: 10;
        }

        .lang-btn {
            background-color: #f0f7ed;
            border: 1px solid #4a7c1f;
            color: #2d5016;
            padding: 8px 16px;
            border-radius: 50px;
            cursor: pointer;
            font-weight: 600;
            display: flex;
            align-items: center;
            transition: all 0.3s ease;
            font-size: 14px;
        }

        .lang-btn:hover {
            background-color: #4a7c1f;
            color: white;
        }

        .lang-icon {
            margin-right: 8px;
            font-size: 14px;
        }

        /* Messages */
        .message {
            padding: 12px 20px;
            margin: 15px 0;
            border-radius: 8px;
            font-weight: 500;
            display: flex;
            align-items: center;
            animation: fadeIn 0.5s ease;
        }

        @keyframes fadeIn {
            from { opacity: 0; transform: translateY(-10px); }
            to { opacity: 1; transform: translateY(0); }
        }

        .error-message {
            background-color: #ffebee;
            color: #c62828;
            border-left: 4px solid #c62828;
        }

        .success-message {
            background-color: #e8f5e9;
            color: #2e7d32;
            border-left: 4px solid #2e7d32;
        }

        .message-icon {
            margin-right: 10px;
            font-size: 18px;
        }

        /* Left side - Illustration/Image */
        .login-illustration {
            flex: 1;
            background: linear-gradient(135deg, #2d5016 0%, #4a7c1f 100%);
            color: white;
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            padding: 40px;
            text-align: center;
        }

        .logo {
            display: flex;
            align-items: center;
            margin-bottom: 40px;
            font-size: 28px;
            font-weight: 700;
        }

        .logo-icon {
            background-color: #e9f7e5;
            color: #2d5016;
            width: 50px;
            height: 50px;
            border-radius: 12px;
            display: flex;
            align-items: center;
            justify-content: center;
            margin-right: 15px;
        }

        .illustration-title {
            font-size: 32px;
            margin-bottom: 15px;
            font-weight: 700;
        }

        .illustration-text {
            font-size: 18px;
            line-height: 1.6;
            max-width: 400px;
            opacity: 0.9;
        }

        .illustration-image {
            width: 85%;
            max-width: 400px;
            margin-top: 30px;
        }

        /* Right side - Login Form */
        .login-form {
            flex: 1;
            padding: 50px 60px;
            display: flex;
            flex-direction: column;
            justify-content: center;
        }

        .welcome-title {
            font-size: 28px;
            color: #1a3309;
            margin-bottom: 10px;
            font-weight: 600;
        }

        .subtitle {
            color: #666;
            margin-bottom: 20px;
            font-size: 16px;
        }

        .form-group {
            margin-bottom: 25px;
        }

        .form-label {
            display: block;
            color: #333;
            margin-bottom: 8px;
            font-weight: 500;
            font-size: 15px;
        }

        .input-with-icon {
            position: relative;
        }

        .input-icon {
            position: absolute;
            left: 15px;
            top: 50%;
            transform: translateY(-50%);
            color: #777;
        }

        input, select {
            width: 100%;
            padding: 15px 15px 15px 45px;
            border: 1px solid #ddd;
            border-radius: 10px;
            font-size: 16px;
            transition: all 0.3s;
        }

        input:focus, select:focus {
            outline: none;
            border-color: #4a7c1f;
            box-shadow: 0 0 0 2px rgba(74, 124, 31, 0.2);
        }

        .form-options {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 30px;
        }

        .remember-me {
            display: flex;
            align-items: center;
        }

        .remember-me input {
            width: auto;
            margin-right: 8px;
        }

        .remember-me label {
            color: #555;
            font-size: 15px;
        }

        .forgot-password-btn {
            background: none;
            border: none;
            color: #4a7c1f;
            text-decoration: none;
            font-weight: 500;
            font-size: 15px;
            cursor: pointer;
            transition: color 0.3s;
            padding: 0;
        }

        .forgot-password-btn:hover {
            color: #2d5016;
            text-decoration: underline;
        }

        .login-btn {
            background-color: #4a7c1f;
            color: white;
            border: none;
            padding: 16px;
            border-radius: 10px;
            font-size: 17px;
            font-weight: 600;
            cursor: pointer;
            transition: background-color 0.3s;
            width: 100%;
            margin-bottom: 25px;
        }

        .login-btn:hover {
            background-color: #3a6418;
        }

        .signup-link {
            text-align: center;
            color: #666;
            font-size: 15px;
        }

        .signup-link a {
            color: #4a7c1f;
            text-decoration: none;
            font-weight: 600;
        }

        .signup-link a:hover {
            text-decoration: underline;
        }

        /* Responsive adjustments */
        @media (max-width: 900px) {
            .login-container {
                flex-direction: column;
                max-width: 500px;
            }
            
            .login-illustration {
                padding: 30px;
            }
            
            .login-form {
                padding: 40px;
            }
            
            .illustration-image {
                width: 70%;
            }
            
            .language-toggle {
                top: 15px;
                right: 15px;
            }
        }

        @media (max-width: 480px) {
            .login-form {
                padding: 30px;
            }
            
            .form-options {
                flex-direction: column;
                align-items: flex-start;
            }
            
            .forgot-password-btn {
                margin-top: 10px;
            }
            
            .illustration-title {
                font-size: 26px;
            }
            
            .welcome-title {
                font-size: 24px;
            }
            
            .language-toggle {
                top: 10px;
                right: 10px;
            }
            
            .lang-btn {
                padding: 6px 12px;
                font-size: 14px;
            }
        }
    </style>
</head>
<body class="<?php echo ($currentLang == 'bn') ? 'bangla' : ''; ?>">
    <div class="login-container">
        <!-- Language Toggle Button -->
        <form method="POST" class="language-toggle">
            <button type="submit" name="lang_toggle" class="lang-btn">
                <i class="fas fa-language lang-icon"></i>
                <span><?php echo $lang['lang_text']; ?></span>
            </button>
        </form>
        
        <!-- Left side - Illustration/Image -->
        <div class="login-illustration">
            <div class="logo">
                <div class="logo-icon">
                    <i class="fas fa-leaf"></i>
                </div>
                <span id="logoText"><?php echo $lang['logo_text']; ?></span>
            </div>
            
            <h2 class="illustration-title"><?php echo $lang['tagline_text']; ?></h2>
            <p class="illustration-text"><?php echo $lang['description_text']; ?></p>
            
            <svg class="illustration-image" viewBox="0 0 400 300" xmlns="http://www.w3.org/2000/svg">
                <rect x="50" y="100" width="300" height="150" rx="10" fill="#e9f7e5" />
                <rect x="80" y="130" width="80" height="40" rx="5" fill="#4a7c1f" />
                <rect x="180" y="130" width="80" height="40" rx="5" fill="#2d5016" />
                <rect x="280" y="130" width="80" height="40" rx="5" fill="#4a7c1f" />
                
                <circle cx="120" cy="80" r="40" fill="#ffcc66" />
                <circle cx="280" cy="80" r="40" fill="#66ccff" />
                
                <path d="M120,80 Q200,40 280,80" stroke="#4a7c1f" stroke-width="4" fill="none" stroke-dasharray="8,8" />
                
                <text x="120" y="85" text-anchor="middle" fill="#1a3309" font-weight="bold" font-size="14"><?php echo $lang['svg_farmer_text']; ?></text>
                <text x="280" y="85" text-anchor="middle" fill="#1a3309" font-weight="bold" font-size="14"><?php echo $lang['svg_entrepreneur_text']; ?></text>
                
                <text x="120" y="155" text-anchor="middle" fill="white" font-weight="bold" font-size="12"><?php echo $lang['svg_produce_text']; ?></text>
                <text x="220" y="155" text-anchor="middle" fill="white" font-weight="bold" font-size="12"><?php echo $lang['svg_connect_text']; ?></text>
                <text x="320" y="155" text-anchor="middle" fill="white" font-weight="bold" font-size="12"><?php echo $lang['svg_market_text']; ?></text>
            </svg>
        </div>
        
        <!-- Right side - Login Form -->
        <div class="login-form">
            <h1 class="welcome-title"><?php echo $lang['welcome_text']; ?></h1>
            <p class="subtitle"><?php echo $lang['instruction_text']; ?></p>
            
            <!-- Display messages -->
            <?php if ($error_message): ?>
                <div class="message error-message">
                    <i class="fas fa-exclamation-circle message-icon"></i>
                    <?php echo $error_message; ?>
                </div>
            <?php endif; ?>
            
            <?php if ($success_message): ?>
                <div class="message success-message">
                    <i class="fas fa-check-circle message-icon"></i>
                    <?php echo $success_message; ?>
                </div>
            <?php endif; ?>
            
            <form method="POST" id="loginForm">
                <div class="form-group">
                    <label class="form-label" for="email"><?php echo $lang['email_label']; ?></label>
                    <div class="input-with-icon">
                        <i class="fas fa-user input-icon"></i>
                        <input type="text" id="email" name="email" 
                               placeholder="<?php echo $lang['email_placeholder']; ?>" 
                               value="<?php echo $form_email; ?>" required>
                    </div>
                </div>
                
                <div class="form-group">
                    <label class="form-label" for="password"><?php echo $lang['password_label']; ?></label>
                    <div class="input-with-icon">
                        <i class="fas fa-lock input-icon"></i>
                        <input type="password" id="password" name="password" 
                               placeholder="<?php echo $lang['password_placeholder']; ?>" required>
                    </div>
                </div>
                
                <div class="form-group">
                    <label class="form-label" for="role"><?php echo $lang['role_label']; ?></label>
                    <div class="input-with-icon">
                        <i class="fas fa-user-tag input-icon"></i>
                        <select id="role" name="role">
                            <?php foreach ($lang['role_options'] as $key => $value): ?>
                                <option value="<?php echo $key; ?>" 
                                    <?php echo ($form_role == $key) ? 'selected' : ''; ?>>
                                    <?php echo $value; ?>
                                </option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                </div>
                
                <div class="form-options">
                    <div class="remember-me">
                        <input type="checkbox" id="remember" name="remember" <?php echo $form_remember; ?>>
                        <label for="remember"><?php echo $lang['remember_label']; ?></label>
                    </div>
                    <button type="submit" name="forgot_password" class="forgot-password-btn">
                        <?php echo $lang['forgot_password_text']; ?>
                    </button>
                </div>
                
                <button type="submit" name="login" class="login-btn">
                    <?php echo $lang['login_button_text']; ?>
                </button>
                
                <div class="signup-link">
                    <span><?php echo $lang['no_account_text']; ?></span> 
                    <a href="signup.php"><?php echo $lang['signup_text']; ?></a>
                </div>
            </form>
        </div>
    </div>

    <script>
        // Add some client-side validation
        document.getElementById('loginForm').addEventListener('submit', function(e) {
            const email = document.getElementById('email').value;
            const password = document.getElementById('password').value;
            
            if (!email || !password) {
                e.preventDefault();
                alert('<?php echo ($currentLang == 'en') ? 'Please fill in all fields' : 'সমস্ত ফিল্ড পূরণ করুন'; ?>');
                return false;
            }
            
            // Basic email validation
            const emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
            const phoneRegex = /^[0-9]{10,15}$/;
            
            if (!emailRegex.test(email) && !phoneRegex.test(email.replace(/\D/g, ''))) {
                e.preventDefault();
                alert('<?php echo ($currentLang == 'en') ? 'Please enter a valid email or phone number' : 'সঠিক ইমেইল বা ফোন নম্বর দিন'; ?>');
                return false;
            }
            
            return true;
        });
        
        // Auto-hide messages after 5 seconds
        setTimeout(function() {
            const messages = document.querySelectorAll('.message');
            messages.forEach(function(message) {
                message.style.transition = 'opacity 0.5s ease';
                message.style.opacity = '0';
                setTimeout(() => message.style.display = 'none', 500);
            });
        }, 5000);
    </script>
</body>
</html>