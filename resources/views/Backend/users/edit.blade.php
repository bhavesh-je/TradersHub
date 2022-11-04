@extends('layouts.main-app')
@section('breadcrumb')
    <li><a href="{{ route('users.index') }}">Users</a></li>
    <li>Edit User</li>
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
            <h3 class="card-title">Edit User</h3>
        </div>
        <div class="card-body">
            <form method="POST" action="{{ route('users.update', $user->id) }}" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="row">
                    <div class="col-md-12 mb-3">
                        <div class="d-flex justify-content-between align-items-center">
                            <div>
                                <label for="name" class="form-label"><strong>Name</strong></label>
                            </div>
                        </div>

                        <input type="text" id="name" name="name" class="form-control custom-control @error('name') danger-box @enderror " placeholder="Enter name" value="{{ $user->name }}">
                        @error('name')
                            <span class="error-text" role="alert">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="col-md-12 mb-3">
                        <div class="d-flex justify-content-between align-items-center">
                            <div>
                                <label for="email" class="form-label"><strong>Email</strong></label>
                            </div>
                        </div>

                        <input type="text" id="email" name="email" class="form-control custom-control @error('email') danger-box @enderror " placeholder="Enter email" value="{{ $user->email }}">
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

                        <input type="text" id="password" name="password" class="form-control custom-control @error('password') danger-box @enderror " placeholder="Enter password" value="">
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

                        <input type="text" id="confirm-password" name="confirm-password" class="form-control custom-control @error('confirm-password') danger-box @enderror " placeholder="Enter confirm-password" value="{{ old('confirm-password') }}">
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
                        <textarea name="details" id="details" cols="30" rows="7" class="form-control custom-control @error('details') danger-box @enderror" placeholder="Enter your details" >{{ $user->details }}</textarea>
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
                        <div class="align-items-center">
                            @php
                              $location = explode(",", $user->location)
                            @endphp
                            <input type="hidden" name="selectedcuntrycode" id="selectedcuntrycode" value="{{ $location[0] }}">
                            <select id="country" name="country"  class='form-select custome-select' ><option value="">-- Country --</option></select>
                        </div>
                    </div>
                    <div class='col-md-4 mb-3'>
                        <div class="d-flex justify-content-between align-items-center">
                            <div>
                                <label for="Region" class="form-label"><strong>Region</strong></label>
                            </div>
                        </div>
                        <div class='align-items-center'>
                            <input type="hidden" name="selectedregion" id="selectedregion" value="{{ $location[1] }}">
                            <select id="region" name="region" class='form-select custome-select'  ><option value="">-- Region --</option></select>
                        </div>
                    </div>
                    
                    <div class='col-md-4 mb-3'>
                        <div class="d-flex justify-content-between align-items-center">
                            <div>
                                <label for="City" class="form-label"><strong>City</strong></label>
                            </div>
                        </div>
                        <div class='align-items-center'>
                            <input type="hidden" name="selectedcity" id="selectedcity" value="{{ $location[2] }}">
                            <select id="city" name="city" class='form-select custome-select' ><option value="">-- City --</option></select>
                        </div>
                    </div>
                    <div class="col-md-6 mb-3">
                        <div class="d-flex justify-content-between align-items-center">
                            <div>
                                <label for="Portfolio Website Url" class="form-label"><strong>Portfolio Website Url</strong></label>
                            </div>
                        </div>
                        <input type="text" name='weburl' id='weburl'  class='form-control custom-control' placeholder="Enter your website url"  value="{{ $user->portfolio_website_url }}"/>
                    </div>
                    <div class="col-md-6 mb-3">
                        <div class="d-flex justify-content-between align-items-center">
                            <div>
                                <label for="roles" class="form-label"><strong>Role</strong></label>
                            </div>
                        </div>
                        <div class="row align-items-center">
                            <select class="form-select custome-select @error('roles') danger @enderror" aria-label="Default select example" id="roles" name="roles">
                                <option value="">Select role</option>
                                @foreach($roles as $role )
                                    <option value="{{ $role }}" @if(in_array($role, $userRole)) selected @endif>{{ $role }}</option>
                                @endforeach
                            </select>
                        </div>
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
                        <input type="file" class="file" name="profile_img" id="profile_img" value="{{ $user->profile_img }}">
                        <div class="input-group">
                            <input type="text" class="form-control custom-control" disabled placeholder="Upload File" name="profile_img_text" id="file" value="{{ $user->profile_img }}">
                            <div class="input-group-append">
                                <button type="button" class="browse butn-primary">Browse</button>
                                <!-- <input class="form-control" type="file" id="formFileMultiple" multiple> -->
                            </div>
                        </div>
                        @error('profile_img')
                            <span class="error-text" role="alert">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="col-md-6 mb-3 profile-img-section">
                        <div class="d-flex justify-content-between align-items-center">
                            <div>
                                <label for="profile_img" class="form-label"><strong>Preview Image</strong></label>
                            </div>
                        </div>
                        <div class="preview-img">
                            @if(!empty($user->profile_img))
                            <span class="pip">
                                <img class="imageThumb" src="{{ asset('uploads/users-profile/'.$user->profile_img) }}" title="" style='max-height: 250px;'>
                                {{-- <span class="badge badge2 glow-danger bg-danger remove-profile-img" title="Remove image"><i class="fas fa-times"></i></span> --}}
                                <button type="button" class="btn btn-danger custom-btn remove-que-img" title="Remove image"><i class="fas fa-times"></i></button>
                            </span>
                            @endif
                        </div>
                    </div>
                    <div class="col-xs-12 col-sm-12 col-md-12 text-center">
                        <button type="submit" class="btn btn-primary custom-btn">Update</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection

@section('js')
<script src="{{ asset('admin-lte/plugins/jquery/jquery.min.js')}}"></script>
<script src="{{ asset('traders-assets/js/select2/js/select2.min.js') }}"></script>
<script src="{{ asset('admin-lte/plugins/bs-custom-file-input/bs-custom-file-input.min.js')}}"></script>
<script>
    bsCustomFileInput.init();
    $("#roles").select2();
    $(document).ready(function () {
        $(document).on("click", ".browse", function() {
            var file = $(this).parents().find(".file");
            file.trigger("click");
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
                    // $('.preview-img').append("<span class=\"pip\">" +
                    //     "<img class=\"imageThumb\" src=\"" + e.target.result + "\" title=\"" + file.name + "\"/ style='max-height: 250px;'>" +
                    //     "<br/><button type=\"button\" class=\"btn btn-danger custom-btn remove-que-img\" title=\"Remove image\"><i class=\"fas fa-times\"></i></button>" +
                    //     "</span>");
                    $('.imageThumb').attr('src', e.target.result);
                    $(".remove-que-img").click(function(){
                        $(this).parent(".pip").remove();
                        e.target.value = '';
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

        $(".remove-que-img").on("click",function(e){
            $.ajax({
                url : '{{ route("uploadProfileImg") }}',
                type: 'POST',
                data: {
                    "id" : {{ $user->id }},
                    "img" : '{{ $user->profile_img }}',
                    "_token": "{{ csrf_token() }}",
                },
                success: function (response){
                    console.log(response);
                }
            });

            $(this).parent(".pip").remove();
            e.target.value = ''
            $('#file').val('');
            $('#profile_img').attr('value', '');
            $('.profile-img-section').hide();
        });
        


        
        let selected1 = $('#selectedcuntrycode').val();
        const selectedcuntrycode = selected1.substring(0, 2);
        const selectedregion = $('#selectedregion').val();
        const selectedcity = $('#selectedcity').val();

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