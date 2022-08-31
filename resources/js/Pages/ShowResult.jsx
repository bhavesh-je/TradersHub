import ReactDOM from "react-dom";
import React, { useState, useRef, useEffect ,Component } from 'react';
import { Container, Row, Col, Button, Card, CardGroup } from 'react-bootstrap';
import Authenticated from '@/Layouts/Authenticated';
import axios from 'axios';
import { Link, Head } from '@inertiajs/inertia-react';

class ShowResult extends Component{
    constructor(props){
        super(props);
        this.state = {
            showResult: this.props.ShowResult,
        };
    }

    componentDidMount(){}

    recommended(nextProps){}

    render(){
        return(
            <Authenticated
            auth={this.props.auth}
            errors={this.props.errors}
            header={<h2 className="font-semibold text-xl text-gray-800 leading-tight">Result</h2>}
            >
                <Head title="Quize" />
                    <div className="py-12">
                        <Container>
                            <Row className="justify-content-md-center" xs={12} md={12}>
                                <Col key={this.state.showResult.topic.id}>
                                    <Card>
                                        <Card.Body>
                                            <Card.Title>{this.state.showResult.topic.topic_name}</Card.Title>
                                            <Card.Text>
                                                <div className="row">
                                                    
                                                    <div className="col-md-6">
                                                        <h6 className='text-muted'><strong>Total Marks:</strong> { this.state.showResult.mark } / { this.state.showResult.topic.passing_grade }</h6> 
                                                    </div>
                                                    <div className="col-md-6 text-right">
                                                        <h6 className='text-muted'><strong>Per:</strong> { this.state.showResult.total }%</h6> 
                                                    </div>
                                                    <div className="col-md-6">
                                                        <h6 className='text-muted'><strong>Total questions:</strong> { this.state.showResult.totalQues } </h6> 
                                                    </div>
                                                    <div className="col-md-12 text-center mt-3">
                                                        <Button href={route('quizes')} variant="outline-dark" size="sm">
                                                            Take new quiz
                                                        </Button> 
                                                    </div>
                                                </div>
                                            </Card.Text>
                                        </Card.Body>
                                    </Card>
                                </Col>
                                {/* {showResult.topic.topic_name}
                                {showResult.totalQues}
                                {showResult.true} */}
                            </Row>
                        </Container>
                    </div>
            </Authenticated>
        );
    }
}
export default ShowResult;