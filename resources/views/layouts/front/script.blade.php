<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>


<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js"
    integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous">
</script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js"
    integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous">
</script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-toast-plugin/1.3.2/jquery.toast.min.js"
    integrity="sha512-zlWWyZq71UMApAjih4WkaRpikgY9Bz1oXIW5G0fED4vk14JjGlQ1UmkGM392jEULP8jbNMiwLWdM8Z87Hu88Fw=="
    crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script src="https://js.stripe.com/v3/"></script>


<script>
    $(document).ready(function() {
        $('.increment').click(function() {
            var counter = $(this).parent().find('.count');
            var count = parseInt(counter.text()) || 0;
            count++;
            counter.text(count);
            $('#quantity').attr('value', count); // Update hidden input field
        });

        $('.decrement').click(function() {
            var counter = $(this).parent().find('.count');
            var count = parseInt(counter.text()) || 0;

            if (count > 1) {
                count--;
            } else {
                count = 1; // Ensure it doesn't go below 1
            }

            counter.text(count);
            $('#quantity').attr('value', count); // Update hidden input field
        });
    })
</script>

<script>
    $(document).ready(function() {
        $('.addToCart').click(function(e) {

            e.preventDefault();

            var productId = $(this).data('product-id');

            $.ajax({
                url: "{{ route('save_cart') }}",
                method: 'POST',
                data: {
                    _token: '{{ csrf_token() }}', // Include the CSRF token
                    product_id: productId,
                    quantity: 1 // Default quantity to 1, you can adjust this if needed
                },

                success: function(response) {
                    if (response.errors) {
                        // Handle errors (if any)
                        alert('Error: ' + response.errors);
                    } else {
                        // Show success message or update the cart UI
                        alert('Product added to cart!');
                        location.reload();
                        // Optionally, update the cart icon count or reload part of the page
                    }
                },
                error: function(response) {
                    alert('An error occurred while adding the product to the cart.');
                }
            });
        });
    });
</script>


<script>

    $('#accordion .btn-link').on('click', function(e) {
        if (!$(this).hasClass('collapsed')) {
            e.stopPropagation();
        }
        $('#payment_method').val($(this).attr('data-payment'));
    });

    var stripe = Stripe('{{ env('STRIPE_KEY') }}');

    // Create an instance of Elements.
    var elements = stripe.elements();
    var style = {
        base: {
            color: '#32325d',
            lineHeight: '18px',
            fontFamily: '"Helvetica Neue", Helvetica, sans-serif',
            fontSmoothing: 'antialiased',
            fontSize: '16px',
            '::placeholder': {
                color: '#aab7c4'
            }
        },
        invalid: {
            color: '#fa755a',
            iconColor: '#fa755a'
        }
    };
    var card = elements.create('card', {
        style: style
    });
    card.mount('#card-element');

    card.addEventListener('change', function(event) {
        var displayError = document.getElementById('card-errors');
        if (event.error) {
            $(displayError).show();
            displayError.textContent = event.error.message;
        } else {
            $(displayError).hide();
            displayError.textContent = '';
        }
    });

    var form = document.getElementById('order-place');

    $('#stripe-submit').click(function() {
        stripe.createToken(card).then(function(result) {
            var errorCount = checkEmptyFileds();
            if ((result.error) || (errorCount == 1)) {
                // Inform the user if there was an error.
                if (result.error) {
                    var errorElement = document.getElementById('card-errors');
                    $(errorElement).show();
                    errorElement.textContent = result.error.message;
                } else {
                    $.toast({
                        heading: 'Alert!',
                        position: 'bottom-right',
                        text: 'Please fill the required fields before proceeding to pay',
                        loaderBg: '#ff6849',
                        icon: 'error',
                        hideAfter: 5000,
                        stack: 6
                    });
                }
            } else {
                // Send the token to your server.
                stripeTokenHandler(result.token);
            }
        });
    });

    function stripeTokenHandler(token) {
        // Insert the token ID into the form so it gets submitted to the server
        var form = document.getElementById('order-place');
        var hiddenInput = document.createElement('input');
        hiddenInput.setAttribute('type', 'hidden');
        hiddenInput.setAttribute('name', 'stripeToken');
        hiddenInput.setAttribute('value', token.id);
        form.appendChild(hiddenInput);
        form.submit();
    }


    function checkEmptyFileds() {
        var errorCount = 0;
        $('form#order-place').find('.form-control').each(function() {
            if ($(this).prop('required')) {
                if (!$(this).val()) {
                    $(this).parent().find('.invalid-feedback').addClass('d-block');
                    $(this).parent().find('.invalid-feedback strong').html('Field is Required');
                    errorCount = 1;
                }
            }
        });
        return errorCount;
    }

    $('.bttn').on('change', function() {
        var count = 0;
        if ($(this).prop("checked") == true) {
            if ($('#f-name').val() == "") {
                $('.fname').text('first name is required field');
            } else {
                $('.fname').text("");
                count++;
            }
            if ($('#l-name').val() == "") {
                $('.lname').text('last name is required field');
            } else {
                $('.lname').text("");
                count++;
            }

            if (count == 2) {
                $('#paypal-button-container-popup').show();
            } else {
                $(this).prop("checked", false);

                $.toast({
                    heading: 'Alert!',
                    position: 'bottom-right',
                    text: 'Please fill the required fields before proceeding to pay',
                    loaderBg: '#ff6849',
                    icon: 'error',
                    hideAfter: 5000,
                    stack: 6
                });

                return false;

            }

        } else {
            $('#paypal-button-container-popup').hide();
            // $('.btn').show();
        }

        $('input[name="' + this.name + '"]').not(this).prop('checked', false);
        //$(this).siblings('input[type="checkbox"]').prop('checked', false);
    });
</script>
