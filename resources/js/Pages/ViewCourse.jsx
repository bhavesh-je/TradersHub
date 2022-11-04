import React, { Component } from 'react';
import Authenticated from '@/Layouts/Authenticated';
import { Container, Row, Col, Card, ListGroup} from 'react-bootstrap';
import { Link, Head } from '@inertiajs/inertia-react';
import moment from 'moment';
import FFMPEG from "react-ffmpeg";

class Courses extends Component{
    constructor(props){
        super(props);
        this.state = {
            course_categories: this.props.course_cat,
            course_topics : this.props.view_cources.course_topics,
        };
        this.addDays = this.addDays.bind(this);
        this.priceshow = this.priceshow.bind(this);
    }

    componentDidMount(){
        $("body").addClass("viewCoursePage");
        $('.viewCoursePage').on('keydown', function(event) {
            console.log("viewCourse page");
            console.log(event.keyCode);
            console.log(event);
            
            if(event.keyCode == 123 ) {
                return false;
            } 

            if( event.keyCode == 116 || event.keyCode == 93) {
                event.preventDefault();
                return false;
            } 

            if( event.ctrlKey || event.shiftKey || event.keyCode == 73 ) {
                event.preventDefault();
                return false;
            }
            
        });

        // Restrict left/right click
        $('.viewCoursePage').on("mousedown",function(e){
            console.log(e.which);
            e.preventDefault();
            if( (e.which == 1) || (e.which === 3) ) {
                return false;
            }
        });

        // Restrict left/right click
        $('.viewCoursePage').bind("contextmenu",function(e){
            console.log(e.which);
            // e.preventDefault();
            return false;
        });
    }

    componentWillUnmount(){
        
        $("body").removeClass("viewCoursePage");
        $('body').unbind('keydown');
        $('body').unbind('mousedown');
        $('body').unbind('contextmenu');
        // console.log($(location).attr('pathname'));
    }

    recommended(nextProps){}
    
    addDays(date, days) {
        var result = new Date(date);
        result.setDate(result.getDate() + days);
        return result;
    }

    priceshow(course_price,course_sale_price){
        let price;
        if(course_price != null &&  course_sale_price != null ){
            price = "<span><del>$"+course_price+"</del> $"+course_sale_price+"</span>";
        }else if (course_price != null &&  course_sale_price == null){
            price = "<span>$"+course_price+"</span>";
        
        }else if (course_price == null &&  course_sale_price != null){
            price = "<span>$"+course_sale_price+"</span>";
        }else if (course_price == null &&  course_sale_price == null){
            price = "<span>Free</span>";
        }
        return price;
    }
    
    render(){
        return(
            <>
            <Authenticated
            auth={this.props.auth}
            errors={this.props.errors}
            header={<h2 className="font-semibold text-xl text-gray-800 leading-tight">View Course</h2>}
        >
            <Head title="View Course" />
          
            <div className="py-12">
                <Container>
                    <Row className="justify-content-sm-center">
                        <Col xs={12} md={12}>
                            {/* <Card>
                                <Card.Header as="h5" className="text-center">{props.view_cources.course_name}</Card.Header>
                            <Card.Body>
                                <Card.Text dangerouslySetInnerHTML={{__html: props.view_cources.course_content }} />
                                <iframe width="560" height="315" frameBorder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" src={props.view_cources.course_video_link}/>
                            </Card.Body>
                            </Card> */}
                            <Card>
                                <iframe width="100%" height="315" frameBorder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" src={this.props.view_cources.course_video_link.replace('.com', '-nocookie.com')}/>
                                <Card.Body>
                                    <Card.Title>Course name :</Card.Title>
                                    <Card.Text>{this.props.view_cources.course_name}</Card.Text>
                                    <Card.Title>Course content :</Card.Title>
                                    <Card.Text dangerouslySetInnerHTML={{ __html: this.props.view_cources.course_content }}></Card.Text>
                                    <Row>
                                        <Col>
                                            <Card.Title>Course price :</Card.Title>
                                            <Card.Text dangerouslySetInnerHTML={{ __html: this.priceshow(this.props.view_cources.course_price, this.props.view_cources.course_sale_price) }}></Card.Text>
                                        </Col>
                                        <Col>
                                            <Card.Title>Course created :</Card.Title>
                                            <Card.Text>{moment(this.props.view_cources.created_at).fromNow()}</Card.Text>
                                        </Col>
                                        <Col>
                                            <Card.Title>Course expire :</Card.Title>
                                            <Card.Text>{moment(this.addDays(this.props.view_cources.created_at, this.props.view_cources.course_expiration_day)).fromNow()}</Card.Text>
                                        </Col>
                                        <Col>
                                            <Card.Title>Course category :</Card.Title>
                                            <Card.Text>{this.state.course_categories}</Card.Text>
                                        </Col>
                                    </Row>
                                    
                                </Card.Body>
                            </Card>
                            
                        </Col>
                    </Row>
                    { this.state.course_topics.length != 0 ? 
                    <div className="quizBtn my-5">
                        <h3>Course Quiz</h3>
                        <div className="container">
                            <div className="row">
                                {console.log(this.state.course_topics)}
                                {this.state.course_topics.map((topic, index) => (
                                    <div className="col-lg-4 my-3" key={topic.id}>
                                        <div className="card card-margin h-100">
                                            <div className="card-header no-border">
                                                <h5 className="card-title text-uppercase">{topic.topic_name}</h5>
                                            </div>
                                            <div className="card-body pt-0">
                                                <div className="widget-49">
                                                    <div className="widget-49-title-wrapper">
                                                        <div className="widget-49-date-success">
                                                            <span className="widget-49-date-day ">{ topic.passing_grade != null || topic.passing_grade > 0 ? topic.passing_grade : "No"}</span>
                                                            <span className="widget-49-date-month text-uppercase">mark</span>
                                                        </div>
                                                        <div className="widget-49-meeting-info">
                                                            <span className="widget-49-pro-title">Time: { topic.duration != null || topic.duration > 0 ? topic.duration : "No time"}{topic.duration_measure=== 'minutes' ? 'm' : ''}{topic.duration_measure=== 'hours' ? 'h' : ''}</span>
                                                        </div>
                                                    </div>
                                                    <p className="widget-49-meeting-points">Total questions: { topic.questions ? topic.questions.length : 'No'}</p>
                                                    <div className="widget-49-meeting-action text-start">
                                                        {/* <a href="#" className="btn btn-sm btn-flash-border-primary">Take quiz<i className="fa fa-play text-white mx-2" aria-hidden="true"></i></a> */}
                                    
                                                        {/* <Button href={route('take-quiz', quize.id)} variant="outline-dark" size="sm"> */}
                                                        <Link href={route('take-quiz', topic.id)} className='btn btn-outline-dark btn-sm' >
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
                            </div>
                        </div>
                    </div> : ''}
                </Container>
            </div>
        </Authenticated>
        </>
        );
    }
}
export default Courses;