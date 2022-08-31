import ReactDOM from "react-dom";
import React, { useState, useRef, useEffect, Component } from 'react';
import { Container, Row, Col, Button, Card, CardGroup, ButtonGroup, ButtonToolbar, Tab, Tabs, Nav } from 'react-bootstrap';
import Table from 'react-bootstrap/Table';
import Authenticated from '@/Layouts/Authenticated';
import axios from 'axios';
import { Link, Head } from '@inertiajs/inertia-react';
// import { FontAwesomeIcon } from '@fortawesome/react-fontawesome';
// import 'font-awesome/css/font-awesome.min.css';
import "datatables.net-dt/js/dataTables.dataTables"
import "datatables.net-dt/css/jquery.dataTables.min.css"
import $ from 'jquery';

class SignalReports extends Component {
    constructor(props) {
        super(props);
        this.state = {
            key: 'today',
            daily_signals_report: this.props.this_week_signals,
            this_week_signals_report: this.props.this_week_signals,
            last_week_signals_report: this.props.last_week_signals,
            this_month_signals_report: this.props.this_month_signals,
        };
    }

    componentDidMount() {
        setTimeout(() => {
            $(".daily_signals_report_table, .this_week_signals_report_table, .last_week_signals_report_table, .this_month_signals_report_table").DataTable({
                destroy: true,
                dom: "rBftlip",
                buttons: [
                    {

                    },
                ],
                lengthMenu: [
                    [10, 20, 50, 100, -1],
                    [10, 20, 50, 100, "All"],
                ],
                pageLength: 10,
            });
        }, 1000)
    }

    recommended(nextProps) { }

    render() {
        return (
            <Authenticated
                auth={this.props.auth}
                errors={this.props.errors}
                header={<h2 className="font-semibold text-xl text-gray-800 leading-tight">Signal Reports</h2>}
            >
                <Head title="Signal Reports" />
                <div className="py-12">
                    <Container>
                        {/* <Row className="justify-content-sm-center" lg={12} xs={12}>
                        <ButtonGroup id="controlled-tab-example" aria-label="Signal reports" defaultActiveKey="#today">
                            <Button variant="secondary" action href="#today">Today</Button>
                            <Button variant="secondary" action href="#this_week">This Week</Button>
                            <Button variant="secondary">Last Week</Button>
                            <Button variant="secondary">This Month</Button>
                        </ButtonGroup>
                    </Row>

                    <Row className="justify-content-sm-center mt-3" eventKey="#today">
                        <h5 className="font-semibold text-gray-800 leading-tight mt-3">Traded Signals</h5>
                        <Table striped bordered hover className="signal_table">
                            <thead>
                                <tr>
                                <th>Pair</th>
                                <th>Trade Type</th>
                                <th>Trade Side</th>
                                <th>Entry</th>
                                <th>Stop Loss</th>
                                <th>Take Profit</th>
                                <th>Pips</th>
                                <th>Action</th>
                                <th>Status</th>
                                <th>Note</th>
                                <th>Created at</th>
                                </tr>
                            </thead>
                            <tbody>

                            </tbody>
                        </Table>
                    </Row>  

                    <Row className="justify-content-sm-center mt-3" eventKey="#this_week">
                        <h5 className="font-semibold text-gray-800 leading-tight mt-3">Traded Signals</h5>
                        <Table striped bordered hover className="signal_table">
                            <thead>
                                <tr>
                                <th>Pair</th>
                                <th>Trade Type</th>
                                <th>Trade Side</th>
                                <th>Entry</th>
                                <th>Stop Loss</th>
                                <th>Take Profit</th>
                                <th>Pips</th>
                                <th>Action</th>
                                <th>Status</th>
                                <th>Note</th>
                                <th>Created at</th>
                                </tr>
                            </thead>
                            <tbody>

                            </tbody>
                        </Table>
                    </Row>      */}

                        <Tabs id="controlled-tab-example" activeKey={this.state.key} onSelect={(k) => this.setState({ key: k })} className="mb-3">
                            {/* Daily signals report */}
                            <Tab eventKey="today" title="Today">
                                <Row className="justify-content-sm-center">
                                    <h5 className="font-semibold text-gray-800 leading-tight mt-3">Today Summary</h5>
                                    <Col lg={2} xs={6}>
                                        <Card className="text-center">
                                            <Card.Body className="text-center fu-bg-info">
                                                <h4 className="font-semibold">{this.state.daily_signals_report.totalQuery[0].total_signals}</h4>
                                                Total signal
                                            </Card.Body>
                                        </Card>
                                    </Col>
                                    <Col lg={2} xs={6}>
                                        <Card className="text-center">
                                            <Card.Body className="text-center fu-bg-success">
                                                <h4 className="font-semibold ">{this.state.daily_signals_report.totalWonQuery[0].total_signals_won}</h4>
                                                Trades Won
                                            </Card.Body>
                                        </Card>
                                    </Col>
                                    <Col lg={2} xs={6}>
                                        <Card className="text-center">
                                            <Card.Body className="text-center fu-bg-warning">
                                                <h4 className="font-semibold text-gray-800 leading-tight">{this.state.daily_signals_report.totalLostQuery[0].total_signals_lost}</h4>
                                                Trades Lost
                                            </Card.Body>
                                        </Card>
                                    </Col>
                                    <Col lg={2} xs={6}>
                                        <Card className="text-center">
                                            <Card.Body className="text-center fu-bg-danger">
                                                <h4 className="font-semibold text-gray-800 leading-tight">{this.state.daily_signals_report.totalOngoingQuery[0].total_signals_ongoing}</h4>
                                                Ongoing Trades
                                            </Card.Body>
                                        </Card>
                                    </Col>
                                    <Col lg={2} xs={6}>
                                        <Card className="text-center">
                                            <Card.Body className="text-center fu-bg-info">
                                                <h4 className="font-semibold text-gray-800 leading-tight">{this.state.daily_signals_report.winRate}%</h4>
                                                Win Rate
                                            </Card.Body>
                                        </Card>
                                    </Col>
                                    <Col lg={2} xs={6}>
                                        <Card className="text-center">
                                            <Card.Body className="text-center fu-bg-success">
                                                <h4 className="font-semibold text-gray-800 leading-tight">{this.state.daily_signals_report.pips}</h4>
                                                Total Pips
                                            </Card.Body>
                                        </Card>
                                    </Col>
                                </Row>

                                {/* Daily signals report */}
                                <Row className="justify-content-sm-center mt-3">
                                    <h5 className="font-semibold text-gray-800 leading-tight">Traded Signals</h5>
                                    <Table striped bordered hover className="daily_signals_report_table">
                                        <thead>
                                            <tr>
                                                <th>Pair</th>
                                                <th>Trade Type</th>
                                                <th>Trade Side</th>
                                                <th>Entry</th>
                                                <th>Stop Loss</th>
                                                <th>Take Profit</th>
                                                <th>Pips</th>
                                                <th>Action</th>
                                                <th>Status</th>
                                                <th>Note</th>
                                                <th>Created at</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            {this.state.daily_signals_report.signals.map((signal, index) => (
                                                <tr>
                                                    <td>{signal.pair_name}</td>
                                                    <td>{signal.trade_type}</td>
                                                    <td>{signal.trade_side}</td>
                                                    <td>{signal.entry_price}</td>
                                                    <td>{signal.stop_loss}</td>
                                                    <td>{signal.take_profit}</td>
                                                    <td>{signal.pips}</td>
                                                    <td>{signal.action}</td>
                                                    <td>{signal.trade_status}</td>
                                                    <td>{signal.note}</td>
                                                    <td>{signal.signal_updated_time_gmt}</td>
                                                </tr>
                                            ))}
                                        </tbody>
                                    </Table>
                                </Row>
                            </Tab>

                            {/* This week signals report */}
                            <Tab eventKey="this_week" title="This Week">
                                <Row className="justify-content-sm-center">
                                    <h5 className="font-semibold text-gray-800 leading-tight mt-3">This Week Summary</h5>
                                    <Col lg={2} xs={6}>
                                        <Card className="text-center">
                                            <Card.Body className="text-center fu-bg-info">
                                                <h4 className="font-semibold text-gray-800 leading-tight">{this.state.this_week_signals_report.totalQuery[0].total_signals}</h4>
                                                Total signal
                                            </Card.Body>
                                        </Card>
                                    </Col>
                                    <Col lg={2} xs={6}>
                                        <Card className="text-center">
                                            <Card.Body className="text-center fu-bg-success">
                                                <h4 className="font-semibold text-gray-800 leading-tight">{this.state.this_week_signals_report.totalWonQuery[0].total_signals_won}</h4>
                                                Trades Won
                                            </Card.Body>
                                        </Card>
                                    </Col>
                                    <Col lg={2} xs={6}>
                                        <Card className="text-center">
                                            <Card.Body className="text-center fu-bg-warning">
                                                <h4 className="font-semibold text-gray-800 leading-tight">{this.state.this_week_signals_report.totalLostQuery[0].total_signals_lost}</h4>
                                                Trades Lost
                                            </Card.Body>
                                        </Card>
                                    </Col>
                                    <Col lg={2} xs={6}>
                                        <Card className="text-center">
                                            <Card.Body className="text-center fu-bg-danger">
                                                <h4 className="font-semibold text-gray-800 leading-tight">{this.state.this_week_signals_report.totalOngoingQuery[0].total_signals_ongoing}</h4>
                                                Ongoing Trades
                                            </Card.Body>
                                        </Card>
                                    </Col>
                                    <Col lg={2} xs={6}>
                                        <Card className="text-center">
                                            <Card.Body className="text-center fu-bg-info">
                                                <h4 className="font-semibold text-gray-800 leading-tight">{this.state.this_week_signals_report.winRate}%</h4>
                                                Win Rate
                                            </Card.Body>
                                        </Card>
                                    </Col>
                                    <Col lg={2} xs={6}>
                                        <Card className="text-center">
                                            <Card.Body className="text-center fu-bg-success">
                                                <h4 className="font-semibold text-gray-800 leading-tight">{this.state.this_week_signals_report.pips}</h4>
                                                Total Pips
                                            </Card.Body>
                                        </Card>
                                    </Col>
                                </Row>

                                {/* This week signals report table */}
                                <Row className="justify-content-sm-center mt-3">
                                    <h5 className="font-semibold text-gray-800 leading-tight mt-3">Traded Signals</h5>
                                    <Table striped bordered hover className="this_week_signals_report_table">
                                        <thead>
                                            <tr>
                                                <th>Pair</th>
                                                <th>Trade Type</th>
                                                <th>Trade Side</th>
                                                <th>Entry</th>
                                                <th>Stop Loss</th>
                                                <th>Take Profit</th>
                                                <th>Pips</th>
                                                <th>Action</th>
                                                <th>Status</th>
                                                <th>Note</th>
                                                <th>Created at</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            {this.state.this_week_signals_report.signals.map((signal, index) => (
                                                <tr>
                                                    <td>{signal.pair_name}</td>
                                                    <td>{signal.trade_type}</td>
                                                    <td>{signal.trade_side}</td>
                                                    <td>{signal.entry_price}</td>
                                                    <td>{signal.stop_loss}</td>
                                                    <td>{signal.take_profit}</td>
                                                    <td>{signal.pips}</td>
                                                    <td>{signal.action}</td>
                                                    <td>{signal.trade_status}</td>
                                                    <td>{signal.note}</td>
                                                    <td>{signal.signal_updated_time_gmt}</td>
                                                </tr>
                                            ))}
                                        </tbody>
                                    </Table>
                                </Row>
                            </Tab>

                            {/* Last week signals report */}
                            <Tab eventKey="last_week" title="Last Week">
                                <Row className="justify-content-sm-center">
                                    <h5 className="font-semibold text-gray-800 leading-tight mt-3">Last Week Summary</h5>
                                    <Col lg={2} xs={6}>
                                        <Card className="text-center">
                                            <Card.Body className="text-center fu-bg-info">
                                                <h4 className="font-semibold text-gray-800 leading-tight">{this.state.last_week_signals_report.totalQuery[0].total_signals}</h4>
                                                Total signal
                                            </Card.Body>
                                        </Card>
                                    </Col>
                                    <Col lg={2} xs={6}>
                                        <Card className="text-center">
                                            <Card.Body className="text-center fu-bg-success">
                                                <h4 className="font-semibold text-gray-800 leading-tight">{this.state.last_week_signals_report.totalWonQuery[0].total_signals_won}</h4>
                                                Trades Won
                                            </Card.Body>
                                        </Card>
                                    </Col>
                                    <Col lg={2} xs={6}>
                                        <Card className="text-center">
                                            <Card.Body className="text-center fu-bg-warning">
                                                <h4 className="font-semibold text-gray-800 leading-tight">{this.state.last_week_signals_report.totalLostQuery[0].total_signals_lost}</h4>
                                                Trades Lost
                                            </Card.Body>
                                        </Card>
                                    </Col>
                                    <Col lg={2} xs={6}>
                                        <Card className="text-center">
                                            <Card.Body className="text-center fu-bg-danger">
                                                <h4 className="font-semibold text-gray-800 leading-tight">{this.state.last_week_signals_report.totalOngoingQuery[0].total_signals_ongoing}</h4>
                                                Ongoing Trades
                                            </Card.Body>
                                        </Card>
                                    </Col>
                                    <Col lg={2} xs={6}>
                                        <Card className="text-center">
                                            <Card.Body className="text-center fu-bg-info">
                                                <h4 className="font-semibold text-gray-800 leading-tight">{this.state.last_week_signals_report.winRate}%</h4>
                                                Win Rate
                                            </Card.Body>
                                        </Card>
                                    </Col>
                                    <Col lg={2} xs={6}>
                                        <Card className="text-center">
                                            <Card.Body className="text-center fu-bg-success">
                                                <h4 className="font-semibold text-gray-800 leading-tight">{this.state.last_week_signals_report.pips}</h4>
                                                Total Pips
                                            </Card.Body>
                                        </Card>
                                    </Col>
                                </Row>

                                {/* Last week signals reports table */}
                                <Row className="justify-content-sm-center mt-3">
                                    <h5 className="font-semibold text-gray-800 leading-tight mt-3">Traded Signals</h5>
                                    <Table striped bordered hover className="last_week_signals_report_table">
                                        <thead>
                                            <tr>
                                                <th>Pair</th>
                                                <th>Trade Type</th>
                                                <th>Trade Side</th>
                                                <th>Entry</th>
                                                <th>Stop Loss</th>
                                                <th>Take Profit</th>
                                                <th>Pips</th>
                                                <th>Action</th>
                                                <th>Status</th>
                                                <th>Note</th>
                                                <th>Created at</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            {this.state.last_week_signals_report.signals.map((signal, index) => (
                                                <tr>
                                                    <td>{signal.pair_name}</td>
                                                    <td>{signal.trade_type}</td>
                                                    <td>{signal.trade_side}</td>
                                                    <td>{signal.entry_price}</td>
                                                    <td>{signal.stop_loss}</td>
                                                    <td>{signal.take_profit}</td>
                                                    <td>{signal.pips}</td>
                                                    <td>{signal.action}</td>
                                                    <td>{signal.trade_status}</td>
                                                    <td>{signal.note}</td>
                                                    <td>{signal.signal_updated_time_gmt}</td>
                                                </tr>
                                            ))}
                                        </tbody>
                                    </Table>
                                </Row>
                            </Tab>

                            {/* This month signals report */}
                            <Tab eventKey="this_month" title="This Month">
                                <Row className="justify-content-sm-center">
                                    <h5 className="font-semibold text-gray-800 leading-tight mt-3">Monthly Summary</h5>
                                    <Col lg={2} xs={6}>
                                        <Card className="text-center">
                                            <Card.Body className="text-center fu-bg-info">
                                                <h4 className="font-semibold text-gray-800 leading-tight">{this.state.this_month_signals_report.totalQuery[0].total_signals}</h4>
                                                Total signal
                                            </Card.Body>
                                        </Card>
                                    </Col>
                                    <Col lg={2} xs={6}>
                                        <Card className="text-center">
                                            <Card.Body className="text-center fu-bg-success">
                                                <h4 className="font-semibold text-gray-800 leading-tight">{this.state.this_month_signals_report.totalWonQuery[0].total_signals_won}</h4>
                                                Trades Won
                                            </Card.Body>
                                        </Card>
                                    </Col>
                                    <Col lg={2} xs={6}>
                                        <Card className="text-center">
                                            <Card.Body className="text-center fu-bg-warning">
                                                <h4 className="font-semibold text-gray-800 leading-tight">{this.state.this_month_signals_report.totalLostQuery[0].total_signals_lost}</h4>
                                                Trades Lost
                                            </Card.Body>
                                        </Card>
                                    </Col>
                                    <Col lg={2} xs={6}>
                                        <Card className="text-center">
                                            <Card.Body className="text-center fu-bg-danger">
                                                <h4 className="font-semibold text-gray-800 leading-tight">{this.state.this_month_signals_report.totalOngoingQuery[0].total_signals_ongoing}</h4>
                                                Ongoing Trades
                                            </Card.Body>
                                        </Card>
                                    </Col>
                                    <Col lg={2} xs={6}>
                                        <Card className="text-center">
                                            <Card.Body className="text-center fu-bg-info">
                                                <h4 className="font-semibold text-gray-800 leading-tight">{this.state.this_month_signals_report.winRate}%</h4>
                                                Win Rate
                                            </Card.Body>
                                        </Card>
                                    </Col>
                                    <Col lg={2} xs={6}>
                                        <Card className="text-center">
                                            <Card.Body className="text-center fu-bg-success">
                                                <h4 className="font-semibold text-gray-800 leading-tight">{this.state.this_month_signals_report.pips}</h4>
                                                Total Pips
                                            </Card.Body>
                                        </Card>
                                    </Col>
                                </Row>

                                {/* This month signals report table */}
                                <Row className="justify-content-sm-center mt-3">
                                    <h5 className="font-semibold text-gray-800 leading-tight mt-3">Traded Signals</h5>
                                    <Table striped bordered hover className="this_month_signals_report_table">
                                        <thead>
                                            <tr>
                                                <th>Pair</th>
                                                <th>Trade Type</th>
                                                <th>Trade Side</th>
                                                <th>Entry</th>
                                                <th>Stop Loss</th>
                                                <th>Take Profit</th>
                                                <th>Pips</th>
                                                <th>Action</th>
                                                <th>Status</th>
                                                <th>Note</th>
                                                <th>Created at</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            {this.state.this_month_signals_report.signals.map((signal, index) => (
                                                <tr>
                                                    <td>{signal.pair_name}</td>
                                                    <td>{signal.trade_type}</td>
                                                    <td>{signal.trade_side}</td>
                                                    <td>{signal.entry_price}</td>
                                                    <td>{signal.stop_loss}</td>
                                                    <td>{signal.take_profit}</td>
                                                    <td>{signal.pips}</td>
                                                    <td>{signal.action}</td>
                                                    <td>{signal.trade_status}</td>
                                                    <td>{signal.note}</td>
                                                    <td>{signal.signal_updated_time_gmt}</td>
                                                </tr>
                                            ))}
                                        </tbody>
                                    </Table>
                                </Row>
                            </Tab>
                        </Tabs>
                    </Container>
                </div>
            </Authenticated>
        );
    }
}
export default SignalReports;