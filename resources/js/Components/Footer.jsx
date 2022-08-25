import React from 'react';
import Authenticated from '@/Layouts/Authenticated';
import { Navbar, Nav, NavDropdown, Form, Container,Accordion , Row, Col, Button, Card, CardGroup, ButtonGroup, ListGroup } from 'react-bootstrap';
import { Link, Head } from '@inertiajs/inertia-react';
import SpotifyPlayer from 'react-spotify-player';

export default function Footer(props){
    const size = {
        width: '100%',
        height: 300,
    };
    const view = 'coverart'; // or 'coverart'
    const theme = 'black'; // or 'white'

    return (
        <>
           {/* <footer className={`position-relative bg-dark text-muted pt-3 `}>
                <section className="inner_footer m-auto">
                    <div className="container">
                        <div className="row mt-3 text-white">
                            <div className="col-md-3 col-lg-4 col-xl-3 mb-4">
                                <h6 className="text-uppercase fw-bold mb-4">
                                    Traders Hub
                                    <img src="img/logo.png" className='m-auto m-md-0' alt="" />
                                </h6>
                                <p className="lh-lg small">Adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.
                                Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
                                consequat.
                                </p>
                            </div>
                            
                        </div>
                    </div>
                </section>
            </footer> */}
            <footer className={`py-4 bg-dark flex-shrink-0`}>
                <Container>
                    <Row>
                        {/* Single Widgets */}
                        <Col xs="12" sm={6} lg={4}>
                            <div className='single-footer-widget section_padding_0_130'>
                                {/* Footer Logo */}
                                <div className="footer-logo mb-3">
                                    <h3>Traders Hub</h3>
                                </div>
                                Appland is completely creative, lightweight, clean app landing page.

                                {/* Copyright Text */}
                                <div className="copywrite-text mt-5">
                                    Copyright @ <Link href='#' className='text-info'>Traders Hub</Link>
                                </div>

                                {/* Social area */}
                                <div className="footer_social_area mt-3">
                                    <Link href="#" data-toggle="tooltip" data-placement="top" title="" data-original-title="Facebook" className='text-primary'><i className="fa fa-facebook "></i></Link>
                                    <Link href="#" data-toggle="tooltip" data-placement="top" title="" data-original-title="Instagam" className='text-danger'><i className="fa fa-instagram "></i></Link>
                                    <Link href="#" data-toggle="tooltip" data-placement="top" title="" data-original-title="Instagam" className='text-info'><i className="fa fa-twitter "></i></Link>
                                </div>
                            </div>
                        </Col>
                        
                        {/* Single Widgets */}
                        <Col xs="12" sm={6} lg={4}>
                            <div className='single-footer-widget section_padding_0_130'>
                                {/* Widget Title */}
                                <h6 className="text-uppercase widget-title">About</h6>
                                {/* Footer menu */}
                                <div className="footer_menu">
                                    <ul>
                                        <li><Link href="#">About Us</Link></li>
                                        <li><Link href="#">Corporate Sale</Link></li>
                                        <li><Link href="#">Terms &amp; Policy</Link></li>
                                        <li><Link href="#">Community</Link></li>
                                    </ul>
                                </div>
                            </div>
                        </Col>

                        <Col xs="12" sm={6} lg={4}>
                            <div className='single-footer-widget section_padding_0_130'>
                                {/* Widget Title */}
                                <h6 className="text-uppercase fw-bold">
                                    Podcast
                                </h6>

                                 <div className="footer_menu">
                                 {/* <SpotifyPlayer
                                    uri="spotify:album:1TIUsv8qmYLpBEhvmBmyBk"
                                    size={size}
                                    view={view}
                                    theme={theme}
                                    /> */}
                                 </div>
                            </div>
                        </Col>
                    </Row>
                </Container>
            </footer>
            
        </>
    );
}