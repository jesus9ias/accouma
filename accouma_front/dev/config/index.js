import config from './config';
import localConfig from './localConfig';

let conf = {};

if (localConfig.USE === true) {
  conf = localConfig.ENVS[config.ENV];
} else {
  conf = config.ENVS[config.ENV];
}

export default conf;
