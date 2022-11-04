import ReactDOM from "react-dom";
import { Inertia } from '@inertiajs/inertia';
import React, { useState, useRef, useEffect, Component } from 'react';
import Authenticated from '@/Layouts/Authenticated';
import { Container, Row, Col, Button, Card, CardGroup, Alert, Image, Modal } from 'react-bootstrap';
import axios from 'axios';
import { Link, Head, useForm } from '@inertiajs/inertia-react';
import Timer from '../Components/Timer';
import ModalPopup from '../Components/modal_popup';
import { getJSON, timers } from "jquery";
import $ from 'jquery';

class TakeQuiz extends Component {
    constructor(props) {
        super(props);
        this.state = {
            quizTopice: this.props.TakeQuiz,
            quizeQue: this.props.QuizeQue,
            quizeOp: this.props.QuizeOp,
            show: false,
            isshow: null,
            hours: 0,
            minutes: 0,
            seconds: 0,
            hoursMinSecs: [],
            data: [],
            endtime: "",
        }
        this.gameLost = this.gameLost.bind(this);
        this.onSubmit = this.onSubmit.bind(this);
        this.handleChangeValue = this.handleChangeValue.bind(this);
    }

    componentDidMount() {
        // console.log(this.state.quizeOp);
        var h = 0, m = 0, s = 0;
        if (this.state.quizTopice.duration_measure == 'hours') {
            h = this.state.quizTopice.duration;
        } else if (this.state.quizTopice.duration_measure == 'minutes') {
            m = this.state.quizTopice.duration;
        }
        this.setState({hours: h});
        this.setState({minutes: m});
        this.setState({seconds: this.state.quizTopice.duration});

        setTimeout(this.gameLost, (this.state.quizTopice.duration * 60000));
        // this.setState({ endtime: "'" + this.state.hours + ":" + this.state.minutes + ":" + this.state.seconds + "'" });
        // console.log(this.state.endtime);

        // disable ctr+r key
        $('body').addClass('takequiz');
        if ($("body").hasClass("takequiz")) {
            $('.takequiz').on('keydown', function (event) {
                // console.log("takequiz page");
                // console.log(event.ctrlKey);
                console.log($("body").hasClass("takequiz"));

                if (event.ctrlKey) {
                    event.preventDefault();
                }
                if (event.keyCode == 116) {
                    event.preventDefault();
                    return false;
                }
                if (event.keyCode == 123) {
                    event.preventDefault();
                    return false;
                }
            });
            $('.takequiz').on("mousedown",function(e){
                // console.log(e.which);
                e.preventDefault();
                if( (e.which == 1) || (e.which === 3) ) {
                    return false;
                }
            });
    
            // Restrict left/right click
            $('.takequiz').bind("contextmenu",function(e){
                // console.log(e.which);
                // e.preventDefault();
                return false;
            });
        }
    }



    componentWillUnmount() {
        $("body").removeClass("takequiz");
        $('body').unbind('keydown');
        $('body').unbind('mousedown');
        $('body').unbind('contextmenu');
        clearInterval(this.interval);
    }

    recommended(nextProps) { }

    gameLost() {
        console.log("time Out");
        document.getElementById("submit").click();
        // if($('#timerData').val() == "00:00:00"){
        // setStopTimer("00:00:00");
        // }
    }

    onSubmit(e) {
        e.preventDefault();
        const formData = new FormData(document.getElementById("form"));
        // const formData = new FormData(this.state.value);
        const config = { headers: { 'content-type': 'application/json', 'x-inertia': 'true' } };
        axios.post('/getQue/storeAnswer', formData, config).then(res => {
            // console.log("form data " + res.data);
            // setShow(true)
            // const cars = [];
            // cars['user_id'] = res.data.user_id;
            // cars['topic_id'] = res.data.topic_id;
            // console.log(cars);
            // post(route('getR'));
            Inertia.post('/getQue/storeResult', res.data);
            // this.$inertia.visit(route('storeResult'), { data: res.data });
        }).catch(err => {
            console.log(err);
        });
    }

    handleChangeValue(event){ this.setState({endtime: event.target.value}) };

    render() {
        const hours = this.state.hours;
        const minutes = this.state.minutes;
        const seconds = this.state.seconds;
        const hoursMinSecs = this.state.hoursMinSecs;
        let mytime;
        if(hours != 0){
            mytime = this.state.seconds * 60 * 60;
        }else {
            mytime = this.state.seconds * 60;
        }

        let user = this.props.auth;
        return (
            <Authenticated
                auth={this.props.auth}
                errors={this.props.errors}
                header={<h2 className="font-semibold text-xl text-gray-800 leading-tight">Quiz: {this.state.quizTopice.topic_name}</h2>}
            >

                <div className="quizSec">
                    <div className='container d-flex justify-content-center pt-4 h3'>
                        {/* {stopTimer == "00:00:00" ? onSubmit() : <Timer hoursMinSecs={hoursMinSecs}/>} */}
                        {/* <Timer hoursMinSecs={this.state.hoursMinSecs} /> */}
                        {mytime && <Timer startTimeInSeconds={mytime} onChangeValue={this.handleChangeValue}/>}
                    </div>
                    <form onSubmit={this.onSubmit} id="form">
                        <input type="hidden" name="user_id" value={this.props.auth.user.id} />
                        <input type="hidden" name="topic_id" value={this.state.quizTopice.id} />
                        <input type="hidden" name="submitted_at" id="submitted_at"  value={this.state.endtime} />
                        {this.state.quizeQue.map((que, index) => (
                            <div class="question" key={que.id}>
                                {/* <h1 class="question__title"> Find out the correct one... </h1> */}
                                {(que.que_img === null ? <h1 class="question__title" dangerouslySetInnerHTML={{__html: que.question}}></h1> : <h1 class="question__title justify-content-center d-flex"><img className="img-fluid quizImg" src={'/uploads/que-img/' + que.que_img} /></h1>)}
                                
                                <div class="question__answer flex-wrap">
                                    {this.state.quizeOp.map((op, index) => (
                                        (que.que_type == 'single' ?
                                            (op.que_id == que.id ?
                                                <div class="divOne" key={op.id}>
                                                    <label class="question__label">
                                                        {/* <input type="radio" class="question__input" name="q1" /> */}
                                                        <input type="radio" className="single_choice_0" name={que.id} value={op.id} data-id="0" onChange={this.handleChange} />
                                                        {/* <span class="question__span"> */}
                                                            {/* {que.opt_img == 0 || op.opt_img === null ?  op.option : <img className="img-fluid quizImg" src={'/uploads/opt-img/' + op.opt_img} />} */}
                                                            {que.opt_img == 0 || op.opt_img === null ?  <div class="question__span" dangerouslySetInnerHTML={{__html: op.option}}></div> : <span class="question__span"><img className="img-fluid quizImg" src={'/uploads/opt-img/' + op.opt_img} /></span>}
                                                        {/* </span> */}
                                                    </label>
                                                </div>
                                            : "" )
                                        :   (op.que_id == que.id ?
                                                <div class="divOne" key={op.id}>
                                                    <label class="question__label">
                                                        {/* <input type="checkbox" class="question__input" name="q1" /> */}
                                                        <input type="checkbox" className="" name={que.id + "[]"} value={op.id} data-id="0" />
                                                        <span class="question__span">
                                                            {/* {que.opt_img == 0 || op.opt_img === null ? op.option : <img className="opt-img" src={'/uploads/opt-img/' + op.opt_img} />} */}
                                                            {que.opt_img == 0 || op.opt_img === null ? <div dangerouslySetInnerHTML={{__html: op.option}}></div> : <img className="opt-img" src={'/uploads/opt-img/' + op.opt_img} />}
                                                        </span>
                                                    </label>
                                                </div>
                                            : "" )
                                        )
                                    ))}
                                    {/* <div class="divTwo">
                                        <label class="question__label">
                                            <input type="radio" class="question__input" name="q1" />
                                            <span class="question__span">third</span>
                                        </label>
                                        <label class="question__label">
                                            <input type="radio" class="question__input" name="q1" />
                                            <span class="question__span">correct</span>
                                        </label>
                                    </div> */}
                                </div>
                            </div>
                        ))}
                        <div className="col-md-12 text-center">
                            {/* <button type="submit" onClick={() => onShowAlert('success')} className="btn btn-primary">Submit</button> */}
                            {/* <button type="submit" onClick={() => isShowPopup(true)} id="submit" className="btn btn-primary">Submit</button> */}
                            <button type="submit" id="submit" className="btn btn-primary">Submit</button>
                        </div>
                    </form>
                </div>
            </Authenticated>
        );
    }
}
export default TakeQuiz;