<div class="container" style="text-align: center; margin-bottom: 26px;">
    <div class="form-group">
        <label class="col-md-4 control-label">Type</label>

        <div class="col-md-6">
            <select id="form-selector">
                <option value="-1"></option>
                <option value="{{ URL::action('DiapoInsertAdminController@getInsertToForm', ['diapos.form_insert.form1', $diapo->id]) }}">1</option>
                <option value="{{ URL::action('DiapoInsertAdminController@getInsertToForm', ['diapos.form_insert.form2', $diapo->id]) }}">2</option>
                <option value="{{ URL::action('DiapoInsertAdminController@getInsertToForm', ['diapos.form_insert.form3', $diapo->id]) }}">3</option>
            </select>
        </div>
    </div>
</div>
