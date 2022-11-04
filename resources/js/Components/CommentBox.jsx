import React, {Component, useState} from "react";
import axios from 'axios';
import { Row, Col, Button, Card, CardGroup, Form, Image, FloatingLabel } from 'react-bootstrap';
import LikeButton from "./LikeButton";

class CommentBox extends Component{
    constructor(props) {
        super(props);
        this.state = {
            post: props.post,
            user: props.user,
            comment: '',
            errors: "",
            allCommnets: [],
        };
        this.handleWriteComment = this.handleWriteComment.bind(this);
        this.handleLikeClick = this.handleLikeClick.bind(this);
        this.onSubmit = this.onSubmit.bind(this);
    }
    
    componentDidMount(){
        // console.log();
        this.setState({comment: ''});
        this.onSubmit();
        // const formData = new FormData();
        // formData.append("post_id",this.state.post);
        // const config = { headers: { 'content-type': 'application/json', 'x-inertia': 'true' ,'enctype': 'multipart/form-data'} };
        // axios.post('/getPostComment', formData, config)
        // .then(res => {
        //     console.log(res.data.allCommnets);
        //     this.setState({allCommnets: res.data.allCommnets});
        // }).catch(err => {
        //     console.log(err);
        // });
        
    }

    recommended(nextProps){}
    
    handleWriteComment(e){
        this.setState({comment:e});
    }

    onHandleChange(e) {
        // console.log(e);
        this.setState({comment: e});
    }
    

    handleLikeClick() {
        // console.log("Comment : "+this.state.comment);
        // console.log("Post : "+this.state.post);
        // console.log("user id : "+this.state.user);
        const formData = new FormData();
        formData.append("comment",this.state.comment);
        formData.append("post_id",this.state.post);
        formData.append("user_id",this.state.user);
        const config = { headers: { 'content-type': 'application/json', 'x-inertia': 'true' ,'enctype': 'multipart/form-data'} };
        axios.post('/storePostComment', formData, config)
        .then(res => {
            // console.log(res.data.errors);
            this.setState({errors: res.data.errors});
            this.setState({comment: ""});
            this.onSubmit();
            // setStatus(res.data.success);
            // this.setState({status:res.data.success});
            // console.log(res.data.success);
        }).catch(err => {
            console.log(err);
        });
    }

    onSubmit(e){
        const formData = new FormData();
        formData.append("post_id",this.state.post);
        const config = { headers: { 'content-type': 'application/json', 'x-inertia': 'true' ,'enctype': 'multipart/form-data'} };
        axios.post('/getPostComment', formData, config)
        .then(res => {
            // console.log(res.data.allCommnets);
            this.setState({allCommnets: res.data.allCommnets});
        }).catch(err => {
            console.log(err);
        });
    }

    render() {
        return (
            <>
                {/* <div className="mt-3">
                    <Col>
                        <Form.Control as="textarea" placeholder="Leave a comment here" style={{ height: '100px' }} value={this.state.comment} onChange={(e) => this.handleWriteComment(e.target.value)} />
                        <Button onClick={() => this.handleLikeClick()} variant="outline-primary" className="btn btn-sm mt-1 mb-2">Comment</Button>
                    </Col>
                </div> */}
                <div className="card-body px-3 py-0">
                    <ul className="list-group " id="style-3">
                        <div className="force-overflow">
                        {this.state.allCommnets.map((comment,index) => ( 
                            <li className="list-group-item border-0 d-flex align-items-center px-0 mb-2 " key={comment.id}>
                                <div className="avatar me-3">
                                    <img src={"uploads/users-profile/"+comment.commnet_users[0].profile_img} alt="kal" className="border-radius-lg shadow" />
                                </div>
                                <div className="d-flex align-items-start flex-column justify-content-center">
                                    <h6 className="mb-0 text-sm">{comment.commnet_users[0].name}</h6>
                                    <p className="mb-0 text-xs">{comment.comment}</p>
                                </div>
                                <LikeButton post={this.state.post} user={this.state.user} commnet={comment.id} is_like={comment.get_post_comment_likes}/>
                                {/* <a className="btn btn-link pe-3 ps-0 mb-0 ms-auto" href="#"><i className=" fa fa-heart-o text-dark"></i></a> */}
                                {/* <a className="btn btn-link pe-3 ps-0 mb-0 ms-auto" href="#"><i className=" fa fa-heart text-danger"></i></a> */}
                            </li>
                        ))} 
                        </div>
                        {/* <li className="list-group-item border-0 d-flex align-items-center px-0 mb-2">
                            <div className="avatar me-3">
                                <img src="traders-assets/frontend/img/avtar2.png" alt="kal" className="border-radius-lg shadow" />
                            </div>
                            <div className="d-flex align-items-start flex-column justify-content-center">
                                <h6 className="mb-0 text-sm">Anne Marie</h6>
                                <p className="mb-0 text-xs">Awesome work, can you..</p>
                            </div>
                            <a className="btn btn-link pe-3 ps-0 mb-0 ms-auto" href="#"><i className=" fa fa-heart text-danger"></i></a>
                        </li> */}
                    </ul>
                </div>
                <div className="card-footer py-3 border-0 bgcolorone" >
                    <div className="d-flex flex-start w-100">
                        <div className="form-outline w-100">
                            <textarea className="form-control bgcolortwo" id="textAreaExample" rows="4" placeholder="Add Commment" value={this.state.comment} onChange={(e) => this.handleWriteComment(e.target.value)}></textarea>
                            <label className="form-label" htmlFor="textAreaExample" style={{marginleft: "0px"}}></label>
                            <div className="form-notch">
                                <div className="form-notch-leading" style={{width: "9px"}}></div>
                                <div className="form-notch-middle" style={{width: "60px"}}></div>
                                <div className="form-notch-trailing"></div>
                            </div>
                        </div>
                    </div>
                    {(this.state.errors != null ? <span className="error invalid_text">{this.state.errors}</span> : "")}
            
                    <div className="float-start mt-2 pt-1">
                        {/* <a href="#" className="postBtn"> */}
                            <button onClick={() => this.handleLikeClick()} type="button" className="btn btn-primary btn-sm postBtn">Post comment</button>
                        {/* </a> */}
                    </div>
                </div>
            </>
        );
    }
}

export default (CommentBox);