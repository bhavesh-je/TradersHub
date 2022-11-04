import React, { useRef,Component } from 'react';
import Authenticated from '@/Layouts/Authenticated';
import axios from 'axios';

class LiveStream extends Component{
    constructor(props){
        super(props);
        this.state = null;
    }

    componentDidMount(){
        
    }
    componentWillUnmount(){

    }

    render(){
        return(
            <Authenticated
                auth={this.props.auth}
                // errors={this.state.errors}
                header={<h2 className="font-semibold text-xl text-gray-800 leading-tight">Profile</h2>}
            >

                </Authenticated>
        );
    }
}
export default LiveStream;