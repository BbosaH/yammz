<div ng-controller="RatingDemoCtrl">
    <h4>Default</h4>
    <uib-rating  ng-model="rate" max="max" read-only="isReadonly" on-hover="hoveringOver(value)" on-leave="overStar = null" titles="['one','two','three']" aria-labelledby="default-rating"></uib-rating>
    <span class="label" ng-class="{'label-warning': percent<30, 'label-info': percent>=30 && percent<70, 'label-success': percent>=70}" ng-show="overStar && !isReadonly">{{percent}}%</span>

    <pre style="margin:15px 0;">Rate: <b>{{rate}}</b> - Readonly is: <i>{{isReadonly}}</i> - Hovering over: <b>{{overStar || "none"}}</b></pre>

    <button type="button" class="btn btn-sm btn-danger" ng-click="rate = 0" ng-disabled="isReadonly">Clear</button>
    <button type="button" class="btn btn-sm btn-default" ng-click="isReadonly = ! isReadonly">Toggle Readonly</button>
    <hr />

    <h4>Custom icons</h4>
    <div ng-init="x = 5"><uib-rating ng-model="x" max="15" state-on="'glyphicon-ok-sign'" state-off="'glyphicon-ok-circle'" aria-labelledby="custom-icons-1"></uib-rating> <b>(<i>Rate:</i> {{x}})</b></div>
    <div ng-init="y = 2"><uib-rating ng-model="y" rating-states="ratingStates" aria-labelledby="custom-icons-2"></uib-rating> <b>(<i>Rate:</i> {{y}})</b></div>
</div>
