
<header id="header" class="header-effect-shrink" data-plugin-options="{'stickyEnabled': true, 'stickyEffect': 'shrink', 'stickyEnableOnBoxed': true, 'stickyEnableOnMobile': false, 'stickyChangeLogo': true, 'stickyStartAt': 30, 'stickyHeaderContainerHeight': 85}">
    <div class="header-body border-top-0 h-auto box-shadow-none">
        <div class="header-top header-top-borders">
            <div class="container h-100">
                <div class="header-row h-100">
                    <div class="header-column justify-content-start">
                        <div class="header-row">
                            <nav class="header-nav-top">
                                <ul class="nav nav-pills">
                                    <li class="nav-item py-2 d-none d-sm-inline-flex pe-2">
                                        <span class="ps-0 font-weight-semibold text-color-default text-2-5">{{$ayar->adres}}</span>
                                    </li>
                                    <li class="nav-item py-2 pe-2">
                                        <a href="tel:{{$ayar->telefon_2}}" class="text-color-default text-2-5 text-color-hover-primary font-weight-semibold">{{$ayar->telefon}}</a>
                                    </li>
                                    <li class="nav-item py-2 d-none d-md-inline-flex">
                                        <a href="mailto:{{$ayar->mail}}" class="text-color-default text-2-5 text-color-hover-primary font-weight-semibold">{{$ayar->mail}}</a>
                                    </li>
                                </ul>
                            </nav>
                        </div>
                    </div>
                    <div class="header-column justify-content-end">
                        <div class="header-row">
                            <nav class="header-nav-top">
                                <ul class="nav nav-pills p-relative bottom-2">
                                    <li class="nav-item py-2 d-none d-lg-inline-flex">
                                        <a href="{{$ayar->facebook}}" target="_blank" title="Facebook" class="text-color-dark text-color-hover-primary text-3 anim-hover-translate-top-5px transition-2ms"><i class="fab fa-facebook-f text-3 p-relative top-1"></i></a>
                                    </li>
                                    <li class="nav-item py-2 d-none d-lg-inline-flex">
                                        <a href="{{$ayar->insta}}" target="_blank" title="Twitter" class="text-color-dark text-color-hover-primary text-3 anim-hover-translate-top-5px transition-2ms"><i class="fab fa-twitter text-3 p-relative top-1"></i></a>
                                    </li>
                                    <li class="nav-item py-2 d-none d-lg-inline-flex">
                                        <a href="{{$ayar->twitter}}" target="_blank" title="Instagram" class="text-color-dark text-color-hover-primary text-3 anim-hover-translate-top-5px transition-2ms"><i class="fab fa-instagram text-3 p-relative top-1"></i></a>
                                    </li>
                                    <li class="nav-item py-2 pe-0 d-none d-lg-inline-flex">
                                        <a href="{{$ayar->link}}" target="_blank" title="Linkedin" class="text-color-dark text-color-hover-primary text-3 anim-hover-translate-top-5px transition-2ms"><i class="fab fa-linkedin-in text-3 p-relative top-1"></i></a>
                                    </li>
                                </ul>
                                <ul class="nav nav-pills  ">
                                    <li class="nav-item nav-item-borders  dropdown  ">
                                        <a class="nav-link text-color-hover-dark "  role="button" id="dropdownLanguage" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                            <img src="/frontend/img/blank.gif" class="flag flag-us" alt="English" /> English
                                            <i class="fas fa-angle-down"></i>
                                        </a>
                                        <div class="dropdown-menu dropdown-menu-end" aria-labelledby="dropdownLanguage">
                                            <a href="{{route('anasayfa')}}" class="dropdown-item" href="#"><img src="/frontend/img/blank.gif" class="flag flag-tr" alt="Turkish" /> Türkçe</a>

                                        </div>
                                    </li>
                                </ul>
                            </nav>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="header-container header-container-height-sm container p-static">
            <div class="header-row">
                <div class="header-column">
                    <div class="header-row">
                        <div class="header-logo">
                            <a href="{{route('anasayfa')}}">
                                <img src="/uploads/theme/{{$ayar->logo}}" class="img-fluid" width="123"  alt="" />


                            </a>
                        </div>
                    </div>
                </div>
                <div class="header-column justify-content-end">
                    <div class="header-row">
                        <div class="header-nav header-nav-links">
                            <div class="header-nav-main header-nav-main-square header-nav-main-dropdown-no-borders header-nav-main-dropdown-border-radius header-nav-main-text-capitalize header-nav-main-text-size-4 header-nav-main-arrows header-nav-main-full-width-mega-menu header-nav-main-mega-menu-bg-hover header-nav-main-effect-2">
                                <nav class="collapse">
                                    <ul class="nav nav-pills" id="mainNav">
                                        <li class="dropdown">
                                            <a href="{{route('anasayfa')}}" class="nav-link active text-color-white">
                                                Anasayfa
                                            </a>
                                        </li>

                                        <li>
                                            <a class="nav-link" href="{{route('hakkimizda')}}">
                                                Hakkımızda
                                            </a>
                                        </li>
                                        <li class="dropdown">
                                            <a class="nav-link dropdown-toggle" href="">
                                                Hizmetler
                                            </a>
                                            <ul class="dropdown-menu">
                                                @foreach($hizmet as $hnx)
                                                    <li>

                                                        <a href="{{route('hizmet.blog',$hnx->slug)}}" class="dropdown-item">{{$hnx->post_baslik}}</a>
                                                    </li>
                                                @endforeach
                                            </ul>
                                        </li>
                                        <li class="dropdown">
                                            <a class="nav-link dropdown-toggle" href="">
                                                Endustri
                                            </a>

                                            <ul class="dropdown-menu">
                                                @foreach($endustri as $enx)
                                                <li>

                                                    <a href="{{route('endustri.blog',$enx->slug)}}" class="dropdown-item">{{$enx->post_baslik}}</a>
                                                </li>
                                                @endforeach
                                            </ul>

                                        </li>

                                        <li>
                                            <a class="nav-link" href="{{route('tr.blog')}}">
                                                Makaleler
                                            </a>
                                        </li>
                                        <li>
                                            <a class="nav-link" href="{{route('iletisim')}}">
                                                İletişim
                                            </a>
                                        </li>
                                    </ul>
                                </nav>
                            </div>
                            @guest
                            <a href="{{route('dashboard')}}" class="btn btn-modern btn-primary btn-outline btn-arrow-effect-1 text-capitalize text-2-5 ms-3 me-2 d-block d-md-none d-xl-block anim-hover-translate-right-5px transition-2ms">Teklif Al <i class="fas fa-arrow-right ms-2"></i></a>
                            <button class="btn header-btn-collapse-nav" data-bs-toggle="collapse" data-bs-target=".header-nav-main nav">
                                <i class="fas fa-bars"></i>
                            </button>
                            @else
                                <div class="header-nav-features header-nav-features-no-border header-nav-features-lg-show-border order-1 order-lg-2">
                                    <div class="header-nav-feature header-nav-features-user header-nav-features-user-logged d-inline-flex mx-2 pe-2" id="headerAccount">
                                        <a href="#" class="header-nav-features-toggle">
                                            <i class="far fa-user"></i> {{ Auth::user()->name }}
                                        </a>
                                        <div class="header-nav-features-dropdown header-nav-features-dropdown-mobile-fixed header-nav-features-dropdown-force-right" id="headerTopUserDropdown">
                                            <div class="row">
                                                <div class="col-8">
                                                    <p class="mb-0 pb-0 text-2 line-height-1 pt-1">Merhaba,</p>
                                                    <p><strong class="text-color-dark text-4">{{ Auth::user()->name }}  {{ Auth::user()->surname }} </strong></p>
                                                </div>
                                                <div class="col-4">
                                                    <div class="d-flex justify-content-end">
                                                        <img class="rounded-circle" width="40" height="40" alt="" src="/frontend/uploads/profile/{{Auth::user()->urun_resmi}}">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col">
                                                    <ul class="nav nav-list-simple flex-column text-3">
                                                        <li class="nav-item"><a class="nav-link" href="{{route('profile')}}">Profilim</a></li>
                                                        <li class="nav-item"><a class="nav-link" href="{{route('dashboard')}}">Siparişlerim</a></li>
                                                        <li class="nav-item"><a class="nav-link" href="{{route('order-step1')}}">Sipariş Oluştur</a></li>
                                                        <li class="nav-item"><a href="{{ route('logout') }}" class="nav-link"  onclick="event.preventDefault(); document.getElementById('logout-form').submit();">Çıkış
                                                                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                                                    @csrf
                                                                </form>
                                                            </a></li>
                                                    </ul>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                            @endguest
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
</header>
