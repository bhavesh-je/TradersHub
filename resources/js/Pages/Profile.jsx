import React,{ useState, useRef, useEffect ,Component } from 'react';
import Authenticated from '@/Layouts/Authenticated';
import { Head } from '@inertiajs/inertia-react';
import { Container,Accordion , Row, Col, Button, Card, CardGroup , Form, Image } from 'react-bootstrap';
import axios from 'axios';
import { event } from 'jquery';
import ValidationErrors from '@/Components/ValidationErrors';

class Profile extends Component {
    constructor(props){
        super(props);
        this.state = {
            status: [],
            success: [],
            errors:'',
            error:'',
            users: this.props.userData,
            roleName: this.props.roleName,
        };
    }

    componentDidMount(){}

    recommended(nextProps){}

    onHandleChange(e){
        this.setState({users:e});
    }

    onPrsubmit(e){
        e.preventDefault();
        const formData = new FormData(document.getElementById("prfrom"));
        const config = { headers: { 'content-type': 'application/json', 'x-inertia': 'true' ,'enctype': 'multipart/form-data'} };
        axios.post('/profile/update', formData, config)
        .then(res => {
            // setStatus(res.data.success);
            this.setState({status:res.data.success});
            // console.log(res.data.success);
        }).catch(err => {
            console.log(err);
        });
    }

    onCpsubmit(e){
        e.preventDefault();
        const formData = new FormData(document.getElementById("cpfrom"));
        const config = { headers: { 'content-type': 'application/json', 'x-inertia': 'true' ,'enctype': 'multipart/form-data'} };
        axios.post('/profile/changepassword', formData, config)
        .then(res => {
            // setSuccess(res.data.succes);
            // setError(res.data.errors);
            this.setState({success:res.data.succes,error:res.data.errors});
            // console.log(res.data.success);
        }).catch(err => {
            console.log(err);
        });
    }

    render() {
        return(
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
                                            <th style={{width:"15rem"}}><Card.Title >Personal Information</Card.Title></th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td><b>Name</b> : {this.state.users.name}</td>
                                            <td rowSpan="4">
                                            <div className='d-flex justify-content-end'> <img src={"uploads/users-profile/"+this.state.users.profile_img} width="20%" className="rounded"/></div>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td><b>Email</b> : {this.state.users.email}</td>
                                        </tr>
                                        <tr>
                                            <td><b>Role</b> : {this.state.roleName}</td>
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
                                    <form onSubmit={this.onPrsubmit}  id="prfrom">
                                        {/* <Card>
                                            <Card.Body> */}
                                                <input type="hidden" name='id' value={this.state.users.id} />
                                                <div className="form-group">
                                                    <label htmlFor="" className="">Name</label>
                                                    <input type="text" name="name" id='name' className="form-control" placeholder="Enter Name" value={this.state.users.name} onChange={this.onHandleChange} />
                                                </div>
                                                <div className="form-group">
                                                    <label htmlFor="" className="">Email</label>
                                                    <input type="text" name="email" id='email' className="form-control" placeholder="Enter email" value={this.state.users.email} onChange={this.onHandleChange} />
                                                </div>
                                                <div className="form-group">
                                                    <label htmlFor="" className="">Profile Image</label>
                                                    <input type="file" name="profile_img" id='profile_img' className="form-control" placeholder="Enter Profile Image" onChange={this.onHandleChange} />
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