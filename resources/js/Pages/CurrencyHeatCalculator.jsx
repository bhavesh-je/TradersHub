import ReactDOM from "react-dom";
import React, { useState, useRef, useEffect ,Component } from 'react';
import { Container, Row, Col, Button, Card, CardGroup } from 'react-bootstrap';
import Authenticated from '@/Layouts/Authenticated';
import axios from 'axios';
import { Link, Head } from '@inertiajs/inertia-react';
import { ForexHeatMap } from "react-ts-tradingview-widgets";

class CurrencyHeatCalculator extends Component {
    constructor(props) {
        super(props);
    }

    componentDidMount() {}

    render() {
        return (
            <Authenticated
                auth={this.props.auth}
                errors={this.props.errors}
                header={<h2 className="font-semibold text-xl text-gray-800 leading-tight">Currency Heat Calculator</h2>}
            >
                <Head title="Currency Heat Calculator" />
                <div className="py-12">
                    <Container>
                        <Row className="justify-content-sm-center">
                            <Col lg={12} xs={12}>
                            <ForexHeatMap colorTheme="light" width={`100%`}></ForexHeatMap>
                            </Col>
                        </Row>
                    </Container>
                </div>    
            </Authenticated>
        );
    }
}

export default CurrencyHeatCalculator;