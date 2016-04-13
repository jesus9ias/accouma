import React from 'react'
import {Card, TextInput, Button} from 'Belle'
import {InputP, CardP} from '../common/styleProperties'
import {ajax} from '../common/ajax'

class Login extends React.Component {

  constructor(props){
    super(props);
    this.state = {valueUser: '', valuePass: ''};
  }

  makeLogin(){
    ajax('http://localhost:8000/api/v1/login', 'POST', {'usr': this.state.valueUser, 'pass': this.state.valuePass}, function(data) {
      console.log(data);
    }.bind(this), function(xhr, status, err){
      console.error(xhr);
    }.bind(this));
  }

  handleUser(obj){
    this.setState({valueUser: obj.value});
  }
  handlePass(obj){
    this.setState({valuePass: obj.value});
  }

  render() {
    return (
      <section className="login">
        <Card className="login-form" style={CardP()}>
          <h2 className="login-title">Accouma - Login</h2>
          <TextInput id="user" value={this.state.valueUser} className="login-field" style={InputP()} placeholder="User" onUpdate={this.handleUser.bind(this)} />
          <TextInput id="Password" value={this.state.valuePass} className="login-field" style={InputP()} placeholder="Password" onUpdate={this.handlePass.bind(this)} />
          <Button primary submit onClick={this.makeLogin.bind(this)}>Login</Button>
        </Card>
      </section>
    )
  }
}

export default Login
