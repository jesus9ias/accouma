import React from 'react';
import Base from './common/base';
import Loader from './common/Loader';

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

App.propTypes = {
  children: React.PropTypes.element.isRequired
};

export default App;
