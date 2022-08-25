import ReactDOM from "react-dom";
import React, { useState, useRef, useEffect ,Component } from 'react';
import { Container, Row, Col, Button, Card, CardGroup } from 'react-bootstrap';
import Table from 'react-bootstrap/Table';
import Authenticated from '@/Layouts/Authenticated';
import axios from 'axios';
import { Link, Head } from '@inertiajs/inertia-react';
import SpotifyPlayer from 'react-spotify-player';
import Spotify from 'spotify-web-api-js';
import SpotifyWebApi from 'spotify-web-api-js';


export default function Podcast(props){
    const size = {
        width: '100%',
        height: 300,
    };
    const view = 'coverart'; // or 'coverart'
    const theme = 'black'; // or 'white'

    const CLIENT_ID = "ec8b1c443fd04cc3a2c397005a6c1a58"
    const REDIRECT_URI = "http://192.168.1.157:8000"
    const AUTH_ENDPOINT = "https://accounts.spotify.com/authorize"
    const RESPONSE_TYPE = "token"

    const [token, setToken] = useState("")
    useEffect(() => {
        const hash = window.location.hash
        let token = window.localStorage.getItem("token")
    
        if (!token && hash) {
            token = hash.substring(1).split("&").find(elem => elem.startsWith("access_token")).split("=")[1]
    
            window.location.hash = ""
            window.localStorage.setItem("token", token)
        }
    
        setToken(token)

        //
        
    }, [])
    var client_id = 'ec8b1c443fd04cc3a2c397005a6c1a58';
    var client_secret = '4f8c432470b24aaaa7c69d54811e1b8c';
    const authOptions = {
        url: 'https://accounts.spotify.com/api/token',
        headers: {
          'Authorization': 'Basic ' + (new Buffer(client_id + ':' + client_secret).toString('base64')),
        },
        form: {
          grant_type: 'client_credentials'
        },
        json: true
    };
    
    // axios.post('https://accounts.spotify.com/api/token')
    // .then(response => {
    //     console.log(response);
    // });
    var spotifyApi = new SpotifyWebApi();
    spotifyApi.setAccessToken('ec8b1c443fd04cc3a2c397005a6c1a58:4f8c432470b24aaaa7c69d54811e1b8c');
    const headers = {
        headers: {
          Accept: 'application/json',
          'Content-Type': 'application/x-www-form-urlencoded',
        },
        auth: {
          username: client_id,
          password: client_secret,
        },
      };
      const data = {
        grant_type: 'client_credentials',
      };
      const response = axios.post('https://accounts.spotify.com/api/token',data,headers);
      console.log(response);
    return(
        <Authenticated
            auth={props.auth}
            errors={props.errors}
            header={<h2 className="font-semibold text-xl text-gray-800 leading-tight">Podcast</h2>}
        >
            <Head title="Podcast" />
            <div className="py-12">
                <Container>
                    <Row className="justify-content-sm-center">
                        <Col lg={6} xs={6}>
                            <SpotifyPlayer 
                                uri="spotify:album:1TIUsv8qmYLpBEhvmBmyBk"
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