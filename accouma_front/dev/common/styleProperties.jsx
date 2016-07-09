
function InputP(w = 1, m = 1) {
  const wh = (100 / w) - (m * 2);
  return {
    width: wh + '%',
    margin: '10px ' + m + '%',
    minWidth: '0px',
    padding: '10px'
  };
}

function CardP() {
  return {
    padding: '10px',
  };
}

export {
  InputP,
  CardP
};
