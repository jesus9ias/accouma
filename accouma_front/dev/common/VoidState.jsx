import React from 'react';

class VoidState extends React.Component {

  render() {
    if (this.props.show) {
      return (
        <section className="voidState">
          <p className="voidState-title">{this.props.message}</p>
          {this.props.children}
        </section>
      );
    } else {
      return null;
    }
  }
}

VoidState.propTypes = {
  message: React.PropTypes.string,
  children: React.PropTypes.element,
  show: React.PropTypes.bool.isRequired
};

export default VoidState;
