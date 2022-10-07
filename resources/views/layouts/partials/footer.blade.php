<footer id="footer" class="position-relative bg-dark border-top-0">
    <div class="container pt-5 pb-3">
        <div class="row pt-5">
            <div class="col-lg-4">
                <a href="{{route('anasayfa')}}" class="text-decoration-none">
                    <img src="/uploads/theme/{{$ayar->logo}}" class="img-fluid" alt="" />
                </a>
                <ul class="list list-unstyled mt-4">
                    <li class="d-flex align-items-center mb-4">
                        <i class="icon icon-envelope text-color-light text-5 font-weight-bold position-relative top-1 me-3-5"></i>
                        <a href="mailto:porto@business-consulting-4.com" class="d-inline-flex align-items-center text-decoration-none text-color-light text-color-hover-primary font-weight-semibold text-4-5">{{$ayar->mail}}</a>
                    </li>
                    <li class="d-flex align-items-center mb-4">
                        <i class="icon icon-phone text-color-light text-5 font-weight-bold position-relative top-1 me-3-5"></i>
                        <a href="tel:{{$ayar->telefon}}" class="d-inline-flex align-items-center text-decoration-none text-color-light text-color-hover-primary font-weight-semibold text-4-5">{{$ayar->telefon}}</a>
                    </li>
                </ul>
                <ul class="social-icons social-icons-clean social-icons-medium">
                    <li class="social-icons-facebook">
                        <a href="{{$ayar->facebook}}" target="_blank" title="Facebook">
                            <i class="fab fa-facebook-f text-color-light"></i>
                        </a>
                    </li>
                    <li class="social-icons-twitter">
                        <a href="{{$ayar->twitter}}" target="_blank" title="Twitter">
                            <i class="fab fa-twitter text-color-light"></i>
                        </a>
                    </li>
                    <li class="social-icons-instagram">
                        <a href="{{$ayar->insta}}" target="_blank" title="Instagram">
                            <i class="fab fa-instagram text-color-light"></i>
                        </a>
                    </li>
                    <li class="social-icons-linkedin">
                        <a href="{{$ayar->link}}" target="_blank" title="Linkedin">
                            <i class="fab fa-linkedin text-color-light"></i>
                        </a>
                    </li>
                </ul>
            </div>
            <div class="col-lg-8">
                <div class="row mb-5-5">
                    <div class="col-lg-6 mb-4 mb-lg-0">
                        <h4 class="text-color-light font-weight-bold mb-3">Navigation</h4>
                        <ul class="list list-unstyled columns-lg-2">
                            <li><a href="#" class="text-color-grey text-color-hover-primary">Home</a></li>
                            <li><a href="#" class="text-color-grey text-color-hover-primary">About Us</a></li>
                            <li><a href="#" class="text-color-grey text-color-hover-primary">Our Services</a></li>
                            <li><a href="#" class="text-color-grey text-color-hover-primary">Consultants</a></li>
                            <li><a href="#" class="text-color-grey text-color-hover-primary">Blog</a></li>
                            <li><a href="#" class="text-color-grey text-color-hover-primary">Contact Us</a></li>
                        </ul>
                    </div>
                    <div class="col-lg-6">
                        <h4 class="text-color-light font-weight-bold mb-3">Extra Links</h4>
                        <ul class="list list-unstyled columns-lg-2">
                            <li><a href="#" class="text-color-grey text-color-hover-primary">Elements</a></li>
                            <li><a href="#" class="text-color-grey text-color-hover-primary">Portfolio</a></li>
                            <li><a href="#" class="text-color-grey text-color-hover-primary">Careers</a></li>
                            <li><a href="#" class="text-color-grey text-color-hover-primary">Shop Pages</a></li>
                            <li><a href="#" class="text-color-grey text-color-hover-primary">Testimonials</a></li>
                        </ul>
                    </div>
                </div>
                <div class="row">
                    <div class="col">
                        <div class="alert alert-success d-none" id="newsletterSuccess">
                            <strong>Success!</strong> You've been added to our email list.
                        </div>
                        <div class="alert alert-danger d-none" id="newsletterError"></div>
                        <div class="d-flex flex-column flex-lg-row align-items-start align-items-lg-center">
                            <h4 class="text-color-light ws-nowrap me-3 mb-3 mb-lg-0">Subscribe to Newsletter:</h4>
                            <form id="newsletterForm" class="form-style-3 w-100" action="" method="POST">
                                <div class="d-flex">
                                    <input class="form-control bg-color-light border-0 box-shadow-none" placeholder="Email Address" name="newsletterEmail" id="newsletterEmail" type="text" />
                                    <button class="btn btn-primary ms-2 btn-px-3 btn-py-2 font-weight-bold" type="submit">
                                        Go
                                    </button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="footer-copyright bg-transparent">
        <div class="container">
            <hr class="bg-color-light opacity-1">
            <div class="row">
                <div class="col mt-4 mb-4 pb-5">
                    <p class="text-center text-3 mb-0">Porto © 2022. All Rights Reserved.</p>
                </div>
            </div>
        </div>
    </div>
</footer>
