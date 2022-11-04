import React, { Component, useEffect } from 'react';
import Button from '@/Components/Button';
import Checkbox from '@/Components/Checkbox';
import Guest from '@/Layouts/Guest';
import Input from '@/Components/Input';
import Label from '@/Components/Label';
import ValidationErrors from '@/Components/ValidationErrors';
import { Head, Link, useForm } from '@inertiajs/inertia-react';

class Login extends Component{
    constructor(props){
        super(props);
        this.state = {
            email: '',
            password: '',
            remember: '',
            canResetPassword: '',
            errors: '',
            error: ''            
        }
        this.onHandleChange = this.onHandleChange.bind(this);
        this.onSubmit = this.onSubmit.bind(this);
    }
    componentDidMount() {
        //this.getData();
    }
    componentWillReceiveProps(nextProps) {
        if (nextProps) {
        }
    }

    onSubmit(e){
        e.preventDefault();
        const formData = new FormData(document.getElementById("form"));
        const config = { headers: { 'content-type': 'application/json','x-inertia': 'true' } };
        axios.post(route('login'), formData, config).then(res => {   
            if (res.data.status === "errors") {
                this.setState({errors:res.data[0]});
            }else if (res.data.status === "success"){
                Inertia.get('myprofile');
                //window.location ="/myprofile";
            }else if(res.data.status === "error")
            {
                $('#alert-danger').removeClass("d-none");
                this.setState({error:res.data ,errors:''});
            }        
        }).catch(err => {
            console.log(err);
        });
    }

    onHandleChange(e){
        if(e.target.type === 'checkbox'){
            this.setState({[e.target.name]:e.target.checked });
        }else{
            this.setState({[e.target.name]:e.target.value });
        }
    }

    render() {
        return(
            <section className="logIngradient-custom">
                <div className="container py-5 h-100">
                    <div className="row d-flex justify-content-center align-items-center h-100">
                        <div className="col-12 col-md-8 col-lg-6 col-xl-5">
                            <div className="card" style={{borderradius: "1rem" }}>
                                <div className="card-body px-5 py-3 ">
                                    <div className="mt-md-4 pb-2">
                                        <div className="text-center justify-content-center d-flex my-4">
                                            <img src="traders-assets/frontend/img/logo.png" alt=""  className="img-fluid" />
                                        </div>
                                        <h2 className=" my-2">Welcome to FU Academy 👋🏻</h2>
                                        <p className=" my-3">Please sign-in to your account and start the trading adventure  </p>
                                        {this.state.status && <div className="mb-4 font-medium text-sm text-green-600">{this.state.status}</div>}
                                        {/* <ValidationErrors errors={this.state.error.message} /> */}
                                        <div id="alert-danger" className="alert alert-danger  d-none  alert-dismissible">
                                               {this.state.error.message}
                                            </div>
                                        <form onSubmit={this.onSubmit} id="form" encType="multipart/form-data">
                                            <div className="form-outline form-white mb-4 text-start">
                                                <label className="form-label" htmlFor="typeEmailX">Email</label>
                                                {/* <input type="text" name="email" value={data.email} autoComplete="username" isFocused={true} onChange={onHandleChange} id="typeEmailX" className="form-control form-control-lg" placeholder="example@gmail.com" /> */}
                                                <Input type="text" name="email" value={this.state.email} className="mt-1 block w-full" autoComplete="username" isFocused={true} handleChange={this.onHandleChange.bind(this)} />
                                            </div>
                                            <div className="form-outline form-white mb-4 text-start">
                                                <label className="form-label d-flex justify-content-between" htmlFor="typePasswordX">Password
                                                    <p className="m-0">
                                                        {/* <a className=" text-decoration-none" href="#!">Forgot password?</a> */}
                                                        {canResetPassword && (
                                                            <Link href={route('password.request')} className="text-decoration-none">
                                                                Forgot your password?
                                                            </Link>
                                                        )}
                                                    </p>
                                                </label>
                                                {/* <input type="password" name="password" value={data.password} autoComplete="current-password" onChange={onHandleChange} id="typePasswordX" className="form-control form-control-lg" placeholder=" password" /> */}
                                                <Input type="password" name="password" value={this.state.password} className="mt-1 block w-full" autoComplete="current-password" handleChange={this.onHandleChange.bind(this)} />
                                            </div>
                                            <div className="form-check d-flex">
                                                <Input type="checkbox" name="remember" value={this.state.remember} handleChange={this.onHandleChange.bind(this)} id="gridCheck" className="form-check-input" />
                                                {/* <Checkbox name="remember" value={data.remember} handleChange={onHandleChange} className="form-check-input" id="gridCheck" /> */}
                                                <label className="form-check-label" htmlFor="gridCheck">Remember me</label>
                                            </div>
                                            <div className=" text-center my-4">
                                                <Button className="btn btn-outline-light btn-lg px-5 bg-black">
                                                    <a href="#" className=" text-decoration-none text-white">Login</a> 
                                                </Button>
                                            </div>
                                            
                                            <div className=" text-center my-4">
                                                <p className="mb-0">New on our platform? <a href="#!" className="text-decoration-none">Create an account</a></p>
                                            </div>
                            
                                            <div className="d-flex justify-content-center text-center mt-4 pt-1 loginSocial">
                                                <a href="#" className=" text-black"><i className="fab fa-facebook-f fa-lg mx-1 px-2"></i></a>
                                                <a href="#" className=" text-black"><i className="fab fa-twitter fa-lg mx-1 px-2"></i></a>
                                                <a href="#" className=" text-black"><i className="fab fa-google fa-lg mx-1 px-2"></i></a>
                                                <a href="#" className=" text-black"><i className=" fab fa-github fa-lg mx-1 px-2"></i></a>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>  
            </section>
        );
    }
}
export default Login;