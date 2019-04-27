var app = angular.module('Test', []);
app.controller('Main', ['$scope', function($scope) {
    $scope.perPage = 2;
    $scope.allData = angular.element( document.querySelectorAll( '.ui-sortable-handle img' ));
    $scope.offset = 0;
    $scope.navButtons = [];

    $scope.buildNavButtons = function () {
        for (var i = 0, len = ($scope.allData.length / $scope.perPage); i < len; i = i + 1) {
            $scope.navButtons.push(i);
        }
    }

    $scope.paginate = function() {
        $scope.data = $scope.allData.slice($scope.offset, $scope.offset + $scope.perPage);
    };

    $scope.previous = function() {
        $scope.offset = $scope.offset - $scope.perPage;
    };

    $scope.next = function() {
        $scope.offset = $scope.offset + $scope.perPage;
    };

    $scope.$watch('offset', function() {
        $scope.paginate();
    });

    $scope.buildNavButtons();

}]);