import ReactDOM from "react-dom";
import React, { Component } from 'react';
import axios from 'axios';
class Question extends Component {

    constructor(props) {
        super(props);
        this.state = {
            data: []
        };
    }

    componentDidMount() {
        axios.get('https://randomuser.me/api/?results=5')
            .then(response => {
                const data = response.data.results;
                this.setState({ data })
            })
            .catch(error => {
                console.log(error);
            })
    }

    render() {
        return ( 
            <div className="Question"> {this.state.data.map((item, index) => <UserList key = { index } {...item }/>)} </div>
        );
    }
}

const UserList = (props) => ( 
    <p> <strong> name: </strong> {props.name.first}</p>
)
const elementId = document.getElementById('root');
ReactDOM.render(<Question />,elementId);