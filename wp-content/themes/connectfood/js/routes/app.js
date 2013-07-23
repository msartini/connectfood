window.AppRouter = Backbone.Router.extend({
    routes: {
        "" : "renderHome",
        "?:querystring" : "renderHome",
        "*actions" : "renderPage",
        "*actions?:querystring" : "renderPage"
    },
    initialize: function () {
      
        window.app_view = new AppView();
      



        //when your application starts up
        Backbone.history.start({ pushState: Modernizr.history, silent: true, root: '/fozoa/' });
        
        if(!Modernizr.history) {
            var rootLength = Backbone.history.options.root.length;
            var fragment = window.location.pathname.substr(rootLength);
            Backbone.history.loadUrl(fragment, { trigger: true });
            app_view.pageIdToBody(fragment.replace('/', ''));
        } else {
            
            url = Backbone.history.getFragment();
            url = url.replace(/\//g, " ");
           
            //Backbone.history.loadUrl(Backbone.history.getFragment())
            //Linha abaixo pega o slug da pagina, o que vem depois da url --Backbone.history.fragment.replace('/', '')

            //adiciona a url como classe do 

            app_view.pageIdToBody(url);
        }

        this.setActiveMenu();
    },
    setActiveMenu: function(){
        if(Backbone.history.fragment)
            var fragment = Backbone.history.fragment;

        app_view.activateMenu(fragment);

    },
    renderHome: function () {
    
        window.homeView = new HomeView();
    },
    renderPage: function(){
      
        window.pageView = new PageView();
    }
});

$(document).ready(function() {
   
    window.app_router = new AppRouter();
});