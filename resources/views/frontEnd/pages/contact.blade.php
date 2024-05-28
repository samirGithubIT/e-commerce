@extends('frontEnd.layouts.masters')

@section('content')

  <!-- BREADCRUMB AREA START -->
  <div class="ltn__breadcrumb-area ltn__breadcrumb-area-2 ltn__breadcrumb-color-white" style="background-color: rgba(20, 146, 20, 0.411)" data-bg="{{ asset('front_asset/img/bg/9.jpg') }}">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="ltn__breadcrumb-inner ltn__breadcrumb-inner-2 justify-content-between">
                    <div class="section-title-area ltn__section-title-2">
                        <h6 class="section-subtitle ltn__secondary-color">//  Welcome to our company</h6>
                        <h1 class="section-title text-dark">Contact Us</h1>
                    </div>
                    <div class="ltn__breadcrumb-list">
                        <ul>
                            <li><a href="{{ url('/') }}">Home</a></li>
                            <li>Contact</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- BREADCRUMB AREA END -->

<!-- CONTACT ADDRESS AREA START -->
<div class="ltn__contact-address-area mb-90">
    <div class="container">
        <div class="row">
            <div class="col-lg-4">
                <div class="ltn__contact-address-item ltn__contact-address-item-3 box-shadow">
                    <div class="ltn__contact-address-icon">
                        <img src="{{ asset('front_asset/img/icons/10.png') }}" alt="Icon Image">
                    </div>
                    <h3>Email Address</h3>
                    <p>info@webmail.com <br>
                        jobs@webexample.com</p>
                </div>
            </div>
            <div class="col-lg-4">
                <div class="ltn__contact-address-item ltn__contact-address-item-3 box-shadow">
                    <div class="ltn__contact-address-icon">
                        <img src="{{ asset('front_asset/img/icons/11.png') }}" alt="Icon Image">
                    </div>
                    <h3>Phone Number</h3>
                    <p>+0123-456789 <br> +987-6543210</p>
                </div>
            </div>
            <div class="col-lg-4">
                <div class="ltn__contact-address-item ltn__contact-address-item-3 box-shadow">
                    <div class="ltn__contact-address-icon">
                        <img src="{{ asset('front_asset/img/icons/12.png') }}" alt="Icon Image">
                    </div>
                    <h3>Office Address</h3>
                    <p>18/A, New Born Town Hall <br>
                        New York, US</p>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- CONTACT ADDRESS AREA END -->

<!-- CONTACT MESSAGE AREA START -->
<div class="ltn__contact-message-area mb-120 mb--100 mb-5">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="ltn__form-box contact-form-box box-shadow white-bg">
                    <h4 class="title-2">Get A Quote</h4>

                    <form id="contact-form" action="{{ route('admin.comment.store') }}" method="post">
                        @csrf
                        <div class="row">
                            <div class="col-md-6">
                                <div class="input-item input-item-name ltn__custom-icon">
                                    <input type="text" name="name" placeholder="Enter your name">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="input-item input-item-email ltn__custom-icon">
                                    <input type="email" name="email" placeholder="Enter email address">
                                </div>
                            </div>
                            {{-- <div class="col-md-6">
                                <label class="form-label">Selete category</label>
                                <select name="category" class="form-select">
         
                                 <option value="">--Select--</option>
                                @foreach ( $categoryOptions as $category_id => $category_names)
                                
                                <option value="{{ $category_id }}">{{ $category_names }}</option>
         
                                @endforeach
                                </select>
                            </div> --}}
                            <div class="col-md-6">
                                <div class="input-item input-item-phone ltn__custom-icon">
                                    <input type="text" name="phoneNumber" placeholder="Enter phone number">
                                </div>
                            </div>
                        </div>
                        <div class="input-item input-item-textarea ltn__custom-icon">
                            <textarea name="message" placeholder="Enter message"></textarea>
                        </div>
                        <p><label class="input-info-save mb-0"><input type="checkbox" name="agree"> Save my name, email, and website in this browser for the next time I comment.</label></p>
                        <div class="btn-wrapper mt-0">
                            <button class="btn theme-btn-1 btn-effect-1 text-uppercase" type="submit">get an free service</button>
                        </div>
                        <p class="form-messege mb-0 mt-20"></p>

                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- CONTACT MESSAGE AREA END -->

@endsection