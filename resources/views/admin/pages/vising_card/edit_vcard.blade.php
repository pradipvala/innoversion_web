@extends('admin.layouts.app')

@push('url_title') Visiting Card Details @if(isset($card)) Edit @else Add @endif @endpush
@if(isset($card))
  @section('title',  'Edit Digital Visiting Card')
@else
  @section('title',  'Add Digital Visiting Card')
@endif

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
                    <form action="{{ route('admin.card.update') }}" method="POST" class="form-horizontal" id="digital_card_form" role="form" enctype="multipart/form-data">
                        @csrf
                        <input type="hidden" name="card_id" id="card_id" value="{{$card->id}}">
                       
                        <div class="form-group">
                            <div class="col-sm-4">
                                <label>Company Logo: </label><br />
                                    @if (isset($card->company_logo))
                                        <img src="{{ \Storage::url($card->company_logo) }}" height="80px"
                                            width="80px"><br /><br />
                                        <input type="file" name="company_logo" id="company_logo" placeholder="Company Logo" 
                                            class="filestyle form-control" accept="image/jpg, image/png, image/jpeg" />
                                        @if (count($errors) > 0)
                                            @foreach ($errors->all() as $error)
                                                <span style="color:red">{{ $error }}</span>
                                            @endforeach
                                        @endif
                                    @else
                                        <input type="file" name="company_logo" id="company_logo" placeholder="Company Logo" 
                                            class="filestyle form-control" accept="image/jpg, image/png, image/jpeg" required />
                                        @if (count($errors) > 0)
                                            @foreach ($errors->all() as $error)
                                                <span style="color:red">{{ $error }}</span>
                                            @endforeach
                                        @endif
                                    @endif
                            </div>
                        </div>

                        
                        <h3>Personal Details</h3><br>
                            
                        <div class="form-group">
                            <div class="col-sm-4">
                                <label>Person Name:</label>
                                <input type="text" name="name" id="name" placeholder="Name" class="form-control" value="{{ isset($card->name) &&!empty($card->name)?$card->name :NULL; }}" required><br> 
                            </div>
                        
                            <div class="col-sm-4">
                                <label>Designation:</label>
                                <input type="text" name="designation" id="designation" placeholder="Designation" class="form-control" value="{{ isset($card->designation) &&!empty($card->designation)?$card->designation :NULL; }}" required><br> 
                            </div>
                        
                            <div class="col-sm-4">
                                <label>Company Name:</label>
                                <input type="text" name="company_name" id="company_name" placeholder="Company Name" class="form-control" value="{{ isset($card->company_name) &&!empty($card->company_name)?$card->company_name :NULL; }}" required><br> 
                            </div>
                        
                            
                        
                            <div class="col-sm-4">
                                <label>Phone No:</label>
                                <input type="text" class="form-control"  name="phone_no" id="phone_no" placeholder="9076543245" value="{{ isset($card->phone_no) &&!empty($card->phone_no)?$card->phone_no :NULL; }}" required><br> 
                            </div>
                        
                            <div class="col-sm-4">
                                <label>Email:</label>
                                <input type="email" class="form-control"  name="email" id="email" placeholder="Email" value="{{ isset($card->email) &&!empty($card->email)?$card->email :NULL; }}" required><br> 
                            </div>
                        
                            <div class="col-sm-4">
                                <label>Website:</label>
                                <input type="url" class="form-control"  name="website" id="website" placeholder="Website" value="{{ isset($card->website) &&!empty($card->website)?$card->website :NULL; }}" required><br> 
                            </div>

                            <div class="col-sm-4">
                                <label for="company_description">Company Description</label>
                                <textarea class="form-control" name="company_description" id="company_description" maxlength="255" rows="3" cols="50" required>{{ isset($card->company_description) &&!empty($card->company_description)?trim($card->company_description) :NULL; }}</textarea><br> 
                            </div>
                        
                            <div class="col-sm-4">
                                <label for="address">Address:</label>
                                <textarea class="form-control" name="address" id="address" rows="3" cols="50" required>{{ isset($card->address) &&!empty($card->address)?trim($card->address) :NULL; }}</textarea><br> 
                            </div>
                        
                            <div class="col-sm-4">
                                <label>Location:</label>
                                <input type="text" class="form-control"  name="location" id="location" placeholder="Location" value="{{ isset($card->location) &&!empty($card->location)?$card->location :NULL; }}" required><br> 
                            </div>
                        </div>

                        <h3>Social Media Links</h3>

                        <div class="form-group">
                            <div class="col-sm-4">
                                <label>Whatsapp No</label>
                                <input type="text" class="form-control" name="whatsapp_no" id="whatsapp_no" placeholder="9076543245" value="{{ isset($card->whatsapp_no) &&!empty($card->whatsapp_no)?$card->whatsapp_no :NULL; }}" required><br> 
                            </div>
                        
                            <div class="col-sm-4">
                                <label>Facebook Link:</label>
                                <input type="url" class="form-control"  name="facebook" id="facebook" placeholder="Facebook Link" value="{{ isset($card->facebook) &&!empty($card->facebook)?$card->facebook :NULL; }}"><br> 
                            </div>
                        
                            <div class="col-sm-4">
                                <label>X Link:</label>
                                <input type="url" class="form-control"  name="x_link" id="x_link" placeholder="X Link" value="{{ isset($card->x_link) &&!empty($card->x_link)?$card->x_link :NULL; }}"><br> 
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-sm-4">
                                <label>Linkedin Link:</label>
                                <input type="url" class="form-control"  name="linkedin" id="linkedin" placeholder="Linkedin Link" value="{{ isset($card->linkedin) &&!empty($card->linkedin)?$card->linkedin :NULL; }}"><br> 
                            </div>
                        
                            <div class="col-sm-4">
                                <label>Instagram Link:</label>
                                <input type="url" class="form-control"  name="instagram" id="instagram" placeholder="Instagram Link" value="{{ isset($card->instagram) &&!empty($card->instagram)?$card->instagram :NULL; }}"><br> 
                            </div>
                        </div>
                        
                        <h3>Payment QR Codes</h3>
                        <div class="form-group">
                            <div class="col-sm-4">
                                <label>Wallet Payment QR Code: </label><br />
                                    @if (isset($card->wallet_pay_qr_code))
                                    <img src="{{ \Storage::url($card->wallet_pay_qr_code) }}" height="80px"
                                        width="80px"><br /><br />
                                        <input type="file" class="filestyle form-control"  name="wallet_pay_qr_code" id="wallet_pay_qr_code" placeholder="Wallet Payment QR Code"  
                                                accept="image/jpeg, image/jpeg, image/png" >
                                    @if (count($errors) > 0)
                                        @foreach ($errors->all() as $error)
                                            <span style="color:red">{{ $error }}</span>
                                        @endforeach
                                    @endif
                                @else
                                <input type="file" class="filestyle form-control"  name="wallet_pay_qr_code" id="wallet_pay_qr_code" placeholder="Wallet Payment QR Code"  
                                        accept="image/jpeg, image/jpeg, image/png" required>
                                    @if (count($errors) > 0)
                                        @foreach ($errors->all() as $error)
                                            <span style="color:red">{{ $error }}</span>
                                        @endforeach
                                    @endif
                                @endif
                            </div>
                        </div>


                        <div class="form-group">
                            <div class="col-sm-6">
                                <button type="submit" class="btn btn-success">Save Details</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

@endpush
