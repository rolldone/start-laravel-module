import Ractive from 'ractive';
import { BrowserHistoryEngine, createRouter, Router } from 'routerjs';
import template from './appView.html';
import '@tabler/core/dist/js/tabler';
import "@tabler/core/dist/css/tabler.css";

const App = Ractive.extend({
  target: "#app",
  template,
  oncomplete() {
    this.router = createRouter({
      engine: BrowserHistoryEngine({ bindClick: false }),
      basePath: "/auth"
    })
      // Define the route matching a path with a callback
      .get('/login', async (req, context) => {
        // Handle the route here...
        let Dashboard = (await import("./login/Login")).default;
        new Dashboard({
          target: "#app",
        })
      }).get("/register", async (req, context) => {
        let Dashboard = (await import("./register/Register")).default;
        new Dashboard({
          target: "#app",
        })
      }).get("/forgot-password", async (req, context) => {
        let Dashboard = (await import("./register/Register")).default;
        new Dashboard({
          target: "#app",
        })
      }).get("/logout", async (req, context) => {
        let Dashboard = (await import("./register/Register")).default;
        new Dashboard({
          target: "#app",
        })
      }).run();

  }
});

new App();

