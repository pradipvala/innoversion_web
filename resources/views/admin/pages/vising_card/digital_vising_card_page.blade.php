@extends('admin.layouts.app')

@push('url_title') Visiting Card Details @if(isset($card)) Edit @else Add @endif @endpush
@section('title',  'Add Digital Visiting Card')


@push('content')
    @if (count($errors) > 0)
        <div class = "alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

@if ($message = Session::get('success'))
    <div class="alert alert-success my-2">
      <p>{{ $message }}</p>
    </div>
@endif    
<div class="content">
    <div class="row">
        <div class="col-md-12">
            <div class="card-box">
                <div class="row form-horizontal">
                    <form action="{{ route('admin.save.card') }}" class="form-horizontal" id="digital_card_form" role="form" method="POST"  enctype="multipart/form-data">
                        @csrf
                        <div class="form-group">
                            <div class="col-sm-4">
                                <label>Company Logo:</label>
                                <input type="file" name="company_logo" id="company_logo" placeholder="Company Logo" class="filestyle form-control" 
                                        accept="image/jpeg, image/jpeg, image/png" required>
                            </div>
                        </div>

                        <h3>Personal Details</h3><br>
                                    
                        <div class="form-group">
                            <div class="col-sm-4">
                                <label>Person Name:</label>
                                <input type="text" name="name" id="name" placeholder="Name" class="form-control"  required><br> 
                            </div>
                        
                            <div class="col-sm-4">
                                <label>Designation:</label>
                                <input type="text" name="designation" id="designation" placeholder="Designation" class="form-control"  required><br> 
                            </div>
                        
                            <div class="col-sm-4">
                                <label>Company Name:</label>
                                <input type="text" name="company_name" id="company_name" placeholder="Company Name" class="form-control"  required><br> 
                            </div>
                        
                            <div class="col-sm-4">
                                <label>Website:</label>
                                <input type="url" class="form-control"  name="website" id="website" placeholder="Website" required><br> 
                            </div>
                        
                            <div class="col-sm-4">
                                <label>Phone No:</label>
                                <input type="text" class="form-control"  name="phone_no" id="phone_no" placeholder="9076543245"  required><br>
                            </div>
                        
                            <div class="col-sm-4">
                                <label>Email:</label>
                                <input type="email" class="form-control"  name="email" id="email" placeholder="Email" required><br> 
                            </div>
                        
                            <div class="col-sm-4">
                                <label for="address">Address:</label>
                                <textarea class="form-control" name="address" id="address" rows="3" cols="50" required></textarea><br> 
                            </div>
                        
                            <div class="col-sm-4">
                                <label for="company_description">Company Description</label>
                                <textarea class="form-control" name="company_description" id="company_description" maxlength="255" rows="3" cols="50" required></textarea><br> 
                            </div>
                        
                            <div class="col-sm-4">
                                <label>Location:</label>
                                <input type="text" class="form-control"  name="location" id="location" placeholder="Location" required><br> 
                            </div>
                        </div>

                        <h3>Social Media Links</h3>

                        <div class="form-group">
                            <div class="col-sm-4">
                                <label>Whatsapp No</label>
                                <input type="text" class="form-control" name="whatsapp_no" id="whatsapp_no" placeholder="9076543245"  required><br> 
                            </div>
                        
                            <div class="col-sm-4">
                                <label>Facebook Link:</label>
                                <input type="url" class="form-control"  name="facebook" id="facebook" placeholder="Facebook Link" required><br> 
                            </div>
                        
                            <div class="col-sm-4">
                                <label>X Link:</label>
                                <input type="url" class="form-control"  name="x_link" id="x_link" placeholder="X Link" required><br> 
                            </div>
                        
                            <div class="col-sm-4">
                                <label>Linkedin Link:</label>
                                <input type="url" class="form-control"  name="linkedin" id="linkedin" placeholder="Linkedin Link" required><br> 
                            </div>
                        
                            <div class="col-sm-4">
                                <label>Instagram Link:</label>
                                <input type="url" class="form-control"  name="instagram" id="instagram" placeholder="Instagram Link" required><br> 
                            </div>
                        </div>
                        
                        <h3>Payment QR Codes</h3>
                        <div class="form-group">
                            <div class="col-sm-4">
                                <label>Wallet Payment QR Code:</label>
                                <input type="file" class="filestyle form-control"  name="wallet_pay_qr_code" id="wallet_pay_qr_code" placeholder="Wallet Payment QR Code"  
                                    accept="image/jpeg, image/jpeg, image/png" required>
                            </div>
                        </div>

                        @if(!empty($card->id))
                            <div class="form-group">
                                <div class="col-sm-4">
                                    <a  href="http://127.0.0.1:8000/admin/generate_vcard/{{$card->id}}" target="_blank"><button type="button" class="btn btn-success" target="_blank" >Generate Vcard Link</button></a>
                                </div>
                            </div>
                        @endif

                        <div class="col-xs-12 col-sm-12 col-md-12 submit_btn">
                            <button type="submit" class="btn btn-success">Save Details</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

@endpush

        


