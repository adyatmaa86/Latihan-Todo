/**
 * ============================================================
 * Custom Auth JavaScript
 * Toggle password visibility dan validasi form
 * ============================================================
 */

document.addEventListener('DOMContentLoaded', function () {

    // ============================================================
    // Toggle Password Visibility - Login & Register
    // ============================================================
    const togglePassword = document.getElementById('togglePassword');
    const inputPassword = document.getElementById('inputPassword');
    const iconPassword = document.getElementById('iconPassword');

    if (togglePassword && inputPassword && iconPassword) {
        togglePassword.addEventListener('click', function () {
            if (inputPassword.type === 'password') {
                inputPassword.type = 'text';
                iconPassword.classList.remove('bi-lock-fill');
                iconPassword.classList.add('bi-unlock-fill');
            } else {
                inputPassword.type = 'password';
                iconPassword.classList.remove('bi-unlock-fill');
                iconPassword.classList.add('bi-lock-fill');
            }
        });
    }

    // ============================================================
    // Toggle Confirm Password Visibility - Register
    // ============================================================
    const togglePasswordConfirm = document.getElementById('togglePasswordConfirm');
    const inputPasswordConfirm = document.getElementById('inputPasswordConfirm');
    const iconPasswordConfirm = document.getElementById('iconPasswordConfirm');

    if (togglePasswordConfirm && inputPasswordConfirm && iconPasswordConfirm) {
        togglePasswordConfirm.addEventListener('click', function () {
            if (inputPasswordConfirm.type === 'password') {
                inputPasswordConfirm.type = 'text';
                iconPasswordConfirm.classList.remove('bi-lock-fill');
                iconPasswordConfirm.classList.add('bi-unlock-fill');
            } else {
                inputPasswordConfirm.type = 'password';
                iconPasswordConfirm.classList.remove('bi-unlock-fill');
                iconPasswordConfirm.classList.add('bi-lock-fill');
            }
        });
    }

    // ============================================================
    // Auto dismiss alerts after 5 seconds
    // ============================================================
    const alerts = document.querySelectorAll('.alert');
    alerts.forEach(function (alert) {
        setTimeout(function () {
            const bsAlert = bootstrap.Alert.getOrCreateInstance(alert);
            bsAlert.close();
        }, 5000);
    });

});
