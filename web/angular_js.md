# Angular JS


<div ng-app="">  #定义使用的区域？
  <input ng-model="name"   #定义

    <p ng-bind="name"></p>   #使用


    ===
     <div data-ng-app="" data-ng-init="firstName='John'">

     <p>The name is <span data-ng-bind="firstName"></span></p>

     </div> 


     ===
        <p>My first expression: {{ 5 + 5 }}</p>  #直接计算
         {{ quantity * cost }}
          {{ firstName + " " + lastName }

            {{ person.lastName }}

            数组
              <div ng-app="" ng-init="points=[1,15,19,2,40]">
              <p>The third result is {{ points[2] }}</p>

              ====
              <div ng-app="">
                <p>Name: <input type="text" ng-model="name"></p>
                  <p>{{name}}</p>
                  </div>


                  ======
                   <div ng-app="myApp" ng-controller="myCtrl">

                   First Name: <input type="text" ng-model="firstName"><br>
                   Last Name: <input type="text" ng-model="lastName"><br>
                   <br>
                   Full Name: {{firstName + " " + lastName}}

            </div>

              <script>
              var app = angular.module('myApp', []);
            app.controller('myCtrl', function($scope) {
                    $scope.firstName= "John";
                        $scope.lastName= "Doe";
                        });
            </script> 


              ==========
               <div ng-app="myApp" w3-test-directive></div>

               <script>
               var app = angular.module("myApp", []);

            app.directive("w3TestDirective", function() {
                    return {
                            template : "I was made in a directive constructor!"
                                };
                                });
            </script>


              =======
               var app = angular.module("myApp", []);   //[]是依赖的模块



            ===========
              <div ng-app="" ng-init="names=['Jani','Hege','Kai']">
                <ul>
                    <li ng-repeat="x in names">
                          {{ x }}
                </li>
                    </ul>
                    </div>

                    =====
                    http://www.w3schools.com/angular/angular_application.asp


