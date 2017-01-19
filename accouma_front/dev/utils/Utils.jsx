import config from '../config';

class Utils {
  queryString(data) {
    const qs = Object.keys(data).map((value) => {
      return [value, data[value]];
    });
    let query_sring = '';
    qs.map((value, index) => {
      query_sring += (index > 0)? '&' : '';
      query_sring += `${value[0]}=${value[1]}`;
    });
    return query_sring;
  }


}

export default new Utils();
