import React, { useEffect, useState } from 'react';
import ApplicationLogo from '@/Components/ApplicationLogo';
import Dropdown from '@/Components/Dropdown';
import NavLink from '@/Components/NavLink';
import ResponsiveNavLink from '@/Components/ResponsiveNavLink';
import { Link } from '@inertiajs/inertia-react';
import { TickerTape } from "react-ts-tradingview-widgets";
import Footer from '@/Components/Footer';
import NavDropdown from 'react-bootstrap/NavDropdown';
import Nav from 'react-bootstrap/Nav';
import { post } from 'jquery';
// import route from 'vendor/tightenco/ziggy/src/js';


export default function Authenticated({ auth, header, children }) {
    const [showingNavigationDropdown, setShowingNavigationDropdown] = useState(false);
    const [myAuth,setMyAuth] = useState(null);
    const [authData,setAuthData] = useState([]);
    
    useEffect(()=>{
        axios.get('/auth')
        .then((res) => {
            // console.log(res.data.myAuth);
            // console.log(res.data.authData);
            setMyAuth(res.data.authData.roles[0].name);
            setAuthData(res.data.authData);

        })
    },[])
    
    return (
        <div>
            <div className="profileSec">
                <div className=" container-fluid p-0">
                    {/* <div className="page-header mt-4" style="background-image: url(/img/profile.png);background-position-y: 50%;"> */}
                    <div className="page-header mt-4">
                        <span className="mask bg-gradient-primary opacity-6"></span>
                    </div>
                    <div className="card card-body blurs shadow-blurs mx-4 mt-n6">
                        <div className="row gx-4 justify-content-evenly">
                        <div className="col-2 my-auto textSec d-flex align-items-center px-2">
                            <div className="avatar avatar-xl position-relative mx-2">
                                {/* <img src="traders-assets/frontend/img/propic.png" alt="profile_image" className="w-100 border-radius-lg shadow-sm " /> */}
                                <img src={"/uploads/users-profile/"+authData.profile_img} alt="profile_image" className="w-100 border-radius-lg shadow-sm " />
                            </div>
                            <div className=" h-100">
                                <h5 className=" mb-1">{auth.user.name}</h5>
                                {/* <p className="mb-0 font-weight-bold text-sm">{auth.user.roles[0].name}</p> */}
                                <p className="mb-0 font-weight-bold text-sm">{myAuth}</p>
                            </div>
                        </div>
                        <div className="col-10 mt-auto textSec">
                            <nav className="navbar navbar-expand-lg navbar-light navMenu">
                            <button className="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                                <span className="navbar-toggler-icon"></span>
                            </button>
                            
                            <div className="collapse navbar-collapse justify-content-between" id="navbarSupportedContent">
                                <ul className="navbar-nav mr-auto ml-auto">
                                    <li className={route().current('dashboard') ? 'nav-item active' : 'nav-item'}>
                                        <Link className="nav-link" href={route('dashboard')} >Home</Link>
                                    </li>
                                    {/* <NavLink href={route('dashboard')} active={route().current('dashboard')}>
                                        Home
                                    </NavLink> */}
                                    <li className={route().current('meetingshow') ? 'nav-item active' : 'nav-item'}>
                                        <Link className="nav-link" href={route('meetingshow')}>Meetings Show</Link>
                                    </li>
                                    {/* <li className={route().current('VideoPosts') ? 'nav-item active' : 'nav-item'}>
                                        <a className="nav-link" href={route('VideoPosts')}>Videos</a>
                                    </li> */}
                                    <li className={route().current('courses') || route().current('show-courses') ? 'nav-item active' : 'nav-item'} >
                                        <Link className="nav-link" href={route('courses')}>Courses</Link>
                                    </li>
                                    <li className={route().current('quizes')|| route().current('take-quiz') || route().current('getQue/storeResult') ? 'nav-item active' : 'nav-item'} >
                                        <Link className="nav-link" href={route('quizes')}>Quiz</Link>
                                    </li>
                                    <li className={route().current('userSignals') ? 'nav-item active' : 'nav-item'} >
                                        <Link className="nav-link" href={route('userSignals')}>Signals</Link>
                                    </li>
                                    <li className={route().current('userSignalReposrts') ? 'nav-item active' : 'nav-item'} >
                                        <Link className="nav-link" href={route('userSignalReposrts')}>Signal Reports</Link>
                                    </li>
                                    <li className={route().current('podcast') ? 'nav-item active' : 'nav-item'} >
                                        <Link className="nav-link" href={route('podcast')}>Podcast</Link>
                                    </li>
                                    <li className="nav-item dropdown">
                                        <Link className="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                            Trading Tools
                                        </Link>
                                        <div className="dropdown-menu" aria-labelledby="navbarDropdown">
                                          <Link className="dropdown-item" href={route('CurrencyHeatCal')}>Currency Heat Calculator</Link>
                                        </div>
                                    </li>
                                    <li className={route().current('faqs') ? 'nav-item active' : 'nav-item'} >
                                        <Link className="nav-link" href={route('faqs')}>FAQs</Link>
                                    </li>
                                </ul>
                                <form className="form-inline my-2 my-lg-0">
                                    <Link className="text-light text-decoration-none">
                                        <Dropdown.Link href={route('profile')} method="get" as="button" className="btn btn-outline-success my-2 my-sm-0">
                                            {/* Edit */}
                                            <i className="fa fa-edit"></i>
                                        </Dropdown.Link>
                                        {/* <button className="btn btn-outline-success my-2 my-sm-0" type="submit">Edit</button> */}
                                    </Link> 
                                </form>
                                <form className="form-inline my-2 my-lg-0">
                                    <Link href="#" className="text-light text-decoration-none logouted">
                                        <Dropdown.Link href={route('logout')} method="post" as="button" className="logOut">
                                            {/* Log Out */}
                                            {/* <i className="fa fa-sign-out"></i> */}
                                            <i className="fa fa-sign-out" aria-hidden="true"></i>
                                        </Dropdown.Link>
                                        {/* <button className="btn btn-outline-success my-2 my-sm-0 logOut" href={route('logout')} method="post" as="button">Log Out</button> */}
                                    </Link>
                                </form>
                            </div>
                            </nav>
                        </div>
                        </div>
                    </div>
                </div>
                <TickerTape colorTheme="light"></TickerTape>
            </div> {/* end profileSec */}

            {/* {header && (
                <header className="bg-white shadow">
                    <div className="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">{header}</div>
                </header>
            )} */}

            <main>{children}</main>
            {/* <Footer></Footer> */}
        </div>
    );
}
