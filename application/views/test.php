  <div ng-app="myApp" ng-controller="myCtrl" class="row">

      <!-- Left Div for List-group -->
      <div class="col-md-2">
        <h1> Blog CMS </h1>
         <div class="list-group">
          <a   ng-repeat="listItem in list"  class="list-group-item" ng-click="setContent(listItem)" href="#/{{listItem}}"> {{listItem}} </a>
        </div>
      </div>

      <!-- Right Div  for Content -->
      <div class="col-md-10" >
        <div class="panel panel-default" style="margin-right:50px;margin-top:80px">
          <div class="panel-heading" ><h2 ng-bind="head"></h2></div>
          <div class="panel-body"  ><div ng-view></div></div>
        </div>
      </div>

  </div>

  <script>
    var app = angular.module('myApp', ['ngRoute']);

    /********** App Config  for Routing*********/
    app.config
    (   function($routeProvider)
       {
          $routeProvider.
           when('/', {
              templateUrl: 'http://localhost/tt/user_view.html',
              controller: 'userController'
           })
          .when('/Posts/', {
            templateUrl: 'http://localhost/tt/post_view.html',
            controller: 'postController'
          })
          .when('/Comments/', {
            templateUrl: 'http://localhost/tt/comment_view.html',
            controller: 'commentController'
          })
          .otherwise({
            redirectTo: '/'
          });
       }
    );

    /********** myCtrl Controller (MAIN Controller for the page) *********/
    app.controller('myCtrl', function($scope,$http) {
        $scope.list = ["Users","Posts","Comments"];
        $scope.setContent = function(listItem)
        {
           $scope.head= listItem+" CMS";
        }
    });

    /********** userController Controller (Controller for Users Page) *********/
    app.controller("userController", function($scope,$http)
    {
        id=0;
        isEdit=false;
        $scope.clsses = ["success","danger","info"];
        $http.get("http://localhost/User_controller/getUsers").success(function(response) {$scope.users = response;}); 

        //******** Press Edit **************//
        $scope.edit = function(user){
          id=user.id;
          $scope.uName = user.username;
          $scope.fName = user.firstname;
          $scope.lName = user.lastname;
          $scope.email = user.email;
          isEdit  = true;
        };

        //********** Press Delete **************//
        $scope.delete = function(id){
          $http.get("http://localhost/User_controller/delete_user/"+id).success(function(response) {$scope.users = response;});
        };

        //********** Press New User **************//
        $scope.new = function(){
           $scope.uName = "";
           $scope.fName = "";
           $scope.lName =""; 
           $scope.email ="";
           isEdit = false;
        };

        //********** Press Save Changes **************//
        $scope.save = function(){ //add or edit User
           if (isEdit)
           {
               user = { "id" : id,
                        "username"  : $scope.uName,
                        "firstname" : $scope.fName,
                        "lastname"  : $scope.lName,
                        "email"     : $scope.email     
                      };
               $http.post("http://localhost/User_controller/EditUser",user).success(function(response) {$scope.users = response;});
           } 
           else
           {
                user = { 
                 "username"  : $scope.uName,
                 "firstname" : $scope.fName,
                 "lastname"  : $scope.lName,
                 "email"     : $scope.email     
               };
               $http.post("http://localhost/User_controller/AddUser",user).success(function(response) {$scope.users = response;});
           }
        };
    }); //end of userController

    /********** postController Controller (Controller for Post Page) *********/ 
    app.controller("postController", function($scope,$http)
    {
        $scope.clsses = ["success","danger","info"];
        $http.get("http://localhost/Post_controller/get_posts").success(function(response) {$scope.posts = response;}); 
    });

     /********** commentController Controller (Controller for Comment Page) *********/ 
    app.controller("commentController", function($scope,$http)
    {
        $scope.clsses = ["success","danger","info"];
        $http.get("http://localhost/Comment_controller/getComments").success(function(response) {$scope.comments = response;}); 
    });

  </script>