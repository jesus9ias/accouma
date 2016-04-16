#!/bin/bash
DIR="$( cd "$( dirname "${BASH_SOURCE[0]}" )" && pwd )"
(cd "${DIR}"/accouma_front; node app.js & cd "${DIR}"/accouma_api; php artisan serve)
