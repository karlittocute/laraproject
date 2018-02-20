@extends ('layouts.layout')

@section('content')
 <form id="resume" name="resume" method="POST" action="/resume/{{$resume->id}}">
	    {{ csrf_field()}} <!-- Для того что бы значть, что POST запрос идет с этого же сайта -->
		{{ method_field('PUT') }}  <!-- Для UPDATE -->
	    @include('layouts.resume.edit_form.formheader')
	    @include('layouts.resume.edit_form.attendee')

		
		@include('layouts.resume.edit_form.mainedu')
		@include('layouts.resume.edit_form.secedu')
        
		
		 @include('layouts.resume.edit_form.skills')
		 @include('layouts.resume.edit_form.vacancy')
		 @include('layouts.resume.edit_form.footer')
    </form>

<!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
    <script>
    $(function() {
      console.log('Jquery is ok');
      $('#scheduletext').prop('disabled', true);


      $('#submitResume').on('click', function(){
        console.clear();
        console.log('Hello!');
        let visa = $('#visa').val();
        if (visa === "") 
          console.log('visa= ' + visa);


        $('#resume').submit();

      });

      $('#schedulespecial').change(function() {
        if ($(this).is(":checked")) {
          $('#scheduletext').prop('disabled', false);          
        }
        else {
          $('#scheduletext').prop('disabled', true);           
        }



      })


    }); // The end of jquery code.


    </script>
@endsection