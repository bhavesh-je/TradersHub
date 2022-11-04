import React, { Component } from 'react';
import Authenticated from '@/Layouts/Authenticated';
import { Container, Row, Col, Button, Card, CardGroup } from 'react-bootstrap';
import { Link, Head } from '@inertiajs/inertia-react';
import moment from 'moment';

class Courses extends Component{
    constructor(props){
        super(props);
        this.state = {
            courses: this.props.cources,
            MAX_LENGTH : 500,
            expired_on: "<small className='text-danger'><strong>Expired on:</strong> {moment(addDays(course.created_at, course.course_expiration_day)).fromNow()}</small>",
        };
        this.addDays = this.addDays.bind(this);
        this.priceshow = this.priceshow.bind(this);
    }

    componentDidMount(){
        $("body").addClass("coursesPage");
        $('.coursesPage').on('keydown', function(event) {
            console.log("courses page");
            console.log(event.keyCode);
            console.log(event);
            
            if(event.keyCode == 123 ) {
                return false;
            } 

            if( event.keyCode == 116 || event.keyCode == 93) {
                event.preventDefault();
                return false;
            } 

            if( event.ctrlKey || event.shiftKey || event.keyCode == 73 ) {
                event.preventDefault();
                return false;
            }
            
        });

        // Restrict left/right click
        $('.coursesPage').on("mousedown",function(e){
            console.log(e.which);
            e.preventDefault();
            if( (e.which == 1) || (e.which === 3) ) {
                return false;
            }
        });

        // Restrict left/right click
        $('.coursesPage').bind("contextmenu",function(e){
            console.log(e.which);
            // e.preventDefault();
            return false;
        });
    }

    componentWillUnmount(){
        
        $("body").removeClass("coursesPage");
        $('body').unbind('keydown');
        $('body').unbind('mousedown');
        $('body').unbind('contextmenu');
        // console.log($(location).attr('pathname'));
    }

    recommended(nextProps){}

    addDays(date, days) {
        var result = new Date(date);
        result.setDate(result.getDate() + days);
        return result;
    }

    wordsTruncate(words, length){
        words = words.trim(); //you need to decied wheather you do this or not
        length -= 6; // because ' (...)'.length === 6
        if (length >= words.length) return words;
      
        let oldResult = /\s/.test(words.charAt(length));
        for (let i = length - 1; i > -1; i--) {
          const currentRusult = /\s/.test(words.charAt(i))
      
          //check if oldresult is white space and current is not.
          //which means current character is end of word
          if (oldResult && !currentRusult) {
            return `${words.substr(0, i + 1)}...`;
          }
          oldResult = currentRusult;
        }
        // you need to decide whether you will just return truncated or original
        // in case you want original just return word
        return '...';
    }

    priceshow(course_price,course_sale_price){
        let price;
        if(course_price != null &&  course_sale_price != null ){
            price = "<span><del>$"+course_price+"</del> $"+course_sale_price+"</span>";
        }else if (course_price != null &&  course_sale_price == null){
            price = "<span>$"+course_price+"</span>";
        
        }else if (course_price == null &&  course_sale_price != null){
            price = "<span>$"+course_sale_price+"</span>";
        }else if (course_price == null &&  course_sale_price == null){
            price = "<span>Free</span>";
        }
        return price;
    }

    render(){
        return(
            <Authenticated auth={this.props.auth} errors={this.props.errors} header={<h2 className="font-semibold text-xl text-gray-800 leading-tight">Courses</h2>} >
                <Head title="Courses" />
                
                <div className="coursesSec">
                    <div className=" container-fluid py-5">
                        {/* <h1 className=" mx-4  text-center couTitle"> Take a Quick Summary About Courses</h1> */}
                        <div className=" row mx-3 justify-content-center py-3">
                        {this.state.courses.map((course,index)=>(
                            <div className=" col-md-3 my-3 card-box">
                                <div className="card">
                                    {/* <img src="img/card1.png" alt="" className=" card-img-top w-100 img-fluid"/> */}
                                    <iframe src={course.course_video_link} frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                                    <div className=" card-body">
                                        {/* <h5 className=" card-text">Smart Money</h5> */}
                                        <h3 className=" card-text">{course.course_name}</h3>
                                        <div className=" d-flex justify-content-between">
                                            <p className=" card-text mr-4 text-muted py-3"> 
                                                {(course.course_content) && (<Card.Text dangerouslySetInnerHTML={{ __html: this.wordsTruncate(course.course_content, 200) }}>
                                                    </Card.Text> ) }
                                            </p>
                                        </div>
                                            {/* <a href="#" className=" card-link text-decoration-none text-light" data-toggle="modal" data-target="#modalId">
                                                <button type="button" href={route('show-courses', course.id)} className="btn btn-primary">
                                                        More
                                                </button>
                                            </a> */}
                                    </div>
                                        <Link href={route('show-courses', course.id)} className="btn btn-primary moreBtn">
                                            View course
                                        </Link>
                                </div>
                            </div>    
                        ))}
                        </div>
                    </div>
                </div>
                        {/* </Row>
                    </Container>
                </div> */}
            </Authenticated>
        );
    }
}
export default Courses;