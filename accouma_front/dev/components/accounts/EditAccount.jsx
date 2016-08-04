import React from 'react';
import { Link } from 'react-router';
import {
  Row,
  Col,
  Card
} from 'react-materialize';

class EditAccount extends React.Component {
  constructor(props) {
    super(props);
  }

  render() {
    return (
      <div className="user-edit">
        Edit account
      </div>
    );
  }
}

export default EditAccount;
