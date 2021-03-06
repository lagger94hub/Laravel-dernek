<footer id="footer" class="footer bg-overlay">
    <div class="footer-main">
        <div class="container">
            <div class="row justify-content-between">
                <div class="col-lg-4 col-md-6 footer-widget footer-about">
                    <h3 class="widget-title">About Us</h3>
                    <img loading="lazy" width="200px" class="footer-logo"
                         src="{{ asset('assets') }}/images/footer-logo.png" alt="Constra">
                    <p class="white-span">{!! $setting->aboutus !!}</p>
                    <div class="footer-social">
                        <ul>
                            @if($setting->facebook != null)
                                <li><a href="{{$setting->facebook}}" aria-label="Facebook"><i class="fab fa-facebook-f"></i></a>
                                </li>@endif


                            @if($setting->twitter !=null)
                                <li><a href="{{$setting->twitter}}" aria-label="Twitter"><i class="fab fa-twitter"></i></a>
                                </li>@endif
                            @if($setting->instagram)
                                <li><a href="{{$setting->instagram}}" aria-label="Instagram"><i
                                            class="fab fa-instagram"></i></a></li>@endif
                            @if($setting->youtube)
                                <li><a href="{{$setting->youtube}}" aria-label="Youtube"><i
                                            class="fab fa-youtube"></i></a></li>@endif
                        </ul>
                    </div><!-- Footer social end -->
                </div><!-- Col end -->

                <div class="col-lg-4 col-md-6 footer-widget mt-5 mt-md-0">
                    <h3 class="widget-title">Contact info</h3>
                    <div class="working-hours">
                        <p>{{$setting->company == null ? "": $setting->company}}</p>
                        <p><span>Email: </span>{{$setting->email == null ? "": $setting->email}}</p>
                        <p><span>Fax: </span>{{$setting->fax == null ? "": $setting->fax}}</p>
                        <p><span>Phone: </span>{{$setting->phone == null ? "": $setting->phone}}</p>
                        <p><span>Address: </span>{{$setting->address == null ? "": $setting->address}}</p>




                    </div>
                </div><!-- Col end -->


            </div><!-- Row end -->
        </div><!-- Container end -->
    </div><!-- Footer main end -->

    <div class="copyright">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-md-6">
                    <div class="copyright-info text-center text-md-left">
              <span>Copyright &copy; <script>
                  document.write(new Date().getFullYear())
                </script>, Designed &amp; Developed by {{$setting->company}} </span>
                    </div>
                </div>

                <div class="col-md-6">
                    <div class="footer-menu text-center text-md-right">
                        <ul class="list-unstyled">
                            <li><a href="{{route('about')}}">About</a></li>
                            <li><a href="{{route('references')}}">References</a></li>
                            <li><a href="{{route('faq')}}">faq</a></li>
                        </ul>
                    </div>
                </div>
            </div><!-- Row end -->

            <div id="back-to-top" data-spy="affix" data-offset-top="10" class="back-to-top position-fixed">
                <button class="btn btn-primary" title="Back to Top">
                    <i class="fa fa-angle-double-up"></i>
                </button>
            </div>

        </div><!-- Container end -->
    </div><!-- Copyright end -->
</footer><!-- Footer end -->


<!-- Javascript Files
 ================================================== -->

<!-- initialize jQuery Library -->
<script src="{{ asset('assets') }}/plugins/jQuery/jquery.min.js"></script>
<!-- Bootstrap jQuery -->
<script src="{{ asset('assets') }}/plugins/bootstrap/bootstrap.min.js" defer></script>
<!-- Slick Carousel -->
<script src="{{ asset('assets') }}/plugins/slick/slick.min.js"></script>
<script src="{{ asset('assets') }}/plugins/slick/slick-animation.min.js"></script>
<!-- Color box -->
<script src="{{ asset('assets') }}/plugins/colorbox/jquery.colorbox.js"></script>
<!-- shuffle -->
<script src="{{ asset('assets') }}/plugins/shuffle/shuffle.min.js" defer></script>


<!-- Google Map API Key-->
<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCcABaamniA6OL5YvYSpB3pFMNrXwXnLwU" defer></script>
<!-- Google Map Plugin-->
<script src="{{ asset('assets') }}/plugins/google-map/map.js" defer></script>

<!-- Template custom -->
<script src="{{ asset('assets') }}/js/script.js"></script>


<!-- Accordion jquery> -->

<script src="https://code.jquery.com/jquery-3.6.0.js"></script>
<script src="https://code.jquery.com/ui/1.13.0/jquery-ui.js"></script>
