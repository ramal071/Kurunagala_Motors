<style>
    @media (max-width: 767px) {
    .deneb_footer .widget_wrapper .widget {
            margin-bottom: 40px;
    }
    }
    .deneb_footer .widget_wrapper {
        background-repeat: no-repeat;
        background-size: cover;
        padding-top: 200px;
        padding-bottom: 70px;
    }
    .deneb_footer .widget_wrapper .widget .widget_title {
        margin-bottom: 30px;
    }
    .deneb_footer .widget_wrapper .widget .widget_title h4 {
        font-weight: bold;
    }
    .deneb_footer .widget_wrapper .widget .widget_title h4:after {
        content: "";
        display: block;
        max-width: 38px;
        height: 2px;
        margin-top: 5px;
    }
    .deneb_footer .widget_wrapper .widegt_about p {
        margin-bottom: 20px;
        color: var(--text-gray-color);
    }
    .deneb_footer .widget_wrapper .widegt_about .social li {
        display: inline-block;
        margin-right: 10px;
    }
    .deneb_footer .widget_wrapper .widegt_about .social li a {
        display: block;
        width: 30px;
        height: 30px;
        line-height: 30px;
        text-align: center;
        border-radius: 50%;
        background-color: #1ae4ad;
        color: #ffff;
        font-size: 14px;
        -webkit-transition: all all 0.5s ease-out 0s;
        -moz-transition: all all 0.5s ease-out 0s;
        -ms-transition: all all 0.5s ease-out 0s;
        -o-transition: all all 0.5s ease-out 0s;
        transition: all all 0.5s ease-out 0s;
    }
    .deneb_footer .widget_wrapper .widegt_about .social li a:hover,
    .deneb_footer .widget_wrapper .widegt_about .social li a:focus {
        background-image: -moz-linear-gradient(-45deg, #1ae4ad 0, #399984 100%);
        background-image: -webkit-linear-gradient(-45deg, #1ae4ad 0, #399984 100%);
        background-image: -ms-linear-gradient(-45deg, #1ae4ad 0, #399984 100%);
        color: #fff;
        box-shadow: 2.5px 4.33px 15px 0px rgba(60, 200, 0, 0.4);
    }
    .deneb_footer .widget_wrapper .widget_link ul li {
        margin-bottom: 5px;
    }
    .deneb_footer .widget_wrapper .widget_link ul li a {
        text-transform: capitalize;
        color: var(--text-gray-color);
    }
    .deneb_footer .widget_wrapper .widget_link ul li a:hover,
    .deneb_footer .widget_wrapper .widget_link ul li a:focus {
        color: #1ae4ad;
    }
    .deneb_footer .widget_wrapper .widget_contact .contact_info .single_info {
        max-width: 250px;
        display: flex;
        flex-wrap: wrap;
        margin-bottom: 20px;
    }
    .deneb_footer .widget_wrapper .widget_contact .contact_info .single_info .icon {
        font-size: 12px;
        color: #1ae4ad;
        margin-right: 10px;
    }
    .deneb_footer .widget_wrapper .widget_contact .contact_info .single_info .info p a,.location {
        color: var(--text-gray-color);
    }
    .deneb_footer .widget_wrapper .widget_contact .contact_info .single_info .info p span {
        display: block;
    }
    
    .deneb_footer .copyright_area {
        background: #edecf0;
        padding: 10px 0;
    }
    .deneb_footer .copyright_area .copyright_text {
        text-align: center;
    }
    .deneb_footer .copyright_area .copyright_text p {
        color: #011a3e;
    }
    .deneb_footer .copyright_area .copyright_text p span {
        color: #feb000;
    }
    
    </style>
    
    <footer class="deneb_footer">
        <div class="widget_wrapper" style="background-image: url({{ asset('images/footer/footer_bg.png') }});">
            <div class="container">
                <div class="row">
                    <div class="col-lg-4 col-md-6 col-12">
                        <div class="widget widegt_about">
                            <div class="widget_title">
                                <h4>About</h4>
                            </div>
                            <p>We are Sri Lanka’s best automobile care specialists – with state-of- the-art service centers located across the country. Each center is extremely committed to providing our clients with the very best services.</p>
                           
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-6 col-sm-12">
                        <div class="widget widget_link">
                            <div class="widget_title">
                                <h4>Links</h4>
                            </div>
                            <ul>
                                <li><a href="{{ route('customer.aboutus') }}">About Us</a></li>
                                <li><a href="/#services">Services</a></li>
                                <li><a href="{{ url('customerproduct') }}">Product</a></li>
                                <li><a href="{{ route('customer.brand') }}">Brand</a></li>
                                <li><a href="{{ route('customer.bike') }}">Model</a></li>
                                <li><a href="{{ route('contact.view') }}">Contact Us</a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-6 col-sm-12">
                        <div class="widget widget_contact">
                            <div class="widget_title">
                                <h4>Contact Us</h4>
                            </div>
                            <div class="contact_info">
                                <div class="single_info">
                                    <div class="icon">
                                        <i class="fas fa-phone"></i>
                                    </div>
                                    <div class="info">
                                        <p><a href="tel:+94711234567">071 123 4567</a></p>
                                        <p><a href="tel:+94719876543">+9471 987 6543</a></p>
                                    </div>
                                </div>
                                <div class="single_info">
                                    <div class="icon">
                                        <i class="fas fa-envelope"></i>
                                    </div>
                                    <div class="info">
                                        <p><a href="mailto:info@deneb.com">info@kmmoters.com</a></p>
                                        <p><a href="mailto:services@deneb.com">kmmoters@gmail.com</a></p>
                                    </div>
                                </div>
                                <div class="single_info">
                                    <div class="icon">
                                        <i class="fas fa-map-marker-alt"></i>
                                    </div>
                                    <div class="info location">
                                        <p>Kurunagala Motors, galenbidunuwewa<span>Anuradhapura.</span></p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="copyright_area">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="copyright_text">
                            <p>Copyright &copy; 2022 All rights reserved.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </footer>