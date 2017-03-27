

if(typeof(Ink._routes) === 'undefined' || Ink._routes.length === 0) {
    Ink._routes = [];

    Ink._routesByPass = false;
}

Ink.routeAdd = function(aPaths, aDeps, funcCallBack) {
    var curRoute;
    var pathFound;
    //debugger;
    for(var i=0, lenI=aPaths.length; i < lenI; i++) {
        //curRoute = Ink._routes[i];
        pathFound = false;
        for(var j=0, lenJ=Ink._routes.length; j < lenJ; j++) {
            var curRoute = Ink._routes[j];
            if(curRoute.path === aPaths[i]) {
                Ink._routes[j].cbs.push({deps: aDeps, cb: funcCallBack, executed: false});
                pathFound = true;
                break;
            }
        }
        if(!pathFound) {
            Ink._routes.push({
                        path: aPaths[i],
                        cbs: [{deps: aDeps, cb: funcCallBack, executed: false}]
                    });
        }
    }
};

Ink.rounteTestPath = function() {
};

Ink.routeRun = function() {

    var curPagePath = window.location.pathname;

    var curRe,
        curRoute,
        aActions;

    for(var i=0, lenI=Ink._routes.length; i < lenI; i++) {
        curRoute = Ink._routes[i];

        curRe = new RegExp(""+curRoute.path+"", "i");
        //Ink.log(curRe, curPagePath, curRe.test(curPagePath));
        if(curRe.test(curPagePath)) {
            aActions = curRoute.cbs;
            for(var j=0, lenJ=aActions.length; j < lenJ; j++) {
                Ink.requireModules(aActions[j].deps, aActions[j].cb);
                this._routes[i].cbs[j].executed = true;
            }
        }
    }
};

Ink.routeCleanExecuted = function() {

    for(var i=0, lenI=this._routes.length; i < lenI; i++) {
        for(var j=0, lenJ=this._routes[i].cbs.length; j < lenJ; j++) {
            this._routes[i].cbs[j].executed = false;
        }
    }
};

Ink.routeMarkAllExecuted = function() {
    for(var i=0, lenI=this._routes.length; i < lenI; i++) {
        for(var j=0, lenJ=this._routes[i].cbs.length; j < lenJ; j++) {
            this._routes[i].cbs[j].executed = true;
        }
    }
};

Ink.routeSetByPass = function() {
    Ink._routesByPass = true;
};

Ink.routeUnsetByPass = function() {
    Ink._routesByPass = false;
};

Ink.routeAddRun = function(aPaths, aDeps, funcCallBack) {

    Ink.routeAdd(aPaths, aDeps, funcCallBack);

    Ink.routeRun();

};
