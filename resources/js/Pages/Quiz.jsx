import React, { Component } from 'react';
import Authenticated from '@/Layouts/Authenticated';
import { Container, Row, Col, Button, Card, CardGroup } from 'react-bootstrap';
import { Link, Head } from '@inertiajs/inertia-react';

class Quiz extends Component{
    constructor(props){
        super(props);
        this.state = {
            quizes: this.props.quizes,
        };
    }

    componentDidMount(){}

    recommended(nextProps){}

    render(){
        return(
            <>
            <Authenticated auth={this.props.auth} errors={this.props.errors} header={<h2 className="font-semibold text-xl text-gray-800 leading-tight">Quize</h2>} >
                <div className="quizBtn my-5">
                    <div className="container">
                        <div className="row">
                        {this.state.quizes.map((quize, index) => (
                            <div className="col-lg-4 my-3" key={quize.id}>
                                <div className="card card-margin h-100">
                                    <div className="card-header no-border">
                                        <h5 className="card-title text-uppercase">{quize.topic_name}</h5>
                                    </div>
                                    <div className="card-body pt-0">
                                        <div className="widget-49">
                                            <div className="widget-49-title-wrapper">
                                                <div className="widget-49-date-success">
                                                    <span className="widget-49-date-day ">{ quize.passing_grade != null || quize.passing_grade > 0 ? quize.passing_grade : "No"}</span>
                                                    <span className="widget-49-date-month text-uppercase">mark</span>
                                                </div>
                                                <div className="widget-49-meeting-info">
                                                    <span className="widget-49-pro-title">Time: { quize.duration != null || quize.duration > 0 ? quize.duration : "No time"}{quize.duration_measure=== 'minutes' ? 'm' : ''}{quize.duration_measure=== 'hours' ? 'h' : ''}</span>
                                                </div>
                                            </div>
                                            <p className="widget-49-meeting-points">Total questions: { quize.questions != null || quize.questions != 0 ? quize.questions.length : 'No'}</p>
                                            <div className="widget-49-meeting-action text-start">
                                                {/* <a href="#" className="btn btn-sm btn-flash-border-primary">Take quiz<i className="fa fa-play text-white mx-2" aria-hidden="true"></i></a> */}
                            
                                                {/* <Button href={route('take-quiz', quize.id)} variant="outline-dark" size="sm"> */}
                                                <Link href={route('take-quiz', quize.id)} className='btn btn-outline-dark btn-sm' >
                                                    Take quiz
                                                    <i className="fa fa-play text-white mx-2" aria-hidden="true"></i>
                                                </Link> 
                                                {/* </Button>  */}
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        ))}
                            {/* <div className="col-lg-4 my-3">
                                <div className="card card-margin h-100">
                                    <div className="card-header no-border">
                                        <h5 className="card-title text-uppercase">PHP </h5>
                                    </div>
                                    <div className="card-body pt-0">
                                        <div className="widget-49">
                                            <div className="widget-49-title-wrapper">
                                                <div className="widget-49-date-success">
                                                    <span className="widget-49-date-day">0</span>
                                                    <span className="widget-49-date-month text-uppercase">mark</span>
                                                </div>
                                                <div className="widget-49-meeting-info">
                                                    <span className="widget-49-pro-title">Time: 10m</span>
                                                </div>
                                            </div>
                                            <p className="widget-49-meeting-points">Total questions: 3</p>
                                            <div className="widget-49-meeting-action text-start">
                                                <a href="#" className="btn btn-sm btn-flash-border-warning">Take quiz<i className="fa fa-play text-white mx-2" aria-hidden="true"></i></a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div className="col-lg-4 my-3">
                                <div className="card card-margin h-100">
                                    <div className="card-header no-border">
                                        <h5 className="card-title text-uppercase">Test1</h5>
                                    </div>
                                    <div className="card-body pt-0">
                                        <div className="widget-49">
                                            <div className="widget-49-title-wrapper">
                                                <div className="widget-49-date-success">
                                                    <span className="widget-49-date-day">0</span>
                                                    <span className="widget-49-date-month text-uppe text-uppercaserctake a quiz">mark</span>
                                                </div>
                                                <div className="widget-49-meeting-info">
                                                    <span className="widget-49-pro-title">Time: 10m</span>
                                                </div>
                                            </div>
                                            <p className="widget-49-meeting-points">Total questions: 3</p>
                                            <div className="widget-49-meeting-action text-start">
                                                <a href="#" className="btn btn-sm btn-flash-border-success">Take quiz<i className="fa fa-play text-white mx-2" aria-hidden="true"></i></a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div> */}
                        </div>
                    </div>
                </div>
            </Authenticated> 
        </>
        );
    }
}
export default Quiz;