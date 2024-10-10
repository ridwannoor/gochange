<footer id="footer">
    {{-- <div class="container my-4 py-2">
        <div class="row py-4">
            <div class="col-lg-4 text-center text-lg-left">
                <h5 class="text-4 text-color-light mb-3">SUBSCRIBE NEWSLETTER</h5>
                <p class="text-3 mb-0">Get all the latest informaton on Events, Sales and Offfers.</p>
                <p class="text-3 mb-0">Sign up for newsletter today.</p>
            </div>
            <div class="col-lg-5 text-center text-lg-left px-4 mt-1 mt-lg-3">
                <div class="pt-1 pt-lg-3 mt-1">
                    <div class="alert alert-success d-none" id="newsletterSuccess">
                        <strong>Success!</strong> You've been added to our email list.
                    </div>
                    <div class="alert alert-danger d-none" id="newsletterError"></div>
                    <form id="newsletterForm" action="https://portotheme.com/html/porto/7.5.0/php/newsletter-subscribe.php" method="POST" class="mw-100">
                        <div class="input-group input-group-rounded">
                            <input class="form-control form-control-sm bg-light px-4 text-3" placeholder="Email Address..." name="newsletterEmail" id="newsletterEmail" type="text">
                            <span class="input-group-append">
                                <button class="btn btn-primary  text-color-light text-2 py-3 px-4" type="submit"><strong>SUBSCRIBE!</strong></button>
                            </span>
                        </div>
                    </form>
                </div>
            </div>
            <div class="col-lg-3 text-center text-lg-left">
                <div class="pt-3 mt-1">
                    <ul class="footer-social-icons social-icons social-icons-clean social-icons-big social-icons-opacity-light social-icons-icon-light mt-0 mt-lg-3">
                        <li class="social-icons-facebook"><a href="{{ $generals->facebook }}" target="_blank" title="Facebook"><i class="fab fa-facebook-f"></i></a></li>
                        <li class="social-icons-instagram"><a href="{{ $generals->instagram }}" target="_blank" title="Instagram"><i class="fab fa-instagram"></i></a></li>
                        <li class="social-icons-whatsapp"><a href="{{ $generals->whatsapp }}" target="_blank" title="Whatsapp"><i class="fab fa-whatsapp"></i></a></li>
                    </ul>
                </div>
            </div>
        </div>
    </div> --}}
    <div class="container mt-4 pt-2 pb-5 ">
        <div class="row py-4">
            <div class="col-md-3 text-center text-md-left">
                <h5 class="text-4 text-color-light mb-3 mt-4 mt-lg-0">CONTACT INFO</h5>
                <p class="text-3 mb-0 text-color-light opacity-7">ADDRESS</p>
                <p class="text-3 mb-3">{{ $generals->alamat }}</p>
                <p class="text-3 mb-0 text-color-light opacity-7">PHONE</p>
                <p class="text-3 mb-3">{{ $generals->phone }}</p>
                <p class="text-3 mb-0 text-color-light opacity-7">EMAIL</p>
                <p class="text-3 mb-0">{{ $generals->email }}</p>
            </div>
            <div class="col-md-9 text-center text-md-left">
                <div class="row">
                    {{-- <div class="col-md-7 col-lg-5 mb-0">
                        <h5 class="text-4 text-color-light mb-3 mt-4 mt-lg-0">MY ACCOUNT</h5>
                        <div class="row">
                            <div class="col-md-5">
                                <p class="mb-1"><a href="#" class="text-3 link-hover-style-1">About us</a></p>
                                <p class="mb-1"><a href="#" class="text-3 link-hover-style-1">Contact Us</a></p>
                                <p class="mb-1"><a href="#" class="text-3 link-hover-style-1">My account</a></p>
                            </div>
                            <div class="col-md-5">
                                <p class="mb-1"><a href="#" class="text-3 link-hover-style-1">Orders history</a></p>
                                <p class="mb-1"><a href="#" class="text-3 link-hover-style-1">Advanced search</a></p>
                                <p class="mb-1"><a href="#" class="text-3 link-hover-style-1">Login</a></p>
                            </div>
                        </div>
                    </div> --}}
                    <div class="col-md-8 col-lg-4">
                        <h5 class="text-4 text-color-light mb-3 mt-4 mt-lg-0">Business Hours</h5>
                        <p class="mb-1">Monday - Friday - 9am to 5pm</p>
                        <p class="mb-1">Saturday - 9am to 2pm</p>
                        <p class="mb-1">Sunday - Closed</p>
                    </div>
                    <div class="col-lg-3">
                        <ul class="footer-social-icons social-icons social-icons-clean social-icons-big social-icons-opacity-light social-icons-icon-light mt-0 mt-lg-3">
                            <li class="social-icons-facebook"><a href="{{ $generals->facebook }}" target="_blank" title="Facebook"><i class="fab fa-facebook-f"></i></a></li>
                            <li class="social-icons-instagram"><a href="{{ $generals->instagram }}" target="_blank" title="Instagram"><i class="fab fa-instagram"></i></a></li>
                            <li class="social-icons-whatsapp"><a href="{{ $generals->whatsapp }}" target="_blank" title="Whatsapp"><i class="fab fa-whatsapp"></i></a></li>
                        </ul>
                    </div>
                </div>
                <div class="row footer-top-light-border mt-4 pt-4">
                    <div class="col-lg-5 text-center text-md-left">
                        <p class="text-2 mt-1">© Copyright 2019. All Rights Reserved.</p>
                    </div>
                    {{-- <div class="col-lg-3 text-center text-md-left">
                        <p class="text-3 mb-0 font-weight-semibold text-color-light opacity-8">BUSINESS HOURS</p>
                        <p class="text-3 mb-0">Mon - Sun /9:00AM -8:00PM</p>
                    </div> --}}
                    <div class="col-lg-7 text-center text-md-left">
                        <img src="front/assets/img/payment-icon.png" alt="Payment icons" class="img-fluid mt-4 mt-lg-2">
                    </div>
                </div>
            </div>
        </div>
    </div>
</footer>
