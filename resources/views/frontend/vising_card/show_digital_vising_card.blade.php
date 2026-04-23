<div class="container">
    <center><img src="{{ asset('image/marko-logo-dark.png') }}" alt="img" /></center>
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <center>
                    <div class="card-header"><b>{{ __('Digital Card') }}</b></div>
                </center>

                <div class="card-body">
                    <div class="form-box"
                        style="max-width: 500px;margin: auto;padding: 50px;background: #ffffff;
                                            border: 10px solid #f2f2f2;margin-top: 100px;">
                        <div class="row" style="text-align:center;">

                            <div class="col-xs-12 col-sm-12 col-md-12 user_card_data">
                                <div class="form-group col-xs-12 col-sm-12 col-md-12">
                                    <h1 style="border-top: 5px solid #81c868;"></h1>
                                    <h1 style="border-top: 5px solid #81c868;"></h1>
                                    <label style="color:orange;">Company Logo: </label><br />
                                    @if (isset($card->company_logo))
                                        <img src="{{ \Storage::url($card->company_logo) }}" height="180px"
                                            width="180px" style="border-radius: 100%;border:5px solid #81c868;"><br />
                                    @endif
                                </div>
                            </div>

                            <div class="col-xs-12 col-sm-12 col-md-12">
                                <h1><b>{{ isset($card->name) && !empty($card->name) ? $card->name : null }}</b></h1>
                                <p>{{ isset($card->designation) && !empty($card->designation) ? $card->designation : null }}
                                </p>
                                <p>{{ isset($card->company_name) && !empty($card->company_name) ? $card->company_name : null }}
                                </p>
                            </div>

                            <div class="col-xs-12 col-sm-12 col-md-12">
                                <h1 style="border-top: 5px solid #81c868;"></h1>
                            </div>

                            <div class="col-xs-12 col-sm-12 col-md-12" style="overflow-wrap: break-word;">
                                <p>{{ isset($card->company_description) && !empty($card->company_description) ? $card->company_description : null }}
                                </p>
                            </div>

                            <div class="form-group col-xs-12 col-sm-12 col-md-12">
                                {{ isset($card->website) && !empty($card->website) ? QrCode::generate($card->website) : '#' }}
                            </div>

                            <div class="form-group col-xs-12 col-sm-12 col-md-12">
                                <a
                                    href="{{ isset($card->phone_no) && !empty($card->phone_no) ? $card->phone_no : '#' }}"><i
                                        class="fa fa-phone" style="font-size:36px;color:#81c868;"></i></a>
                                <a href="{{ isset($card->email) && !empty($card->email) ? $card->email : '#' }}"><i
                                        class="fa fa-at" style="font-size:36px;color:#81c868;"></i></a>
                                {{-- <a href="{{ isset($card->website) &&!empty($card->website)?QrCode::generate($card->website):'#'; }}"><i class="fa fa-globe" style="font-size:36px;color:#81c868;"></i></a> --}}
                                <a href="{{ isset($card->address) && !empty($card->address) ? $card->address : '#' }}"><i
                                        class="fa fa-map-marker" style="font-size:36px;color:#81c868;"></i></a>

                                <a
                                    href="{{ isset($card->location) && !empty($card->location) ? $card->location : '#' }}"><i
                                        class="fa fa-info-circle" style="font-size:36px;color:#81c868;"></i></a>
                            </div><br><br>

                            <div class="form-group col-xs-12 col-sm-12 col-md-12">
                                <a href="{{ isset($card->whatsapp_no) && !empty($card->whatsapp_no) ? $card->whatsapp_no : null }}"
                                    target="_blank;"><img src="{{ url('images/social_icons/whatsapp_logo.png') }}"
                                        alt="whatsapp" width="50" height="50"></a>
                                <a href="{{ isset($card->facebook) && !empty($card->facebook) ? $card->facebook : null }}"
                                    target="_blank;"><img src="{{ url('images/social_icons/facebook_logo.png') }}"
                                        alt="fb" width="50" height="50"></a>
                                <a href="{{ isset($card->x_link) && !empty($card->x_link) ? $card->x_link : null }}"
                                    target="_blank;"><img src="{{ url('images/social_icons/x_twt.png') }}"
                                        alt="twitter"width="50" height="50"></a>
                                <a href="{{ isset($card->linkedin) && !empty($card->linkedin) ? $card->linkedin : null }}"
                                    target="_blank;"><img src="{{ url('images/social_icons/linkedin_logo.png') }}"
                                        alt="linkedin"width="50" height="50"></a>
                                <a href="{{ isset($card->instagram) && !empty($card->instagram) ? $card->instagram : null }}"
                                    target="_blank;"><img src="{{ url('images/social_icons/instagram_logo.png') }}"
                                        alt="instagram"width="50" height="50"></a>
                            </div><br><br>

                            <div class="form-group col-xs-12 col-sm-12 col-md-12">
                                <h1 style="border-top: 5px solid #81c868;"></h1>
                                <h1 style="border-top: 5px solid #81c868;"></h1>
                            </div>

                            <div class="form-group col-xs-12 col-sm-12 col-md-12">
                                @if (isset($card->wallet_pay_qr_code))
                                    <img src="{{ \Storage::url($card->wallet_pay_qr_code) }}" height="280px"
                                        width="280px" style="border:5px solid #81c868;"><br />
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
