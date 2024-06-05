<footer>
    <div class="footer-row2">
        <div class="container">
            <div class="row justify-content-between">
                <div class="col-lg-6 col-sm-6  ftr-brand-pp">
                    <a class="navbar-brand mt30 mb25" href="{{ route('main') }}">
                        <img src="{{ asset('images/logo.png') }}" alt="{{ config('app.name') }}" width="100" />
                    </a>
                    <p>Highly experienced dev team is considering  taking on new clients to build new long lasting partnerships.</p>
                </div>

                <div class="col-lg-6 col-sm-6 pt50 text-center">
                    <a href="{{ route('main') . '#contact' }}" class="btn-main bg-btn3 lnk mt20">
                        Become Partner <i class="fas fa-chevron-right fa-icon"></i><span class="circle"></span>
                    </a>
                </div>
            </div>
        </div>
    </div>
    <div class="footer-row3">
        <div class="copyright">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">

{{--
                        <div class="footer-social-media-icons">
                            <a href="javascript:void(0)" target="blank"><i class="fab fa-facebook"></i></a>
                            <a href="javascript:void(0)" target="blank"><i class="fab fa-twitter"></i></a>
                            <a href="javascript:void(0)" target="blank"><i class="fab fa-instagram"></i></a>
                            <a href="javascript:void(0)" target="blank"><i class="fab fa-linkedin"></i></a>
                            <a href="javascript:void(0)" target="blank"><i class="fab fa-youtube"></i></a>
                            <a href="javascript:void(0)" target="blank"><i class="fab fa-pinterest-p"></i></a>
                            <a href="javascript:void(0)" target="blank"><i class="fab fa-vimeo-v"></i></a>
                            <a href="javascript:void(0)" target="blank"><i class="fab fa-dribbble"></i></a>
                            <a href="javascript:void(0)" target="blank"><i class="fab fa-behance"></i></a>
                        </div>
--}}

                        <div class="footer-">
                            <p>© {{ date('Y') }} All Rights Reserved By {{ config('app.name') }}</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</footer>
