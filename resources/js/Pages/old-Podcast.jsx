import ReactDOM from "react-dom";
import React, { useState, useRef, useEffect ,Component } from 'react';
import { Container, Row, Col, Button, Card, CardGroup } from 'react-bootstrap';
import Table from 'react-bootstrap/Table';
import Authenticated from '@/Layouts/Authenticated';
import axios from 'axios';
import { Link, Head } from '@inertiajs/inertia-react';
import SpotifyPlayer from 'react-spotify-player';
import qs from 'qs';
import SpotifyWebApi from 'spotify-web-api-js';
import SpotifyPlayerN from 'react-spotify-web-playback';
// import SpotifyPlayer from 'react-spotify-album-player';
import { ReactSimplifiedPlayer } from "react-simplified-player"
import SpotifyEmbed from 'react-spotify-embed'

const scopes = [
    "user-read-currently-playing",
    "user-read-playback-state",
  ];
class Podcast extends Component {
    constructor(props) {
        super(props);
        this.state = {
            access_token: "",
            item: {
                album: {
                  images: [{ url: "" }]
                },
                name: "",
                artists: [{ name: "" }],
                duration_ms:0,
              },
              is_playing: "Paused",
              progress_ms: 0
        };

        this.getCurrentlyPlaying = this.getCurrentlyPlaying.bind(this);
    }
    
    getCurrentlyPlaying(token) {
        // Make a call using the token
        
    }

    async componentDidMount() {
        
        // var spotifyApi = new SpotifyWebApi();
        // spotifyApi.setAccessToken(this.state.access_token);
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

        // const token = this.state.access_token;

        // const NewPlayer = await axios.get('https://api.spotify.com/v1/me/player', token);


    //    const Artist = spotifyApi.getAlbums(['4aawyAB9vmqN3uQ7FjRGTy']).then(
    //         function (data) {
    //             console.log('Albums information', data);
    //         },
    //         function (err) {
    //             console.error(err);
    //         }
    //     );
      console.log(this.state.access_token);
      function App() {
          const { data, loading, error } = useArtist("1XpDYCrUJnvCo9Ez6yeMWh")
      
          if (data) {
              return <h1>{data.artist.name}</h1>
          } 
          return null;
      }
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
}

export default Podcast;