import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';
import tailwindcss from '@tailwindcss/vite';
import react from '@vitejs/plugin-react';

export default defineConfig({
    plugins: [
        laravel({
            input: ['resources/css/app.css', 'resources/js/app.js'],
            refresh: true,
        }),
        tailwindcss(),
                laravel({
            input: ['resources/js/app.jsx'],
            refresh: true,
        }),
        react(),
                laravel({
            input: ['resources/js/index.tsx', 'resources/css/app.css'],
            refresh: true,
        }),
        react(),
    ],
});

// import { defineConfig } from 'vite';
// import laravel from 'laravel-vite-plugin';
// import react from '@vitejs/plugin-react';

// export default defineConfig({
//     plugins: [

//     ],
// });

