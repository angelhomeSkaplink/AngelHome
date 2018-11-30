<!-- jQuery 2.1.4 
<script src="{{ asset('/plugins/jQuery/jQuery-2.1.4.min.js') }}"></script> -->
<!-- Bootstrap 3.3.2 JS -->
<script src="{{ asset('/js/bootstrap.min.js') }}" type="text/javascript"></script>
<!-- AdminLTE App -->
<script src="{{ asset('/js/app.min.js') }}" type="text/javascript"></script>
<!-- Toastr -->
<script src="{{ asset('/js/toastr.min.js') }}" type="text/javascript"></script>
<!-- Bootstrap Calender -->
<script type="text/javascript" src="{{ asset('/js/bootstrap-datepicker.js') }}"></script>
<!--<script src="{{ asset('/js/jquery.min.js') }}" type="text/javascript"></script>-->


<!-- css and js for wicketpicker -->
<link href="{{ asset('/css/wickedpicker.min.css') }}" rel="stylesheet" type="text/css"/>
<script type="text/javascript" language="javascript" src="{{ asset('/js/wickedpicker.min.js') }}"></script>
<script>
	$('.timepicker').wickedpicker();
</script>
<!-- css and js for wicketpicker -->

{!! Toastr::render() !!}
<!-- SweetAlert2 -->
<script src="{{ asset('/js/sweetalert2.min.js') }}" type="text/javascript"></script>
 
 		<script type="text/javascript" language="javascript" src="{{ asset('/js/assessment/knockout-debug.js') }}"></script>
		<script type="text/javascript" language="javascript" src="{{ asset('/js/assessment/survey.ko.js') }}"></script>
		<script type="text/javascript" language="javascript" src="{{ asset('/js/assessment/surveyeditor.js') }}"></script>
		<script type="text/javascript" language="javascript" src="{{ asset('/js/assessment/editor.js') }}"></script>
		<script type="text/javascript" language="javascript" src="{{ asset('/js/assessment/bootstrap-notify.min.js') }}"></script>
		<script type="text/javascript" language="javascript" src="{{ asset('/js/assessment/config.js') }}"></script>		
		<script type="text/javascript" language="javascript" src="{{ asset('/js/assessment/jquery-confirm.min.js') }}"></script>		
		<script type="text/javascript" language="javascript" src="{{ asset('/js/assessment/jquery-ui.min.js') }}"></script>			
		<script type="text/javascript" language="javascript" src="{{ asset('/js/assessment/survey.app.js') }}"></script>		
		<script type="text/javascript" language="javascript" src="{{ asset('/js/assessment/survey.js') }}"></script>
		<script type="text/javascript" language="javascript" src="{{ asset('/js/assessment/submit.js') }}"></script>		
		<script type="text/javascript" language="javascript" src="{{ asset('/js/assessment/surveyjs-widgets.js') }}"></script>		
		<script type="text/javascript" language="javascript" src="{{ asset('/js/nav-bar.js') }}"></script>
@yield('scripts-extra')