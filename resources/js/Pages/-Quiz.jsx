import React from 'react';
import Authenticated from '@/Layouts/Authenticated';
import { Container, Row, Col, Button, Card, CardGroup } from 'react-bootstrap';
import { Link, Head } from '@inertiajs/inertia-react';

export default function Quiz(props){
    const quizes = props.quizes;

    // Show quiz time
    const quizTime = (duration_measure) => {
        let measure;
        switch(duration_measure){
            case 'minutes' : return 'min';   
            case 'hours' : return 'hrs';
            case 'days' : return 'days';
        }
        
    }

    return ( 
        <>
            <Authenticated auth={props.auth} errors={props.errors} header={<h2 className="font-semibold text-xl text-gray-800 leading-tight">Quize</h2>} >
                <Head title="Quize" />
                <div className="py-12">
                    <Container>
                        <Row className="justify-content-md-center" xs={2} md={3}>
                            {quizes.map((quize, index) => (
                                <Col key={quize.id}>
                                    <Card>
                                        <Card.Body>
                                            <Card.Title>{quize.topic_name}</Card.Title>
                                            <Card.Text>
                                                <div className="row">
                                                    <div className="col-md-6">
                                                        <h6 className='text-muted'><strong>Time:</strong> { quize.duration != null || quize.duration > 0 ? quize.duration : "No time"}{quize.duration_measure=== 'minutes' ? 'm' : ''}{quize.duration_measure=== 'hours' ? 'h' : ''} </h6>
                                                    </div>
                                                    <div className="col-md-6 text-right">
                                                        <h6 className='text-muted'><strong>Marks:</strong> { quize.passing_grade != null || quize.passing_grade > 0 ? quize.passing_grade : "No"}</h6> 
                                                    </div>
                                                    <div className="col-md-6">
                                                        <h6 className='text-muted'><strong>Total questions:</strong> { quize.questions != null || quize.questions != 0 ? quize.questions.length : 'No'}</h6> 
                                                    </div>
                                                    <div className="col-md-12 text-center mt-3">
                                                        <Button href={route('take-quiz', quize.id)} variant="outline-dark" size="sm">
                                                            Take quiz
                                                        </Button> 
                                                    </div>
                                                </div>
                                            </Card.Text>
                                        </Card.Body>
                                    </Card>
                                </Col>
                            ))}
                        </Row>
                    </Container>
                </div>
            </Authenticated> 
        </>
    );

}