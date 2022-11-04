import ReactDOM from "react-dom";
import React, { useState, useRef, useEffect ,Component } from 'react';
import { Container, Row, Col, Button, Card, CardGroup ,Table } from 'react-bootstrap';
import Authenticated from '@/Layouts/Authenticated';
import axios from 'axios';
import { Link, Head } from '@inertiajs/inertia-react';
import $ from 'jquery'; 

class Videos extends Component{
    constructor(props){
        super(props);
        this.state = {
            maxlength: this.props.maxlength,
            videos: [],
            videoPerPage: 5,
            next: 3
        };
        this.handleShowMoreVideos = this.handleShowMoreVideos.bind(this);
        this.loopWithSlice = this.loopWithSlice.bind(this);
    }

    componentDidMount(){
        // Disable right click
        $("body").addClass("youtubePage");
        var myDiv = $('.youtubePage');

        
        if ($("body").hasClass("youtubePage")){
            //if(document.getElementsByClassName("youtubePage") !== null){

            // $(".youtubePage").on("contextmenu", function(e) {
            //     return false;
            //   });
            $('.youtubePage').on('keydown', function(event) {
                console.log("youtube page");
                console.log(event.keyCode);
                console.log(event);
                
                // Restrict F12
                if(event.keyCode == 123 ) {
                    return false;
                } 
                
                // Restrict F5
                if( event.keyCode == 116 || event.keyCode == 93) {
                    event.preventDefault();
                    return false;
                } 
                
                // Restrict ctrl/shift
                if( event.ctrlKey || event.shiftKey ) {
                    event.preventDefault();
                    return false;
                }
            });
    
        }
        // Restrict left/right click
        $('.youtubePage').on("mousedown",function(e){
            console.log(e.which);
            // e.stopPropagation();
            e.preventDefault();
            // e.stopImmediatePropagation();
            if( (e.which == 1) || (e.which === 3) ) {
                return false;
            }
        });

        // Restrict left/right click
        $('.youtubePage').bind("contextmenu",function(e){
            console.log(e.which);
            // e.preventDefault();
            return false;
        });

        this.loopWithSlice(0,this.state.next);
    }

    componentWillUnmount(){
        
        $("body").removeClass("youtubePage");
        $('body').unbind('keydown');
        $('body').unbind('mousedown');
        $('body').unbind('contextmenu');
        // console.log($(location).attr('pathname'));
    }

    componentWillReceiveProps() {
        
        // console.log($(location).attr('pathname'));
    }

    recommended(nextProps){}

    loopWithSlice(start, end){
        const slicedPosts = this.props.videoPosts.slice(start, end);
        this.setState({videos: [...this.state.videos, ...slicedPosts]});
        // console.log(videos);
    }

    handleShowMoreVideos(){
        this.loopWithSlice(this.state.next, this.state.next + this.state.videoPerPage);
        this.setState({next: this.state.next + this.state.videoPerPage});
    }

    render(){
        return(
            <Authenticated
                auth={this.props.auth}
                errors={this.props.errors}
                header={<h2 className="font-semibold text-xl text-gray-800 leading-tight">Videos</h2>}
            >
                <Head title="Videos" />
                
                <div className="py-12">
                    <Container>
                        <Row className="justify-content-md-center">
                            {this.state.videos.map((video,index)=>(
                                <Card key={index}>
                                    {video.youtube_video_link ? <iframe width="100%" className="mt-3 yourYoutubeFrame" height="315" src={video.youtube_video_link.replace('.com', '-nocookie.com')+'?rel=0;modestbranding=1&showinfo=0&fs=0&disablekb=1&iv_load_policy=3&fs=0'} frameBorder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" onContextMenu="return false;"/> : <video width="100%" height="215" controls controlsList="nofullscreen nodownload noremoteplayback noplaybackrate foobar" className="mt-3"><source src={video.post_video_name}/></video>}
                                    <Card.Body>
                                        <Card.Text>{video.post_name}</Card.Text>
                                    </Card.Body>
                            </Card>
                            ))}
                            {this.state.maxlength > this.state.next ? <div className='text-center mt-3'>
                                <Button onClick={() => this.handleShowMoreVideos()} variant="outline-info" size="sm">Load more</Button>
                            </div> : ""}
                            
                        </Row>
                    </Container>
                </div>
            </Authenticated>
        );
    }
}
export default Videos;