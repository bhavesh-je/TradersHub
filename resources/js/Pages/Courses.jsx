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

    componentDidMount(){}

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
                <div className="py-12">
                    <Container>
                        <Row className="justify-content-md-center">
                        {this.state.courses.map((course,index)=>(
                            <div className="py-3 col-sm-4" key={course.id}>
                                <CardGroup>
                                    <Card style={{ width: '25rem',height: '25rem'  }}>
                                        {/* <Card.Img variant="top" src="data:image/svg+xml;charset=UTF-8,%3Csvg%20width%3D%22343%22%20height%3D%22160%22%20xmlns%3D%22http%3A%2F%2Fwww.w3.org%2F2000%2Fsvg%22%20viewBox%3D%220%200%20343%20160%22%20preserveAspectRatio%3D%22none%22%3E%3Cdefs%3E%3Cstyle%20type%3D%22text%2Fcss%22%3E%23holder_181b85f72ed%20text%20%7B%20fill%3A%23999%3Bfont-weight%3Anormal%3Bfont-family%3Avar(--bs-font-sans-serif)%2C%20monospace%3Bfont-size%3A17pt%20%7D%20%3C%2Fstyle%3E%3C%2Fdefs%3E%3Cg%20id%3D%22holder_181b85f72ed%22%3E%3Crect%20width%3D%22343%22%20height%3D%22160%22%20fill%3D%22%23373940%22%3E%3C%2Frect%3E%3Cg%3E%3Ctext%20x%3D%22127.35416412353516%22%20y%3D%2287.60000019073486%22%3E343x160%3C%2Ftext%3E%3C%2Fg%3E%3C%2Fg%3E%3C%2Fsvg%3E" /> */}
                                        <div className="ribbon-wrapper ribbon-lg">
                                            <div className="ribbon bg-primary text-lg">
                                                Ribbon
                                            </div>
                                        </div>
                                        <Card.Body>
                                            <Card.Title>{course.course_name}</Card.Title>
                                            {(course.course_content) && (<Card.Text dangerouslySetInnerHTML={{ __html: this.wordsTruncate(course.course_content, 200) }}>
                                                </Card.Text> ) 
                                            }
                                        </Card.Body>
                                        <Card.Footer>
                                            <div className="row">
                                                <div className="col-md-8 d-flex flex-column">
                                                    <small className="text-muted">
                                                        <strong>Created at:</strong> {moment(course.created_at).fromNow()}
                                                    </small>
                                                    { course.expiration != 0 || course.course_expiration_day != null ? 
                                                    <small className='text-danger'><strong>Expired on:</strong> {moment(this.addDays(course.created_at, course.course_expiration_day)).fromNow()}</small> : ""}
                                                </div>
                                                <div className="col-md-4">
                                                    <div dangerouslySetInnerHTML={{ __html: this.priceshow(course.course_price, course.course_sale_price) }}></div>
                                                </div>
                                            </div>
                                            <div className="row mt-3">
                                                <div className="col-md-12">
                                                    <Button href={route('show-courses', course.id)} variant="outline-info" size="sm">
                                                        View course
                                                    </Button>
                                                </div>
                                            </div>
                                        </Card.Footer>
                                    </Card>
                                </CardGroup>
                            </div>
                        ))}
                        </Row>
                    </Container>
                </div>
            </Authenticated>
        );
    }
}
export default Courses;