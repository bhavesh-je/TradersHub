import ReactDOM from "react-dom";
import React, { useState, useRef, useEffect ,Component } from 'react';
import { Container, Row, Col, Button, Card, CardGroup } from 'react-bootstrap';
import Table from 'react-bootstrap/Table';
import Authenticated from '@/Layouts/Authenticated';
import axios from 'axios';
import { Link, Head } from '@inertiajs/inertia-react';
import SpotifyPlayer from 'react-spotify-player';
import qs from 'qs';

class Podcast extends Component {
    constructor(props) {
        super(props);
        this.state = {
            access_token: "",
        };

    }

    async componentDidMount() {
        var client_id = 'ec8b1c443fd04cc3a2c397005a6c1a58';
        var client_secret = '4f8c432470b24aaaa7c69d54811e1b8c';
        
        const headers = {
            headers: {
                Accept: '*/*',
                'Content-Type': 'application/x-www-form-urlencoded',
                'Access-Control-Allow-Credentials':'false',
                'Access-Control-Allow-Origin': 'ORIGIN',
                'Access-Control-Allow-Headers' : '*',
                'Access-Control-Allow-Methods' : 'PUT, GET, HEAD, POST, DELETE, OPTIONS',
            },
            auth: {
              username: client_id,
              password: client_secret,
            },
        };

        const data = {
        grant_type: 'client_credentials',
        };
          
        try {
            const spotify_response = await axios.post('https://accounts.spotify.com/api/token',qs.stringify(data),headers);
            // return spotify_response.data.access_token;
            this.setState({access_token:spotify_response.data.access_token});
        } catch (error) {
            console.log(error);
        }
        console.log(this.state.access_token);
    }

    render() {

        const size = {
            width: '100%',
            height: 300,
        };
        const view = 'coverart'; // or 'coverart'
        const theme = 'black'; // or 'white'
        return (
            <Authenticated
                auth={this.props.auth}
                errors={this.props.errors}
                header={<h2 className="font-semibold text-xl text-gray-800 leading-tight">Podcast</h2>}
            >
                <Head title="Podcast" />
                <div className="py-12">
                    <Container>
                        <Row className="justify-content-sm-center">
                            <Col lg={6} xs={6}>
                                <SpotifyPlayer 
                                    uri="spotify:episode:0vzprD1Qfq9NB1nohKomAx"
                                    size={size}
                                    view={view}
                                    theme={theme}
                                />
                            </Col>
                        </Row>
                    </Container>
                </div>    
            </Authenticated>
        );
    }
}

export default Podcast;