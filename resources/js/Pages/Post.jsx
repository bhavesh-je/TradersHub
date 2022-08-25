import React from 'react';
import Authenticated from '@/Layouts/Authenticated';
import { Container, Row, Col, Card, ListGroup} from 'react-bootstrap';
import { Link, Head } from '@inertiajs/inertia-react';
import moment from 'moment';


export default function Post(props) {
    console.log(props);
    return (
        <Authenticated
            auth={props.auth}
            errors={props.errors}
            header={<h2 className="font-semibold text-xl text-gray-800 leading-tight">View Post</h2>}
        >
            <div className="py-12">
                <Container>
                    <Row className="justify-content-sm-center">
                        <Col xs={12} md={12}>
                            <Card>
                                { props.posts.post_image == null ? "" : <img src={'/uploads/post-img/'+props.posts.post_image} alt="" style={{width:"100%",height:"315px"}} />}
                                <Card.Body>
                                    <Card.Title>Post Title :</Card.Title>
                                    <Card.Text>{props.posts.post_title}</Card.Text>
                                    <Card.Title>Post content :</Card.Title>
                                    <Card.Text dangerouslySetInnerHTML={{ __html: props.posts.post_content }}></Card.Text>
                                </Card.Body>
                            </Card>
                        </Col>
                    </Row>
                </Container>
            </div>
        </Authenticated>
    )
}
