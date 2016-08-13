import React from 'react';
import ReactDOM from 'react-dom';
import App from './app';
import Login from './components/login/Login';
import Home from './components/home/Home';
import Me from './components/me/me';
import Users from './components/users/UsersContainer';
import NewUser from './components/users/NewUser';
import EditUser from './components/users/EditUser';
import Accounts from './components/accounts/AccountsContainer';
import NewAccount from './components/accounts/NewAccount';
import EditAccount from './components/accounts/EditAccount';
//  import Registers from './components/registers/registers';
//  import NewRegister from './components/registers/newRegister';
import {
  Router,
  Route,
  browserHistory,
  IndexRoute,
  Redirect
} from 'react-router';

import IsLogued from './utils/IsLogued';

import { createStore, applyMiddleware } from 'redux';
import thunk from 'redux-thunk';
import { Provider } from 'react-redux';
import theApp from './redux/reducers';
import logger from './redux/middleware/logger';

//  let store = createStore(theApp);
let store = applyMiddleware(
  thunk,
  logger
)(createStore)(theApp);

ReactDOM.render(
  <Provider store={store} >
    <Router history={browserHistory}>
      <Route path="/" component={IsLogued(App)}>
        <IndexRoute component={Home} />
        <Route path="new" component={Home} />
        <Route path="me" component={Me} />
        <Route path="users" component={Users}>
          <Route path="new" components={{ new: NewUser }} />
          <Route path=":id" components={{ edit: EditUser }} />
        </Route>
        <Route path="accounts" component={Accounts}>
          <Route path="new" components={{ new: NewAccount }} />
          <Route path=":id" components={{ edit: EditAccount }} />
        </Route>
      </Route>
      <Route path="/login" component={Login} />
      <Redirect from="*" to="/" />
    </Router>
  </Provider>,
  document.getElementById('general')
);
