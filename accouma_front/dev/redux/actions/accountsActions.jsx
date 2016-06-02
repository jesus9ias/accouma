import { VIEW_ALL, DELETE_ONE, ADD_ONE, GET_ALL } from '../actionTypes/accountsTypes'

export function viewAll() {
  return {
    type: VIEW_ALL,
    list: []
  }
}

export function deleteOne(index) {
  return {
    type: DELETE_ONE,
    index: index
  }
}

export function addOne(data) {
  return {
    type: ADD_ONE,
    data: data
  }
}

export function getAll(data) {
  return {
    type: GET_ALL,
    data: data
  }
}
