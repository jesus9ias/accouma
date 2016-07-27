var express = require('express');
var app = express();

var html_dir = 'app/build/';

var options = {
  root: __dirname + '/app/build/',
  dotfiles: 'deny',
  headers: {
    'x-timestamp': Date.now(),
    'x-sent': true
  }
};

app.use(express.static('app/build/'));

app.get('*', function (req, res) {
  res.sendFile('index.html', options);
});

app.listen(3000, function () {
  console.log('Accouma running on port 3000!');
});
