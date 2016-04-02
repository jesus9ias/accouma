import React from 'react'
import {RaisedButton, Card, CardHeader, CardMedia, TextField} from 'material-ui';
import {InputP} from '../common/reactMaterialProperties'

class Login extends React.Component {
  render() {
    return (
      <section className="login">
        <Card className="login-form">
          <CardHeader title="Accouma - Login" />
          <CardMedia>
            <TextField className="login-field" style={InputP()} hintText="User" />
            <TextField className="login-field" style={InputP()} hintText="Password" />

            <RaisedButton label="Login" fullWidth={false} />
          </CardMedia>
        </Card>
      </section>
    )
  }
}

export default Login
