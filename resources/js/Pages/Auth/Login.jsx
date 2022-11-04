import React, { useEffect } from 'react';
import Button from '@/Components/Button';
import Checkbox from '@/Components/Checkbox';
import Guest from '@/Layouts/Guest';
import Input from '@/Components/Input';
import Label from '@/Components/Label';
import ValidationErrors from '@/Components/ValidationErrors';
import { Head, Link, useForm } from '@inertiajs/inertia-react';
// import logo from 'public/traders-assets/img/logo.png';

export default function Login({ status, canResetPassword }) {
    const { data, setData, post, processing, errors, reset } = useForm({
        email: '',
        password: '',
        remember: '',
    });

    useEffect(() => {
        return () => {
            reset('password');
        };
    }, []);

    const onHandleChange = (event) => {
        setData(event.target.name, event.target.type === 'checkbox' ? event.target.checked : event.target.value);
    };

    const submit = (e) => {
        e.preventDefault();
        post(route('login'));
    };

    return (
        // <Guest>
            <section className="logIngradient-custom">
                <div className="container-fluid ">
                    <div className="row d-flex justify-content-center align-items-center h-100">
                        <div className="col-12 col-md-8 col-lg-6 col-xl-5">
                            <div className="card mx-5" style={{borderradius: "1rem",transform: "translate(0%,7%)"}}>
                                <div className="card-body px-5 py-2 ">
                                    <div className="mt-md-4 pb-2">
                                        <div className="text-center justify-content-center d-flex my-2">
                                            <img src="traders-assets/frontend/img/logo.png" alt=""  className="img-fluid" />
                                        </div>
                                        <h2 className=" my-2">Welcome to FU Academy 👋🏻</h2>
                                        <p className=" my-3">Please sign-in to your account and start the trading adventure  </p>
                                        {status && <div className="mb-4 font-medium text-sm text-green-600">{status}</div>}
                                        {/* <ValidationErrors errors={errors} /> */}
                                        
                                        <form onSubmit={submit}>
                                            <div className="form-outline form-white mb-3 text-start">
                                                <label className="form-label" htmlFor="typeEmailX">Email</label>
                                                {/* <input type="text" name="email" value={data.email} autoComplete="username" isFocused={true} onChange={onHandleChange} id="typeEmailX" className="form-control form-control-lg" placeholder="example@gmail.com" /> */}
                                                <Input type="text" name="email" value={data.email} className="mt-1 block w-full" autoComplete="username" isFocused={true} handleChange={onHandleChange} />
                                                {(errors.email != null ? <span className="error invalid_text">{errors.email}</span> : "")}
                                            </div>
                                            <div className="form-outline form-white mb-3 text-start">
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
                                                <Input type="password" name="password" value={data.password} className="mt-1 block w-full" autoComplete="current-password" handleChange={onHandleChange} />
                                                {(errors.password != null ? <span class="error invalid_text">{errors.password}</span> : "")}
                                            </div>
                                            <div className="form-check d-flex">
                                                <input type="checkbox" name="remember" value={data.remember} handleChange={onHandleChange} id="gridCheck" className="form-check-input" />
                                                {/* <Checkbox name="remember" value={data.remember} handleChange={onHandleChange} className="form-check-input" id="gridCheck" /> */}
                                                <label className="form-check-label" htmlFor="gridCheck">Remember me</label>
                                            </div>
                                            <div className=" text-center my-3">
                                                    <a href="#" className=" text-decoration-none text-white">
                                                        <Button className="btn btn-outline-light btn-lg px-5 bg-black" processing={processing}>
                                                            Login
                                                        </Button>
                                                    </a> 
                                            </div>
                                            
                                            <div className=" text-center my-3">
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
    //   </Guest>
    );
}
