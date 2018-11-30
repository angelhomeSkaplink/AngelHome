<div class="row">

  <div class="col-md-6">
    <div class="form-group {{ $errors->has('emp_id') ? 'has-error' : ''}}">
        {!! Form::label('employee_id', '', array('class' => 'col-md-4 control-label')) !!}
        <div class="col-md-8">
          {!! Form::text('emp_id', null, ['class' => 'form-control required', 'id' => 'emp_id', 'placeholder' => 'All Employees', 'autocomplete' => 'off']) !!}
        </div>
        {!! $errors->first('emp_id', '<span class="help-inline">:message</span>') !!}
    </div>
    <div class="form-group {{ $errors->has('date_from') ? 'has-error' : ''}}">
      {!! Form::label('date_from', '', array('class' => 'col-md-4 control-label')) !!}
      <div class="col-md-8">
        {!! Form::text('date_from', null, ['class' => 'form-control required', 'id' => 'date_from', 'placeholder' => 'All Dates']) !!}
      </div>
      {!! $errors->first('date_from', '<span class="help-inline">:message</span>') !!}
    </div>
  </div>

  <div class="col-md-6">
    <div class="form-group {{ $errors->has('fld_DeptID') ? 'has-error' : ''}}">
      {!! Form::label('department', '', array('class' => 'col-md-4 control-label')) !!}
      <div class="col-md-8">
        {!! Form::select('fld_DeptID', $departments, null, ['class' => 'form-control required', 'id' => 'fld_DeptID', 'placeholder' => 'All Departments']) !!}
      </div>
      {!! $errors->first('fld_DeptID', '<span class="help-inline">:message</span>') !!}
    </div>
    

    <div class="form-group {{ $errors->has('date_to') ? 'has-error' : ''}}">
      {!! Form::label('date_to', '', array('class' => 'col-md-4 control-label')) !!}
      <div class="col-md-8">
        {!! Form::text('date_to', null, ['class' => 'form-control required', 'id' => 'date_to', 'placeholder' => 'All Dates']) !!}
      </div>
      {!! $errors->first('date_to', '<span class="help-inline">:message</span>') !!}
    </div>
  </div>

  <div class="col-md-6">
    <div class="form-group {{ $errors->has('post_id') ? 'has-error' : ''}}">
      {!! Form::label('post', '', array('class' => 'col-md-4 control-label')) !!}
      <div class="col-md-8">
        {!! Form::select('post_id', $posts, null, ['class' => 'form-control required', 'id' => 'post_id', 'placeholder' => 'All Posts']) !!}
      </div>
      {!! $errors->first('post_id', '<span class="help-inline">:message</span>') !!}
    </div>
  </div>

</div>

