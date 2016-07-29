var express = require('express');
var app = express();

var env = (process.argv[2] == 'prod')? 'prod/' : 'dev/';

var html_dir = 'app/' + env;

var options = {
  root: __dirname + '/app/' + env,
  dotfiles: 'deny',
  headers: {
    'x-timestamp': Date.now(),
    'x-sent': true
  }
};

app.use(express.static('app/' + env));

app.get('*', function (req, res) {
  res.sendFile('index.html', options);
});

app.listen(3000, function () {
  console.log('Accouma running ' + env + ' enviroment on port 3000!');
});
