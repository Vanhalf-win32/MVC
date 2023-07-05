import * as React from "react";
import { useState, useEffect } from "react";
import { Link } from 'react-router-dom';


interface Post {
    id: number;
    title: string;
    content: string;
}


interface PostProps  {
    id: number;
    title: string;
    content: string;
}


function PostComponent({ id, title, content }: PostProps) {
    return (
        <div>
            <h4>{title}</h4>
            <p>{content}</p>
            <Link to ={`/post/${id}`}>Edit post</Link>
        </div>
    );
}


function Posts() {
    const [loading, setLoading] = useState<boolean>(false);
    const [posts, setPosts] = useState<Array<Post>>([]);
    
    useEffect(() => {
        void (async () => {
            setLoading(true)
            try {
                const res = await fetch('/api/posts');
                const data = await res.json();
                const postsObj = data.payload;
                console.log(postsObj);

                setPosts(Object.keys(postsObj).map((postId) => ({
                    id: Number(postId),
                    title: postsObj[postId].title,
                    content: postsObj[postId].content,
                })));
            } catch (err) {
                console.warn(err);
            } finally {
                setLoading(false);
            }
        })();
    }, []);




    const renderPosts = () => {
        return posts.map((post) => (
            <PostComponent 
                key={post.id} 
                id={post.id}
                title={post.title} 
                content={post.content}
            /> 
        ));
    }
    // возвращаем jsx код
    return (
        <>
            
            {loading && (<h2>Loading...</h2>)}
            {renderPosts()}      
        </>
    );
}

export default Posts;
