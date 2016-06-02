var express = require('express');
var app = express();

var html_dir = 'views/';

var options = {
  root: __dirname + '/views/',
  dotfiles: 'deny',
  headers: {
    'x-timestamp': Date.now(),
    'x-sent': true
  }
};

app.use(express.static('app'));

/**app.get('/api', function (req, res) {
  res.json({'a': 22});
});*/

app.get('*', function (req, res) {
  res.sendFile('index.html', options);
});

app.listen(3000, function () {
  console.log('Example app listening on port 3000!');
});
