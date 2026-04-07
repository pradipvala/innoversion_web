<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
        <title>Digital vising Card</title>

        <!-- BOOTSTRAP -->
        <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" rel="stylesheet" />
    
        <!-- Styles -->

        <style>
            body {
                 background: #f7f7f7;
             }
      
             .form-box {
                 max-width: 500px;
                 margin: auto;
                 padding: 50px;
                 background: #ffffff;
                 border: 10px solid #f2f2f2;
                 margin-top: 100px;
             }
      
             h1,h2, p {
                 text-align: center;
             }

             h3 {
                font-weight:bold;
                 text-align: left;
             }

             .submit_btn {
                 text-align: center;
             }
      
             input, textarea {
                 width: 100%;
             }
             .form-control{
                 margin-bottom:20px;
             }
             
            .form-group{
                margin-left:30px;
                margin-right:20px;
            }
            

            
            img {
                border: 2px solid #black;
            }

            i.fa {
                    display: inline-block;
                    border-radius: 60px;
                    box-shadow: 0 0 2px #227d1f;
                    padding: 0.5em 0.6em;
                    border: 2px solid #227d1f;
                    color: #227d1f;

                }

         </style>

    </head>
    <body>
        @if (count($errors) > 0)
            <div class = "alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
       <form action="{{ route('admin.save.card') }}" method="POST" style="margin-top: 50px;" enctype="multipart/form-data">
            @csrf
            <h2>Visiting Card Details</h2>
            <div class="form-box">
                <div class="row">
                    
                    <div class="col-xs-12 col-sm-12 col-md-12 user_card_data">
                        <div class="form-group col-xs-12 col-sm-12 col-md-12">
                            <label>Company Logo:</label>
                            <input type="file" name="company_logo" id="company_logo" placeholder="Company Logo" class="form-control" 
                                    accept="image/jpeg, image/jpeg, image/png" required>
                            <img src="#" alt="company_logo" style="text-align:center;">
                            
                            
                            {{-- <img src="{{ url('storage/images/'.$card->company_logo) }}" alt="" title="" /> --}}
                            <br> <br> 
                        </div>
                    </div><br><br>
                    <div class="col-xs-12 col-sm-12 col-md-12 user_card_data">
                        <h3>Personal Details</h3><br>
                        
                        <div class="form-group col-xs-12 col-sm-12 col-md-12">
                            <label>Person Name:</label>
                            <input type="text" name="name" id="name" placeholder="Name" class="form-control" value="{{ isset($card->name) &&!empty($card->name)?$card->name :NULL; }}" required><br> 
                        </div>
                        <div class="form-group col-xs-12 col-sm-12 col-md-12">
                            <label>Designation:</label>
                            <input type="text" name="designation" id="designation" placeholder="Designation" class="form-control" value="{{ isset($card->designation) &&!empty($card->designation)?$card->designation :NULL; }}" required><br> 
                        </div>
                        <div class="form-group col-xs-12 col-sm-12 col-md-12">
                            <label>Company Name:</label>
                            <input type="text" name="company_name" id="company_name" placeholder="Company Name" class="form-control" value="{{ isset($card->company_name) &&!empty($card->company_name)?$card->company_name :NULL; }}" required><br> 
                        </div>

                        <div class="form-group col-xs-12 col-sm-12 col-md-12">
                            <label for="company_description">Company Description</label>
                            <textarea class="form-control" name="company_description" id="company_description" rows="3" cols="50" required>
                               {{ isset($card->company_description) &&!empty($card->company_description)?trim($card->company_description) :NULL; }}
                            </textarea><br> 
                        </div>

                        <div class="form-group col-xs-12 col-sm-12 col-md-12">
                            <label>Phone No:</label>
                            <input type="text" class="form-control"  name="phone_no" id="phone_no" placeholder="9076543245" value="{{ isset($card->phone_no) &&!empty($card->phone_no)?$card->phone_no :NULL; }}" required>
                            <br> 
                        </div>

                        <div class="form-group col-xs-12 col-sm-12 col-md-12">
                            <label>Email:</label>
                            <input type="email" class="form-control"  name="email" id="email" placeholder="Email" value="{{ isset($card->email) &&!empty($card->email)?$card->email :NULL; }}" required><br> 
                        </div>
                        
                        <div class="form-group col-xs-12 col-sm-12 col-md-12">
                            <label>Website:</label>
                            <input type="url" class="form-control"  name="website" id="website" placeholder="Website" value="{{ isset($card->website) &&!empty($card->website)?$card->website :NULL; }}" required><br> 
                        </div>

                        <div class="form-group col-xs-12 col-sm-12 col-md-12">
                            <label for="address">Address:</label>
                            <textarea class="form-control" name="address" id="address" rows="3" cols="50" required>
                                {{ isset($card->address) &&!empty($card->address)?trim($card->address) :NULL; }}
                            </textarea><br> 
                        </div>

                        <div class="form-group col-xs-12 col-sm-12 col-md-12">
                            <label>Location:</label>
                            <input type="text" class="form-control"  name="location" id="location" placeholder="Location" value="{{ isset($card->location) &&!empty($card->location)?$card->location :NULL; }}" required><br> 
                        </div>

                        {{-- <div class="form-group col-xs-12 col-sm-12 col-md-12">
                            <a href="#"><i class="fa fa-phone" style="font-size:17px;"></i></a>
                            <a href="#"><i class="fa fa-at" style="font-size:17px;"></i></a>
                            <a href="#"><i class="fa fa-globe" style="font-size:17px;"></i></a>
                            <a href="#"><i class="fa fa-map-marker" style="font-size:17px;"></i></a>
                            <a href="#"><i class="fa fa-bank" style="font-size:17px;"></i></a>
                            <a href="#"><i class="fa fa-credit-card" style="font-size:17px;"></i></a>
                            <a href="#"><i class="fa fa-info-circle" style="font-size:17px;"></i></a>
                           <br> 
                        </div><br><br> --}}
                    

                        <h3>Bank Account Details</h3><br>
                        <div class="form-group col-xs-12 col-sm-12 col-md-12">
                            <label>Bank Name(optional):</label>
                            <input type="text" class="form-control"  name="bank_name" id="bank_name" placeholder="Bank Name" value="{{ isset($card->bank_name) &&!empty($card->bank_name)?$card->bank_name :NULL; }}"><br> 
                        </div>
                        <div class="form-group col-xs-12 col-sm-12 col-md-12">
                            <label>Account Holder Name(optional):</label>
                            <input type="text" class="form-control"  name="account_holder_name" id="account_holder_name" placeholder="Account Holder Name" value="{{ isset($card->account_holder_name) &&!empty($card->account_holder_name)?$card->account_holder_name :NULL; }}"><br> 
                        </div>
                        <div class="form-group col-xs-12 col-sm-12 col-md-12">
                            <label>Bank Account Name(optional):</label>
                            <input type="text" class="form-control"  name="bank_account_name" id="bank_account_name" placeholder="Bank Account Name" value="{{ isset($card->bank_account_name) &&!empty($card->bank_account_name)?$card->bank_account_name :NULL; }}" ><br> 
                        </div>
                        <div class="form-group col-xs-12 col-sm-12 col-md-12">
                            <label>Bank IFSC Code(optional):</label>
                            <input type="text" class="form-control"  name="bank_ifsc_code" id="bank_ifsc_code" placeholder="Bank IFSC Code" value="{{ isset($card->bank_ifsc_code) &&!empty($card->bank_ifsc_code)?$card->bank_ifsc_code :NULL; }}" ><br> 
                        </div>
                        <div class="form-group col-xs-12 col-sm-12 col-md-12">
                            <label>GST No(optional):</label>
                            <input type="text" class="form-control"  name="gst_no" id="gst_no" placeholder="Gst No" value="{{ isset($card->gst_no) &&!empty($card->gst_no)?$card->gst_no :NULL; }}" ><br> 
                        </div>
                    
                        <h3>Card Details</h3>
                        <div class="form-group col-xs-12 col-sm-12 col-md-12">
                            <label>Card Detail:</label>
                            <input type="text" class="form-control"  name="card_details" id="card_details" placeholder="Card Detail" value="{{ isset($card->card_details) &&!empty($card->card_details)?$card->card_details :NULL; }}"><br> 
                        </div>

                        <h3>Social Media Links</h3>

                        <div class="form-group col-xs-12 col-sm-12 col-md-12">
                            <label>Whatsapp No</label>
                            <input type="text" class="form-control" name="whatsapp_no" id="whatsapp_no" placeholder="9076543245" value="{{ isset($card->whatsapp_no) &&!empty($card->whatsapp_no)?$card->whatsapp_no :NULL; }}" required><br> 
                        </div>

                        <div class="form-group col-xs-12 col-sm-12 col-md-12">
                            <label>Facebook Link:</label>
                            <input type="url" class="form-control"  name="facebook" id="facebook" placeholder="Facebook Link" value="{{ isset($card->facebook) &&!empty($card->facebook)?$card->facebook :NULL; }}"><br> 
                        </div>
                        <div class="form-group col-xs-12 col-sm-12 col-md-12">
                            <label>X Link:</label>
                            <input type="url" class="form-control"  name="x_link" id="x_link" placeholder="X Link" value="{{ isset($card->x_link) &&!empty($card->x_link)?$card->x_link :NULL; }}"><br> 
                        </div>
                        <div class="form-group col-xs-12 col-sm-12 col-md-12">
                            <label>Linkedin Link:</label>
                            <input type="url" class="form-control"  name="linkedin" id="linkedin" placeholder="Linkedin Link" value="{{ isset($card->linkedin) &&!empty($card->linkedin)?$card->linkedin :NULL; }}"><br> 
                        </div>
                        <div class="form-group col-xs-12 col-sm-12 col-md-12">
                            <label>Instagram Link:</label>
                            <input type="url" class="form-control"  name="instagram" id="instagram" placeholder="Instagram Link" value="{{ isset($card->instagram) &&!empty($card->instagram)?$card->instagram :NULL; }}"><br> 
                        </div>
                        {{-- <div class="form-group col-xs-12 col-sm-12 col-md-12" style="text-align:center;">
                            <img src="http://127.0.0.1:8000/images/social_icons/whatsapp_logo.png" alt="whatsapp" width="50" height="50">
                            <img src="http://127.0.0.1:8000/images/social_icons/facebook_logo.png" alt="facebook"width="50" height="50">
                            <img src="http://127.0.0.1:8000/images/social_icons/twitter_logo.png" alt="twitter"width="50" height="50">
                            <img src="http://127.0.0.1:8000/images/social_icons/linkedin_logo.png" alt="linkedin"width="50" height="50">
                            <img src="http://127.0.0.1:8000/images/social_icons/instagram_logo.png" alt="instagram"width="50" height="50">
                        </div><br><br> --}}


                        <h3>Payment QR Codes</h3>
                        <div class="form-group col-xs-12 col-sm-12 col-md-12">
                            <label>Wallet Payment QR Code:</label>
                            <input type="file" class="form-control"  name="wallet_pay_qr_code" id="wallet_pay_qr_code" placeholder="Wallet Payment QR Code"  
                                    accept="image/jpeg, image/jpeg, image/png" required>
                        </div>
                        
                        @if(!empty($card->id))
                        <div class="form-group col-xs-12 col-sm-12 col-md-12">
                            <a  href="http://127.0.0.1:8000/admin/generate_vcard/{{$card->id}}" target="_blank"><button type="button" class="btn btn-success" target="_blank" >Generate Vcard Link</button></a>
                        </div>
                        @endif
                    <br><br>
                    <div class="col-xs-12 col-sm-12 col-md-12 submit_btn">
                        <button type="submit" class="btn btn-success">Save Details</button>
                    </div>
                </div>
            </div>
        </form>



@push('js')
<script type="text/javascript">

    // function generate_vcard(){

    //     alert('hello');return false;
    // }


 </script>
@endpush

    <!-- jQuery  -->
    <script type="text/javascript" src="{{ url('/admin_theme/assets/js/jquery.min.js') }}"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script>
    <script type="text/javascript" src="https://code.jquery.com/jquery-2.1.1.min.js"></script>

    <!-- jQuery  -->
    <script src="{{ asset('admin_theme/assets/js/jquery.min.js') }}"></script>

    </body>
</html>