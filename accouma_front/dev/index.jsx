import React from 'react'
import ReactDOM from 'react-dom'
import Login from './login/login'
import Home from './home/home'
import Users from './users/users'
import Accounts from './accounts/accounts'
import Registers from './registers/registers'

import { Router, Route, Link, browserHistory } from 'react-router'

ReactDOM.render(
  <Router history={browserHistory}>
    <Route path="/" component={Home}/>
    <Route path="/login" component={Login} />
    <Route path="/users" component={Users} />
    <Route path="/accounts" component={Accounts} />
    <Route path="/registers" component={Registers} />
    <Route path="*" component={Home} />
  </Router>,
  document.getElementById('general')
)
