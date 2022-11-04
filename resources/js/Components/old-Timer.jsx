import axios from 'axios';
import React, { Component, useState } from 'react';

class Timer extends Component {
    constructor(props){
        super(props);
        this.state = {
            quizTopice: [],
            hours: 0,
            minutes: 0,
            seconds: 60,
            // hours: this.props.hours,
            // minutes: this.props.minutes,
            // seconds: this.props.seconds,
            h: 0,
            m: 0,
            s: 0, 
            mytime: "",
        };
    }

    componentDidMount(){
        // console.log("my time id ");
        const formData = new FormData();
        formData.append('id',this.props.topicId);
        const config = { headers: { 'content-type': 'application/json', 'x-inertia': 'true' } };
        axios.post('/getQuizTime', formData, config).then(res => {
            // console.log(res.data);
            this.setState({quizTopice: res.data});

        }).catch(err => {
            console.log(err);
        });
        // var h = 0, m = 0, s = 0;
        if (this.state.quizTopice.duration_measure == 'hours') {
            // h = this.state.quizTopice.duration;
            this.setState({hours: this.state.quizTopice.duration});
        } else if (this.state.quizTopice.duration_measure == 'minutes') {
            // m = this.state.quizTopice.duration;
            this.setState({minutes: this.state.quizTopice.duration});
        }
        // this.setState({hours: h});
        // this.setState({minutes: m});
        // this.setState({seconds: s });
        // this.setState({hours: this.state.h , minutes: this.state.m , seconds:  this.state.s});
        // console.log("hours : "+this.state.hours);
        // console.log("minutes : "+this.state.minutes);
        // console.log("seconds : "+this.state.seconds);
        // this.tick();
    }  

    tick(){
        this.interval = setInterval(() => {
            if (this.state.hours == 0 && this.state.minutes == 0 && this.state.seconds == 0){
                // this.setState({mytime: $('#timers').text()});
                // $('#timerData').value($('#timers').text());
                // setMytime($('#timers').text());
                this.setState({mytime: $('#timers').text()});
            }else if (this.state.minutes == 0 && this.state.seconds == 0) {
                this.setState({hours: this.state.hours - 1});
                this.setState({minutes: 59});
                this.setState({seconds: 59});
            } else if (this.state.seconds == 0) {
                this.setState({hours: this.state.hours});
                this.setState({minutes: this.state.minutes - 1});
                this.setState({seconds: 59});
            } else {
                this.setState({hours: this.state.hours});
                this.setState({minutes: this.state.minutes});
                this.setState({seconds: this.state.seconds - 1});
            }
        }, 1000);
    }
    
    componentWillUnmount() {
        if (this.interval) {
            clearInterval(this.interval);
        }
    }

    render(){
        const hours = this.state.hours;
        const minutes = this.state.minutes;
        const seconds = this.state.seconds;
        return (
            <div>
                <input type="hidden" name='timerData' id='timerData' value={this.state.mytime}/>
                <p className='timerQuize' id='timers' >{`
                    ${hours.toString().padStart(2, '0')}:
                    ${minutes.toString().padStart(2, '0')}:
                    ${seconds.toString().padStart(2, '0')}
                `}</p> 
            </div>
        );
    }
}

export default Timer;