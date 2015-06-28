var elixir = require('laravel-elixir');

var paths = {
    'bower_base_path': './vendor/bower_components/',
    'bootstrap': './vendor/bower_components/bootstrap-sass-official/assets/'
};

elixir(function (mix) {
    mix.sass('app.scss')
        .copy(paths.bootstrap + 'stylesheets/', 'resources/assets/sass')
        .copy(paths.bootstrap + 'fonts/bootstrap', 'public/fonts')
        .copy(paths.bower_base_path + 'font-awesome/css/font-awesome.min.css', 'public/css/vendor/font-awesome.css')
        .copy(paths.bootstrap + 'javascripts/bootstrap.js', 'public/js/vendor/bootstrap.js')
        .copy(paths.bower_base_path + 'jquery/dist/jquery.min.js', 'public/js/vendor/jquery.js'),
        mix.styles([
            '../../../public/css/app.css',
            'font-awesome.css'
        ]);

});

