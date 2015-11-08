<div class="uk-grid uk-grid-divider uk-form uk-form-horizontal" data-uk-grid-margin>
    <div class="uk-width-medium-1-4">

        <div class="wk-panel-marginless">
            <ul class="uk-nav uk-nav-side" data-uk-switcher="{connect:'#nav-content'}">
                <li><a href="">{{'General' | trans}}</a></li>
            </ul>
        </div>

    </div>
    <div class="uk-width-medium-3-4">

        <ul id="nav-content" class="uk-switcher">
            <li>

                <h3 class="wk-form-heading">{{'General' | trans}}</h3>

                <div class="uk-form-row">
                    <label class="uk-form-label" for="wk-class">{{'Media Size' | trans}}</label>
                    <div class="uk-form-controls">
                        <input id="wk-media-size" class="uk-form-width-medium" type="text" ng-model="widget.data['img_size']">
                    </div>
                </div>
                
                <div class="uk-form-row">
                    <span class="uk-form-label">{{'Media Rounded' | trans}}</span>
                    <div class="uk-form-controls uk-form-controls-text">
                        <label><input type="checkbox" ng-model="widget.data['ivm_rounded']"></label>
                    </div>
                </div>

            </li>
        </ul>

    </div>
</div>