var express = require('express');
var app = express();

var html_dir = 'views/';

app.get('/', function (req, res) {
  res.sendfile(html_dir + 'index.html');
});

app.listen(3000, function () {
  console.log('Example app listening on port 3000!');
});
