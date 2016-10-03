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
    this.setForm = this.setForm.bind(this);
    this.updateUser = this.updateUser.bind(this);
  }

  componentWillMount() {
    this.props.getOneUser(this.props.params.id);
  }

  componentWillReceiveProps(nextProps) {
    if (nextProps.params.id != this.props.params.id) {
      this.props.getOneUser(nextProps.params.id);
    }
  }

  componentDidUpdate() {
    this.setForm();
  }

  setForm() {
    this.refs.editNames.value = this.props.user.names;
    this.refs.editLastNames.value = this.props.user.last_names;
    this.refs.editEmail.value = this.props.user.email;
  }

  updateUser(event) {
    event.preventDefault();
    this.props.updateOneUser(
      this.props.params.id, {
      names: this.refs.editNames.value,
      last_names: this.refs.editLastNames.value,
      email: this.refs.editEmail.value
    });
  }

  render() {
    return (
      <section className="section-overlay user-edit">
        <Backdrop />
        <form className="section-overlay-content" onSubmit={this.updateUser}>
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
                  id="editNames"
                  ref="editNames"
                  type="text"
                  className="validate login-field"
                />
              <label htmlFor="editNames">Names</label>
              </div>
            </div>
            <div className="row">
              <div className="input-field col s12">
                <input
                  id="editLastNames"
                  ref="editLastNames"
                  type="text"
                  className="validate login-field"
                />
              <label htmlFor="editLastNames">Last Name</label>
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
        </form>
      </section>
    );
  }
}

export default EditUser;
