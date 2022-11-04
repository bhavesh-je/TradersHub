import React, { Component } from 'react';
import Authenticated from '@/Layouts/Authenticated';
import { Container, Accordion, Row, Col, Button, Card, CardGroup, ButtonGroup, AccordionButton } from 'react-bootstrap';
import { Link, Head } from '@inertiajs/inertia-react';

class Faq extends Component {
    constructor(props) {
        super(props);
        this.state = {
            faqs: this.props.faqs,
        }
    }

    componentDidMount() { }

    recommended(nextProps) { }

    render() {
        return (
            <>
                <Authenticated auth={this.props.auth} errors={this.props.errors} header={<h2 className="font-semibold text-xl text-gray-800 leading-tight">FAQs</h2>} >
                    <Head title="FAQs" />
                    {/* <div className="py-12">
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
                    </div> */}

                    <div className="accordianSec">
                        <div className="container-fluid">
                            <div className="row my-5 mx-3">
                                <div className="accordion accordion-flush" id="accordionFlushExample">
                                    {this.state.faqs.map((faq, index) => (
                                        <div className="accordion-item" eventKey={index} key={index}>
                                            <h2 className="accordion-header" id={"flush-headin"+index}>
                                                <button className="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target={"#flush-collapse"+index} aria-expanded="false" aria-controls={"flush-collapse"+index}>
                                                    {faq.question}
                                                </button>
                                            </h2>
                                            <div id={"flush-collapse"+index} className="accordion-collapse collapse" aria-labelledby={"flush-heading"+index} data-bs-parent="#accordionFlushExample">
                                                {/* <div className="accordion-body" >{faq.answer}</div> */}
                                                <div className="accordion-body" dangerouslySetInnerHTML={{__html: faq.answer}}></div>
                                            </div>
                                        </div>
                                    ))}
                                </div>
                            </div>
                        </div>
                    </div>
                </Authenticated>
            </>
        );
    }
}
export default Faq;