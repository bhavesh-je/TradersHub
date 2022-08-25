import React, { Component } from 'react';
import axios from "axios";

class Quizeplay extends Component{
    constructor(props){
        super(props);

        this.state = {
            firstname : '',
            lastname : '',
            email : '',
            phone : '',
            NatID : '',
            password : '',
            userLevel : 'Job Expert'
        }

        this.firstName = this.firstName.bind(this);
        this.lastName = this.lastName.bind(this);
        this.takePhone = this.takePhone.bind(this);
        this.takeEmail = this.takeEmail.bind(this);
        this.takeID = this.takeID.bind(this);
        this.takePassword = this.takePassword.bind(this);
        this.takeLevel = this.takeLevel.bind(this);
        this.handleSubmit = this.handleSubmit.bind(this);
    }

}
export default Quizeplay;