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
                <div className="tabSec signals">
                    <div className=" container">
                        <div className="row">
                            <div className="col-lg-12">
                                {/* <h4 className="mb-4">Traded Signals</h4> */}
                                <div className="row">
                                    <div className="col-lg-12">
                                        <div className="tabs-wrapper">
                                            <ul className="nav nav-tabs custom-tab-default mb-4" id="myTab" role="tablist">
                                                <li className="nav-item">
                                                    <a className="nav-link active" id="home-tab" data-bs-toggle="tab" href="#today" role="tab" aria-controls="home" aria-selected="true">Today</a>
                                                </li>
                                                <li className="nav-item">
                                                    <a className="nav-link" id="service-tab" data-bs-toggle="tab" href="#week" role="tab" aria-controls="service" aria-selected="false">This Week</a>
                                                </li>
                                                <li className="nav-item">
                                                    <a className="nav-link" id="account-tab" data-bs-toggle="tab" href="#newweek" role="tab" aria-controls="account" aria-selected="false">Last Week</a>
                                                </li>
                                                <li className="nav-item">
                                                    <a className="nav-link" id="account-tab" data-bs-toggle="tab" href="#month" role="tab" aria-controls="account" aria-selected="false">This Month</a>
                                                </li>
                                            </ul>
                                            <div className="tab-content" id="myTabContent">
                                                <div className="tab-pane fade show active"  id="today"  role="tabpanel">
                                                    <h5 className="font-semibold text-gray-800 leading-tight">Today Summary</h5>
                                                    <div className="aboutSec">
                                                        <div className=" py-3 my-4 sigDiv">
                                                            <div className="row mx-3 my-4 justify-content-evenly">
                                                                <div className="col-sm-3 col-md-3 col-xl-3 px-3 py-2  secCol one">
                                                                    <span>{this.state.daily_signals_report.totalQuery[0].total_signals}</span>
                                                                    <p>Total Signals</p>
                                                                </div>
                                                                <div className="col-sm-3 col-md-3 col-xl-3 px-3 py-2 secCol two">
                                                                    <span>{this.state.daily_signals_report.totalWonQuery[0].total_signals_won}</span>
                                                                    <p>Trades Won</p>
                                                                </div>
                                                                <div className="col-sm-3 col-md-3 col-xl-3 px-3 py-2 secCol three">
                                                                    <span>{this.state.daily_signals_report.totalLostQuery[0].total_signals_lost}</span>
                                                                    <p>Trades Lost</p>
                                                                </div>
                                                            </div>
                                                            <div className="row mx-3 my-4 justify-content-evenly">
                                                                <div className="col-sm-3 col-md-3 col-xl-3 px-3 py-2 secCol four">
                                                                    <span>{this.state.daily_signals_report.totalOngoingQuery[0].total_signals_ongoing}</span>
                                                                    <p>Ongoing Trades</p>
                                                                </div>
                                                                <div className="col-sm-3 col-md-3 col-xl-3 px-3 py-2 secCol five">
                                                                    <span>{this.state.daily_signals_report.winRate}%</span>
                                                                    <p>Win Rate</p>
                                                                </div>
                                                                <div className="col-sm-3 col-md-3 col-xl-3 px-3 py-2 secCol six">
                                                                    <span>{this.state.daily_signals_report.pips}</span>
                                                                    <p>Total Pips</p>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div className="page-content">
                                                        <h5 className="font-semibold text-gray-800 leading-tight">Traded Signals</h5>
                                                        <div className="page-inner">
                                                            <div className="table-responsive">
                                                                <table id="example" className="table d-table" style={{width: "100%"}}>
                                                                    <thead>
                                                                        <tr>
                                                                            <th>Pair</th>
                                                                            <th>Trade type</th>
                                                                            <th>Trade side</th>
                                                                            <th>Entry</th>
                                                                            <th>Stop Lose</th>
                                                                            <th>Take Profit</th>
                                                                            <th>Pips</th>
                                                                            <th>Action</th>
                                                                            <th>Status</th>
                                                                            <th>Note</th>
                                                                            <th>Created At</th>
                                                                        </tr>
                                                                    </thead>
                                                                    <tbody>
                                                                    {this.state.daily_signals_report.signals.map((signal, index) => (
                                                                        <tr key={index}>
                                                                            <td><span className="table-id">{signal.pair_name}</span></td>
                                                                            <td>{signal.trade_type}</td>
                                                                            <td><h6 className="mb-0 avatar-name">{signal.trade_side}</h6></td>
                                                                            <td><span className="table-total">{signal.entry_price}</span></td>
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
                                                                </table>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div className="tab-pane fade" id="week"   role="tabpanel" aria-labelledby="">
                                                    <h5 className="font-semibold text-gray-800 leading-tight mt-3">This Week Summary</h5>
                                                    <div className="aboutSec">
                                                        <div className=" py-3 my-4 sigDiv">
                                                            <div className="row mx-3 my-4 justify-content-evenly">
                                                                <div className="col-sm-3 col-md-3 col-xl-3 px-3 py-2  secCol one">
                                                                    <span>{this.state.this_week_signals_report.totalQuery[0].total_signals}</span>
                                                                    <p>Total Signals</p>
                                                                </div>
                                                                <div className="col-sm-3 col-md-3 col-xl-3 px-3 py-2 secCol two">
                                                                    <span>{this.state.this_week_signals_report.totalWonQuery[0].total_signals_won}</span>
                                                                    <p>Trades Won</p>
                                                                </div>
                                                                <div className="col-sm-3 col-md-3 col-xl-3 px-3 py-2 secCol three">
                                                                    <span>{this.state.this_week_signals_report.totalLostQuery[0].total_signals_lost}</span>
                                                                    <p>Trades Lost</p>
                                                                </div>
                                                            </div>
                                                            <div className="row mx-3 my-4 justify-content-evenly">
                                                                <div className="col-sm-3 col-md-3 col-xl-3 px-3 py-2 secCol four">
                                                                    <span>{this.state.this_week_signals_report.totalOngoingQuery[0].total_signals_ongoing}</span>
                                                                    <p>Ongoing Trades</p>
                                                                </div>
                                                                <div className="col-sm-3 col-md-3 col-xl-3 px-3 py-2 secCol five">
                                                                    <span>{this.state.this_week_signals_report.winRate}%</span>
                                                                    <p>Win Rate</p>
                                                                </div>
                                                                <div className="col-sm-3 col-md-3 col-xl-3 px-3 py-2 secCol six">
                                                                    <span>{this.state.this_week_signals_report.pips}</span>
                                                                    <p>Total Pips</p>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div className="page-content">
                                                        <h5 className="font-semibold text-gray-800 leading-tight mt-3">Traded Signals</h5>
                                                        <div className="page-inner">
                                                            <div className="table-responsive">
                                                                <table id="exampleone" className="table d-table" style={{width: "100%"}}>
                                                                    <thead>
                                                                        <tr>
                                                                            <th>Pair</th>
                                                                            <th>Trade type</th>
                                                                            <th>Trade side</th>
                                                                            <th>Entry</th>
                                                                            <th>Stop Lose</th>
                                                                            <th>Take Profit</th>
                                                                            <th>Pips</th>
                                                                            <th>Action</th>
                                                                            <th>Status</th>
                                                                            <th>Note</th>
                                                                            <th>Created At</th>
                                                                        </tr>
                                                                    </thead>
                                                                    <tbody>
                                                                        {this.state.this_week_signals_report.signals.map((signal, index) => (
                                                                            <tr key={index}>
                                                                                <td><span className="table-id">{signal.pair_name}</span></td>
                                                                                <td>{signal.trade_type}</td>
                                                                                <td><h6 className="mb-0 avatar-name">{signal.trade_side}</h6></td>
                                                                                <td><span className="table-total">{signal.entry_price}</span></td>
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
                                                                </table>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div className="tab-pane fade" id="newweek"  role="tabpanel" aria-labelledby="account-tab">
                                                    <h5 className="font-semibold text-gray-800 leading-tight mt-3">Last Week Summary</h5>
                                                    <div className="aboutSec">
                                                        <div className=" py-3 my-4 sigDiv">
                                                            <div className="row mx-3 my-4 justify-content-evenly">
                                                                <div className="col-sm-3 col-md-3 col-xl-3 px-3 py-2  secCol one">
                                                                    <span>{this.state.last_week_signals_report.totalQuery[0].total_signals}</span>
                                                                    <p>Total signals</p>
                                                                </div>
                                                                <div className="col-sm-3 col-md-3 col-xl-3 px-3 py-2 secCol two">
                                                                    <span>{this.state.last_week_signals_report.totalWonQuery[0].total_signals_won}</span>
                                                                    <p>Trades Won</p>
                                                                </div>
                                                                <div className="col-sm-3 col-md-3 col-xl-3 px-3 py-2 secCol three">
                                                                    <span>{this.state.last_week_signals_report.totalLostQuery[0].total_signals_lost}</span>
                                                                    <p>Trades Lost</p>
                                                                </div>
                                                            </div>
                                                            <div className="row mx-3 my-4 justify-content-evenly">
                                                                <div className="col-sm-3 col-md-3 col-xl-3 px-3 py-2 secCol four">
                                                                    <span>{this.state.last_week_signals_report.totalOngoingQuery[0].total_signals_ongoing}</span>
                                                                    <p>Ongoing Trades</p>
                                                                </div>
                                                                <div className="col-sm-3 col-md-3 col-xl-3 px-3 py-2 secCol five">
                                                                    <span>{this.state.last_week_signals_report.winRate}%</span>
                                                                    <p>Win Rate</p>
                                                                </div>
                                                                <div className="col-sm-3 col-md-3 col-xl-3 px-3 py-2 secCol six">
                                                                    <span>{this.state.last_week_signals_report.pips}</span>
                                                                    <p>Total Pips</p>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div className="page-content">
                                                        <h5 className="font-semibold text-gray-800 leading-tight mt-3">Traded Signals</h5>
                                                        <div className="page-inner">
                                                            <div className="table-responsive">
                                                                <table id="exampletwo" className="table d-table" style={{width: "100%"}}>
                                                                    <thead>
                                                                        <tr>
                                                                            <th>Pair</th>
                                                                            <th>Trade type</th>
                                                                            <th>Trade side</th>
                                                                            <th>Entry</th>
                                                                            <th>Stop Lose</th>
                                                                            <th>Take Profit</th>
                                                                            <th>Pips</th>
                                                                            <th>Action</th>
                                                                            <th>Status</th>
                                                                            <th>Note</th>
                                                                            <th>Created At</th>
                                                                        </tr>
                                                                    </thead>
                                                                    <tbody>
                                                                        {this.state.last_week_signals_report.signals.map((signal, index) => (
                                                                            <tr key={index}>
                                                                                <td><span className="table-id">{signal.pair_name}</span></td>
                                                                                <td>{signal.trade_type}</td>
                                                                                <td><h6 className="mb-0 avatar-name">{signal.trade_side}</h6></td>
                                                                                <td><span className="table-total">{signal.entry_price}</span></td>
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
                                                                </table>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div className="tab-pane fade" id="month"  role="tabpanel" aria-labelledby="account-tab">
                                                    <h5 className="font-semibold text-gray-800 leading-tight mt-3">Monthly Summary</h5>
                                                    <div className="aboutSec">
                                                        <div className=" py-3 my-4 sigDiv">
                                                            <div className="row mx-3 my-4 justify-content-evenly">
                                                                <div className="col-sm-3 col-md-3 col-xl-3 px-3 py-2  secCol one">
                                                                    <span>{this.state.this_month_signals_report.totalQuery[0].total_signals}</span>
                                                                    <p>Total Signals</p>
                                                                </div>
                                                                <div className="col-sm-3 col-md-3 col-xl-3 px-3 py-2 secCol two">
                                                                    <span>{this.state.this_month_signals_report.totalWonQuery[0].total_signals_won}</span>
                                                                    <p>Trades Won</p>
                                                                </div>
                                                                <div className="col-sm-3 col-md-3 col-xl-3 px-3 py-2 secCol three">
                                                                    <span>{this.state.this_month_signals_report.totalLostQuery[0].total_signals_lost}</span>
                                                                    <p>Trades Lost</p>
                                                                </div>
                                                            </div>
                                                            <div className="row mx-3 my-4 justify-content-evenly">
                                                                <div className="col-sm-3 col-md-3 col-xl-3 px-3 py-2 secCol four">
                                                                    <span>{this.state.this_month_signals_report.totalOngoingQuery[0].total_signals_ongoing}</span>
                                                                    <p>Ongoing Trades</p>
                                                                </div>
                                                                <div className="col-sm-3 col-md-3 col-xl-3 px-3 py-2 secCol five">
                                                                    <span>{this.state.this_month_signals_report.winRate}%</span>
                                                                    <p>Win Rate</p>
                                                                </div>
                                                                <div className="col-sm-3 col-md-3 col-xl-3 px-3 py-2 secCol six">
                                                                    <span>{this.state.this_month_signals_report.pips}</span>
                                                                    <p>Total Pips</p>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div className="page-content">                                                                                                                                                                                                                               
                                                        <h5 className="font-semibold text-gray-800 leading-tight mt-3">Traded Signals</h5>
                                                        <div className="page-inner">
                                                            <div className="table-responsive">
                                                                <table id="examplethree" className="table d-table" style={{width: "100%"}}>
                                                                    <thead>
                                                                        <tr>
                                                                            <th>Pair</th>
                                                                            <th>Trade type</th>
                                                                            <th>Trade side</th>
                                                                            <th>Entry</th>
                                                                            <th>Stop Lose</th>
                                                                            <th>Take Profit</th>
                                                                            <th>Pips</th>
                                                                            <th>Action</th>
                                                                            <th>Status</th>
                                                                            <th>Note</th>
                                                                            <th>Created At</th>
                                                                        </tr>
                                                                    </thead>
                                                                    <tbody>
                                                                        {this.state.this_month_signals_report.signals.map((signal, index) => (
                                                                            <tr key={index}> 
                                                                                <td><span className="table-id">{signal.pair_name}</span></td>
                                                                                <td>{signal.trade_type}</td>
                                                                                <td><h6 className="mb-0 avatar-name">{signal.trade_side}</h6></td>
                                                                                <td><span className="table-total">{signal.entry_price}</span></td>
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
                                                                </table>
                                                            </div>
                                                        </div>
                                                    </div>

                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
    
                {/* <Head title="Signal Reports" /> */}
                
            </Authenticated>
        );
    }
}
export default SignalReports;