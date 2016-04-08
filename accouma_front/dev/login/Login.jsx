import React from 'react'
import {Card, TextInput, Button} from 'Belle'
import {InputP} from '../common/reactMaterialProperties'

class Login extends React.Component {
  render() {
    return (
      <section className="login">
        <Card className="login-form">
          <h2>Accouma - Login</h2>
          <TextInput className="login-field" placeholder="User" />
          <TextInput className="login-field" placeholder="Password" />
          <Button primary>Login</Button>
        </Card>
      </section>
    )
  }
}

export default Login
