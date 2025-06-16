@extends('user.layouts.default')

@section('content')

<div class="breadcrumb">
    <div class="container">
        <div class="breadcrumb-inner">
            <ul class="list-inline list-unstyled">
                <li><a href="{{url('/')}}">Home</a></li>
                <li class='active'>About Us</li>
            </ul>
        </div>
    </div>
</div>

<div class="body-content">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="about-page-content wow fadeInUp">
                    <h1 class="text-center">About TrolleyWay</h1>
                    <div class="about-section">
                        <h2>Our Story</h2>
                        <p>TrolleyWay was founded in 2023 with a simple mission: to make online shopping faster, easier, and more enjoyable for South African consumers. What started as a small e-commerce platform has grown into one of the country's most trusted online marketplaces.</p>
                        <p>We connect buyers with sellers across South Africa, offering everything from electronics and fashion to home goods and groceries - all with convenient delivery options.</p>
                    </div>

                    <div class="about-section">
                        <h2>Why Choose TrolleyWay?</h2>
                        <div class="row">
                            <div class="col-md-4">
                                <div class="feature-box">
                                    <i class="fa fa-truck"></i>
                                    <h3>Fast Delivery</h3>
                                    <p>We deliver to your door within 2-5 business days with our nationwide network.</p>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="feature-box">
                                    <i class="fa fa-shield"></i>
                                    <h3>Secure Shopping</h3>
                                    <p>Your transactions are 100% secure with our advanced encryption technology.</p>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="feature-box">
                                    <i class="fa fa-undo"></i>
                                    <h3>Easy Returns</h3>
                                    <p>Not satisfied? Return most items within 30 days for a full refund.</p>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="about-section">
                        <h2>Our Values</h2>
                        <ul class="values-list">
                            <li><strong>Customer First:</strong> We put our customers at the heart of everything we do</li>
                            <li><strong>Local Empowerment:</strong> We support South African sellers and manufacturers</li>
                            <li><strong>Innovation:</strong> We constantly improve our platform for better shopping experiences</li>
                            <li><strong>Integrity:</strong> We're transparent and honest in all our dealings</li>
                        </ul>
                    </div>

                    <div class="about-section text-center">
                        <h2>Join the TrolleyWay Family</h2>
                        <p>With over 500,000 satisfied customers and growing, we're revolutionizing online shopping in South Africa.</p>
                        <a href="{{url('/login')}}" class="btn btn-primary btn-upper">Create Account</a>
                        <a href="{{url('/seller')}}" class="btn btn-default btn-upper">Become a Seller</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection