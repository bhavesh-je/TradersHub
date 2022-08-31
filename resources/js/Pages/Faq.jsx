import React, { Component } from 'react';
import Authenticated from '@/Layouts/Authenticated';
import { Container,Accordion , Row, Col, Button, Card, CardGroup, ButtonGroup, AccordionButton } from 'react-bootstrap';
import { Link, Head } from '@inertiajs/inertia-react';

class Faq extends Component{
    constructor(props){
        super(props);
        this.state = {
            faqs: this.props.faqs,
        }
    }

    componentDidMount(){}

    recommended(nextProps){}

    render(){
        return ( 
            <>
            <Authenticated auth={this.props.auth} errors={this.props.errors} header={<h2 className="font-semibold text-xl text-gray-800 leading-tight">FAQs</h2>} >
                <Head title="FAQs" />
                <div className="py-12">
                    <Container>
                        <Row className="justify-content-md-center">
                            <Accordion>
                            {this.state.faqs.map((faq,index)=>(
                                <Accordion.Item eventKey={index} key={index} className="bg-info">
                                    <Accordion.Header>{ faq.question }</Accordion.Header>
                                    <Accordion.Body>
                                        { faq.answer }
                                    
                                    </Accordion.Body>
                                </Accordion.Item>
                            ))}                     
                            </Accordion>
                        </Row>
                    </Container>
                </div>
            </Authenticated>
            </>
        );
    }
}
export default Faq;