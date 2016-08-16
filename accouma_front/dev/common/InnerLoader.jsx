import React from 'react';
import { connect } from 'react-redux';
import {
  Preloader
} from 'react-materialize';

class InnerLoader extends React.Component {
  render() {
    if (this.props.loading) {
      return (
        <div className="inner-loader">
          <Preloader size='big'/>
        </div>
      );
    } else {
      return null;
    }
  }
}

InnerLoader.propTypes = {
  loading: React.PropTypes.bool.isRequired
};

function mapStateToProps(state) {
  return {
    loading: state.general.loading
  };
}

const InnerLoaderContainer = connect(mapStateToProps)(InnerLoader);
export default InnerLoaderContainer;
