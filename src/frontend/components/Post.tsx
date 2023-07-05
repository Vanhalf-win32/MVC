import * as React from 'react';
import { useEffect, useState } from 'react';
import { useParams } from 'react-router-dom';



interface PostData {
    id: number;
    title: string;
    content: string;
}



function Post() {
    
    const { id: postid } = useParams();
    const [ post, setPost ]= useState<PostData|null>(null);
    const [content, setContent] = useState<string>('');

    
    function editPost () {
     const newcontentPost = {
        title: post.title,
        content: content
     }
     console.log(newcontentPost);
    }

    useEffect(() => {
        void (async () => {
            try {
            const res = await fetch('/api/posts');
            const data = await res.json();
            const postsObj = data.payload;

            const postData = postsObj[postid] as PostData;
            if (postData) {
                setPost(postData);
            }
            } catch (err) {
                console.warn(err);
            }
        })();

    },[postid]);

    if (post === null) {
        return <div>Post Not Found</div>
    }

    return (
            <div>
                <h3>{post.title}</h3>
                {/* todo: remove */}
                <h3>{post.content}</h3>

                <textarea  
                    value={content} 
                    onChange = { (event) => setContent(event.target.value)} 
                    placeholder = 'edit post'/>
                <button
                    id = 'btn'
                    disabled = {!content}
                    onClick = {editPost}> edit post </button>
            </div> 

    );

}

export default Post;