import React from 'react';
import Authenticated from '@/Layouts/Authenticated';
import { Container,Accordion , Row, Col, Button, Card, CardGroup, ButtonGroup, AccordionButton } from 'react-bootstrap';
import { Link, Head } from '@inertiajs/inertia-react';

export default function Faq(props){
    const faqs = props.faqs;
    return ( 
        <>
        <Authenticated auth={props.auth} errors={props.errors} header={<h2 className="font-semibold text-xl text-gray-800 leading-tight">FAQs</h2>} >
            <Head title="FAQs" />
            <div className="py-12">
                <Container>
                    <Row className="justify-content-md-center">
                        <Accordion>
                        {faqs.map((faq,index)=>(
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