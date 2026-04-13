function initSubmitContact() {
    $('#contactForm').on('submit', function (event) {
        event.preventDefault();

        var $email = $('#email');
        var $successMessage = $('#success-message');
        var $errorMessage = $('#error-message');

        function validateEmail(email) {
            var pattern = /^[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}$/;
            return pattern.test(email);
        }

        if (!validateEmail($email.val())) {
            $errorMessage.removeClass('hidden');
            $successMessage.addClass('hidden');

            setTimeout(function () {
                $errorMessage.addClass('hidden');
            }, 3000);

            return;
        } else {
            $errorMessage.addClass('hidden');
            $successMessage.removeClass('hidden');
            $('#contactForm')[0].reset();

            setTimeout(function () {
                $successMessage.addClass('hidden');
            }, 3000);
        }
    });
}

function initSubmitNewsletter() {
    $('#newsletterForm').on('submit', function (event) {
        event.preventDefault();

        var $form = $(this);

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

        if (!isValid) {
            $errorMessage.removeClass('hidden');
            setTimeout(function () {
                $errorMessage.addClass('hidden');
            }, 3000);
            return;
        }

        $.ajax({
            url: $form.attr('action'),
            method: 'POST',
            data: $form.serialize(),
            success: function () {
                $errorMessage.addClass('hidden');
                $successMessage.removeClass('hidden');
                $form[0].reset();
                $errorText.addClass('hidden').text('');

                setTimeout(function () {
                    $successMessage.addClass('hidden');
                }, 3000);
            },
            error: function (xhr) {
                var message = 'Oops! Form submission failed. Please try again.';

                if (xhr.responseJSON && xhr.responseJSON.message) {
                    message = xhr.responseJSON.message;
                }

                $successMessage.addClass('hidden');
                $errorMessage.removeClass('hidden');
                $errorMessage.find('p').text(message);

                setTimeout(function () {
                    $errorMessage.addClass('hidden');
                }, 3000);
            }
        });
    });
}
