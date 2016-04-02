import React from 'react'
import {RaisedButton, Card, CardHeader, CardMedia, TextField} from 'material-ui';

class Login extends React.Component {
  render() {
      return (
        <Card className="login">
          <CardHeader title="Accouma - Login" />
          <CardMedia>
            <TextField className="login-field" fullWidth={true} hintText="User" />
            <TextField className="login-field" fullWidth={true} hintText="Password" />

            <RaisedButton label="Login" />
          </CardMedia>
        </Card>
    )
  }
}

export default Login
