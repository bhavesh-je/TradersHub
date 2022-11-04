import React, {Component} from "react";
import axios from 'axios';
import { Row, Col, Button, Card, CardGroup, Form, Image, Tooltip, OverlayTrigger } from 'react-bootstrap';
// import {FontAwesomeIcon} from '@fortawesome/react-fontawesome'
import 'font-awesome/css/font-awesome.min.css';

class LikeBtn extends Component{
    constructor(props) {
        super(props);
        // console.log(props);
        this.state = {
            post: props.post,
            user: props.user,  
            likes: 0,
            dislikes: 0,
            activeLike: props.isLiked ? true : false,
            activeDislike: false,
            liking : 0,
            total_likes : props.p_like,
            likedUsersImgs: [],
            is_Liked: props.isLiked
        };
    }
    
    setLikeState() {
        this.setState({
            likes: !this.state.activeLike
            ? this.state.likes + 1
            : this.state.likes - 1,
            activeLike: !this.state.activeLike,
        });
    }
    
    setDislikeState() {
        this.setState({
            dislikes: !this.state.activeDislike
            ? this.state.dislikes + 1
            : this.state.dislikes - 1,
            activeDislike: !this.state.activeDislike
        });
    }
    
    handleLikeClick() {
        if (this.state.activeDislike) {
            this.setLikeState();
            this.setDislikeState();
        }
        this.setLikeState();
        // console.log('likes ', this.state.activeLike);
        axios.post(`post-like-dislike`, { params: { user: this.state.user, post: this.state.post, like: this.state.activeLike } }).then(res => {
            // console.log(res.data.result);
            this.setState({total_likes:res.data.result.total_like, likedUsersImgs:res.data.result.LikedUsersImgs});
        });
    }

    componentDidMount(){
      const config = { headers: { 'content-type': 'application/json', 'x-inertia': 'true' } };
      axios.post(`getLikedUsers`, { params: { post: this.state.post } }).then(res => {
        if( res.data.result.LikedUsersImgs ){
          this.setState({likedUsersImgs:res.data.result.LikedUsersImgs});
        }
      });
    }
    
      handleDislikeClick() {
        if (this.state.activeLike) {
          this.setDislikeState();
          this.setLikeState();
        }
        this.setDislikeState();
      }
    
      render() {
        const likes = this.state.likes;
        const activeLike = this.state.activeLike;
        const dislikes = this.state.dislikes;
        const activeDislike = this.state.activeDislike;
        const total_likes = this.state.total_likes;
        const usersLikedImgs = this.state.likedUsersImgs;
        const isLiked = this.state.is_Liked;
        return (
          <>
           <div className=" col-sm-6 col-md-6 col-lg-6 d-flex align-items-center p-0">
                <div className=" d-flex">
                <button onClick={() => this.handleLikeClick()} className={`like-button ${activeLike ? "liked" : ""}`} ><i className={ activeLike ?  "fa fa-heart text-danger mx-1" : "fa fa-heart-o text-dark mx-1"}> </i></button>
                    <span className="">{total_likes}</span>
                </div>
                <div className="d-flex align-items-center avatar-group mb-3 mt-3 avtarGrp">
                    {usersLikedImgs.map((likedUseImg,index)=>(
                        usersLikedImgs.length > 0 ? <OverlayTrigger key={index} placement="top" overlay={<Tooltip id="tooltip-top">{likedUseImg.name}</Tooltip>}><div className="avatar"><Image key={index} className="rounded-circle pull-up" alt="Avatar" src={ likedUseImg.profile_img ? 'uploads/users-profile/'+likedUseImg.profile_img : 'uploads/users-profile/avatar5.png' }/></div></OverlayTrigger> : ''
                    ))}
                    {/* <div className="avatar">
                        <span className="mx-3">+3</span>More
                    </div> */}
                </div>
            </div>
          </>
        );
      }
}

export default (LikeBtn);