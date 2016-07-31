import React from 'react';
import { browserHistory } from 'react-router';
import LoginServices from '../services/LoginServices';

export default function IsLogued(Component) {
  class LoguedComponent extends React.Component {

    constructor(props) {
      super(props);
      this.state = {
        logued: false
      };
    }

    componentWillMount() {
      LoginServices.isLogued().then((response) => {
        if (response.data.result.logued !== true) {
          browserHistory.push('/login');
        } else {
          this.setState({ logued: true });
        }
      }).catch((error) => {
        browserHistory.push('/login');
      });
    }

    render() {
      if (this.state.logued) {
        return <Component {...this.props} />;
      }
      return null;
    }
  }

  return LoguedComponent;
}
