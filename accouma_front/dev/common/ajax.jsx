import $ from 'jquery'

function ajax(url, method, data, seccess, error){
  $.ajax({
    url: url,
    dataType: 'json',
    method: method,
    cache: false,
    data: data,
    success: success(),
    error: error()
  });
}

export {ajax};
