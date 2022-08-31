import ReactDOM from "react-dom";
import React, { useState, useRef, useEffect ,Component } from 'react';
import { Container, Row, Col, Button, Card, CardGroup } from 'react-bootstrap';
import Table from 'react-bootstrap/Table';
import Authenticated from '@/Layouts/Authenticated';
import axios from 'axios';
import { Link, Head } from '@inertiajs/inertia-react';
// import { FontAwesomeIcon } from '@fortawesome/react-fontawesome';
// import 'font-awesome/css/font-awesome.min.css';
import "datatables.net-dt/js/dataTables.dataTables"
import "datatables.net-dt/css/jquery.dataTables.min.css"
import $ from 'jquery'; 
import SpotifyPlayer from 'react-spotify-player';


export default function Signals(props){
    const [users, setUsers] = useState([]);

    const signals = props.signals;
    const totalQuery = props.totalQuery[0].total_signals;
    const totalWonQuery = props.totalWonQuery[0].total_signals_won;
    const totalLostQuery = props.totalLostQuery[0].total_signals_lost;
    const totalOngoingQuery = props.totalOngoingQuery[0].total_signals_ongoing;
    const winRate = props.winRate;
    const pips = props.pips;

    const size = {
        width: '100%',
        height: 300,
      };
      const view = 'coverart'; // or 'coverart'
      const theme = 'black'; // or 'white'

    useEffect(() => {
        fetchUsers();
    }, []);

    const fetchUsers = async () => {
        const res = await fetch("https://randomuser.me/api/?results=10");
        const data = await res.json();
        try {
            setUsers(data.results);
        } catch (err) {
            console.log(err);
        }
    };

   useEffect(() => {
        setTimeout(()=>{
            $(".signal_table").DataTable({
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
        },1000)
    }, [])

    return (
        <Authenticated
            auth={props.auth}
            errors={props.errors}
            header={<h2 className="font-semibold text-xl text-gray-800 leading-tight">Signals</h2>}
        >
            <Head title="Signals" />
            <div className="py-12">
                <Container>
                    {/* <Row className="justify-content-sm-center">
                        <Col lg={6} xs={6}>
                            <Card className="text-center">
                                <Card.Body className="text-center fu-bg-info">
                                    <SpotifyPlayer
                                    uri="spotify:album:1TIUsv8qmYLpBEhvmBmyBk"
                                    size={size}
                                    view={view}
                                    theme={theme}
                                    />
                                </Card.Body>
                            </Card>
                        </Col>
                    </Row> */}
                    <h5 className="font-semibold text-gray-800 leading-tight">Daily Summary</h5>
                    <Row className="justify-content-sm-center">
                        <Col lg={2} xs={6}>
                            <Card className="text-center">
                                <Card.Body className="text-center fu-bg-info">
                                    <h4 className="font-semibold text-gray-800 leading-tight">{totalQuery}</h4>
                                    Total signal
                                </Card.Body>
                            </Card>
                        </Col>
                        <Col lg={2} xs={6}>
                            <Card className="text-center">
                                    <Card.Body className="text-center fu-bg-success">
                                    <h4 className="font-semibold text-gray-800 leading-tight">{totalWonQuery}</h4>
                                    Trades Won
                                </Card.Body>
                            </Card>
                        </Col>
                        <Col lg={2} xs={6}>
                            <Card className="text-center">
                                    <Card.Body className="text-center fu-bg-warning">
                                    <h4 className="font-semibold text-gray-800 leading-tight">{totalLostQuery}</h4>
                                    Trades Lost
                                </Card.Body>
                            </Card>
                        </Col>
                        <Col lg={2} xs={6}>
                            <Card className="text-center">
                                    <Card.Body className="text-center fu-bg-danger">
                                    <h4 className="font-semibold text-gray-800 leading-tight">{totalOngoingQuery}</h4>
                                    Ongoing Trades
                                </Card.Body>
                            </Card>
                        </Col>
                        <Col lg={2} xs={6}>
                            <Card className="text-center">
                                    <Card.Body className="text-center fu-bg-info">
                                    <h4 className="font-semibold text-gray-800 leading-tight">{winRate}%</h4>
                                    Win Rate
                                </Card.Body>
                            </Card>
                        </Col>
                        <Col lg={2} xs={6}>
                            <Card className="text-center">
                                    <Card.Body className="text-center fu-bg-success">
                                    <h4 className="font-semibold text-gray-800 leading-tight">{pips}</h4>
                                    Total Pips
                                </Card.Body>
                            </Card>
                        </Col>
                    </Row>

                    <h5 className="font-semibold text-gray-800 leading-tight mt-3">Traded Signals</h5>
                    <Row className="justify-content-sm-center">
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
                            {signals.map((signal, index) => (
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
                </Container>
            </div>
        </Authenticated>
    );    
}