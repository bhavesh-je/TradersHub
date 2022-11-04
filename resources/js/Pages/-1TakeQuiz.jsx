import ReactDOM from "react-dom";
import { Inertia } from '@inertiajs/inertia';
import React, { useState, useRef, useEffect, Component } from 'react';
import Authenticated from '@/Layouts/Authenticated';
import { Container, Row, Col, Button, Card, CardGroup, Alert, Image, Modal } from 'react-bootstrap';
import axios from 'axios';
import { Link, Head, useForm } from '@inertiajs/inertia-react';
import Timer from '../Components/-Timer';
import ModalPopup from '../Components/modal_popup';
import { getJSON, timers } from "jquery";
import $ from 'jquery';


export default function TakeQuiz(props) {
    // class TakeQuiz extends Component{
    const quizTopice = props.TakeQuiz;
    const quizeQue = props.QuizeQue;
    const quizeOp = props.QuizeOp;
    const [stopTimer, setStopTimer] = React.useState();
    const [mytime, setMytime] = React.useState();
    const [show, setShow] = useState(false);
    var h = 0, m = 0, s = 0;
    const state = {
        showModalPopup: false
    };

    const [isshow, setState] = useState(null);
    const [alert, setAlert] = React.useState({
        type: 'error',
        text: 'This is a alert message',
        show: false
    });
    if (quizTopice.duration_measure == 'hours') {
        h = quizTopice.duration;
    } else if (quizTopice.duration_measure == 'minutes') {
        m = quizTopice.duration;
    }
    const hoursMinSecs = { hours: h, minutes: m, seconds: s };

    const onSubmit = (e) => {
        e.preventDefault();
        const formData = new FormData(document.getElementById("form"));
        const config = { headers: { 'content-type': 'application/json', 'x-inertia': 'true' } };
        axios.post('/getQue/storeAnswer', formData, config).then(res => {
            console.log(res.data);
            // setShow(true)
            // const cars = [];
            // cars['user_id'] = res.data.user_id;
            // cars['topic_id'] = res.data.topic_id;
            // console.log(cars);
            // post(route('getR'));
            Inertia.post('/getQue/storeResult', res.data)
            // this.$inertia.visit(route('storeResult'), { data: res.data });
        }).catch(err => {
            console.log(err);
        });
    };
    const handleClose = () => setShow(false);

    // const showResultPath = () =>{
    //     Inertia.post('/getQue/storeResult', res.data)
    // }

    const onShowAlert = (type) => {
        setAlert({
            show: true
        });
    }

    const onCloseAlert = () => {
        setAlert({
            type: '',
            text: '',
            show: false
        })
    }
    const isShowPopup = (status) => {
        setState({ showModalPopup: status });
    };
    function gameLost() {
        console.log("time Out");
        document.getElementById("submit").click();
        // if($('#timerData').val() == "00:00:00"){
        // setStopTimer("00:00:00");
        // }
    }
    setTimeout(gameLost, (quizTopice.duration * 60000));


    var time = $('#timers').text();
    // var stopTimer = $('#timerData').val();
    // var stopTimer = document.getElementById('timers');

    return (

        <Authenticated
            auth={props.auth}
            errors={props.errors}
            header={<h2 className="font-semibold text-xl text-gray-800 leading-tight">Quiz: {quizTopice.topic_name}</h2>}
        >

            <Head title={quizTopice.topic_name} />
            <div className='container d-flex justify-content-center pt-4 h3'>
                {/* {stopTimer == "00:00:00" ? onSubmit() : <Timer hoursMinSecs={hoursMinSecs}/>} */}
                <Timer hoursMinSecs={hoursMinSecs} />
            </div>

            <div className="py-12">
                <Container>
                    <ModalPopup showModalPopup={state.showModalPopup} onPopupClose={isshow}></ModalPopup>
                    {/* <Alert variant="success" show={alert.show} onClose={() => onCloseAlert()} >Quiz Submited successfully!</Alert> */}
                    <Row className="justify-content-sm-center">
                        <form onSubmit={onSubmit} id="form">
                            <input type="hidden" name="user_id" value={props.auth.user.id} />
                            <input type="hidden" name="topic_id" value={quizTopice.id} />
                            <input type="hidden" name="submitted_at" value={time} />
                            <div className="list text-center"></div>
                            {quizeQue.map((que, index) => (
                                <Card>
                                    <Card.Header>{(que.que_img === null ? que.question : <img className="que-img" src={'/uploads/que-img/' + que.que_img} />)}</Card.Header>
                                    <Card.Body>
                                        <div className="d-flex flex-wrap">
                                            {quizeOp.map((op, index) => (
                                                (que.que_type == 'single' ?
                                                    (op.que_id == que.id ?
                                                        <div className="col-md-6" key={op.id}>
                                                            <div className="form-group">
                                                                <div className="input-group _single_ans">
                                                                    <div className="input-group-prepend">
                                                                        <span className="input-group-text">
                                                                            {/* <input type="radio" className="single_choice_0" name={"single_choice_0-" + que.id }  value={op.id} data-id="0" /> */}
                                                                            <input type="radio" className="single_choice_0" name={que.id} value={op.id} data-id="0" />
                                                                        </span>
                                                                    </div>
                                                                    {que.opt_img == 0 || op.opt_img === null ? <label htmlFor="single_choice_0" id="single_choice_ans" className="form-control" style={{ width: "350px" }}>{op.option}</label> : <img className="opt-img" src={'/uploads/opt-img/' + op.opt_img} />}

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
                                                                            <input type="checkbox" className="" name={que.id + "[]"} value={op.id} data-id="0" />
                                                                        </span>
                                                                    </div>
                                                                    {que.opt_img == 0 || op.opt_img === null ? <label id="single_choice_ans" className="form-control" style={{ width: "350px" }}>{op.option}</label> : <img className="opt-img" src={'/uploads/opt-img/' + op.opt_img} />}
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
                                <button type="submit" onClick={() => isShowPopup(true)} id="submit" className="btn btn-primary">Submit</button>
                            </div>
                        </form>
                        <Modal show={show} onHide={handleClose}>
                            <Modal.Header closeButton>
                                <Modal.Title>Hurrey! You have finish the quiz</Modal.Title>
                            </Modal.Header>
                            <Modal.Body>
                                Thank you.
                            </Modal.Body>
                            <Modal.Footer>
                                {/* <Button variant="secondary" onClick={handleClose}>
                                Show result
                            </Button> */}
                                <Button variant="primary" href={route('quizes')}>
                                    Go to quiz
                                </Button>
                            </Modal.Footer>
                        </Modal>
                    </Row>
                </Container>
            </div>
        </Authenticated>
    );
}