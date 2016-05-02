import { VIEW_ALL, DELETE_ONE, ADD_ONE } from '../actionTypes'

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
