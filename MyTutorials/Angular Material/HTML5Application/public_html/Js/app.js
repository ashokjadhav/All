(function () {
    'use strict';
    angular
        .module('angularMaterial', ['ui.router','ngMaterial','ngMessages'])
        .config(function($urlRouterProvider,$stateProvider,$locationProvider,$mdIconProvider,$mdThemingProvider) {
            $mdIconProvider
              .icon('share-arrow', 'img/icons/share-arrow.svg', 24)
              .icon('upload', 'img/icons/upload.svg', 24)
              .icon('copy', 'img/icons/copy.svg', 24)
              .icon('print', 'img/icons/print.svg', 24)
              .icon('hangout', 'img/icons/hangout.svg', 24)
              .icon('mail', 'img/icons/mail.svg', 24)
              .icon('message', 'img/icons/message.svg', 24)
              .icon('copy2', 'img/icons/copy2.svg', 24)
              .icon('facebook', 'img/icons/facebook.svg', 24)
              .icon('twitter', 'img/icons/twitter.svg', 24);
                $mdThemingProvider.theme('default')
              .primaryPalette('blue', {
                'default': '400', // by default use shade 400 from the pink palette for primary intentions
                'hue-1': '100', // use shade 100 for the <code>md-hue-1</code> class
                'hue-2': '600', // use shade 600 for the <code>md-hue-2</code> class
                'hue-3': 'A100' // use shade A100 for the <code>md-hue-3</code> class
              })
              // If you specify less than all of the keys, it will inherit from the
              // default shades
              .accentPalette('pink', {
                'default': '800' // use shade 200 for default, and keep all other shades the same
              })
              .warnPalette('red')
            .backgroundPalette('grey');
              
      
            $stateProvider
                .state('home',{
                    url: '/',
//                    controller: 'RootCtrl',
                    /*templateUrl:'Site/html/home.html'*/
                })
                .state('Dialog',{
                    url: '/dialog',
                    controller:'DemoCtrl',
                    templateUrl:'Html/dialog.html'
                })
                .state('BottomSheet',{
                    url: '/bottom-sheet',
                    controller:'BottomSheetExample',
                    templateUrl:'Html/list-grid.html'
                })
                .state('Input',{
                    url: '/input',
                    controller:'InputCtrl',
                    templateUrl:'Html/input.html'
                })
                .state('Checkbox',{
                    url: '/checkbox',
                    controller:'CheckboxCtrl',
                    templateUrl:'Html/checkbox.html'
                })
                .state('Chips',{
                    url: '/chips',
                    controller:'CustomInputDemoCtrl',
                    templateUrl:'Html/chips.html'
                });
            $locationProvider.html5Mode(true);
  
        })
        .controller('RootCtrl',function($scope){console.log('I am called')})
        .controller('BottomSheetExample', function($scope, $timeout, $mdBottomSheet, $mdToast) {
        $scope.alert = '';

        $scope.showListBottomSheet = function() {
          $scope.alert = '';
          $mdBottomSheet.show({
            templateUrl: 'tmpl/bottom-sheet-list-template.html',
            controller: 'ListBottomSheetCtrl'
          }).then(function(clickedItem) {
            $scope.alert = clickedItem['name'] + ' clicked!';
          });
        };

        $scope.showGridBottomSheet = function() {
          $scope.alert = '';
          $mdBottomSheet.show({
            templateUrl: 'tmpl/bottom-sheet-grid-template.html',
            controller: 'GridBottomSheetCtrl',
            clickOutsideToClose: false
          }).then(function(clickedItem) {
            $mdToast.show(
                  $mdToast.simple()
                    .textContent(clickedItem['name'] + ' clicked!')
                    .position('top right')
                    .hideDelay(1500)
                );
          });
        };
      })
        .controller('ListBottomSheetCtrl', function($scope, $mdBottomSheet) {

          $scope.items = [
            { name: 'Share', icon: 'share-arrow' },
            { name: 'Upload', icon: 'upload' },
            { name: 'Copy', icon: 'copy' },
            { name: 'Print this page', icon: 'print' },
          ];

          $scope.listItemClick = function($index) {
            var clickedItem = $scope.items[$index];
            $mdBottomSheet.hide(clickedItem);
          };
        })
        .controller('GridBottomSheetCtrl', function($scope, $mdBottomSheet) {
          $scope.items = [
            { name: 'Hangout', icon: 'hangout' },
            { name: 'Mail', icon: 'mail' },
            { name: 'Message', icon: 'message' },
            { name: 'Copy', icon: 'copy2' },
            { name: 'Facebook', icon: 'facebook' },
            { name: 'Twitter', icon: 'twitter' },
          ];

          $scope.listItemClick = function($index) {
            var clickedItem = $scope.items[$index];
            $mdBottomSheet.hide(clickedItem);
          };
        })
        .controller('AppCtrl', function($scope) {
            $scope.title1 = 'Button';
            $scope.title4 = 'Warn';
            $scope.isDisabled = true;

            $scope.googleUrl = 'http://google.com';

        })
        .controller('InputCtrl', function($scope) {
            $scope.user = {
              title: 'Developer',
              email: 'ipsum@lorem.com',
              firstName: '',
              lastName: '',
              company: 'Google',
              address: '1600 Amphitheatre Pkwy',
              city: 'Mountain View',
              state: 'CA',
              biography: 'Loves kittens, snowboarding, and can type at 130 WPM.\n\nAnd rumor has it she bouldered up Castle Craig!',
              postalCode: ''
            };

            $scope.states = ('AL AK AZ AR CA CO CT DE FL GA HI ID IL IN IA KS KY LA ME MD MA MI MN MS ' +
            'MO MT NE NV NH NJ NM NY NC ND OH OK OR PA RI SC SD TN TX UT VT VA WA WV WI ' +
            'WY').split(' ').map(function(state) {
                return {abbrev: state};
              });
        })
        .controller('CheckboxCtrl', function($scope) {
            $scope.items = [1,2,3,4,5,6,7,8,9,10];
            $scope.selected = [];
            $scope.toggle = function (item, list) {
              var idx = list.indexOf(item);
              if (idx > -1) {
                list.splice(idx, 1);
              }
              else {
                list.push(item);
              }
            };
            $scope.exists = function (item, list) {
              return list.indexOf(item) > -1;
            };
            $scope.isIndeterminate = function() {
              return ($scope.selected.length !== 0 &&
                  $scope.selected.length !== $scope.items.length);
            };
            $scope.isChecked = function() {
              return $scope.selected.length === $scope.items.length;
            };
            $scope.toggleAll = function() {
              if ($scope.selected.length === $scope.items.length) {
                $scope.selected = [];
              } else if ($scope.selected.length === 0 || $scope.selected.length > 0) {
                $scope.selected = $scope.items.slice(0);
              }
            };
        })
        .controller('DemoCtrl', DemoCtrl)
        .controller('CustomInputDemoCtrl', ChipsCtrl)
        .run(function($templateRequest) {

        var urls = [
          'img/icons/share-arrow.svg',
          'img/icons/upload.svg',
          'img/icons/copy.svg',
          'img/icons/print.svg',
          'img/icons/hangout.svg',
          'img/icons/mail.svg',
          'img/icons/message.svg',
          'img/icons/copy2.svg',
          'img/icons/facebook.svg',
          'img/icons/twitter.svg'
        ];

        angular.forEach(urls, function(url) {
          $templateRequest(url);
        });

      });

        function DemoCtrl($mdDialog) {
        var self = this;

        self.openDialog = function($event) {
          $mdDialog.show({
            controller: DialogCtrl,
            controllerAs: 'ctrl',
            templateUrl: 'tmpl/dialog.tmpl.html',
            parent: angular.element(document.body),
            targetEvent: $event,
            clickOutsideToClose:true
          })
        }
      }

        function DialogCtrl ($timeout, $q, $scope, $mdDialog) {
        var self = this;

        // list of `state` value/display objects
        self.states        = loadAll();
        self.querySearch   = querySearch;

        // ******************************
        // Template methods
        // ******************************

        self.cancel = function($event) {
          $mdDialog.cancel();
        };
        self.finish = function($event) {
          $mdDialog.hide();
        };

        // ******************************
        // Internal methods
        // ******************************

        /**
         * Search for states... use $timeout to simulate
         * remote dataservice call.
         */
        function querySearch (query) {
          return query ? self.states.filter( createFilterFor(query) ) : self.states;
        }

        /**
         * Build `states` list of key/value pairs
         */
        function loadAll() {
          var allStates = 'Alabama, Alaska, Arizona, Arkansas, California, Colorado, Connecticut, Delaware,\
                  Florida, Georgia, Hawaii, Idaho, Illinois, Indiana, Iowa, Kansas, Kentucky, Louisiana,\
                  Maine, Maryland, Massachusetts, Michigan, Minnesota, Mississippi, Missouri, Montana,\
                  Nebraska, Nevada, New Hampshire, New Jersey, New Mexico, New York, North Carolina,\
                  North Dakota, Ohio, Oklahoma, Oregon, Pennsylvania, Rhode Island, South Carolina,\
                  South Dakota, Tennessee, Texas, Utah, Vermont, Virginia, Washington, West Virginia,\
                  Wisconsin, Wyoming';

          return allStates.split(/, +/g).map( function (state) {
            return {
              value: state.toLowerCase(),
              display: state
            };
          });
        }

        /**
         * Create filter function for a query string
         */
        function createFilterFor(query) {
          var lowercaseQuery = angular.lowercase(query);
          console.log(lowercaseQuery);
          return function filterFn(state) {
            return (state.value.indexOf(lowercaseQuery) === 0);
          };

        }
      }
      
        function ChipsCtrl ($timeout, $q) {
          var self = this;

          self.readonly = false;
          self.selectedItem = null;
          self.searchText = null;
          self.querySearch = querySearch;
          self.vegetables = loadVegetables();
          self.selectedVegetables = [];
          self.numberChips = [];
          self.numberChips2 = [];
          self.numberBuffer = '';
          self.autocompleteDemoRequireMatch = true;
          self.transformChip = transformChip;

          /**
           * Return the proper object when the append is called.
           */
          function transformChip(chip) {
            // If it is an object, it's already a known chip
            if (angular.isObject(chip)) {
              return chip;
            }

            // Otherwise, create a new one
            return { name: chip, type: 'new' }
          }

          /**
           * Search for vegetables.
           */
          function querySearch (query) {
            var results = query ? self.vegetables.filter(createFilterFor(query)) : [];
            return results;
          }

          /**
           * Create filter function for a query string
           */
          function createFilterFor(query) {
            var lowercaseQuery = angular.lowercase(query);

            return function filterFn(vegetable) {
              return (vegetable._lowername.indexOf(lowercaseQuery) === 0) ||
                  (vegetable._lowertype.indexOf(lowercaseQuery) === 0);
            };

          }

          function loadVegetables() {
            var veggies = [
              {
                'name': 'Broccoli',
                'type': 'Brassica'
              },
              {
                'name': 'Cabbage',
                'type': 'Brassica'
              },
              {
                'name': 'Carrot',
                'type': 'Umbelliferous'
              },
              {
                'name': 'Lettuce',
                'type': 'Composite'
              },
              {
                'name': 'Spinach',
                'type': 'Goosefoot'
              }
            ];

            return veggies.map(function (veg) {
              veg._lowername = veg.name.toLowerCase();
              veg._lowertype = veg.type.toLowerCase();
              return veg;
            });
          }
        }
})();