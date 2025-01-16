<div class="container">
    <!-- Google reCAPTCHA Script einfügen -->
    <script src="https://www.google.com/recaptcha/api.js" async defer></script>

    <!-- JavaScript zur Validierung von reCAPTCHA -->
    <script>
      function validateRecaptcha() {
        var response = grecaptcha.getResponse();
        var captchaWidget = document.querySelector('.g-recaptcha');

        if (response.length === 0) {
          // reCAPTCHA nicht ausgefüllt → Roter Rahmen
          captchaWidget.style.border = '2px solid red';
          alert("Bitte bestätigen Sie, dass Sie kein Roboter sind.");
          return false; // Verhindert das Absenden des Formulars
        } else {
          // reCAPTCHA ausgefüllt → Rahmen entfernen
          captchaWidget.style.border = 'none';
          return true;
        }
      }
    </script>

    <!-- Registrierungsformular mit reCAPTCHA -->
    <form action="<?php echo Config::get('URL'); ?>register/register_action" method="post" onsubmit="return validateRecaptcha()">
        <?php $this->renderFeedbackMessages(); ?>

        <div class="login-box" style="width: 50%; display: block;">
            <h2>Register a new account</h2>

            <!-- Benutzername -->
            <input type="text" pattern="[a-zA-Z0-9]{2,64}" name="user_name" placeholder="Username (letters/numbers, 2-64 chars)" required class="input-field" />

            <!-- E-Mail -->
            <input type="email" name="user_email" placeholder="Email address" required
                   style="font-family: Arial, sans-serif; color: #252525; background-color: #ffffff; padding: 15px 20px; margin-bottom: 10px; display: block; width: 100%; box-sizing: border-box;" />

            <input type="email" name="user_email_repeat" placeholder="Repeat email address" required
                   style="font-family: Arial, sans-serif; color: #252525; background-color: #ffffff; padding: 15px 20px; margin-bottom: 10px; display: block; width: 100%; box-sizing: border-box;" />


            <!-- Passwort -->
            <input type="password" name="user_password_new" pattern=".{6,}" placeholder="Password (6+ characters)" required autocomplete="off" class="input-field" />
            <input type="password" name="user_password_repeat" pattern=".{6,}" placeholder="Repeat your password" required autocomplete="off" class="input-field" />

            <!-- Google reCAPTCHA Widget -->
            <div class="g-recaptcha" data-sitekey="6LcAUrkqAAAAAGrsGONLVGDcmhW6QmrviLJsthgQ"></div>

            <!-- Absenden -->
            <input type="submit" value="Register" />
        </div>
    </form>
</div>
