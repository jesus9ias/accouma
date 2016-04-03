import React from 'react'
import ReactDOM from 'react-dom'
import Login from './login/login'
import Home from './home/home'

import { Router, Route, Link, browserHistory } from 'react-router'

ReactDOM.render(
  <Router history={browserHistory}>
    <Route path="/" component={Home}/>
    <Route path="/login" component={Login} />
    <Route path="*" component={Home} />
  </Router>,
  document.getElementById('general')
)
