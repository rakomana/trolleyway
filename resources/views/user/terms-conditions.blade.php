@extends('user.layouts.default')

@section('content')
<div class="breadcrumb">
    <div class="container">
        <div class="breadcrumb-inner">
            <ul class="list-inline list-unstyled">
                <li><a href="{{url('/')}}">Home</a></li>
                <li class='active'>Terms & Conditions</li>
            </ul>
        </div>
    </div>
</div>

<div class="body-content">
    <div class="container">
        <div class="terms-conditions-page">
            <div class="row">
                <div class="col-md-12 terms-conditions">
                    <h1 class="heading-title">TrolleyWay Terms and Conditions</h1>
                    <p class="effective-date"><strong>Last Updated:</strong> {{date('F j, Y')}}</p>
                    
                    <div class="terms-section">
                        <h2>1. Acceptance of Terms</h2>
                        <p>By accessing or using the TrolleyWay website ("Site") and services, you agree to be bound by these Terms and Conditions ("Terms"). If you do not agree to all of these Terms, please do not use our Site.</p>
                    </div>
                    
                    <div class="terms-section">
                        <h2>2. Account Registration</h2>
                        <ol>
                            <li>You must be at least 18 years old to create an account.</li>
                            <li>You are responsible for maintaining the confidentiality of your account credentials.</li>
                            <li>All information provided during registration must be accurate and current.</li>
                            <li>You are responsible for all activities that occur under your account.</li>
                        </ol>
                    </div>
                    
                    <div class="terms-section">
                        <h2>3. Product Information</h2>
                        <ol>
                            <li>We strive for accuracy in product descriptions, pricing, and images but cannot guarantee complete accuracy.</li>
                            <li>Colors may appear slightly different due to monitor settings.</li>
                            <li>Prices are subject to change without notice.</li>
                        </ol>
                    </div>
                    
                    <div class="terms-section">
                        <h2>4. Orders and Payments</h2>
                        <ol>
                            <li>All orders are subject to product availability.</li>
                            <li>We accept various payment methods as displayed at checkout.</li>
                            <li>You agree to pay all charges incurred by your account.</li>
                            <li>Prices include VAT where applicable.</li>
                        </ol>
                    </div>
                    
                    <div class="terms-section">
                        <h2>5. Shipping and Delivery</h2>
                        <ol>
                            <li>Delivery times are estimates and not guaranteed.</li>
                            <li>Shipping costs will be displayed during checkout.</li>
                            <li>Risk of loss passes to you upon delivery to the carrier.</li>
                            <li>We are not responsible for delays beyond our control.</li>
                        </ol>
                    </div>
                    
                    <div class="terms-section">
                        <h2>6. Returns and Refunds</h2>
                        <ol>
                            <li>Returns must be initiated within 14 days of delivery.</li>
                            <li>Products must be unused, in original packaging with tags attached.</li>
                            <li>Refunds will be processed within 14 business days after receiving returned items.</li>
                            <li>Some items may be excluded from returns (e.g., perishable goods).</li>
                        </ol>
                    </div>
                    
                    <div class="terms-section">
                        <h2>7. User Conduct</h2>
                        <p>You agree not to:</p>
                        <ol>
                            <li>Use the Site for any illegal purpose</li>
                            <li>Attempt to gain unauthorized access to our systems</li>
                            <li>Interfere with the Site's operation</li>
                            <li>Post false, misleading, or harmful content</li>
                            <li>Harass other users or our staff</li>
                        </ol>
                    </div>
                    
                    <div class="terms-section">
                        <h2>8. Intellectual Property</h2>
                        <ol>
                            <li>All content on the Site is owned by TrolleyWay or its licensors.</li>
                            <li>You may not reproduce, distribute, or create derivative works without permission.</li>
                            <li>TrolleyWay trademarks and logos may not be used without written consent.</li>
                        </ol>
                    </div>
                    
                    <div class="terms-section">
                        <h2>9. Limitation of Liability</h2>
                        <p>TrolleyWay shall not be liable for any indirect, incidental, special, or consequential damages arising from your use of the Site or products purchased through the Site.</p>
                    </div>
                    
                    <div class="terms-section">
                        <h2>10. Privacy</h2>
                        <p>Your use of the Site is subject to our Privacy Policy, which explains how we collect, use, and protect your information.</p>
                    </div>
                    
                    <div class="terms-section">
                        <h2>11. Changes to Terms</h2>
                        <p>We may modify these Terms at any time. Continued use after changes constitutes acceptance of the new Terms.</p>
                    </div>
                    
                    <div class="terms-section">
                        <h2>12. Governing Law</h2>
                        <p>These Terms shall be governed by and construed in accordance with the laws of South Africa.</p>
                    </div>
                    
                    <div class="terms-section">
                        <h2>13. Contact Us</h2>
                        <p>For questions about these Terms, please contact us at <a href="mailto:legal@trolleyway.com">legal@trolleyway.com</a> or through our <a href="{{url('contact')}}">contact form</a>.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<style>
    .terms-conditions-page {
        background: white;
        padding: 30px;
        border-radius: 5px;
        box-shadow: 0 2px 10px rgba(0,0,0,0.05);
    }
    
    .heading-title {
        color: #3366cc;
        margin-bottom: 20px;
        font-weight: 600;
    }
    
    .effective-date {
        color: #666;
        margin-bottom: 30px;
        font-size: 0.9em;
    }
    
    .terms-section {
        margin-bottom: 30px;
    }
    
    .terms-section h2 {
        color: #444;
        font-size: 1.3em;
        margin-bottom: 15px;
        font-weight: 500;
    }
    
    .terms-section ol, .terms-section p {
        color: #555;
        line-height: 1.6;
    }
    
    .terms-section ol {
        padding-left: 20px;
    }
    
    .terms-section li {
        margin-bottom: 8px;
    }
    
    .logo-slider {
        margin-top: 50px;
        padding: 20px 0;
        background: #f9f9f9;
        border-radius: 5px;
    }
</style>

@endsection