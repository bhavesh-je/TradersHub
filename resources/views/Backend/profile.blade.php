@extends('layouts.main-app')
@section('breadcrumb')
    <li>Profile Edit</li>
@endsection

@section('content')
@php
    $name = explode(' ',$data->name);
    if ($data->location) { $location = explode(',',$data->location);
    } else { $location = [0=>"",1=>"",2=>""]; }
@endphp
<form method="POST" action="{{ route('profileUpdate') }}" enctype="multipart/form-data" id="profile_update">
    @csrf
    <div class="profile-wrap mb-4">
        <div class="p-4">
            <h5 class="mb-0">Profile Details</h5>
        </div>
        <div class="border-divider mb-3 p-0"></div>
        <div class="container my-3 p-4">
            <div class="row">
                <div class="col-12 d-flex align-items-end">
                    <div class="profile-img">
                        @php
                            $image = '';
                            if($data->profile_img == null){
                                $image = 'traders-assets/img/profile_avatar.png';
                            }else{
                                $image = 'uploads/users-profile/'.$data->profile_img;
                            }
                        @endphp
                        <img src="{{ asset($image) }}" alt="profile_avatar" class="imageThumb1" id="imageThumb">
                    </div>
                    <div class="ms-4 profile-content">
                        <div class="d-flex mb-2">
                            <span class="btn_upload text-decoration-none mb-0 btn btn-primary">
                                <input type="file" name="profile_img" title='' id='profile_img' className="file form-control" placeholder="Enter Profile Image" />
                                Upload
                            </span>
                            {{-- <button type="button" class="btn btn-primary custom-btn">Upload</button> --}}
                            <a type="button" class="btn-outline btn-outline-secondary" id="removeImage">Reset</a>
                        </div>
                        <p class="mb-0">Allowed file types: png, jpg, jpeg.</p>
                    </div>
                </div>
            </div>
            <div class="row mt-5">
                <div class="col-12">
                    {{-- <form action="#"> --}}
                        <div class="row">
                            <div class="col-md-6 mb-4">
                                <label for="firs tname" class="form-label">First Name</label>
                                <input type="text" name="fname" class="form-control custom-control" id="firstname" placeholder="john" value="{{ $name[0] }}" >
                            </div>
                            <div class="col-md-6 mb-4">
                                <label for="last name" class="form-label">Last Name</label>
                                <input type="text" name="lname" class="form-control custom-control" id="lastname" placeholder="doe" value="{{ $name[1] }}" >
                            </div>
                            <div class="col-md-6 mb-4">
                                <label for="email" class="form-label">Email</label>
                                <input type="email" name="email" class="form-control custom-control" id="email" placeholder="johndoe@gmail.com" value="{{ $data->email }}">
                            </div>
                            <div class="col-md-6 mb-4">
                                <label for="Website Url" class="form-label">Website Url</label>
                                <input type="text" weburl class="form-control custom-control" id="weburl" placeholder="www.abc.com" value="{{ $data->portfolio_website_url }}" >
                            </div>
                            <div class="col-md-6 mb-4">
                                <label for="New Password" class="form-label">New Password *</label>
                                <input type="password" name="newpassword" class="form-control custom-control @error('newpassword') danger-box @enderror" id="newpassword" placeholder="enter new password" value="{{ old('newpassword') }}">
                                @error('newpassword')
                                    <span class="error-text" role="alert">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="col-md-6 mb-4">
                                <label for="Confirmed Password" class="form-label">Confirmed Password *</label>
                                {{-- <input type="password" name="currentpassword" class="form-control custom-control" id="currentpassword" placeholder="enter current password"> --}}
                                <input type="password" name="confirmed" id='confirmed' class="form-control custom-control @error('confirmed') danger-box @enderror" placeholder="Enter confirmed password" value="{{ old('confirmed') }}" />
                                @error('confirmed')
                                    <span class="error-text" role="alert">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="col-md-4 mb-4">
                                <label for="city" class="form-label">City</label>
                                <input type="hidden" name="selectedcity" id="selectedcity" value="{{ $location[2] }}" />
                                <select id="city" name="city" class="form-select custome-select">
                                    <option value="">-- City --</option>
                                </select>
                            </div>
                            <div class="col-md-4 mb-4">
                                <label for="state" class="form-label">State</label>
                                <input type="hidden" name="selectedregion" id="selectedregion" value="{{ $location[1] }}" />
                                <select id="region" name="region" class="form-select custome-select">
                                    <option value="">-- Region --</option>
                                </select>
                            </div>
                            <div class="col-md-4 mb-4">
                                <label for="country" class="form-label">Country</label>
                                <input type="hidden" name="selectedcuntrycode" id="selectedcuntrycode" value="{{ $location[0] }}" />
                                <select id="country" name="country" class="form-select custome-select">
                                    <option value="">-- Country --</option>
                                </select>
                            </div>
                            <div class="col-md-12 mb-4">
                                <label class="form-label">Details</label>
                                <textarea class="form-control custom-control" placeholder="enter details" spellcheck="false">{{ $data->details }}</textarea>
                            </div>
                            <div class="col-md-12">
                                <button type="submit" class="btn btn-primary custom-btn">Save Changes</button>
                                <button type="reset" class="btn-outline btn-outline-secondary" id="reset">Discard</button>
                            </div>
                            
                        </div>
                        
                    {{-- </form> --}}
                    {{-- <div class="d-flex mx-2 uploadDiv w-100">
                        <a href="#" class="text-decoration-none mb-3 btn btn-primary">Save Changes</a>
                        <a href="#"
                            class="text-decoration-none mb-3 btn btn-outline-primary mx-3">Discard</a>
                    </div> --}}
                </div>
            </div>
        </div>
    </div>  
</form>
<div class="profile-wrap">
    <div class="p-4">
        <h5 class="mb-0">Delete Account</h5>
    </div>
    <div class="border-divider mb-3 p-0"></div>
    <div class="container my-3 p-4">
        <div class="row">
            <div class="col-lg-12">
                <div class="custom-alert">
                    <div class="alert alert-warning p-0" role="alert">
                        <h4 class="alert-heading">You Are Delete Account Your Account</h4>
                        <div class="alert-content warning">
                            <p class="mb-0">Once you delete your account, there is no going back. Please be certain.
                            </p>
                        </div>
                    </div>
                </div>
                <div class="mb-3 form-check">
                    <input type="checkbox" class="form-check-input" id="remember" name="remember">
                    <label class="form-check-label" for="remember">I confirm my account deactivation</label>
                  </div>
                  <button type="button" class="btn btn-danger custom-btn">Deactivate Account</button>
            </div>
        </div>
    </div>
</div>
@endsection

@section('js')
<script src="{{ asset('traders-assets/frontend/js/jquery.min.js') }}"></script>
<script>
    $(document).ready(function () {
        // $('#newpassword').on('keyup',function(){
        //     $("#profile_update").validate({
        //     rules: {
        //         newpassword: "confirmed|string|min:6|regex:/^(?=.*?[A-Z])(?=.*?[a-z])(?=.*?[0-9])(?=.*?[#?!@$%^&*-]).{6,}$/",
        //         confirmed: "required",
        //     }
        // });
        // });
        
        $("#reset").on("click",function() {
            $("#profile_update").trigger("reset");
            $("#profile_update").get(0).reset();
            $("#profile_update").reset();
            console.log("click ");
        });

        function readURL(input, imgControlName) {
            if (input.files && input.files[0]) {
                var reader = new FileReader();
                reader.onload = function(e) {
                $(imgControlName).attr('src', e.target.result);
                }
                reader.readAsDataURL(input.files[0]);
            }
        }
        $("#profile_img").on("change",function() {
            // add your logic to decide which image control you'll use
            var imgControlName = "#imageThumb";
            readURL(this, imgControlName);
            // $('.preview1').addClass('it');
            // $('.btn-rmv1').addClass('rmv');
        });
        $("#removeImage").on("click",function(e) {
            e.preventDefault();
            $("#profile_img").val("");
            $("#imageThumb").attr("src", "{!! asset('traders-assets/img/profile_avatar.png') !!}");
            // $('.preview1').removeClass('it');
            // $('.btn-rmv1').removeClass('rmv');
        });



        var selectedRegion ,selectedCity ,countryCode,region ;
        var selectedCountry = (selectedRegion = selectedCity = countryCode = "");
        var BATTUTA_KEY = "00000000000000000000000000000000";
        var url = "https://battuta.medunes.net/api/country/all/?key=" + BATTUTA_KEY + "&callback=?";

        $.getJSON(url, function(data) {
            // console.log(data);
            $.each(data, function(index, value) {
                $("#country").append('<option id="' + value.code + '" value="' + value.name + '">' + value.name + "</option>");
            });
        });
        $("#country").on("change",function() {
            selectedCountry = this.options[this.selectedIndex].text;
            countryCode = $(this).children(":selected").attr("id");
            // this.setState({countryCode: $(this).children(":selected").attr("id")});
            url = "https://battuta.medunes.net/api/region/" + countryCode + "/all/?key=" + BATTUTA_KEY + "&callback=?";
            $.getJSON(url, function(data) {
                $("#region option").remove();
                $('#region').append('<option value="">Please select your region</option>');
                $.each(data, function(index, value) {
                    $("#region").append(
                        '<option value="' + value.region + '">' + value.region + "</option>"
                    );
                });
            });
        });
        $("#region").on("change", function() {
            selectedRegion = this.options[this.selectedIndex].text;
            // this.setState({selectedRegion : this.options[this.selectedIndex].text});
            // var countryCode = this.state.countryCode;
            region = $("#region").val();
            url = "https://battuta.medunes.net/api/city/" + countryCode + "/search/?region=" + region + "&key=" + BATTUTA_KEY + "&callback=?";
            $.getJSON(url, function(data) {
                // console.log(data);
                $("#city option").remove();
                $('#city').append('<option value="">Please select your city</option>');
                $.each(data, function(index, value) {
                    $("#city").append('<option value="' + value.city + '">' + value.city + "</option>");
                });
            });
        });
        $("#city").on("change", function() {
            selectedCity = this.options[this.selectedIndex].text;
            // this.setState({selectedCity : this.options[this.selectedIndex].text});
            $("#location").html("Locatation: Country: " + selectedCountry + ", Region: " + selectedRegion + ", City: " + selectedCity );
        });
    });
</script>
@endsection