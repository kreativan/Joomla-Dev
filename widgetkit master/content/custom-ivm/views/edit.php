<div ng-controller="customCtrl as custom">

    <div class="uk-grid uk-grid-divider uk-form uk-form-stacked" data-uk-grid-margin>
        <div ng-class="vm.name == 'contentCtrl' ? 'wk-width-xlarge-1-4' : ''" class="uk-width-medium-1-3">

            <div class="wk-panel-marginless">

                <ul id="js-content-items" class="uk-nav uk-nav-side uk-sortable" data-uk-sortable="{dragCustomClass:'wk-sortable'}" ng-show="content.data.items.length">
                    <li class="uk-visible-hover" ng-repeat="item in content.data.items" ng-class="(item === $parent.item ? 'uk-active':'')">
                        <div class="wk-subnav-right uk-hidden">
                            <ol class="uk-subnav wk-subnav-icon">
                                <li>
                                    <a ng-click="custom.deleteItem(item)"><i class="uk-icon-times"></i></a>
                                </li>
                            </ol>
                        </div>
                        <a ng-click="custom.editItem(item)">
                            <div class="wk-preview-thumb uk-cover-background uk-margin-small-right" ng-style="{'background-image': 'url(' + custom.previewItem(item) + ')'}"></div>
                            {{ item.title }}
                        </a>
                    </li>
                </ul>

                <p class="uk-margin">
                    <button class="uk-button" ng-click="custom.addItem()">{{'Add Item' | trans}}</button>
                    <button class="uk-button" ng-click="custom.importItems()">{{'Add Media' | trans}}</button>
                </p>

            </div>

        </div>
        <div ng-class="vm.name == 'contentCtrl' ? 'wk-width-xlarge-3-4' : ''" class="uk-width-medium-2-3" ng-show="item">

            <div class="uk-form-row">
                <label class="uk-form-label" for="wk-title">{{'Title' | trans}}</label>
                <div class="uk-form-controls">
                    <input id="wk-title" class="uk-width-1-1" type="text" ng-model="item.title">
                </div>
            </div>

            <div class="uk-form-row">
                <label class="uk-form-label" for="wk-subtitle">{{'Subtitle' | trans}}</label>
                <div class="uk-form-controls">
                    <input id="wk-subtitle" class="uk-width-1-1" type="text" ng-model="item.subtitle">
                </div>
            </div>

            <div class="uk-form-row">
                <label class="uk-form-label" for="wk-icon">{{'Icon' | trans}}</label>
                <div class="uk-form-controls">
                    <input id="wk-icon" class="uk-width-1-1" type="text" ng-model="item.icon">
                </div>
            </div>

            <div class="uk-form-row">
                <label class="uk-form-label">{{'Media' | trans}}</label>
                <div class="uk-form-controls">
                    <field-media title="item.title" media="item.media" options="item.options['media']"></field-media>
                </div>
            </div>

            <div class="uk-form-row">
                <label class="uk-form-label" for="wk-content">{{'Content' | trans}}</label>
                <div class="uk-form-controls">
                    <textarea id="wk-content" class="uk-width-1-1" ng-model="item.content" rows="10"></textarea>
                </div>
            </div>

            <div class="uk-form-row">
                <label class="uk-form-label" for="wk-link">{{'Link' | trans}}</label>
                <div class="uk-form-controls">
                    <field type="text" options='{"attributes":{"id":"wk-link", "placeholder":"http://"}, "icon":"link"}' ng-model="item.link"></field>
                </div>
            </div>

        </div>
    </div>

</div>
