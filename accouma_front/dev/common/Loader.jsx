import React from 'react';
import { connect } from 'react-redux';

class Loader extends React.Component {
  render() {
    if (this.props.loading) {
      return (
        <div className="loader"></div>
      );
    } else {
      return null;
    }
  }
}

Loader.propTypes = {
  loading: React.PropTypes.bool.isRequired
};

function mapStateToProps(state) {
  return {
    loading: state.general.loading
  };
}

const LoaderContainer = connect(mapStateToProps)(Loader);
export default LoaderContainer;
