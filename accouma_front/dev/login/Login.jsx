import React from 'react';
//  import {} from 'react-materialize'
import { ajax } from '../common/ajax';
import storage from 'key-storage';

class Login extends React.Component {

  constructor(props) {
    super(props);
    this.makeLogin = this.makeLogin.bind(this);
  }

  makeLogin() {
    ajax('http://localhost:8000/api/v1/login', 'POST', {
      'usr': this.refs.user.value,
      'pass': this.refs.password.value
    }, function(data) {
      console.log(data);
      storage.set('token', data.result.token);
    }.bind(this), function(xhr, status, err) {
      console.error(xhr);
    }.bind(this));
  }

  render() {
    return (
      <section className="login">
        <div className="login-form z-depth-2">
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
              <a
                className="waves-effect waves-light btn"
                onClick={this.makeLogin}
              >
                Continue
              </a>
            </div>
          </div>
        </div>
      </section>
    );
  }
}

export default Login;
