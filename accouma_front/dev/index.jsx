import React from 'react';
import ReactDOM from 'react-dom';
import App from './app';
import Login from './login/login';
import Home from './home/home';
import Me from './me/me';
import Users from './users/UsersContainer';
import Accounts from './accounts/accounts';
import Registers from './registers/registers';
import NewRegister from './registers/newRegister';
import {
  Router,
  Route,
  Link,
  browserHistory,
  IndexRoute,
  Redirect
} from 'react-router';

import IsLogued from './common/IsLogued';

import { createStore, applyMiddleware } from 'redux';
import thunk from 'redux-thunk';
import { Provider } from 'react-redux';
import theApp from './redux/reducers';

//let store = createStore(theApp);
let store =  applyMiddleware(thunk)(createStore)(theApp);

ReactDOM.render(
  <Provider store={store} >
    <Router history={browserHistory}>
      <Route path="/" component={IsLogued(App)}>
        <IndexRoute component={Home} />
        <Route path="me" component={Me} />
        <Route path="users" component={Users} />
        <Route path="accounts" component={Accounts}>
          <Route path="new" component={NewRegister} />
          <Route path=":id" component={Registers} />
        </Route>
      </Route>
      <Route path="/login" component={Login} />
      <Redirect from="*" to="/" />
    </Router>
  </Provider>,
  document.getElementById('general')
);
