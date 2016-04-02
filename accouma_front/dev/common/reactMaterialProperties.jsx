
function InputP(w = 1, m = 1){
  let wh = (100 / w) - (m * 2);
  return {
    width: wh + '%',
    margin: '10px ' + m + '%',
    minWidth: '0px'
  }
}

export {InputP}
