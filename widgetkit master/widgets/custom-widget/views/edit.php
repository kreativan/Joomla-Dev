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

            <!-- GENERAL FIELDS -->
            <li>
                <h3 class="wk-form-heading">{{'General' | trans}}</h3>

                <!-- input text (replace "ivm_text" with your name/value)-->
                <div class="uk-form-row">
                    <label class="uk-form-label">{{'ivm_text' | trans}}</label>
                    <div class="uk-form-controls">
                        <label>
                            <input class="uk-form-width-small" type="text" ng-model="widget.data['ivm_text']"> {{'Some Info' | trans}}
                        </label>
                    </div>
                </div>

                <!-- media -->
                <div class="uk-form-row">
                    <label class="uk-form-label">{{'Image' | trans}}</label>
                    <div class="uk-form-controls">
                        <field-media title="item.title" media="widget.data.image"></field-media>
                    </div>
                </div>

                <!-- select (replace "ivm_select" with your name/value) -->
                <div class="uk-form-row">
                    <label class="uk-form-label" for="wk-nav">{{'ivm_select' | trans}}</label>
                    <div class="uk-form-controls">
                        <select id="wk-ivm_select" class="uk-form-width-medium" ng-model="widget.data['ivm_select']">
                            <option value="option-1">{{'Option 1' | trans}}</option>
                            <option value="option-2">{{'Option 2' | trans}}</option>
                        </select>
                    </div>
                </div>

                <!-- checkbox (replace "ivm_checkbox" with your name/value) -->
                <div class="uk-form-row">
                    <span class="uk-form-label">{{'ivm_checkbox' | trans}}</span>
                    <div class="uk-form-controls uk-form-controls-text">
                        <label><input type="checkbox" ng-model="widget.data['ivm_checkbox']"> {{'This is some description' | trans}}</label>
                    </div>
                </div>

            </li>

        </ul>

    </div>
</div>
