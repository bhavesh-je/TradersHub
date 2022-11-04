import React, {Component, useState} from "react";
import axios from 'axios';

class LikeButton extends Component{
    constructor(props) {
        super(props);
        this.state = {
            post: props.post,
            user: props.user,
            comment: props.commnet,
            likes: 0,
            dislikes: 0,
            activeLike: false,
            activeDislike: false,
            liking : 0,
            is_Liked: 0,
        };
    }

    componentDidMount(){
        console.log(this.state.activeLike );
        
        const formData = new FormData();
        formData.append("comment_id",this.state.comment);
        formData.append("post_id",this.state.post);
        formData.append("user_id",this.state.user);
        const config = { headers: { 'content-type': 'application/json', 'x-inertia': 'true' ,'enctype': 'multipart/form-data'} };
        axios.post('/getPostCommentLikes', formData, config).then(res => {
            
            if(res.data[0].is_like == null){
                this.setState({is_Liked: 0 });
                this.setState({activeLike: false });
            }else{
                if (res.data[0].is_like == 1) {
                    this.setState({is_Liked: 1});
                    // console.log(res.data[0].is_like+" is true");
                    this.setState({activeLike: true });
                }else{
                    // console.log(res.data[0].is_like+" is false");
                    this.setState({is_Liked: 0});
                    this.setState({activeLike: false });
                }
            }
        }).catch(err => {
            console.log(err);
        });
    }

    recommended(nextProps){
    }

    onClick(){
        this.setState({activeLike: this.state.activeLike ? false : true});
        const formData = new FormData();
        formData.append("comment_id",this.state.comment);
        formData.append("post_id",this.state.post);
        formData.append("user_id",this.state.user);
        formData.append("like",this.state.activeLike ? 1 : 0);
        const config = { headers: { 'content-type': 'application/json', 'x-inertia': 'true' ,'enctype': 'multipart/form-data'} };
        axios.post('/postCommentLike', formData, config).then(res => {
            // console.log(res.data);
        }).catch(err => {
            console.log(err);
        });
    }

    render() {
        // const activeLike = this.state.activeLike;
        return (
            <>
                <div className=" pe-3 ps-0 mb-0 ms-auto">
                    <button onClick={() => this.onClick()} className={`like-button ${this.state.activeLike ? "liked" : ""}`}><i className={ this.state.activeLike ?  "fa fa-heart text-danger mx-1 demo" : "fa fa-heart-o text-dark mx-1 my"}></i></button>
                </div>
                {/* <a className="btn btn-link pe-3 ps-0 mb-0 ms-auto" href="#"><i className=" fa fa-heart-o text-dark"></i></a> */}
                {/* <div>
                    <button >
                        <span className="likes-counter"></span>
                    </button>
                </div> */}
            </>
        );
    }
}
export default (LikeButton);