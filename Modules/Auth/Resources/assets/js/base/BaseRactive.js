import Ractive from "ractive";

const BaseRactive = Ractive.extend({
  req: null,
  onconstruct() {
    this.reInitializeObserve();
  },
  router: null,
  getLang: null,
  reInitializeObserve() {
    let self = this;
    for (var key in self.newOn) {
      self.off(key);
      self.on(key, self.newOn[key]);
    }
  },
  parseQuery(queryString) {
    var query = {};
    var pairs = (queryString[0] === '?' ? queryString.substr(1) : queryString).split('&');
    for (var i = 0; i < pairs.length; i++) {
      var pair = pairs[i].split('=');
      query[decodeURIComponent(pair[0])] = decodeURIComponent(pair[1] || '');
    }
    return query;
  },
  getDate(date, timezone) {
    return GetDate(date, timezone);
  },
  newOn: {},
  safeJSON: function (props, endpoint, defaultValue = null, index) {
    let _endpotingString = endpoint;
    endpoint = _endpotingString.split(".");
    if (endpoint.length == 0) {
      return defaultValue;
    }
    if (index == null) {
      index = 0;
    }
    if (props == null) {
      return defaultValue;
    }
    if (props[endpoint[index]] == null) {
      return defaultValue;
    }
    props = props[endpoint[index]];
    index += 1;
    if (index == endpoint.length) {
      return props;
    }
    return this.safeJSON(props, endpoint.join("."), defaultValue, index);
  }
});

export default BaseRactive;