import React, { useState } from 'react';

const Timer = ({hoursMinSecs}) => {
    React.useEffect(() => {
        const timerId = setInterval(() => tick(), 1000);
        $('#timerData').val(mytime);
        return () => clearInterval(timerId);
    });
    // console.log(hoursMinSecs);
    setTimeout(() => {
        // console.log('Hello, World!')
        // clock();
    }, 3000);
    // const clock = () => {
    const [mytime,setMytime] = React.useState();
    const hours = hoursMinSecs[0], minutes = hoursMinSecs[1] , seconds = 60;
    // const hours = hoursMinSecs[0], minutes = hoursMinSecs[1] , seconds = hoursMinSecs[2];
    // const [hours, minutes, seconds] = hoursMinSecs;
    // console.log('Hello, World!');
    const [[hrs, mins, secs], setTime] = useState([hours, minutes, seconds]);
    // console.log("in hours : "+typeof(hours));
    // console.log("in minutes : "+typeof(minutes));
    // console.log("in seconds : "+typeof(seconds));
    // console.log(hoursMinSecs);
    // }

    const tick = () => {
        if (hrs === 0 && mins === 0 && secs === 0){
            setMytime($('#timers').text());
        }else if (mins === 0 && secs === 0) {
            setTime([hrs - 1, 59, 59]);
        } else if (secs === 0) {
            setTime([hrs, mins - 1, 59]);
        } else {
            setTime([hrs, mins, secs - 1]);
        }
    };


    const reset = () => setTime([parseInt(hours), parseInt(minutes), parseInt(seconds)]);

    
    

    
    return (
        <div>
            <input type="hidden" name='timerData' id='timerData'/>
            <input type="hidden" name='testingtime' id='testing'/>
            <p className='timerQuize' id='timers' >{`${hrs.toString().padStart(2, '0')}:${mins
            .toString()
            .padStart(2, '0')}:${secs.toString().padStart(2, '0')}`}</p> 
        </div>
    );
}

export default Timer;