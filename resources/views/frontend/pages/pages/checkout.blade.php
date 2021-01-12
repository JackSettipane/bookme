@extends('frontend.app')







@section('content')


<section class="section pb-5">

    <div class="container">

        <div class="row">

            <div class="col-md-4 order-md-2 mb-4">

              <h4 class="d-flex justify-content-between align-items-center mb-3">

                <span class="text-muted">New request for Angelina Jolie</span>

              </h4>

              <div class="text-sm-center">

                <img src="{{url('/assets/theme/images/celebrities/angelina-jolie.jpg')}}" alt="" class="single-image-celebrity d-block img-fluid img-thumbnail mx-md-auto rounded-circle">

              </div>

            </div>

            <div class="col-md-8 order-md-1">

            <form class="needs-validation" action="{{route('payment.square')}}" novalidate="">



                <h4 class="mb-3">Payment</h4>



                <div class="d-block my-3">

                  <div class="custom-control custom-radio">

                    <input id="credit" name="paymentMethod" type="radio" class="custom-control-input" checked="" required="">

                    <label class="custom-control-label" for="credit">Credit card</label>

                  </div>



                  <div class="custom-control custom-radio">

                    <input id="paypal" name="paymentMethod" type="radio" class="custom-control-input" required="">

                    <label class="custom-control-label" for="paypal">Paypal</label>

                  </div>

                </div>

                <div class="row">

                  <div class="col-md-6 mb-3">

                    <label for="cc-name">Name on card</label>

                    <input type="text" class="form-control" id="cc-name" placeholder="" required="">

                    <small class="text-muted">Full name as displayed on card</small>

                    <div class="invalid-feedback">

                      Name on card is required

                    </div>

                  </div>

                  <div class="col-md-6 mb-3">

                    <label for="cc-number">Credit card number</label>

                    <input type="text" class="form-control" id="cc-number" placeholder="" required="">

                    <div class="invalid-feedback">

                      Credit card number is required

                    </div>

                  </div>

                </div>

                <div class="row">

                  <div class="col-md-3 mb-3">

                    <label for="cc-expiration">Expiration</label>

                    <input type="text" class="form-control" id="cc-expiration" placeholder="" required="">

                    <div class="invalid-feedback">

                      Expiration date required

                    </div>

                  </div>

                  <div class="col-md-3 mb-3">

                    <label for="cc-expiration">CVV</label>

                    <input type="text" class="form-control" id="cc-cvv" placeholder="" required="">

                    <div class="invalid-feedback">

                      Security code required

                    </div>

                  </div>

                </div>

                <hr class="mb-4">

                <button class="btn btn-primary btn-lg btn-block" type="submit">Bookable $50</button>

              </form>

            </div>

          </div>

    </div>

</section>

@endsection
