import defaultTheme from 'tailwindcss/defaultTheme';
import forms from '@tailwindcss/forms';

/** @type {import('tailwindcss').Config} */
export default {
    content: [
        './vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php',
        './storage/framework/views/*.php',
        './resources/views/**/*.blade.php',
    ],

    theme: {
        extend: {
            screens: {
                'mobile-p': { max: '480px' },
                'mobile-l': { min: '481px', max: '768px' },
                'tablet-p': { min: '769px', max: '834px' },
                'tablet-l': { min: '835px', max: '1024px' },
                laptop: { min: '1025px', max: '1440px' },
                desktop: { min: '1441px' },
            },
            fontFamily: {
                sans: ['Figtree', ...defaultTheme.fontFamily.sans],
            },
            colors: {
                raksa: {
                    primary: {
                        DEFAULT: '#0048AE',
                        hover: '#003B8F',
                        light: '#DAE2FF'
                    },
                    secondary: '#001D48',
                    accent: {
                        DEFAULT: '#FF8A00',
                        light: '#FFDDB8',
                        dark: '#A65300'
                    },
                    background: '#F2F4F7',
                    surface: {
                        DEFAULT: '#F7F9FC',
                        alt: '#ECEEF1'
                    },
                    border: '#C2C6D6',
                    text: '#191C1E',
                    warning: '#FFF3E0',
                    neutral: {
                        DEFAULT: '#424654',
                        200: '#E5E3DF',
                        300: '#D8D6D1'
                    },
                    info: '#1A73E8'
                }
            }
        },
    },

    plugins: [forms],
};
