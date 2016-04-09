import React from 'react'
import {Card, TextInput, Button} from 'Belle'
import {InputP, CardP} from '../common/styleProperties'

class Login extends React.Component {

  ok(){
    alert('ok');
  }

  render() {
    return (
      <section className="login">
        <Card className="login-form" style={CardP()}>
          <h2 className="login-title">Accouma - Login</h2>
          <TextInput className="login-field" style={InputP()} placeholder="User" />
          <TextInput className="login-field" style={InputP()} placeholder="Password" />
          <Button primary submit onClick={this.ok}>Login</Button>
        </Card>
      </section>
    )
  }
}

export default Login
