<!-- footer -->
@if($contactinfos)
<div class="contactinfo-main-w3_agile">
    <div class="contactinfo-dot">
        <div class="container">
            <div class="contactinfo-bottom">
                <h5 class="text-center">{{ Label::ofValue('home:Our_Branch') }}</h5>
                @foreach($contactinfos as $contactinfo)
                        <div class="col-md-4 contactinfo-grid1 address">
                            <h4> {{$contactinfo->name}}</h4>
                            <h6>{{$contactinfo->contact_person}}</h6>
                            <ul>
                                <li>
                                    <div class="media">
                                        <div class="media-left" style="padding: 0;" >
                                            <span class="fa fa-home" aria-hidden="true"></span>
                                        </div>
                                        <div class="media-body">
                                            <p>{!!  nl2br($contactinfo->address) !!}</p>
                                        </div>
                                    </div>


                                </li>
                                <li>
                                    <div class="media">
                                        <div class="media-left" style="padding: 0;" >
                                            <span class="fa fa-envelope-o" aria-hidden="true"></span>
                                        </div>
                                        <div class="media-body">
                                            <a href="mailto:{{ $contactinfo->email }}" style="text-decoration: none; text-transform: none;">{!! nl2br($contactinfo->email) !!}</a>
                                        </div>
                                    </div>
                                </li>
                                <li>
                                    <div class="media">
                                        <div class="media-left" style="padding: 0;" >
                                            <span class="fa fa-phone" aria-hidden="true"></span>
                                        </div>
                                        <div class="media-body">
                                            <p>{!! nl2br($contactinfo->phone) !!}</p>
                                        </div>
                                    </div>
                                </li>
                            </ul>
                        </div>
                @endforeach
                    <div class="clearfix"></div>
            </div>
        </div>
    </div>
</div>
@endif
<div class="footer-main-w3_agile">
    <div class="footer-dot">
        <div class="container">
            <div class="footer-bottom">
                <div class="col-md-4 footer-grid1 address">
                    <h4>Contact Info</h4>
                    <ul>
                        <li>
                            <div class="media">
                                <div class="media-left" style="padding: 0;" >
                                    <span class="fa fa-home" aria-hidden="true"></span>
                                </div>
                                <div class="media-body">
                                    <p>{!!  nl2br(Label::ofValue('global:address')) !!}</p>
                                </div>
                            </div>


                        </li>
                        <li>
                            <div class="media">
                                <div class="media-left" style="padding: 0;" >
                                    <span class="fa fa-envelope-o" aria-hidden="true"></span>
                                </div>
                                <div class="media-body">
                                    <a href="mailto:{{ Label::ofValue('global:email') }}" style="text-decoration: none;">{!! nl2br(Label::ofValue('global:email')) !!}

                                    </a>
                                </div>
                            </div>
                        </li>
                        <li>
                            <div class="media">
                                <div class="media-left" style="padding: 0;" >
                                    <span class="fa fa-phone" aria-hidden="true"></span>
                                </div>
                                <div class="media-body">
                            <p>{!!nl2br(Label::ofValue('global:tel_no')) !!}</p>
                                </div>
                            </div>
                        </li>
                    </ul>
                </div>


                <div class="col-md-3 footer-grid1 res">
                    <h4>services</h4>
                    <ul>
                        @foreach ($footer_services as $item)
                        <li>
                            <a href="{{ $item->url }}">{{ $item->title }}</a>
                        </li>
                        @endforeach
                    </ul>
                </div>

                <div class="col-md-2 col-sm-6 col-xs-6 footer-grid1">
                    <h4>Quick Links</h4>
                    <ul>
                       <!--  @foreach ($footer_menu as $item)
                        <li>
                            <a href="{{ $item->url }}">{{ $item->title }}</a>
                        </li>
                        @endforeach -->
                        <li>
                            <a href="{{route('writereview')}}">Write Reviews</a>
                        </li>
                        <li><a href="#">Terms & Condition</a></li>
                        <li><a href="#">Privacy</a></li>
                    </ul>

                </div>

                <div class="col-md-3  footer-grid1 ftr-img">
                    <h4>connect with us</h4>
                    <div class="footer-social">
                        <ul>
                            @foreach ($socials as $item)
                                <li>
                                    <a href="{{ $item->link }}" target="_blank">
                                        <span class="fa fa-{{ $item->icon }} icon_{{ $item->icon }}"></span>
                                    </a>
                                </li>
                            @endforeach
                        </ul>
                    </div>
                </div>

                <div class="clearfix"></div>
            </div>
        </div>
    </div>
</div>
<div class="cpy-footer">
    <div class="cpy-text">

        <p>© <?php echo(date('Y'));?> {{ config('app.name') }}. All rights reserved | <br class="hidden-sm hidden-md hidden-lg">Design by

       



            <a href="http://w3web.co.uk">W3web Technology</a>
        </p>
    </div>

</div>