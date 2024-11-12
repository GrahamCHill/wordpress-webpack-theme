
// module.exports = {
//     // output: {
//     //     filename: '[name]-bundle.js',
//     //     path: path.resolve(__dirname, 'dist/js'),
//     //     publicPath: '/wp-content/themes/graham-hill-dev/dist/js/' // Adjust based on your theme
//     // },
// };

const path = require('path');

module.exports = {
    entry: {
        main: './js/index.js',          // Main site-wide code
        three: './js/main-three.js'     // Separate Three.js entry point
    },
    output: {
        filename: '[name]-bundle.js',
        path: path.resolve(__dirname, 'dist/js'),
    },
    module: {
        rules: [
            {
                test: /\.js$/,
                exclude: /node_modules/,
                use: {
                    loader: 'babel-loader',
                    options: {
                        presets: ['@babel/preset-env'],
                    },
                },
            },
            {
                test: /\.css$/,
                use: ['style-loader', 'css-loader'],
            },
            {
                test: /\.(glb|gltf)$/,
                type: 'asset/resource',
                generator: {
                    filename: 'models/[name][ext]', // Output models into 'dist/js/models/'
                },
            },
            {
                test: /\.scss$/, // Add this rule for Bootstrap SCSS
                use: [
                    'style-loader',
                    'css-loader',
                    'sass-loader'
                ],
            },
        ],
    },
    resolve: {
        extensions: ['.js', '.json', '.css', '.scss'],
    },
    mode: 'production',
};