import React from 'react';
//  import {} from 'react-materialize'
import { browserHistory } from 'react-router';
import storage from 'key-storage';
import LoginServices from '../../services/LoginServices';

class Login extends React.Component {

  constructor(props) {
    super(props);
    this.makeLogin = this.makeLogin.bind(this);
  }

  componentWillMount() {
    LoginServices.isLogued().then((response) => {
      if (response.data.result.logued === true){
        browserHistory.push('/');
      }
    }).catch((error) => {
      //  console.error(error);
    });
  }

  makeLogin(e) {
    e.preventDefault();
    LoginServices.makeLogin(
      this.refs.user.value,
      this.refs.password.value
    ).then((response) => {
      if (response.data.result && response.data.result.token) {
        storage.set('token', response.data.result.token);
        browserHistory.push('/');
      }
    }).catch((error) => {
      console.error(error);
    });
  }

  render() {
    return (
      <section className="login">
        <form className="login-form z-depth-2" onSubmit={this.makeLogin}>
          <h2 className="login-title">Accouma - Login</h2>
          <div className="row">
            <div className="input-field col s12">
              <input
                id="user"
                ref="user"
                type="text"
                className="validate login-field"
              />
              <label htmlFor="user">User</label>
            </div>
          </div>
          <div className="row">
            <div className="input-field col s12">
              <input
                id="password"
                ref="password"
                type="password"
                className="validate login-field"
              />
              <label htmlFor="pass">Password</label>
            </div>
          </div>
          <div className="row">
            <div className="col s12">
              <input
                type="submit"
                className="waves-effect waves-light btn"
                value="Continue"
              />
            </div>
          </div>
        </form>
      </section>
    );
  }
}

export default Login;
