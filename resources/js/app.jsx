import './bootstrap';
import React from 'react';
import { createRoot } from 'react-dom/client';

function App() {
    return <h1>Hello from React in Laravel 🚀</h1>;
}

const root = document.getElementById('app');
if (root) {
    createRoot(root).render(<App />);
}