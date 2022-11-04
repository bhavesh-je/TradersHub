import React, { useState, useRef, useEffect, Component } from 'react';
import Authenticated from '@/Layouts/Authenticated';
import { Head } from '@inertiajs/inertia-react';
import { Container, Accordion, Row, Col, Button, Card, CardGroup, Form, Image } from 'react-bootstrap';
import axios from 'axios';
import { event } from 'jquery';
import ValidationErrors from '@/Components/ValidationErrors';

class Profile extends Component {
    constructor(props) {
        super(props);
        this.state = {
            status: [],
            success: [],
            errors: [],
            error: '',
            users: this.props.userData,
            roleName: this.props.roleName,
            selectedRegion: "",
            selectedCity: "",
            countryCode: "",
            getcountry: this.props.userData.location.split(",")[0],
            getregion: this.props.userData.location.split(",")[1],
            getcity: this.props.userData.location.split(",")[2],
        };
        this.onHandleChange = this.onHandleChange.bind(this);
        this.onPrsubmit = this.onPrsubmit.bind(this);
        this.input = React.createRef();
    }
    

    componentDidMount(){
        // console.log("country : "+ this.state.getcountry);
        // console.log("region : "+this.state.getregion);
        // console.log("city : "+this.state.getcity);

        this.setState({users: this.props.userData});
        // var selectedCountry = (this.state.selectedRegion = this.state.selectedCity = this.state.countryCode = "");
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
            $("#imageThumb").attr("src", "uploads/users-profile/profile_avatar.png");
            // $('.preview1').removeClass('it');
            // $('.btn-rmv1').removeClass('rmv');
        });
    }

    recommended(nextProps) { }

    onHandleChange(e) {
        this.setState({ users: e});
    }

    onPrsubmit(e) {
        e.preventDefault();
        const formData = new FormData(document.getElementById("prfrom"));
        const config = { headers: { 'content-type': 'application/json', 'x-inertia': 'true', 'enctype': 'multipart/form-data' } };
        axios.post('/profile/update', formData, config)
            .then(res => {
                this.setState({ status: res.data.success});
                if(res.data.errors){
                    this.setState({errors : res.data.errors});
                    console.log("set data");
                }else{
                    this.setState({errors: []});
                }
                console.log(res.data);
            }).catch(err => {
                console.log(err);
            });
    }

    // onCpsubmit(e) {
    //     e.preventDefault();
    //     const formData = new FormData(document.getElementById("cpfrom"));
    //     const config = { headers: { 'content-type': 'application/json', 'x-inertia': 'true', 'enctype': 'multipart/form-data' } };
    //     axios.post('/profile/changepassword', formData, config)
    //         .then(res => {
    //             // setSuccess(res.data.succes);
    //             // setError(res.data.errors);
    //             this.setState({ success: res.data.succes, error: res.data.errors });
    //             // console.log(res.data.success);
    //         }).catch(err => {
    //             console.log(err);
    //         });
    // }

    render() {
        var location = this.state.users.location.split(',');
        return (
            <Authenticated
                auth={this.props.auth}
                errors={this.state.errors}
                header={<h2 className="font-semibold text-xl text-gray-800 leading-tight">Profile</h2>}
            >
                <div className="propageSec">
                <div className="container my-3 p-3">
                    <h2>Profile Details</h2>
                    <hr />
                    {this.state.status && <div className="mb-4 font-medium text-sm text-green-600">{this.state.status}</div>}
                    <form onSubmit={this.onPrsubmit} id="prfrom" >
                        <div className="row uploadDiv">
                            <div className="col-12 d-flex align-items-end">
                                <div className='pip'>
                                    <img src="uploads/users-profile/profile_avatar.png" alt="profile_avatar" className="imageThumb" id="imageThumb"/>
                                </div>
                                <div className="mx-4">
                                    <div className="d-flex">
                                        <span class="btn_upload text-decoration-none mb-3 btn btn-primary">
                                            <input type="file" name="profile_img" title='' id='profile_img' className="file form-control" placeholder="Enter Profile Image" />
                                            Upload
                                        </span>
                                        {/* <a href="#" className="text-decoration-none mb-3 btn btn-primary browse" >Upload</a > */}
                                        <a href="#" className="text-decoration-none mb-3 btn btn-outline-primary mx-3    " id="removeImage" >Reset</a>
                                    </div>
                                    <p className="mb-0">Allowed file types: png, jpg, jpeg.</p>
                                </div>
                            </div>
                        </div>
                        <div className="row mt-5">
                            <div className="col-12">
                                    <div className="d-flex flex-wrap justify-content-between">
                                        <div className="d-flex flex-column widthIn mx-2">
                                            <input type="hidden" name='id' value={this.state.users.id} />
                                            <label htmlFor="name">Name:</label>
                                            {/* <input type="text" id="name" name="name" placeholder="John Coe" /><br /> */}
                                            <input type="text" name="name" id='name' placeholder="Enter Name" value={this.state.users.name} onChange={this.onHandleChange.bind(this)} /><br />
                                        </div>
                                        <div className="d-flex flex-column widthIn mx-2">
                                            <label htmlFor="email">Email:</label>
                                            {/* <input type="email" id="email" name="email"  placeholder="johndoe@gmail.com"/><br /> */}
                                            <input type="text" name="email" id='email' placeholder="Enter email" value={this.state.users.email} onChange={this.onHandleChange.bind(this)} /><br />
                                        </div>
                                        <div className="d-flex flex-column widthIn mx-2 w-100">
                                            <label htmlFor="details">Details:</label>
                                            {/* <textarea name="details" id="details" cols="10" rows="3" placeholder="Type here" ></textarea> */}
                                            <textarea name="details" id="details" cols="10" rows="3"  placeholder="Enter your details" value={this.state.users.details} onChange={this.onHandleChange.bind(this)}></textarea>
                                        </div>
                                        <div className=" d-flex w-100 my-2 mt-4">
                                            <div className="d-flex flex-column widthIn mx-2">
                                                <label htmlFor="">Country</label>
                                                <input type="hidden" name="selectedcuntrycode" id="selectedcuntrycode" value={location[0]} />
                                                <select id="country" name="country" className='form-control' ><option value="">-- Country --</option></select><br />
                                            </div>
                                            <div className="d-flex flex-column widthIn mx-2">
                                                <label htmlFor="pwd">Region:</label>
                                                <input type="hidden" name="selectedregion" id="selectedregion" value={location[1]} />
                                                <select id="region" name="region" className='form-control'  ><option value="">-- Region --</option></select><br />
                                            </div>
                                            <div className="d-flex flex-column widthIn mx-2">
                                                <label htmlFor="city">City:</label>
                                                <input type="hidden" name="selectedcity" id="selectedcity" value={location[2]} />
                                                <select id="city" name="city" className='form-control' ><option value="">-- City --</option></select><br />
                                            </div>
                                        </div>
                                    </div>
                                    <div className="d-flex flex-column widthIn mx-2 ">
                                        <label htmlFor="state">Website Url:</label>
                                        {/* <input type="text" name="weburl" id="weburl" className="form-control" placeholder="Enter your website url" /> */}
                                        <input type="text" name='weburl' id='weburl'  className='form-control' placeholder="Enter your website url" value={this.state.users.portfolio_website_url} onChange={this.onHandleChange.bind(this)}/>
                                        <br />
                                    </div>
                                    <div className=" d-flex w-100 mb-4 widthInner">
                                        <div className="d-flex flex-column widthIn mx-2">
                                            <label htmlFor="newpassword" className="">New Password *</label>
                                            {/* <input type="password" name="newpassword" id="newpassword" className="form-control" placeholder="Enter newpassword" /> */}
                                            <input type="password" name="newpassword" id='newpassword' className="form-control" placeholder="Enter newpassword" />
                                        </div>
                                        <div className="d-flex flex-column widthIn mx-2">
                                            <label htmlFor="confirmed" className="">Confirmed Password *</label>
                                            {/* <input type="password" name="confirmed" id="confirmed" className="form-control" placeholder="Enter confirmed" /> */}
                                            <input type="password" name="confirmed" id='confirmed' className="form-control" placeholder="Enter confirmed" />
                                            {this.state.errors.confirmed && <div className="mb-4 font-medium text-sm text-danger">{this.state.errors.confirmed}</div>}
                                        </div>
                                    </div>
                                <div className="d-flex mx-2 uploadDiv w-100">
                                    {/* <a href="#" className="text-decoration-none mb-3 btn btn-primary" > */}
                                    <button type="submit" id="prsubmit" className="btn btn-primary">Save Changes</button>
                                    {/* </a > */}
                                    {/* <a href="#" className="text-decoration-none mb-3 btn btn-outline-primary mx-3" >Discard</a> */}
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
                </div>
            </Authenticated>
        );
    }
}
export default Profile;