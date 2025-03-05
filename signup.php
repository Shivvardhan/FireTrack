<?php
session_start();

if (isset($_SESSION['username'])) {
  echo "<script>window.location.href = 'public/'; </script>";
} else {
  include "head.php";
?>

<style>
    /* Alert Messages */
.alert {
    padding: 10px 15px;
    margin-bottom: 10px;
    border-radius: 5px;
    opacity: 1;
    transition: all 0.3s ease;
    animation: slideIn 0.3s ease;
}

.alert.fade-out {
    opacity: 0;
    transform: translateY(-10px);
}

.alert-danger {
    background-color: #f8d7da;
    border-color: #f5c6cb;
    color: #721c24;
}

.alert-success {
    background-color: #d4edda;
    border-color: #c3e6cb;
    color: #155724;
}

@keyframes slideIn {
    from {
        transform: translateY(-10px);
        opacity: 0;
    }
    to {
        transform: translateY(0);
        opacity: 1;
    }
}

/* Icon Wrapper */
.icon-item {
    padding: 0.5rem;
    border-radius: 50%;
    display: flex;
    align-items: center;
    justify-content: center;
}

/* Responsive Design */
@media (max-width: 480px) {
    .card {
        width: 90%;
        padding: 20px;
    }
}

/* Password Toggle Icon Styling */
.position-relative {
    position: relative;
}

.password-toggle {
    position: absolute;
    right: 10px;
    top: 50%;
    transform: translateY(-50%);
    cursor: pointer;
    color: #666;
    padding: 5px;
    z-index: 10;
}

.password-toggle:hover {
    color: #ff9e0d;
}

/* Password input padding adjustment */
input[type="password"] {
    padding-right: 40px !important;
}

/* Password match text styling */
.password-match-text {
    font-size: 12px;
    margin-top: 5px;
    display: block;
}

.text-success {
    color: #198754 !important;
}

.text-danger {
    color: #dc3545 !important;
}

/* Input field with icon styling */
.mb-3 {
    position: relative;
}

/* Google Places Autocomplete customization */
.pac-container {
    border-radius: 5px;
    box-shadow: 0 2px 6px rgba(0, 0, 0, 0.1);
    border: 1px solid #ddd;
}

.pac-item {
    padding: 8px 10px;
    cursor: pointer;
}

.pac-item:hover {
    background-color: #f8f9fa;
}

/* Helper text styling */
.text-muted {
    font-size: 12px;
    margin-top: 5px;
    display: block;
}

.contact-message {
    font-size: 12px;
    margin-top: 5px;
    display: block;
}

/* Input field validation styles */
.form-control.is-invalid {
    border-color: #dc3545;
    background:none;
}

.form-control.is-valid {
    border-color: #198754;
}

</style>

<div class="container" style="background-color: #ff9e0d;max-width:100% !important;height:100vh;">
    <div class="row flex justify-content-center">
        <div class="col-md-4">

            <div class="text-center mb-5 text-dark"></div>
            <div class="card my-5">

                <form class="card-body cardbody-color rounded p-lg-5" action="#" id="signupForm" method="POST">
                    <?php
            if (isset($_SESSION['send'])) { ?>
                    <div class="alert alert-success border-2 d-flex align-items-center" role="alert">
                        <div class="bg-success me-3 icon-item"><span class="fas fa-times-circle text-white fs-3"></span>
                        </div>
                        <p class="mb-0 flex-1">
                            <?PHP
                                        echo $_SESSION['send'];
                                        unset($_SESSION['send']);
                                        ?>
                        </p><button class="btn-close" type="button" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                    <?PHP }
                    ?>
                    <?php
            if (isset($_SESSION['message'])) { ?>
                    <div class="alert alert-danger border-2 d-flex align-items-center" role="alert">
                        <div class="bg-danger me-3 icon-item"><span class="fas fa-times-circle text-white fs-3"></span>
                        </div>
                        <p class="mb-0 flex-1">
                            <?PHP
                                        echo $_SESSION['message'];
                                        unset($_SESSION['message']);
                                        ?>
                        </p><button class="btn-close" type="button" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                    <?PHP }
                    ?>
                    
                    <div id="alertContainer"></div>

                    <h2 class="text-center text-dark ">FIRETRACK</h2>

                    <div class="mb-3">
                            <input type="text" class="form-control" id="fullName" placeholder="Full Name" required>
                        </div>
                        <div class="mb-3">
                            <input type="text" class="form-control" id="address" placeholder="Address" required>
                        </div>
                        <div class="mb-3">
                            <input type="tel" class="form-control" id="contact" 
                                   placeholder="Contact Number" maxlength="10" required>
                            <!-- <small class="contact-message"></small> -->
                        </div>
                        <div class="mb-3">
                            <input type="email" class="form-control" id="email" placeholder="Email" required>
                        </div>
                        <div class="mb-3 position-relative">
                            <input type="password" class="form-control" id="password" placeholder="Password" required>
                            <i class="fas fa-eye-slash password-toggle" data-target="password"></i>
                        </div>
                        <div class="mb-3 position-relative">
                            <input type="password" class="form-control" id="confirmPassword" placeholder="Confirm Password" required>
                            <i class="fas fa-eye-slash password-toggle" data-target="confirmPassword"></i>
                        </div>
                        <div class="text-center">
                            <button type="submit" class="btn btn-color px-5 mb-3 w-100">Sign Up</button>
                        </div>
                        <div class="form-text text-center text-dark">
                            Already have an account? <a href="index.php" class="text-dark fw-bold">Login Here</a>
                        </div>
                </form>

            </div>

        </div>
    </div>
</div>
</body>
<script src="./singup.js"></script>

<script>
    document.addEventListener('DOMContentLoaded', function() {
    const signupForm = document.getElementById('signupForm');
    const emailInput = document.getElementById('email');
    const passwordInput = document.getElementById('password');
    const confirmPasswordInput = document.getElementById('confirmPassword');
    const alertContainer = document.getElementById('alertContainer');
    const passwordMatchText = document.querySelector('.password-match-text');

    // Email validation function
    function isValidEmail(email) {
        const emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
        return emailRegex.test(email);
    }

    // Password validation function
    function isValidPassword(password) {
        return password.length >= 8;
    }

    // Show message function
    function showMessage(messages, type) {
        const alertHTML = messages.map(message => `
            <div class="alert alert-${type} d-flex align-items-center fade show" role="alert">
                <i class="fas fa-${type === 'success' ? 'check' : 'exclamation'}-circle me-2"></i>
                ${message}
            </div>
        `).join('');
        
        alertContainer.innerHTML = alertHTML;

        // Remove messages after 2 seconds
        setTimeout(() => {
            const alerts = alertContainer.querySelectorAll('.alert');
            alerts.forEach(alert => {
                alert.classList.add('fade-out');
            });
            
            // Clear container after fade animation
            setTimeout(() => {
                alertContainer.innerHTML = '';
            }, 300); // matches the CSS animation duration
        }, 2000);
    }

    // Real-time email validation
    emailInput.addEventListener('input', function() {
        if (this.value) {
            if (!isValidEmail(this.value)) {
                this.classList.add('is-invalid');
                this.classList.remove('is-valid');
            } else {
                this.classList.remove('is-invalid');
                this.classList.add('is-valid');
            }
        } else {
            this.classList.remove('is-invalid', 'is-valid');
            alertContainer.innerHTML = '';
        }
    });

    // Real-time password validation
    passwordInput.addEventListener('input', function() {
        if (this.value) {
            if (!isValidPassword(this.value)) {
                this.classList.add('is-invalid');
                this.classList.remove('is-valid');
            } else {
                this.classList.remove('is-invalid');
                this.classList.add('is-valid');
            }
        } else {
            this.classList.remove('is-invalid', 'is-valid');
            alertContainer.innerHTML = '';
        }
    });

    // Real-time password match checking
    confirmPasswordInput.addEventListener('input', function() {
        if (this.value) {
            if (this.value === passwordInput.value) {
                passwordMatchText.textContent = 'Passwords match!';
                passwordMatchText.style.color = '#198754'; // green color
                this.classList.add('is-valid');
                this.classList.remove('is-invalid');
            } else {
                passwordMatchText.textContent = 'Passwords do not match';
                passwordMatchText.style.color = '#dc3545';
                this.classList.add('is-invalid');
                this.classList.remove('is-valid');
            }
        } else {
            passwordMatchText.textContent = '';
            this.classList.remove('is-valid', 'is-invalid');
        }
    });

    // Password Toggle Functionality
    const passwordToggles = document.querySelectorAll('.password-toggle');
    
    passwordToggles.forEach(toggle => {
        toggle.addEventListener('click', function() {
            const targetId = this.getAttribute('data-target');
            const passwordField = document.getElementById(targetId);
            
            if (passwordField.type === 'password') {
                passwordField.type = 'text';
                this.classList.remove('fa-eye-slash');
                this.classList.add('fa-eye');
            } else {
                passwordField.type = 'password';
                this.classList.remove('fa-eye');
                this.classList.add('fa-eye-slash');
            }
        });
    });

    // Contact number input restriction (only numbers)
    const contactInput = document.getElementById('contact');
    contactInput.addEventListener('input', function(e) {
        this.value = this.value.replace(/[^0-9]/g, '');
    });

    // Form submission handling
    signupForm.addEventListener('submit', function(e) {
        console.log("Submit");
        e.preventDefault();
        let isValid = true;
        const errors = [];

        // Reset previous errors
        alertContainer.innerHTML = '';
        document.querySelectorAll('.form-control').forEach(input => {
            input.classList.remove('is-invalid', 'is-valid');
        });

        // Contact validation
        const contact = contactInput.value;
        if (!contact) {
            isValid = false;
            contactInput.classList.add('is-invalid');
            errors.push('Contact number is required');
        } else if (contact.length !== 10) {
            isValid = false;
            contactInput.classList.add('is-invalid');
            errors.push('Contact number must be 10 digits');
        } else {
            contactInput.classList.add('is-valid');
        }

        // Password match validation
        if (passwordInput.value !== confirmPasswordInput.value) {
            isValid = false;
            confirmPasswordInput.classList.add('is-invalid');
            errors.push('Passwords do not match');
        }

        // Show messages based on validation
        if (!isValid) {
            showMessage(errors, 'danger');
        } else {
            showMessage(['Form submitted successfully!'], 'success');
            // You can add your form submission code here
            // signupForm.submit();
        }
    });

    // Add these styles to your CSS
    const style = document.createElement('style');
    style.textContent = `
        .is-invalid {
            border-color: #dc3545 !important;
            background-image: url("data:image/svg+xml,%3csvg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 12 12' width='12' height='12' fill='none' stroke='%23dc3545'%3e%3ccircle cx='6' cy='6' r='4.5'/%3e%3cpath stroke-linejoin='round' d='M5.8 3.6h.4L6 6.5z'/%3e%3ccircle cx='6' cy='8.2' r='.6' fill='%23dc3545' stroke='none'/%3e%3c/svg%3e");
            background-repeat: no-repeat;
            background-position: right calc(0.375em + 0.1875rem) center;
            background-size: calc(0.75em + 0.375rem) calc(0.75em + 0.375rem);
        }
    `;
    document.head.appendChild(style);
});
</script>

</html>


<?php } ?>