const { src, dest, parallel, series, watch } = require('gulp');
const rename = require('gulp-rename');
const sass = require('gulp-sass');
const autoprefixer = require('gulp-autoprefixer');
const browserify = require('browserify');
const source = require('vinyl-source-stream')
const buffer = require('vinyl-buffer')
const uglify = require('gulp-uglify');

styleFiles = [
    'src/css/style.scss',
    'src/css/style.admin.scss'
]

let jsFolder = 'src/js/';
let jsFiles = [
    'script.js',
    'script.admin.js'
]

let styleURL = './assets/';
let jsUrl = './assets/';

function style(done) {
    styleFiles.map((entry) => {
        src(entry)
            .pipe(sass({
                errorLogToConsole: true,
                outputStyle: 'compressed'
            }))
            .on('error', console.error.bind(console))
            .pipe(autoprefixer({
                cascade: false
            }))
            .pipe(rename({ suffix: '.min' }))
            .pipe(dest(styleURL));
    });
    done();
}

function js(done) {
    jsFiles.map((entry) => {
        return browserify({
                entries: [jsFolder + entry]
            })
            .transform('babelify', { presets: ['@babel/preset-env'] })
            .bundle()
            .pipe(source(entry))
            .pipe(rename({ extname: '.min.js' }))
            .pipe(buffer())
            .pipe(uglify())
            .pipe(dest(jsUrl));
    });
    done();
}

exports.default = parallel(style, js)