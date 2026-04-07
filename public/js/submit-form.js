function initSubmitContact() {
    $('#contactForm').on('submit', function (event) {
        event.preventDefault();

        var $form = $(this);
        var $successMessage = $('#success-message');
        var $errorMessage = $('#error-message');
        var $submitBtn = $form.find('button[type="submit"]');
        var originalBtnText = $submitBtn.html();

        // Validation
        var firstName = $('#first_name').val().trim();
        var lastName = $('#last_name').val().trim();
        var email = $('#email').val().trim();
        var phone = $('#phone').val().trim();
        var countryCode = $('#country_code').val();

        function validateEmail(email) {
            var pattern = /^[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}$/;
            return pattern.test(email);
        }

        function validatePhone(phone) {
            var pattern = /^[0-9\-\+\(\)\s]{7,}$/;
            return pattern.test(phone);
        }

        // Reset messages
        $errorMessage.addClass('hidden');
        $successMessage.addClass('hidden');

        // Validate required fields
        if (!firstName) {
            showError('First name is required.');
            return;
        }
        if (!lastName) {
            showError('Last name is required.');
            return;
        }
        if (!email || !validateEmail(email)) {
            showError('Valid email address is required.');
            return;
        }
        if (!phone || !validatePhone(phone)) {
            showError('Valid phone number is required.');
            return;
        }
        if (!countryCode) {
            showError('Country code is required.');
            return;
        }

        // Submit form via AJAX
        $submitBtn.prop('disabled', true).html('<span class="btn-title"><span>Sending...</span></span>');

        $.ajax({
            url: $form.attr('action'),
            type: 'POST',
            data: $form.serialize(),
            headers: {
                'X-Requested-With': 'XMLHttpRequest'
            },
            success: function (response) {
                if (response.success) {
                    showSuccess(response.message);
                    $form[0].reset();
                } else {
                    showError(response.message || 'An error occurred. Please try again.');
                }
            },
            error: function (xhr, status, error) {
                var message = 'An error occurred. Please try again.';
                if (xhr.responseJSON && xhr.responseJSON.message) {
                    message = xhr.responseJSON.message;
                }
                showError(message);
            },
            complete: function () {
                $submitBtn.prop('disabled', false).html(originalBtnText);
            }
        });

        function showError(msg) {
            var $errorText = $errorMessage.find('p');
            if ($errorText.length) {
                $errorText.text(msg);
            }
            $errorMessage.removeClass('hidden');
            setTimeout(function () {
                $errorMessage.addClass('hidden');
            }, 5000);
        }

        function showSuccess(msg) {
            var $successText = $successMessage.find('p');
            if ($successText.length) {
                $successText.text(msg);
            }
            $successMessage.removeClass('hidden');
            setTimeout(function () {
                $successMessage.addClass('hidden');
            }, 5000);
        }
    });
}

function initSubmitNewsletter() {
    $('#newsletterForm').on('submit', function(event) {
        event.preventDefault();

        var $email = $('#newsletter-email');
        var $successMessage = $('#newsletter-success');
        var $errorMessage = $('#newsletter-error');
        var $errorText = $email.next('.error-text');

        var isValid = true;

        function validateEmail(email) {
            var pattern = /^[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}$/;
            return pattern.test(email);
        }

        if (!$email.val().trim()) {
            $email.addClass('error-border');
            $errorText.removeClass('hidden').text('This field is required');
            isValid = false;
        } else if (!validateEmail($email.val())) {
            $email.addClass('error-border');
            $errorText.text('Invalid email format').removeClass('hidden');
            isValid = false;
        } else {
            $email.removeClass('error-border');
            $errorText.addClass('hidden');
        }

        if (isValid) {
            $successMessage.removeClass('hidden');
            $('#newsletterForm')[0].reset();
            setTimeout(function() {
                $successMessage.addClass('hidden');
            }, 3000);
        } else {
            $errorMessage.removeClass('hidden');
            $('#newsletterForm')[0].reset();
            setTimeout(function() {
                $errorMessage.addClass('hidden');
            }, 3000);
        }
    });
}