import React from 'react';
import { Link } from 'react-router';
import Base from './common/base';

class App extends React.Component {

  render() {
    const currentComponent = this.props.children.type.displayName || 'undefined';
    return (
      <Base section={currentComponent} >
        {this.props.children}
      </Base>
    );
  }
}

export default App;
