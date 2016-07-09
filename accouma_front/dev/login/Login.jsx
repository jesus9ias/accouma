import React from 'react';
//  import {} from 'react-materialize'
import { ajax } from '../common/ajax';
class Login extends React.Component {

  constructor(props) {
    super(props);
    this.state = { valueUser: '', valuePass: '' };
  }

  makeLogin() {
    ajax('http://localhost:8000/api/v1/login', 'POST', { 'usr': this.state.valueUser, 'pass': this.state.valuePass }, function(data) {
      console.log(data);
    }.bind(this), function(xhr, status, err) {
      console.error(xhr);
    }.bind(this));
  }

  handleUser(obj) {
    this.setState({ valueUser: obj.value });
  }
  handlePass(obj) {
    this.setState({ valuePass: obj.value });
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
                value={this.state.valueUser}
                onUpdate={this.handleUser.bind(this)}
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
                value={this.state.valuePass}
                onUpdate={this.handlePass.bind(this)}
                type="password"
                className="validate login-field"
              />
              <label htmlFor="pass">Password</label>
            </div>
          </div>
          <a
            className="waves-effect waves-light btn"
            onClick={this.makeLogin.bind(this)}
          >
            Login
          </a>
        </div>
      </section>
    );
  }
}

export default Login;
