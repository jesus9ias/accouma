const logger = store => next => action => {
  console.group(action.type);
  console.log('old state', store.getState());
  const result = next(action);
  console.log('next state', store.getState());
  console.groupEnd(action.type);
  return result;
};

export default logger;
