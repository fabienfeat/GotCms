"use strict";angular.module("GotCms",["ngResource","ngRoute","http-auth-interceptor","pascalprecht.translate","GcBackend"]),angular.module("GotCms").config(["$provide","$httpProvider",function(e,t){e.factory("httpInterceptor",["$q",function(e){return{response:function(t){return t||e.when(t)},responseError:function(t){return e.reject(t)}}}]),t.interceptors.push("httpInterceptor")}]),angular.module("GotCms").config(["$translateProvider",function(e){e.useStaticFilesLoader({prefix:"languages/",suffix:".json"}),e.preferredLanguage("en_GB")}]),angular.module("GcBackend",["ngRoute","http-auth-interceptor"]);var route=angular.module("GcBackend");route.config(["$routeProvider",function(e){e.when("/",{controller:"GcBackendCtrl",controllerAs:"Dashboard",templateUrl:"components/gcbackend/partials/index.html"}).when("/login",{controller:"GcBackendLoginCtrl",controllerAs:"Login",templateUrl:"components/gcbackend/partials/login.html"}).when("/404",{controller:"GcBackend404Ctrl",controllerAs:"NotFound",templateUrl:"components/gcbackend/partials/404.html"}).otherwise({redirectTo:"/404"})}]);var gcbackend=angular.module("GcBackend");gcbackend.controller("GcBackendCtrl",["$scope","$http","$rootScope",function(e,t,n){n.moduleName="gcbackend",t.get("/backend/dashboard").success(function(t){angular.forEach(t,function(t,n){e[n]=t})})}]);