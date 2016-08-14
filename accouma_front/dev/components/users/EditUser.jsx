import React from 'react';
import { Link } from 'react-router';
import {
  Row,
  Col,
  Card
} from 'react-materialize';

import Backdrop from '../../common/Backdrop';

class EditUser extends React.Component {
  constructor(props) {
    super(props);
  }

  render() {
    return (
      <section className="section-overlay user-edit">
        <Backdrop />
        <div className="section-overlay-content">
          <div className="section-overlay-head">
            <h2 className="section-overlay-title">Edit user</h2>
            <Link className="section-overlay-close" to={'/users'}>
              <i className="material-icons medium">close</i>
            </Link>
          </div>
          <div className="section-overlay-body ">
            <div className="row">
              <div className="input-field col s12">
                <input
                  id="editUser"
                  ref="editUser"
                  type="text"
                  className="validate login-field"
                />
              <label htmlFor="editUser">User</label>
              </div>
            </div>
            <div className="row">
              <div className="input-field col s12">
                <input
                  id="editName"
                  ref="editName"
                  type="text"
                  className="validate login-field"
                />
              <label htmlFor="editName">Names</label>
              </div>
            </div>
            <div className="row">
              <div className="input-field col s12">
                <input
                  id="editLastName"
                  ref="editLastName"
                  type="text"
                  className="validate login-field"
                />
              <label htmlFor="editLastName">Last Name</label>
              </div>
            </div>
            <div className="row">
              <div className="input-field col s12">
                <input
                  id="editEmail"
                  ref="editEmail"
                  type="text"
                  className="validate login-field"
                />
              <label htmlFor="editEmail">E-Mail</label>
              </div>
            </div>
          </div>
          <div className="section-overlay-footer">
            <div className="row">
              <div className="col s12">
                <input
                  type="submit"
                  className="waves-effect waves-light btn"
                  value="Update"
                />
              </div>
            </div>
          </div>
        </div>
      </section>
    );
  }
}

export default EditUser;
