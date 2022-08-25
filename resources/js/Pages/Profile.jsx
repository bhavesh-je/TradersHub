import React,{ useState, useRef, useEffect ,Component } from 'react';
import Authenticated from '@/Layouts/Authenticated';
import { Head } from '@inertiajs/inertia-react';
import { Container,Accordion , Row, Col, Button, Card, CardGroup , Form, Image } from 'react-bootstrap';
import axios from 'axios';
import { event } from 'jquery';
import ValidationErrors from '@/Components/ValidationErrors';

export default function Profile(props){
    // const users = props.userData;
    // const roleName = props.roleName;
    const errors = props.errors;
    const [status,setStatus] = useState([]);
    const [users,setUsers] = useState(props.userData);
    const [roleName,setRoleName] = useState(props.roleName);

    // const onHandleChange =({e}) => {
    const onHandleChange =(e) => {
        const {name, value} = e;
        // if (e.target.type === 'file') {
        //     console.log("there is file type here");
        //     setUsers({ [e.target.name]: e.target.files[0] });
        //  } else {
        //     console.log("there is text type here");
        //     setUsers({ [e.target.name]: e.target.value });
        //  }
        // setUsers({ ...users,[name] : value});
        setUsers(e);
        console.log(users);
    }

    const onPrsubmit = (e) => {
        e.preventDefault();
        const formData = new FormData(document.getElementById("prfrom"));
        const config = { headers: { 'content-type': 'application/json', 'x-inertia': 'true' ,'enctype': 'multipart/form-data'} };
        axios.post('/profile/update', formData, config)
        .then(res => {
            setStatus(res.data.success);
            console.log(res.data.success);
        }).catch(err => {
            console.log(err);
        });
    }

    const onCpsubmit = (e) => {
        e.preventDefault();
        const formData = new FormData(document.getElementById("cpfrom"));
        const config = { headers: { 'content-type': 'application/json', 'x-inertia': 'true' ,'enctype': 'multipart/form-data'} };
        axios.post('/profile/changepassword', formData, config)
        .then(res => {
            setStatus(res.data.success);
            console.log(res.data.success);
        }).catch(err => {
            console.log(err);
        });
    }

    return (
        <Authenticated
            auth={props.auth}
            errors={props.errors}
            header={<h2 className="font-semibold text-xl text-gray-800 leading-tight">Profile</h2>}
        >
            <div className="py-12">
                <div className="max-w-7xl mx-auto sm:px-6 lg:px-8">
                    <Card className="py12">
                        <Card.Body>
                            <Row>
                                <Col>
                                    <Card.Title>Personal Information</Card.Title>
                                </Col>
                                {/* <Col sm={4}>
                                    <Image roundedCircle fluid src="logo/cropped-fav-512x450.png" className=""/>
                                </Col> */}
                            </Row>
                            <Row><Col><b>Name</b> : {users.name}</Col></Row>
                            <Row><Col><b>Email</b> : {users.email}</Col></Row>
                            <Row><Col><b>Role</b> : {roleName}</Col></Row>
                        </Card.Body>
                    </Card>
                    <Accordion>
                        <Accordion.Item eventKey="1" key="1">
                            <Accordion.Header>Personal Information</Accordion.Header>
                            <Accordion.Body>
                                {/* Personal Information from : prfrom */}
                                {status && <div className="mb-4 font-medium text-sm text-green-600">{status}</div>}
                                <ValidationErrors errors={errors} />
                                <form onSubmit={onPrsubmit}  id="prfrom">
                                    {/* <Card>
                                        <Card.Body> */}
                                            <input type="hidden" name='id' value={users.id} />
                                            <div className="form-group">
                                                <label for="" className="">Name</label>
                                                <input type="text" name="name" id='name' className="form-control" placeholder="Enter Name" value={users.name} onChange={onHandleChange} />
                                            </div>
                                            <div className="form-group">
                                                <label for="" className="">Email</label>
                                                <input type="text" name="email" id='email' className="form-control" placeholder="Enter email" value={users.email} onChange={onHandleChange} />
                                            </div>
                                            <div className="form-group">
                                                <label for="" className="">Profile Image</label>
                                                <input type="file" name="profile_img" id='profile_img' className="form-control" placeholder="Enter Profile Image" onChange={onHandleChange} />
                                            </div>
                                        {/* </Card.Body>
                                    </Card> */}
                                    <div className="col-md-12 text-center">
                                        <button type="submit" id="submit" className="btn btn-primary">Submit</button>
                                    </div>
                                </form>
                            </Accordion.Body>
                        </Accordion.Item>
                        <Accordion.Item eventKey="2" key="2">
                            <Accordion.Header>Change Password</Accordion.Header>
                            <Accordion.Body>
                                {/* change password from : cpfrom */}
                                <ValidationErrors errors={errors} />
                                <form onSubmit={onCpsubmit} id="cpfrom">
                                    {/* <Card>
                                        <Card.Body> */}
                                            <input type="hidden" name='id' value={users.id} />
                                            <div className="form-group">
                                                <label for="" className="">Current Password *</label>
                                                <input type="password" name="currentpassword" id='currentpassword' className="form-control" placeholder="Enter currentpassword" onChange={onHandleChange} />
                                            </div>
                                            <div className="form-group">
                                                <label for="" className="">New Password *</label>
                                                <input type="password" name="newpassword" id='newpassword' className="form-control" placeholder="Enter newpassword" onChange={onHandleChange} />
                                            </div>
                                            <div className="form-group">
                                                <label for="" className="">Current Password *</label>
                                                <input type="password" name="confirmed" id='confirmed' className="form-control" placeholder="Enter confirmed" onChange={onHandleChange} />
                                            </div>
                                        {/* </Card.Body>
                                    </Card> */}
                                    <div className="col-md-12 text-center">
                                        <button type="submit" id="submit" className="btn btn-primary">Submit</button>
                                    </div>
                                </form>
                            </Accordion.Body>
                        </Accordion.Item>
                    </Accordion>
                </div>
            </div>
        </Authenticated>
    )
}
