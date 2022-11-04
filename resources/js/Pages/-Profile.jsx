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
            errors: '',
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
        this.input = React.createRef();
    }
    

    componentDidMount(){
        console.log("country : "+ this.state.getcountry);
        console.log("region : "+this.state.getregion);
        console.log("city : "+this.state.getcity);

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
                // setStatus(res.data.success);
                this.setState({ status: res.data.success });
                // console.log(res.data.success);
            }).catch(err => {
                console.log(err);
            });
    }

    onCpsubmit(e) {
        e.preventDefault();
        const formData = new FormData(document.getElementById("cpfrom"));
        const config = { headers: { 'content-type': 'application/json', 'x-inertia': 'true', 'enctype': 'multipart/form-data' } };
        axios.post('/profile/changepassword', formData, config)
            .then(res => {
                // setSuccess(res.data.succes);
                // setError(res.data.errors);
                this.setState({ success: res.data.succes, error: res.data.errors });
                // console.log(res.data.success);
            }).catch(err => {
                console.log(err);
            });
    }

    render() {
        return (
            <Authenticated
                auth={this.props.auth}
                errors={this.state.errors}
                header={<h2 className="font-semibold text-xl text-gray-800 leading-tight">Profile</h2>}
            >
                <div className="py-12">
                    <div className="max-w-7xl mx-auto sm:px-6 lg:px-8">
                        <Card className="py12">
                            <Card.Body>
                                <table>
                                    <thead>
                                        <tr>
                                            <th style={{ width: "15rem" }}><Card.Title >Personal Information</Card.Title></th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td><b>Name</b> : {this.props.userData.name}</td>
                                            <td rowSpan="4">
                                                <div className='d-flex justify-content-end'> <img src={"uploads/users-profile/" + this.props.userData.profile_img} width="20%" className="rounded" /></div>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td><b>Email</b> : {this.props.userData.email}</td>
                                        </tr>
                                        <tr>
                                            <td><b>Role</b> : {this.props.roleName}</td>
                                        </tr>
                                    </tbody>
                                </table>
                            </Card.Body>
                        </Card>
                        <Accordion>
                            <Accordion.Item eventKey="1" key="1">
                                <Accordion.Header>Personal Information</Accordion.Header>
                                <Accordion.Body>
                                    {/* Personal Information from : prfrom */}
                                    {this.state.status && <div className="mb-4 font-medium text-sm text-green-600">{this.state.status}</div>}
                                    <ValidationErrors errors={this.state.errors} />
                                    <form onSubmit={this.onPrsubmit} id="prfrom">
                                        {/* <Card>
                                            <Card.Body> */}
                                        <input type="hidden" name='id' value={this.state.users.id} />
                                        <div className="form-group">
                                            <label htmlFor="" className="">Name</label>
                                            <input type="text" name="name" id='name' className="form-control" placeholder="Enter Name" value={this.state.users.name} onChange={this.onHandleChange.bind(this)} />
                                        </div>
                                        <div className="form-group">
                                            <label htmlFor="" className="">Email</label>
                                            <input type="text" name="email" id='email' className="form-control" placeholder="Enter email" value={this.state.users.email} onChange={this.onHandleChange.bind(this)} />
                                        </div>
                                        <div className="form-group">
                                            <label htmlFor="" className="">Details</label>
                                            <textarea name="details" id="details" cols="30" rows="7" className="form-control" placeholder="Enter your details" value={this.state.users.details} onChange={this.onHandleChange.bind(this)}></textarea>
                                            {/* <input type="text" name="email" id='email' className="form-control" placeholder="Enter email" value={this.state.users.email} onChange={this.onHandleChange} /> */}
                                        </div>
                                        <div className='row'>
                                            <div className='col-md-4'>
                                                <div className='form-group'>
                                                    <label htmlFor="">Country</label>
                                                    <select id="country" name="country" className='form-control' required><option value="">-- Country --</option></select>
                                                </div>
                                            </div>
                                            <div className='col-md-4'>
                                                <div className='form-group'>
                                                    <label htmlFor="">Region</label>
                                                    <select id="region" name="region" className='form-control'  required><option value="">-- Region --</option></select>
                                                </div>
                                            </div>
                                            <div className='col-md-4'>
                                                <div className='form-group'>
                                                    <label htmlFor="">City</label>
                                                    <select id="city" name="city" className='form-control' required><option value="">-- City --</option></select>
                                                </div>
                                            </div>
                                        </div>
                                        <div className="form-group">
                                            <label htmlFor="">Portfolio Website Url</label>
                                            <input type="text" name='weburl' id='weburl'  className='form-control' placeholder="Enter your website url" value={this.state.users.portfolio_website_url} onChange={this.onHandleChange.bind(this)}/>
                                        </div>
                                        <div className="form-group">
                                            <label htmlFor="" className="">Profile Image</label>
                                            <input type="file" name="profile_img" id='profile_img' className="form-control" placeholder="Enter Profile Image" />
                                        </div>
                                        {/* </Card.Body>
                                        </Card> */}
                                        <div className="col-md-12 text-center">
                                            <button type="submit" id="prsubmit" className="btn btn-primary">Submit</button>
                                        </div>
                                    </form>
                                </Accordion.Body>
                            </Accordion.Item>
                            <Accordion.Item eventKey="2" key="2">
                                <Accordion.Header>Change Password</Accordion.Header>
                                <Accordion.Body>
                                    {/* change password from : cpfrom */}
                                    {this.state.success && <div className="mb-4 font-medium text-sm text-green-600">{this.state.success}</div>}
                                    <ValidationErrors errors={this.state.error} />
                                    <form onSubmit={this.onCpsubmit} id="cpfrom">
                                        {/* <Card>
                                            <Card.Body> */}
                                        <input type="hidden" name='id' value={this.state.users.id} />
                                        <div className="form-group">
                                            <label htmlFor="currentpassword" className="">Current Password *</label>
                                            <input type="password" name="currentpassword" id='currentpassword' className="form-control" placeholder="Enter currentpassword" />
                                        </div>
                                        <div className="form-group">
                                            <label htmlFor="newpassword" className="">New Password *</label>
                                            <input type="password" name="newpassword" id='newpassword' className="form-control" placeholder="Enter newpassword" />
                                        </div>
                                        <div className="form-group">
                                            <label htmlFor="confirmed" className="">Current Password *</label>
                                            <input type="password" name="confirmed" id='confirmed' className="form-control" placeholder="Enter confirmed" />
                                        </div>
                                        
                                        {/* </Card.Body>
                                        </Card> */}
                                        <div className="col-md-12 text-center">
                                            <button type="submit" id="cpsubmit" className="btn btn-primary">Submit</button>
                                        </div>
                                    </form>
                                </Accordion.Body>
                            </Accordion.Item>
                        </Accordion>
                    </div>
                </div>
            </Authenticated>
        );
    }
}
export default Profile;