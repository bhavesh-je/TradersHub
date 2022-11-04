import React,{ useState, useRef, useEffect ,Component } from 'react';
import Authenticated from '@/Layouts/Authenticated';
import { Head } from '@inertiajs/inertia-react';
import { Container, Row, Col, Button, Card, CardGroup } from 'react-bootstrap';
import axios from 'axios';
import { fromJSON } from 'postcss';
import { Provider, LikeButton, UpdownButton } from "@lyket/react";
import LikeBtn from "@/Components/LikeBtn";
import CommentBox from "@/Components/CommentBox";
import { countBy } from 'lodash';
import moment from 'moment';


class Dashboard extends Component{
    constructor(props){
        super(props);
        this.state = {
            maxlen: this.props.maxlen,
            postsPerPage: 3,
            posts: [],
            next: 3,
            user: this.props.auth.user,
            
            signals: this.props.signalsSata.signals,
            totalQuery: this.props.signalsSata.totalQuery[0].total_signals,
            totalWonQuery: this.props.signalsSata.totalWonQuery[0].total_signals_won,
            totalLostQuery: this.props.signalsSata.totalLostQuery[0].total_signals_lost,
            totalOngoingQuery: this.props.signalsSata.totalOngoingQuery[0].total_signals_ongoing,
            winRate: this.props.signalsSata.winRate,
            pips: this.props.signalsSata.pips,
        };
        this.handleShowMorePosts = this.handleShowMorePosts.bind(this);
        this.loopWithSlice = this.loopWithSlice.bind(this);

    }

    componentDidMount(){
        this.loopWithSlice(0, this.state.next);
        $('.videoComment').addClass('posts');

        if($('.postData').hasClass('posts')){
            // $('.posts').on("keydown",function(event){
            //     console.log("key down");
            //     console.log(event);
                
            // });
            $('.posts').on("mousedown",function(e){
                // console.log(e.which);
                // e.stopPropagation();
                e.preventDefault();
                // e.stopImmediatePropagation();
                if( (e.which == 1) || (e.which === 3) ) {
                    return false;
                }
            });
    
            // Restrict left/right click
            $('.posts').bind("contextmenu",function(e){
                // console.log(e.which);
                // e.preventDefault();
                return false;
            });
        }
    }

    componentWillUnmount(){
        
        $(".postData").removeClass("posts");
        $('.postData').unbind('keydown');
        $('.postData').unbind('mousedown');
        $('.postData').unbind('contextmenu');
    }

    recommended(nextProps){
    }

    loopWithSlice(start, end){
        const slicedPosts = this.props.posts.slice(start, end);
        this.setState({posts:[...this.state.posts, ...slicedPosts]});
        // console.log(posts);
    };

    handleShowMorePosts(){
        this.loopWithSlice(this.state.next, this.state.next + this.state.postsPerPage);
        // setNext(next + postsPerPage);
        this.setState({next : this.state.next + this.state.postsPerPage});
    };

    wordsTruncate(words, length){
        words = words.trim(); //you need to decied wheather you do this or not
        length -= 6; // because ' (...)'.length === 6
        if (length >= words.length) return words;
      
        let oldResult = /\s/.test(words.charAt(length));
        for (let i = length - 1; i > -1; i--) {
          const currentRusult = /\s/.test(words.charAt(i))
      
          //check if oldresult is white space and current is not.
          //which means current character is end of word
          if (oldResult && !currentRusult) {
            return `${words.substr(0, i + 1)}...`;
          }
          oldResult = currentRusult;
        }
        // you need to decide whether you will just return truncated or original
        // in case you want original just return word
        return '...';
    }

    

    render(){
        return (
            <Authenticated
                auth={this.props.auth}
                errors={this.props.errors}
                header={<h2 className="font-semibold text-xl text-gray-800 leading-tight">Dashboard</h2>}
            >
                <Head title="Dashboard" />
    
                {/* <div className="py-12">
                    <div className="max-w-7xl mx-auto sm:px-6 lg:px-8">
                        <div className="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                            <div className="p-6 bg-white border-b border-gray-200">You're logged in as <strong><i>{ this.props.auth.user.name }</i></strong> !</div>
                        </div>
                    </div>
                </div> */}
                <div className="aboutSec pt-3">
                    <div className=" container-fluid aboutFluid">
                        <div className=" row mx-2">

                            <div className=" col-12 col-sm-3 col-md-3 col-xl-3 py-4 aboutDiv">
                                <div className="card h-100 cardAbt">
                                    <div className="cardAbtsub">
                                        <div className="card-header pb-0 p-3">
                                            <div className="row">
                                                <div className="col-md-12 d-flex align-items-center">
                                                    <h6 className="mb-0 fs-4">About</h6>
                                                </div>
                                            </div>
                                        </div>
                                        <div className="card-body p-3">
                                            <p className="text-sm">
                                                {this.state.user.details}
                                                {/* Started trading 2 years ago, now finally learning how to trade the smart money concepts, and getting better as the days pass! Lorem, ipsum dolor sit amet consectetur adipisicing elit. Voluptates sed quia veniam, explicabo iste debitis voluptas facere
                                                vel sint dolore tempore totam placeat hic. */}
                                            </p>
                                            <ul className="list-group">
                                                {/* <li className="list-group-item border-0 ps-0 pt-0 text-sm"><strong className="text-dark">Joined</strong> &nbsp; November 15, 2015</li> */}
                                                <li className="list-group-item border-0 ps-0 text-sm"><strong className="text-dark">Email:</strong> &nbsp; {this.state.user.email}</li>
                                                <li className="list-group-item border-0 ps-0 text-sm"><strong className="text-dark">Location:</strong> &nbsp; {this.state.user.location}</li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div className="col-12 col-sm-6 col-md-6 col-xl-6 py-4 postData">
                                <h2 className=" pt-2 pb-3 postText">Post Section</h2>
                                {this.state.posts.map((post,index)=>(
                                    <div className="card  text-white firstCard" key={post.id}>
                                        <div className="">
                                            <div className="list-group-item border-0 d-flex align-items-center px-0 mb-2 mx-2">
                                                <div className="avatar me-3">
                                                    <img src={"uploads/users-profile/"+post.get_post_comment_profile[0].profile_img} alt="kal" className=" rounded-circle shadow " />
                                                </div>
                                                <div className="d-flex align-items-start flex-column justify-content-center">
                                                    <h6 className="mb-0 text-sm">{post.get_post_comment_profile[0].name}</h6>
                                                    {/* <p className="mb-0 text-muted">1 jan 2020 at 1:16 AM</p> */}
                                                    <p className="mb-0 text-muted">{moment(post.created_at).format('d MMM YYYY')} at {moment(post.created_at).format('h:mm a')}</p>
                                                </div>
                                                <a className="btn btn-link pe-3 ps-0 mb-0 ms-auto" href="#"></a>
                                            </div>
                                            <div className=" text-black mx-2 my-1">
                                                {(post.post_content) && (<p dangerouslySetInnerHTML={{ __html: this.wordsTruncate(post.post_content, 200) }}>
                                                    </p> ) }
                                                {/* {(post.post_content == null ? "" : post.post_content)} */}
                                                {/* <p className="card-text">Lorem ipsum dolor sit amet consectetur adipisicing elit. Numquam recusandae iste modi quibusdam molestiae, odit sapiente assumenda aut alias aliquid ipsa. Sapiente odit, eius magnam in vel consequuntur repudiandae vero?</p> */}
                                            </div>
                                            {(post.post_image != null ? <img src={"uploads/post-img/"+post.post_image} alt="" className="cImg img-fluid" /> : "" )}
                                            {(post.post_video_name != null ? <video width="100%" height="215" controls controlsList="nofullscreen nodownload noremoteplayback noplaybackrate foobar" className="mt-3 videoComment"><source src={post.post_video_name}/></video> : "" )}
                                            {(post.youtube_video_link != null ? <iframe width="100%" className="mt-3 yourYoutubeFrame videoComment" height="315" src={post.youtube_video_link} frameBorder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" onContextMenu="return false;" /> : "")}

                                             {/* <img src="traders-assets/frontend/img/dashboard.png" alt="" className="cImg img-fluid" /> */}
                                        </div>
                                        <div className="row mx-2 text-dark avtarSec">
                                            
                                            <LikeBtn isLiked = {post.is_liked_count} post={post.id} user={this.props.auth.user.id} p_like = {post.get_post_likes_count ? post.get_post_likes_count : 0}/>
                                            
                                            <div className=" col-sm-6 col-md-6 col-lg-6 d-flex align-items-center justify-content-end">
                                                <div className="mx-2">
                                                    <i className="far fa-comment-alt mx-1 "> </i>
                                                    <span className="">{post.get_total_comment_count}</span>
                                                </div>
                                                <div className="mx-2">
                                                    <i className="fa fa-share-alt mx-1 "> </i>
                                                    <span className="">1.25k</span>
                                                </div>
                                            </div>
                                        </div>
                                        <CommentBox post={post.id} user={this.props.auth.user.id} />
                                        {/* <div className="card-body px-3 py-0">
                                            <ul className="list-group">
                                                <li className="list-group-item border-0 d-flex align-items-center px-0 mb-2">
                                                    <div className="avatar me-3">
                                                        <img src="traders-assets/frontend/img/avtar1.png" alt="kal" className="border-radius-lg shadow" />
                                                    </div>
                                                    <div className="d-flex align-items-start flex-column justify-content-center">
                                                        <h6 className="mb-0 text-sm">Sophie B.</h6>
                                                        <p className="mb-0 text-xs">Hi! I need more information..</p>
                                                    </div>
                                                    <a className="btn btn-link pe-3 ps-0 mb-0 ms-auto" href="#"><i className=" fa fa-heart-o text-dark"></i></a>
                                                </li>
                                                <li className="list-group-item border-0 d-flex align-items-center px-0 mb-2">
                                                    <div className="avatar me-3">
                                                        <img src="traders-assets/frontend/img/avtar2.png" alt="kal" className="border-radius-lg shadow" />
                                                    </div>
                                                    <div className="d-flex align-items-start flex-column justify-content-center">
                                                        <h6 className="mb-0 text-sm">Anne Marie</h6>
                                                        <p className="mb-0 text-xs">Awesome work, can you..</p>
                                                    </div>
                                                    <a className="btn btn-link pe-3 ps-0 mb-0 ms-auto" href="#"><i className=" fa fa-heart text-danger"></i></a>
                                                </li>
                                            </ul>
                                        </div>
                                        <div className="card-footer py-3 border-0 bgcolorone" >
                                            <div className="d-flex flex-start w-100">
                                                <div className="form-outline w-100">
                                                    <textarea className="form-control bgcolortwo" id="textAreaExample" rows="4" placeholder="Add Commment"></textarea>
                                                    <label className="form-label" htmlFor="textAreaExample" style={{marginleft: "0px"}}></label>
                                                    <div className="form-notch">
                                                        <div className="form-notch-leading" style={{width: "9px"}}></div>
                                                        <div className="form-notch-middle" style={{width: "60px"}}></div>
                                                        <div className="form-notch-trailing"></div>
                                                    </div>
                                                </div>
                                            </div>
                                    
                                            <div className="float-start mt-2 pt-1">
                                                <a href="#" className="postBtn">
                                                    <button type="button" className="btn btn-primary btn-sm">Post comment</button>
                                                </a>
                                            </div>
                                        </div> */}
                                    </div>
                                ))}
                                {/* {this.state.maxlen > this.state.next ? <div className='text-center mt-3'> 
                                    <Button variant="outline-info" size="sm" onClick={() => this.handleShowMorePosts()}>Load more</Button>
                                </div> : ""} */}
                                {this.state.maxlen > this.state.next ? <div className='text-center mt-3'> 
                                    <Button variant="outline-info" className='viewBtn' size="sm" onClick={() => this.handleShowMorePosts()}>Load more</Button>
                                </div> : ""}
                            </div>

                            <div className=" col-12 col-sm-3 col-md-3 col-xl-3 py-4">
                                <h4 className=" mx-3">Hi Signal user, Welcome</h4>
                                <h5 className=" mx-3 my-2">Quick View On Signal</h5>
                                <div className=" py-3 my-4 sigDiv">
                                    <div className="row mx-3 my-4 justify-content-between">
                                        <div className="col-sm-3 col-md-3 col-xl-3 px-3 py-2  secCol one">
                                            <span>{this.state.totalQuery}</span>
                                            <p>Total Signals</p>
                                        </div>
                                        <div className="col-sm-3 col-md-3 col-xl-3 px-3 py-2 secCol two">
                                            <span>{this.state.totalWonQuery}</span>
                                            <p>Trades Won</p>
                                        </div>
                                        <div className="col-sm-3 col-md-3 col-xl-3 px-3 py-2 secCol three">
                                            <span>{this.state.totalLostQuery}</span>
                                            <p>Trades Lost</p>
                                        </div>
                                    </div>
                                    <div className="row mx-3 my-4 justify-content-between">
                                        <div className="col-sm-3 col-md-3 col-xl-3 px-3 py-2 secCol four">
                                            <span>{this.state.totalOngoingQuery}</span>
                                            <p>Ongoing Trades</p>
                                        </div>
                                        <div className="col-sm-3 col-md-3 col-xl-3 px-3 py-2 secCol five">
                                            <span>{this.state.winRate}%</span>
                                            <p>Win Rate</p>
                                        </div>
                                        <div className="col-sm-3 col-md-3 col-xl-3 px-3 py-2 secCol six">
                                            <span>{this.state.pips}</span>
                                            <p>Total Pips</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </Authenticated>
        );
    }
}
export default Dashboard;