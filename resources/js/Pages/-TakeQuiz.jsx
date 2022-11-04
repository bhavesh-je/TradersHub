import ReactDOM from "react-dom";
import { Inertia } from '@inertiajs/inertia';
import React, { useState, useRef, useEffect, Component } from 'react';
import Authenticated from '@/Layouts/Authenticated';
import { Container, Row, Col, Button, Card, CardGroup, Alert, Image, Modal } from 'react-bootstrap';
import axios from 'axios';
import { Link, Head, useForm } from '@inertiajs/inertia-react';
import Timer from '../Components/Timer';
import ModalPopup from '../Components/modal_popup';
import { getJSON, makeArray, timers } from "jquery";
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
            h: 0,
            m: 0,
            s: 0,
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
        
        setTimeout(this.gameLost , (this.state.quizTopice.duration * 60000));
        // this.setState({ endtime: "'" + this.state.hours + ":" + this.state.minutes + ":" + this.state.seconds + "'" });

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
        // if (this.interval) {
            clearInterval(this.interval);
        // }
        
    }

    recommended(nextProps) { }

    gameLost() {
        console.log("time Out");
        var stop = document.getElementById("submit").click();
        // this.onSubmit();
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
        // $('#submitted_at').val($('#endtime').val());
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
            <Authenticated auth={user} errors={this.props.errors} >
                <Head title={this.state.quizTopice.topic_name} />
                <div className='container d-flex justify-content-center pt-4 h3 myclock'>            
                        {mytime && <Timer startTimeInSeconds={mytime} onChangeValue={this.handleChangeValue}/>}
                </div>

                <div className="py-12">
                    <Container>
                        {/* <ModalPopup showModalPopup={state.showModalPopup} onPopupClose={isshow}></ModalPopup> */}
                        {/* <Alert variant="success" show={alert.show} onClose={() => onCloseAlert()} >Quiz Submited successfully!</Alert> */}
                        <Row className="justify-content-sm-center">
                            <form onSubmit={this.onSubmit} id="form">
                                <input type="hidden" name="user_id" value={this.props.auth.user.id} />
                                <input type="hidden" name="topic_id" value={this.state.quizTopice.id} />
                                <input type="hidden" name="submitted_at" id="submitted_at"  value={this.state.endtime}/>
                                {/* <input type="hidden" name="endtime" id="endtime" value={this.state.endtime} /> */}
                                <div className="list text-center"></div>
                                {this.state.quizeQue.map((que) => (
                                    <Card key={que.id}>
                                        <Card.Header>{(que.que_img === null ? <div dangerouslySetInnerHTML={{__html: que.question}}></div>  : <img className="que-img" src={'/uploads/que-img/' + que.que_img} />)}</Card.Header>
                                        <Card.Body>
                                            <div className="d-flex flex-wrap">
                                                {this.state.quizeOp.map((op) => (
                                                    (que.que_type == 'single' ?
                                                        (op.que_id == que.id ?
                                                            <div className="col-md-6" key={op.id}>
                                                                <div className="form-group">
                                                                    <div className="input-group _single_ans">
                                                                        <div className="input-group-prepend">
                                                                            <span className="input-group-text">
                                                                                {/* <input type="radio" className="single_choice_0" name={"single_choice_0-" + que.id} value={op.id} data-id="0" /> */}
                                                                                <input type="radio" className="single_choice_0" name={que.id} value={op.id} data-id="0" onChange={this.handleChange} />
                                                                            </span>
                                                                        </div>
                                                                        {/* {que.opt_img == 0 || op.opt_img === null ? <label htmlFor="single_choice_0" id="single_choice_ans" className="form-control" style={{ width: "350px" }} >{op.option}</label> : <img className="opt-img" src={'/uploads/opt-img/' + op.opt_img} />} */}
                                                                        {que.opt_img == 0 || op.opt_img === null ? <label htmlFor="single_choice_0" id="single_choice_ans" className="form-control" style={{ width: "350px" }} dangerouslySetInnerHTML={{__html: op.option}}></label> : <img className="opt-img" src={'/uploads/opt-img/' + op.opt_img} />}

                                                                    </div>
                                                                </div>
                                                            </div>
                                                            : "")
                                                        :
                                                        (op.que_id == que.id ?
                                                            <div className="col-md-6" key={op.id}>
                                                                <div className="form-group">
                                                                    <div className="input-group _single_ans">
                                                                        <div className="input-group-prepend">
                                                                            <span className="input-group-text">
                                                                                {/* <input type="hidden" name="question_id"  value={que.id}/> */}
                                                                                {/* <input type="checkbox" className="" name={que.id + "[]"} value={op.id} data-id="0" onChange={this.handleChange} /> */}
                                                                                <input type="checkbox" className="" name={que.id + "[]"} value={op.id} data-id="0" />
                                                                            </span>
                                                                        </div>
                                                                        {/* {que.opt_img == 0 || op.opt_img === null ? <label id="single_choice_ans" className="form-control" style={{ width: "350px" }}>{op.option}</label> : <img className="opt-img" src={'/uploads/opt-img/' + op.opt_img} />} */}
                                                                        {que.opt_img == 0 || op.opt_img === null ? <label id="single_choice_ans" className="form-control" style={{ width: "350px" }} dangerouslySetInnerHTML={{__html: op.option}}></label> : <img className="opt-img" src={'/uploads/opt-img/' + op.opt_img} />}
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            : "")
                                                    )
                                                ))}
                                            </div>
                                        </Card.Body>
                                    </Card>
                                ))}
                                <div className="col-md-12 text-center">
                                    {/* <button type="submit" onClick={() => onShowAlert('success')} className="btn btn-primary">Submit</button> */}
                                    {/* <button type="submit" onClick={() => isShowPopup(true)} id="submit" className="btn btn-primary">Submit</button> */}
                                    <button type="submit" id="submit" className="btn btn-primary">Submit</button>
                                </div>
                            </form>
                            {/* <Modal show={show} onHide={handleClose}>
                                <Modal.Header closeButton>
                                    <Modal.Title>Hurrey! You have finish the quiz</Modal.Title>
                                </Modal.Header>
                                <Modal.Body>
                                    Thank you.
                                </Modal.Body>
                                <Modal.Footer>
                                    <Button variant="secondary" onClick={handleClose}>
                                    Show result
                                </Button>
                                    <Button variant="primary" href={route('quizes')}>
                                        Go to quiz
                                    </Button>
                                </Modal.Footer>
                            </Modal> */}
                        </Row>
                    </Container>
                </div>
            </Authenticated>
        );
    }
}
export default TakeQuiz;