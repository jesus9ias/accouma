import React from 'react';
import { connect } from 'react-redux';
import {
  Preloader
} from 'react-materialize';

class UsersLoader extends React.Component {
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

UsersLoader.propTypes = {
  loading: React.PropTypes.bool.isRequired
};

function mapStateToProps(state) {
  return {
    loading: state.users.get('loading')
  };
}

const UsersLoaderContainer = connect(mapStateToProps)(UsersLoader);
export default UsersLoaderContainer;
