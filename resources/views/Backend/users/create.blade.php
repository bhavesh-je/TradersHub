@extends('layouts.main-app')
@section('breadcrumb')
    <li><a href="{{ route('users.index') }}">Users</a></li>
    <li>Create User</li>
@endsection

@section('css')
<!-- Select2 -->
<link rel="stylesheet" href="{{ asset('traders-assets/css/select2.min.css') }}">
<link rel="stylesheet" href="{{ asset('traders-assets/css/select2-bootstrap4.min.css') }}">
@endsection

@section('content')
<div class="col-xs-12 col-sm-12 col-md-12">
    <div class="card">
        <div class="card-header">
            <h3 class="card-title">Create User</h3>
        </div>
        <div class="card-body">
            <form method="POST" action="{{ route('users.store') }}" enctype="multipart/form-data">
            @csrf
                <div class="row">
                    <div class="col-md-6 mb-3">
                        <div class="d-flex justify-content-between align-items-center">
                            <div>
                                <label for="name" class="form-label"><strong>Name</strong></label>
                            </div>
                        </div>

                        <input type="text" id="name" name="name" class="form-control custom-control @error('name') danger-box @enderror " placeholder="Enter name" value="{{ old('name') }}">
                        @error('name')
                            {{-- <span id="name-error" class="error invalid-feedback">{{ $message }}</span> --}}
                            <span class="error-text" role="alert">{{ $message }}</span>
                        @enderror
                        {{-- <span class="error text-danger" role="alert">
                            Caption text, description, error notification
                        </span> --}}
                    </div>
                    <div class="col-md-6 mb-3">
                        <div class="d-flex justify-content-between align-items-center">
                            <div>
                                <label for="email" class="form-label"><strong>Email</strong></label>
                            </div>
                        </div>

                        <input type="text" id="email" name="email" class="form-control custom-control @error('email') danger-box @enderror " placeholder="Enter email" value="{{ old('email') }}">
                        @error('email')
                            <span class="error-text" role="alert">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="col-md-6 mb-3">
                        <div class="d-flex justify-content-between align-items-center">
                            <div>
                                <label for="password" class="form-label"><strong>Password</strong></label>
                            </div>
                        </div>

                        <input type="password" id="password" name="password" class="form-control custom-control @error('password') danger-box @enderror " placeholder="Enter password" value="{{ old('password') }}">
                        @error('password')
                            <span class="error-text" role="alert">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="col-md-6 mb-3">
                        <div class="d-flex justify-content-between align-items-center">
                            <div>
                                <label for="confirm-password" class="form-label"><strong>Confirm Password</strong></label>
                            </div>
                        </div>

                        <input type="password" id="confirm-password" name="confirm-password" class="form-control custom-control @error('confirm-password') danger-box @enderror " placeholder="Enter confirm-password" value="{{ old('confirm-password') }}">
                        @error('confirm-password')
                            <span class="error-text" role="alert">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="col-md-12 mb-3">
                        <div class="d-flex justify-content-between align-items-center">
                            <div>
                                <label for="Details" class="form-label"><strong>Details</strong></label>
                            </div>
                        </div>
                        <textarea name="details" id="details" cols="30" rows="7" class="form-control custom-control @error('details') danger-box @enderror" placeholder="Enter your details" value="{{ old('details') }}" ></textarea>
                        @error('details')
                            <span class="error-text" role="alert">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class='col-md-4 mb-3'>
                        <div class="d-flex justify-content-between align-items-center">
                            <div>
                                <label for="Country" class="form-label"><strong>Country</strong></label>
                            </div>
                        </div>
                        {{-- <div class="align-items-center"> --}}
                            <select class="form-select custome-select @error('country') danger-box @enderror" aria-label="Default select example" id="country" name="country">
                                <option value="">-- Country --</option>
                            </select>
                        {{-- </div> --}}
                    </div>
                    <div class='col-md-4 mb-3'>
                        <div class="d-flex justify-content-between align-items-center">
                            <div>
                                <label for="Region" class="form-label"><strong>Region</strong></label>
                            </div>
                        </div>
                        {{-- <div class='align-items-center'> --}}
                            <select id="region" name="region" class='form-select custome-select'  ><option value="">-- Region --</option></select>
                        {{-- </div> --}}
                    </div>
                    
                    <div class='col-md-4 mb-3'>
                        <div class="d-flex justify-content-between align-items-center">
                            <div>
                                <label for="City" class="form-label"><strong>City</strong></label>
                            </div>
                        </div>
                        {{-- <div class='align-items-center'> --}}
                            <select id="city" name="city" class='form-select custome-select' ><option value="">-- City --</option></select>
                        {{-- </div> --}}
                    </div>
                    <div class="col-md-6 mb-3">
                        <div class="d-flex justify-content-between align-items-center">
                            <div>
                                <label for="Portfolio Website Url" class="form-label"><strong>Portfolio Website Url</strong></label>
                            </div>
                        </div>
                        <input type="text" name='weburl' id='weburl'  class='form-control custom-control' placeholder="Enter your website url"  value="{{ old('weburl') }}"/>
                    </div>
                    <div class="col-md-6 mb-3">
                        <div class="d-flex justify-content-between align-items-center">
                            <div>
                                <label for="roles" class="form-label"><strong>Role</strong></label>
                            </div>
                        </div>
                        {{-- <div class="align-items-center"> --}}
                            <select class="form-select custome-select @error('roles') danger-box @enderror" aria-label="Default select example" id="roles" name="roles">
                                <option value="">Select role</option>
                                @foreach( $roles as $role )
                                    <option value="{{ $role }}">{{ $role }}</option>
                                @endforeach
                            </select>
                        {{-- </div> --}}
                        @error('roles')
                            <span class="error-text" role="alert">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="col-md-12 mb-3">
                        <div class="d-flex justify-content-between align-items-center">
                            <div>
                                <label for="profile_img" class="form-label"><strong>Profile Image</strong></label>
                            </div>
                        </div>
                       
                        {{-- <input type="file" class="file" accept="image/*" name="profile_img" id="profile_img" value="{{ $user->profile_img }}"> --}}
                        <input type="file" class="file" name="profile_img" id="profile_img">
                        <div class="input-group">
                            <input type="text" class="form-control custom-control" disabled placeholder="Upload File" name="profile_img_text" id="file" >
                            <div class="input-group-append">
                                <button type="button" class="browse butn-primary">Browse</button>
                                <!-- <input class="form-control" type="file" id="formFileMultiple" multiple> -->
                            </div>
                        </div>
                        @error('profile_img')
                            <span class="error-text" role="alert">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="col-md-6 mb-3 profile-img-section profile_img_prv" style="display: none;">
                        <div class="d-flex justify-content-between align-items-center">
                            <div>
                                <label for="que_img" class="form-label"><strong>Preview Image</strong></label>
                            </div>
                        </div>
                        <div class="preview-img">
                            {{-- <img src="" alt="" id="preview-image-before-upload" class="imageThumb" style='max-height: 250px;'> --}}
                            {{-- <button type="button" class="btn btn-danger custom-btn remove-que-img" title="Remove image"><i class="fas fa-times"></i></button> --}}
                        </div>
                    </div>
                    <div class="col-xs-12 col-sm-12 col-md-12 text-center">
                        <button type="submit" class="btn btn-primary custom-btn">Create</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection

@section('js')
<script src="{{ asset('traders-assets/js/select2/js/select2.min.js') }}"></script>
<script src="{{ asset('admin-lte/plugins/bs-custom-file-input/bs-custom-file-input.min.js')}}"></script>
<script>
    $("#roles").select2();
    $(document).ready(function () {
        $(document).on("click", ".browse", function() {
            var file = $(this).parents().find(".file");
            file.trigger("click");
        });

        $('input[type="file"]').change(function(e) {
            var fileName = e.target.files[0].name;
            $("#file").val(fileName);
        
            var reader = new FileReader();
            reader.onload = function(e) {
            // get loaded data and render thumbnail.
            // document.getElementById("preview").src = e.target.result;
                $('#preview-image-before-upload').attr('src', e.target.result);
                $('.profile_img_prv').show();
            };
            // read the image file as a data URL.
            reader.readAsDataURL(this.files[0]);
        });

        $("#profile_img").on("change", function(e) {
            var files = e.target.files, filesLength = files.length;
            console.log("Hello");
            var f = files[0]
            let extension = f.name.match(/(?<=\.)\w+$/g)[0].toLowerCase();
            if (extension === 'jpg' || extension === 'png') {
                $("#file").val(f.name);
                var fileReader = new FileReader();
                fileReader.onload = (function(e) {
                    var file = e.target;
                    $('.preview-img').append("<span class=\"pip\">" +
                        "<img class=\"imageThumb\" src=\"" + e.target.result + "\" title=\"" + file.name + "\"/ style='max-height: 250px;'>" +
                        "<br/><button type=\"button\" class=\"btn btn-danger custom-btn remove-que-img \" title=\"Remove image\"><i class=\"fas fa-times\"></i></button>" +
                        "</span>");
                    $(".remove-que-img").click(function(){
                        $(this).parent(".pip").remove();
                        e.target.value = ''
                        $('#profile_img').attr('value', '');
                        $('.profile-img-section').hide();
                    });
                });
                fileReader.readAsDataURL(f);
                $('.profile-img-section').show();
            }else{
                e.target.value = '';
                alert('Wrong file extension! Please upload only jpg, jpeg, png image.');
                $('.profile-img-section').hide();
            }
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