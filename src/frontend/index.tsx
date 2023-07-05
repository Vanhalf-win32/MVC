import * as React from 'react';
import { BrowserRouter } from "react-router-dom";
import { createRoot } from 'react-dom/client';
import App from './components/App';

// Clear the existing HTML content
document.body.innerHTML = '<div id="app"></div>';

// Render your React component instead
const root = createRoot(document.getElementById('app'));
root.render(
    <React.StrictMode>
        <BrowserRouter>
                    <App />
        </BrowserRouter>  
    </React.StrictMode>             
);
