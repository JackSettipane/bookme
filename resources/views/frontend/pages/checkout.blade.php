@extends('frontend.app') @section('content')
<section class="section pb-5">
	<div class="container">
		<div class="row">
			<div class="col-md-4 order-md-2 mb-4">
				<h4 class="d-flex justify-content-between align-items-center mb-3">

					<span class="text-muted">New request for {{$celebrity->full_name}}</span>

				</h4>
				<div class="text-sm-center"> <img src="{{url('/assets/theme/images/celebrities/angelina-jolie.jpg')}}" alt="" class="single-image-celebrity d-block img-fluid img-thumbnail mx-md-auto rounded-circle"> </div>
			</div>
			<div class="col-md-8 order-md-1">
				<form class="needs-validation" action="{{route('payment.square')}}" novalidate="" id="payment-form">
					<h4 class="mb-3">Payment</h4>
					<div class="d-block my-3">
						<div class="custom-control custom-radio">
							<input id="credit" name="paymentMethod" type="radio" value="square" class="custom-control-input" checked="" required="">
							<label class="custom-control-label" for="credit">Credit card</label>
						</div>
						<div class="custom-control custom-radio">
							<input id="paypal" name="paymentMethod" type="radio" value="paypal" class="custom-control-input" required="">
							<label class="custom-control-label" for="paypal">Paypal</label>
						</div>
					</div>

					<div class="row" data-payment="paypal">
						<div class="col-md-6 mb-3">
							payment gatway
						</div>
					</div>

					<div class="row" data-payment="square">
						<div class="col-md-6 mb-3" data-field="cardNumber">
							<label for="sq-card-number">Credit card number</label>
							<input type="text" class="form-control" id="sq-card-number" placeholder="" required="">
							<div class="invalid-feedback"> </div>
						</div>
						<div class="col-md-3 mb-3" data-field="expirationDate">
							<label for="sq-expiration-date">Expiration</label>
							<input type="text" class="form-control" id="sq-expiration-date" placeholder="" required="">
							<div class="invalid-feedback"> </div>
						</div>
					</div>
					<div class="row" data-payment="square">
						<div class="col-md-3 mb-3" data-field="cvv">
							<label for="sq-cvv">CVV</label>
							<input type="text" class="form-control" id="sq-cvv" placeholder="" required="">
							<div class="invalid-feedback"> </div>
						</div>
						<div class="col-md-3 mb-3" data-field="postalCode">
							<label for="sq-postal-code">Postal Code</label>
							<input type="text" class="form-control" id="sq-postal-code" placeholder="" required="">
							<div class="invalid-feedback"> </div>
						</div>
					</div>

					<hr class="mb-4">
					<button class="btn btn-primary btn-lg btn-block" type="submit" onclick="onGetCardNonce(event)">
						<div class="loader"></div>
						<span>Bookable $50</span>
					</button>
				</form>
			</div>
		</div>
	</div>
</section>
<script src="https://js.squareupsandbox.com/v2/paymentform"></script>
<script>
	const paymentForm = new SqPaymentForm({
		// Initialize the payment form elements
		//Replace with your application ID or sandbox application Id for testing
		applicationId: "sandbox-sq0idb-osTB4y6n7-AXcbmfvBp19w",
		inputClass: 'sq-input',
		autoBuild: false,
		// Customize the CSS for SqPaymentForm iframe elements
		inputStyles: [{
			fontSize: '16px',
			lineHeight: '24px',
			padding: '0',
			placeholderColor: '#a0a0a0',
			backgroundColor: 'transparent',
		}],
		// Initialize the credit card placeholders
		cardNumber: {
			elementId: 'sq-card-number',
			placeholder: 'Card Number'
		},
		cvv: {
			elementId: 'sq-cvv',
			placeholder: 'CVV'
		},
		expirationDate: {
			elementId: 'sq-expiration-date',
			placeholder: 'MM/YY'
		},
		postalCode: {
			elementId: 'sq-postal-code',
			placeholder: 'Postal'
		},
		// SqPaymentForm callback functions
		callbacks: {
			/*
			 * callback function: cardNonceResponseReceived
			 * Triggered when: SqPaymentForm completes a card nonce request
			 */
			cardNonceResponseReceived: function(errors, nonce, cardData) {


				jQuery('[data-field]').find('.invalid-feedback').html('').hide()
				if (errors) {
					// Log errors from nonce generation to the browser developer console.
					//console.error('Encountered errors:');
					errors.forEach(function(error) {
						console.log(error)
						jQuery('[data-field="' + error.field + '"]').find('.invalid-feedback').html(error.message).show()
						//console.error(' Zc ' + error.message);
					});
					//alert('Encountered errors, check browser developer console for more details');
					return;
				}
				//TODO: Replace alert with code in step 2.1
				requestPaymentForm('square', nonce);
			}
		}
	});
	paymentForm.build();
	// onGetCardNonce is triggered when the "Pay $1.00" button is clicked
	function onGetCardNonce(event) {
		// Don't submit the form until SqPaymentForm returns with a nonce
		event.preventDefault();
		// Request a nonce from the SqPaymentForm object
		paymentForm.requestCardNonce();
	}

	function requestPaymentForm(paymentType, nonce) {


		jQuery('[type="submit"]').addClass('disabled');


		$.post("{{route('payment.square.ajax')}}", {
			"_token": "{{ csrf_token() }}",
			nonce: nonce,
			paymentType: paymentType
		}, function(data, status) {
			console.log(data);
			jQuery('#payment-form').after('<div class="payment-msg">' + data.message + '</div>');
			jQuery('.payment-msg').addClass('pm-success')
			jQuery('[type="submit"]').removeClass('disabled');

			setTimeout(function() {
				jQuery('.payment-msg').slideUp();
				setTimeout(function() {
					window.location = '{{url("/")}}/booking/{key}'
				}, 1000)

			}, 5000)

		});
	}
</script> @endsection
