<div class="row">

    <div class="col-lg-8">
        {{--
        <form action="#">
            <div class="row">
                <div class="col-lg-6 form-group">
                    <label class="text-small text-uppercase" for="firstName">First name</label>
                    <input class="form-control form-control-lg" id="firstName" type="text" placeholder="Enter your first name">
                </div>
                <div class="col-lg-6 form-group">
                    <label class="text-small text-uppercase" for="lastName">Last name</label>
                    <input class="form-control form-control-lg" id="lastName" type="text" placeholder="Enter your last name">
                </div>
                <div class="col-lg-6 form-group">
                    <label class="text-small text-uppercase" for="email">Email address</label>
                    <input class="form-control form-control-lg" id="email" type="email" placeholder="e.g. Jason@example.com">
                </div>
                <div class="col-lg-6 form-group">
                    <label class="text-small text-uppercase" for="phone">Phone number</label>
                    <input class="form-control form-control-lg" id="phone" type="tel" placeholder="e.g. +02 245354745">
                </div>
                <div class="col-lg-6 form-group">
                    <label class="text-small text-uppercase" for="company">Company name (optional)</label>
                    <input class="form-control form-control-lg" id="company" type="text" placeholder="Your company name">
                </div>
                <div class="col-lg-6 form-group">
                    <label class="text-small text-uppercase" for="country">Country</label>
                    <select class="selectpicker country" id="country" data-width="fit" data-style="form-control form-control-lg" data-title="Select your country"></select>
                </div>
                <div class="col-lg-12 form-group">
                    <label class="text-small text-uppercase" for="address">Address line 1</label>
                    <input class="form-control form-control-lg" id="address" type="text" placeholder="House number and street name">
                </div>
                <div class="col-lg-12 form-group">
                    <label class="text-small text-uppercase" for="address">Address line 2</label>
                    <input class="form-control form-control-lg" id="addressalt" type="text" placeholder="Apartment, Suite, Unit, etc (optional)">
                </div>
                <div class="col-lg-6 form-group">
                    <label class="text-small text-uppercase" for="city">Town/City</label>
                    <input class="form-control form-control-lg" id="city" type="text">
                </div>
                <div class="col-lg-6 form-group">
                    <label class="text-small text-uppercase" for="state">State/County</label>
                    <input class="form-control form-control-lg" id="state" type="text">
                </div>
                <div class="col-lg-6 form-group">
                    <div class="custom-control custom-checkbox">
                        <input class="custom-control-input" id="alternateAddressCheckbox" type="checkbox">
                        <label class="custom-control-label text-small" for="alternateAddressCheckbox">Alternate billing address</label>
                    </div>
                </div>
                <div class="col-lg-12">
                    <div class="row d-none" id="alternateAddress">
                        <div class="col-12 mt-4">
                            <h2 class="h4 text-uppercase mb-4">Alternative billing details</h2>
                        </div>
                        <div class="col-lg-6 form-group">
                            <label class="text-small text-uppercase" for="firstName2">First name</label>
                            <input class="form-control form-control-lg" id="firstName2" type="text" placeholder="Enter your first name">
                        </div>
                        <div class="col-lg-6 form-group">
                            <label class="text-small text-uppercase" for="lastName2">Last name</label>
                            <input class="form-control form-control-lg" id="lastName2" type="text" placeholder="Enter your last name">
                        </div>
                        <div class="col-lg-6 form-group">
                            <label class="text-small text-uppercase" for="email2">Email address</label>
                            <input class="form-control form-control-lg" id="email2" type="email" placeholder="e.g. Jason@example.com">
                        </div>
                        <div class="col-lg-6 form-group">
                            <label class="text-small text-uppercase" for="phone2">Phone number</label>
                            <input class="form-control form-control-lg" id="phone2" type="tel" placeholder="e.g. +02 245354745">
                        </div>
                        <div class="col-lg-6 form-group">
                            <label class="text-small text-uppercase" for="company2">Company name (optional)</label>
                            <input class="form-control form-control-lg" id="company2" type="text" placeholder="Your company name">
                        </div>
                        <div class="col-lg-6 form-group">
                            <label class="text-small text-uppercase" for="country2">Country</label>
                            <select class="selectpicker country" id="country2" data-width="fit" data-style="form-control form-control-lg" data-title="Select your country"></select>
                        </div>
                        <div class="col-lg-12 form-group">
                            <label class="text-small text-uppercase" for="address2">Address line 1</label>
                            <input class="form-control form-control-lg" id="address2" type="text" placeholder="House number and street name">
                        </div>
                        <div class="col-lg-12 form-group">
                            <label class="text-small text-uppercase" for="address2">Address line 2</label>
                            <input class="form-control form-control-lg" id="addressalt2" type="text" placeholder="Apartment, Suite, Unit, etc (optional)">
                        </div>
                        <div class="col-lg-6 form-group">
                            <label class="text-small text-uppercase" for="city3">Town/City</label>
                            <input class="form-control form-control-lg" id="city3" type="text">
                        </div>
                        <div class="col-lg-6 form-group">
                            <label class="text-small text-uppercase" for="state4">State/County</label>
                            <input class="form-control form-control-lg" id="state4" type="text">
                        </div>
                    </div>
                </div>
                <div class="col-lg-12 form-group">
                    <button class="btn btn-dark" type="submit">Place order</button>
                </div>
            </div>
        </form>
        --}}
        <h2 class="h5 text-uppercase mb-4">Sipping addresses</h2>
        <div class="row">
            @forelse($addresses as $address)
                <div class="col-6 form-group">
                    <div class="custom-control custom-radio">
                        <input
                                type="radio"
                                id="address-{{ $address->id }}"
                                class="custom-control-input"
                                wire:model="customer_address_id"
                                wire:click="updateShippingCompanies()"
                                {{ intval($customer_address_id) == $address->id ? 'checked' : '' }}
                                value="{{ $address->id }}">
                        <label for="address-{{ $address->id }}" class="custom-control-label text-small">
                            <b>{{ $address->address_title }}</b>
                            <small>
                                {{ $address->address }}<br>
                                {{ $address->country->name }} - {{ $address->state->name }} - {{ $address->city->name }}
                            </small>
                        </label>
                    </div>
                </div>

            @empty
                <p>No addresses found</p>
                <a href="#">Add an address</a>
            @endforelse
        </div>

        @if ($customer_address_id != 0)
            <h2 class="h5 text-uppercase mb-4">Sipping way</h2>
            <div class="row">
                @forelse($shipping_companies as $shipping_company)
                    <div class="col-6 form-group">
                        <div class="custom-control custom-radio">
                            <input
                                    type="radio"
                                    id="shipping-company-{{ $shipping_company->id }}"
                                    class="custom-control-input"
                                    wire:model="shipping_company_id"
                                    wire:click="updateShippingCost()"
                                    {{ intval($shipping_company_id) == $shipping_company->id ? 'checked' : '' }}
                                    value="{{ $shipping_company->id }}">
                            <label for="shipping-company-{{ $shipping_company->id }}" class="custom-control-label text-small">
                                <b>{{ $shipping_company->name }}</b>
                                <small>
                                    {{ $shipping_company->description }} - (${{ $shipping_company->cost }})
                                </small>
                            </label>
                        </div>
                    </div>

                @empty
                    <p>No shipping companies found</p>
                @endforelse
            </div>
        @endif


        @if ($customer_address_id != 0 && $shipping_company_id != 0)
            <h2 class="h5 text-uppercase mb-4">Payment way</h2>
            <div class="row">
                @forelse($payment_methods as $payment_method)
                    <div class="col-6 form-group">
                        <div class="custom-control custom-radio">
                            <input
                                    type="radio"
                                    id="payment-method-{{ $payment_method->id }}"
                                    class="custom-control-input"
                                    wire:model="payment_method_id"
                                    wire:click="updatePaymentMethod()"
                                    {{ intval($payment_method_id) == $payment_method->id ? 'checked' : '' }}
                                    value="{{ $payment_method->id }}">
                            <label for="payment-method-{{ $payment_method->id }}" class="custom-control-label text-small">
                                <b>{{ $payment_method->name }}</b>
                            </label>
                        </div>
                    </div>
                @empty
                    <p>No payment way found</p>
                @endforelse
            </div>
        @endif

        @if ($customer_address_id != 0 && $shipping_company_id != 0 && $payment_method_id != 0)
            @if (\Str::lower($payment_method_code) == 'ppex')
                <form action="{{route('checkout.payment')}}" method="post">
                    @csrf
                    <input type="hidden" name="customer_address_id" value="{{ old('customer_address_id', $customer_address_id) }}" class="form-control">
                    <input type="hidden" name="shipping_company_id" value="{{ old('shipping_company_id', $shipping_company_id) }}" class="form-control">
                    <input type="hidden" name="payment_method_id" value="{{ old('payment_method_id', $payment_method_id) }}" class="form-control">
                    <button type="submit" name="submit" class="btn btn-dark btn-sm btn-block">
                        Continue to checkout with PayPal
                    </button>
                </form>
            @endif
        @endif


    </div>

    <!-- ORDER SUMMARY-->
    <div class="col-lg-4">
        <div class="card border-0 rounded-0 p-lg-4 bg-light">
            <div class="card-body">
                <h5 class="text-uppercase mb-4">Your order</h5>
                <ul class="list-unstyled mb-0">
                    @if( $cart_subtotal !=0)
                    <li class="d-flex align-items-center justify-content-between"><strong class="small font-weight-bold">SUBTOTAL</strong><span class="text-muted small">${{$cart_subtotal}}</span></li>
                    @if(session()->has('coupon'))
                        <li class="border-bottom my-2"></li>
                        <li class="d-flex align-items-center justify-content-between">
                            <strong class="small font-weight-bold">Discount <small>({{ getNumbers()->get('discount_code') }})</small></strong>
                            <span class="text-muted small">- ${{ $cart_discount }}</span>
                        </li>
                    @endif
                    @if(session()->has('shipping'))
                        <li class="border-bottom my-2"></li>
                        <li class="d-flex align-items-center justify-content-between">
                            <strong class="small font-weight-bold">Shipping <small>({{ getNumbers()->get('shipping_code') }})</small></strong>
                            <span class="text-muted small">${{ $cart_shipping }}</span>
                        </li>
                    @endif
                    <li class="border-bottom my-2"></li>
                    <li class="d-flex align-items-center justify-content-between"><strong class="small font-weight-bold">TAX</strong><span class="text-muted small">${{$cart_tax}}</span></li>
                    <li class="border-bottom my-2"></li>
                    <li class="d-flex align-items-center justify-content-between"><strong class="text-uppercase small font-weight-bold">TOTAL</strong><span>${{$cart_total}}</span></li>
                    <li class="border-bottom my-2"></li>
                    <li>
                        <form wire:submit.prevent="applyDiscount()">
                            @if (!session()->has('coupon'))
                                <input type="text" wire:model="coupon_code" class="form-control" placeholder="Enter your coupon">
                            @endif
                            @if(session()->has('coupon'))
                                <button type="button" wire:click.prevent="removeCoupon()" class="btn btn-danger btn-sm btn-block">
                                    <i class="fas fa-gift mr-2"></i> Remove coupon
                                </button>
                            @else
                                <button type="submit" class="btn btn-dark btn-sm btn-block">
                                    <i class="fas fa-gift mr-2"></i> Apply coupon
                                </button>
                            @endif
                        </form>
                    </li>

                   @else
                        <li class="align-items-center justify-content-center mb-4">
                            <span>Your Cart Is Empty</span>
                        </li>

                    @endif

                </ul>
            </div>
        </div>
    </div>
</div>