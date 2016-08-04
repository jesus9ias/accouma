import React from 'react';
import { Link } from 'react-router';
import {
  Row,
  Col,
  Card
} from 'react-materialize';

class EditUser extends React.Component {
  constructor(props) {
    super(props);
  }

  render() {
    return (
      <div className="user-edit">
        Edit user
      </div>
    );
  }
}

export default EditUser;
