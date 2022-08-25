import ReactDOM from "react-dom";
import React, { useState, useRef, useEffect ,Component } from 'react';
import { Container, Row, Col, Button, Card, CardGroup } from 'react-bootstrap';
import Table from 'react-bootstrap/Table';
import Authenticated from '@/Layouts/Authenticated';
import axios from 'axios';
import { Link, Head } from '@inertiajs/inertia-react';
import $ from 'jquery'; 

export default function Videos(props){
    // const videos = props.videoPosts;
    const maxlength = props.maxlength;
    const [videos,setVideos] = useState([]);
    const videoPerPage = 5;
    const [next, setNext] = useState(3);

    const loopWithSlice = (start, end) => {
        const slicedPosts = props.videoPosts.slice(start, end);
        setVideos([...videos, ...slicedPosts]);
        console.log(videos);
    };

    useEffect(() => {
        loopWithSlice(0, next);
    }, []);
    
    const handleShowMoreVideos = () => {
        loopWithSlice(next, next + videoPerPage);
        setNext(next + videoPerPage);
    };

    return (
        <Authenticated
            auth={props.auth}
            errors={props.errors}
            header={<h2 className="font-semibold text-xl text-gray-800 leading-tight">Videos</h2>}>

            <Head title="Videos" />
            
            <div className="py-12">
                <Container>
                    <Row className="justify-content-md-center">
                        {videos.map((video,index)=>(
                            <Card>
                                {video.youtube_video_link ? <iframe width="100%" className="mt-3" height="315" frameBorder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" src={video.youtube_video_link}/> : <video width="100%" height="215" controls className="mt-3"><source src={video.post_video_name}/></video>}
                                <Card.Body>
                                    <Card.Text>{video.post_name}</Card.Text>
                                </Card.Body>
                          </Card>
                        ))}
                        {maxlength > next ? <div className='text-center mt-3'>
                            <Button onClick={handleShowMoreVideos} variant="outline-info" size="sm">Load more</Button>
                        </div> : ""}
                        
                    </Row>
                </Container>
            </div>
        </Authenticated>        
    );
}