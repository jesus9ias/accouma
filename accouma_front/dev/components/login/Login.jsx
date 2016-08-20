import React from 'react';
//  import {} from 'react-materialize'
import { browserHistory } from 'react-router';
import storage from 'key-storage';
import LoginServices from '../../services/LoginServices';

class Login extends React.Component {

  constructor(props) {
    super(props);
    this.makeLogin = this.makeLogin.bind(this);
    this.state = {
      login: false
    }
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
    this.setState({ login: true});
    LoginServices.makeLogin(
      this.refs.user.value,
      this.refs.password.value
    ).then((response) => {
      if (response.data.result && response.data.result.token) {
        storage.set('token', response.data.result.token);
        browserHistory.push('/');
      } else {
        this.setState({ login: false});
      }
    }).catch((error) => {
      this.setState({ login: false});
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
              {
                this.state.login ?
                  <button
                    type="button"
                    className="waves-effect waves-light btn button"
                  >
                    <img className="button-icon" src="images/main/loading.gif" />
                  </button>
                :
                  <button
                    type="submit"
                    className="waves-effect waves-light btn"
                  >
                    Continue
                  </button>
              }
            </div>
          </div>
        </form>
      </section>
    );
  }
}

export default Login;
