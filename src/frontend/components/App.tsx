import * as React from "react";
import { Routes, Route, Outlet, Link } from "react-router-dom";
import Posts from './Posts';
import Post from './Post';
import NoMatch from './NoMatch';

function App() {

    // возвращаем gsx код
    return (
        <Routes>
        <Route path="/" element={<Layout />}>
          <Route index element={<Home />} />
          <Route path="Posts" element={<Posts />} />
          <Route path="post/:id" element={<Post />} />
          <Route path="*" element={<NoMatch />} />
        </Route>
      </Routes>
    );
}

function Home() {
    return (
        <h2>Hello World!</h2> 
    );
}

function Layout() {
    return (
      <div>
        <nav>
          <ul>
            <li>
              <Link to="/">Home</Link>
            </li>
            <li>
              <Link to="/posts">Posts</Link>
            </li>
            <li>
              <Link to="/nothing-here">Nothing Here</Link>
            </li>
          </ul>
        </nav>
        <hr />
        <Outlet />
      </div>
    );
}

export default App;
