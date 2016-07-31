import React from 'react';
import { Link } from 'react-router';
import Base from './common/base';
import Loader from './utils/Loader';

class App extends React.Component {

  render() {
    const currentComponent = this.props.children.type.displayName || 'undefined';
    return (
      <div className="app">
        <Loader />
        <Base section={currentComponent} >
          {this.props.children}
        </Base>
      </div>
    );
  }
}

export default App;
