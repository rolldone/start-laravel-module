import Ractive from "ractive";
import template from './LoginView.html';

const LoginApp = Ractive.extend({
  template,
  handleClick(action,props,e){
    switch(action){
      case 'SUBMIT':
        e.preventDefault();
        break;
    }
  }
});

export default LoginApp;