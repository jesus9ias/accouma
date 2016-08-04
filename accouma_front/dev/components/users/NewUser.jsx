import React from 'react';
import { Link } from 'react-router';
import {
  Row,
  Col,
  Card
} from 'react-materialize';

class NewUser extends React.Component {
  constructor(props) {
    super(props);
  }

  render() {
    return (
      <div className="user-new">
        New user
      </div>
    );
  }
}

export default NewUser;
