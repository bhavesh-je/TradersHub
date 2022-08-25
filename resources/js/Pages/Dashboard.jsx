import React,{ useState, useRef, useEffect ,Component } from 'react';
import Authenticated from '@/Layouts/Authenticated';
import { Head } from '@inertiajs/inertia-react';
import { Container, Row, Col, Button, Card, CardGroup } from 'react-bootstrap';
import axios from 'axios';
import { fromJSON } from 'postcss';

export default function Dashboard(props) {
    // const posts = props.posts;
    const maxlen = props.maxlen;
    const postsPerPage = 3;
    const [posts,setPosts] = useState([]);
    const [next, setNext] = useState(3);
    
    const loopWithSlice = (start, end) => {
        const slicedPosts = props.posts.slice(start, end);
        setPosts([...posts, ...slicedPosts]);
        // console.log(posts);
    };

    useEffect(() => {
        loopWithSlice(0, next);
    }, []);
    
    const handleShowMorePosts = () => {
        loopWithSlice(next, next + postsPerPage);
        setNext(next + postsPerPage);
    };

    const wordsTruncate = (words, length) => {
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
    // console.log("To out "+to);

    
    return (
        <Authenticated
            auth={props.auth}
            errors={props.errors}
            header={<h2 className="font-semibold text-xl text-gray-800 leading-tight">Dashboard</h2>}
        >
            <Head title="Dashboard" />

            <div className="py-12">
                <div className="max-w-7xl mx-auto sm:px-6 lg:px-8">
                    <div className="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                        <div className="p-6 bg-white border-b border-gray-200">You're logged in as <strong><i>{ props.auth.user.name }</i></strong> !</div>
                    </div>
                </div>
            </div>
            <div className="py-12">
                <div className="max-w-7xl mx-auto sm:px-6 lg:px-8">
                    {posts.map((post,index)=>(
                        <div className="mt-3" key={post.id}>
                            <CardGroup>
                                <Card style={{height: '16rem'}}>
                                    <Card.Body>
                                        <Card.Title>{post.post_title}</Card.Title>
                                        {(post.post_content) && (<Card.Text dangerouslySetInnerHTML={{ __html: wordsTruncate(post.post_content, 200) }}>
                                                </Card.Text> ) 
                                            }
                                    </Card.Body>
                                    <Card.Footer>
                                        <div className="row mt-3">
                                            <div className="col-md-12">
                                                <Button href={route('showpost', post.id)} variant="outline-info" size="sm">
                                                    View post
                                                </Button>
                                            </div>
                                        </div>
                                    </Card.Footer>
                                </Card>
                            </CardGroup>
                        </div>
                    ))}
                    {maxlen > next ? <div className='text-center mt-3'> 
                        <Button variant="outline-info" size="sm" onClick={handleShowMorePosts}>Load more</Button>
                    </div> : ""}
                    
                </div>
            </div>
        </Authenticated>
    );
}
