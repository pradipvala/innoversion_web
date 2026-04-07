

@extends('admin.layouts.app')


@push('url_title') Payment Successfull  @endpush

@push('content')


@if ($message = Session::get('success'))
<div class="alert alert-success my-2">
  <p>{{ $message }}</p>
</div>
@endif

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<style>
    body{
        width: 100%;
        margin: auto;
        font-family: -apple-system,BlinkMacSystemFont,"Segoe UI",Roboto,"Helvetica Neue",Arial,"Noto Sans",sans-serif,"Apple Color Emoji","Segoe UI Emoji","Segoe UI Symbol","Noto Color Emoji";
    }
    table{
        width: 100%;
        padding: 20px;
    }
   
    .border{
        margin-top: 20px;
        border: 1px solid darkgray;
        border-radius: 10px;
        box-shadow: 1px 1px 4px 1px darkgray;
        }
    .bluetext a{
        text-decoration: none;
        color: skyblue;
    }
    .b{
        border-bottom: 1px solid black;
    }
</style>
<body>


       

@if ($message = Session::get('success'))
<div class="alert alert-success my-2">
  <p>{{ $message }}</p>
</div>
@endif


<div class="form-box" style="margin: auto;padding: 50px;background: #ffffff;border: 10px solid #f2f2f2;margin-top: 100px;">
  <div class="row" style="text-align:center;">
    <div class="content">
      <div class="row">
        <div class="col-md-12">
          <div class="card-box">
            <div class="row form-horizontal">
              <div class="form-group">
                <div class="col-sm-12">
                  <table>
                    <tr>
                      <td>
                        <img src="{{ asset('frontend_theme/assets/images/innoversion_logo.png') }}" style="width:160px;height:60px;">
                      </td>
                      <td><h3>Payment Details</h3></td>
                      <td>
                          <p>Transaction id : <b>123456</b></p>
                          <p>Payment Done  on {{date('d-m-Y')}}</p>
                      </td>
                    </tr>
                  </table>
                  <table class="border">
                      <tr>
                        <td>
                          <table>
                            <td colspan="3" style="width: 100%; border-bottom: 1px solid black;padding-bottom: 30px;"> 
                              <h1>Test Franchise Name</h1>
                              <p>150 feet ring road rajkot, Rajkot, 360002</p>
                              <p class="bluetext" style="margin: 0;"><a href="#"><b> 9087908790 </b></a></p>
                              <p class="bluetext" style="margin: 0;"> <a href=""><b> test@gmail.com </b></a></p>
                            </td>
                          </table>
                        </td>
                      </tr>
                      <tr>
                        <td>
                          <table class="b">
                            <tr>
                              <td><b>Transaction Details</b></td>
                              <td>
                                  <p>Payment Details</p>
                                  <p style="font-size: 1.25rem;"><b>Mon, 05 Aug</b></p>
                                  <p>at {{date('d-m-Y')}}</p>
                              </td>
                            </tr>
                          </table>
                        </td>
                      </tr>
                      <tr>
                        <td>
                          <table class="b"> 
                            <tr>
                              <td style="padding-right: 70px;"><p><b>Payment To</b></p></td>
                              <td>
                                  <p><b>Test test</b></p>
                                  <p>(Primary Franchise Person)</p>
                                  <p style="font-size: 1.25rem;"><b>Test test</b></p>
                                  <p><a href="" style="color: darkgray;text-decoration: none;">yadavpj1133@gmail.com,</a> 9087654545</p>
                              </td>
                            </tr>
                          </table>
                        </td>
                      </tr>
                      <tr>
                        <td>
                          <table class="b">
                              <tr>
                                <td style="padding-right: 50px;"><p><b> Amount </b></p>
                                </td>
                                <td>
                                    <h5><p style="font-size: 1.25rem;"> <b>
                                        INR 1</b></p></h5>
                                </td>
                              </tr>
                          </table>
                        </td>
                      </tr>
                  </table>
                  
                  <h3>Important information</h3>
                  <p style="width: 80%;"> passport, Aadhar, Govt. ID and Driving License are accepted as ID proof. Local ids are allowed
                      GST invoice can be collected directly from the property</p>
                      <br><br>
                      <img src="{{ asset('frontend_theme/assets/images/innoversion_logo.png') }}" style="width:160px;height:60px;margin-right:30px;"><br><br>
                       <p><b>Innoversion Technolab Support</b></p><br><br>
                      <p><a href="#"> +91120 9087654 / +91130 3456789 (India Fixed Line)</a></p>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>


</body>
</html>
@endpush
