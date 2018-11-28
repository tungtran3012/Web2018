@extends('layout.index')
@section('content')
<div class="disDB col-sm-10">
	<br>
	<div class="detailInfo">FullName:</div>
	<div class="detailInfoContent">{{Auth::user()->fullname}}</div>	
	<div style="clear: both;"></div>
	<div class="detailInfo">Email:</div>
	<div class="detailInfoContent"> {{Auth::user()->email}}</div>	
	<div style="clear: both;"></div>
	<div class="detailInfo">Position:</div>
	<div class="detailInfoContent">
		@if (Auth::user()->level==1)
            {{"Giáo vụ "}}
        @else
            {{"Lecturers"}}
        @endif
	</div>
	<div style="clear: both;"></div>
	<div class="detailInfo">Birth:</div>
	<div>{{Auth::user()->birthDay}}</div>
	<div style="clear: both;"></div>
	<div class="detailInfo">Phone Number:</div>
	<div>{{Auth::user()->phoneNumber}}</div>
	<div style="clear: both;"></div>
	<br>
	@if (Auth::user()->level==0)
		<table class="table table-bordered">
			<thead>
				<tr>
					<td>Index</td>
					<td>Teaching Subject</td>
					<td>Time Start</td>
					<td>Time Finish</td>
					<td>Time Detail</td>
					<td>Classroom</td>
				</tr>
			</thead>
			<tbody>
				@foreach($assignments as $ass)
					<tr>
						<td>{{$index++ }} </td>
						@foreach (App\courses::where('id',$ass->idCourse)->get() as $var)
						<td>
							{{$var->nameCourse}}
						</td>
						@endforeach
						<td>Time Start: {{$ass->timeStart}}</td>
						<td>Time Finish: {{$ass->timeFinish}}</td>
						<td>Time Detail: {{$ass->timeDetail}}</td>
						<td>Classroom: {{$ass->classRoom}}</td>
					</tr>
				@endforeach
			</tbody>
		</table>
	@endif	
</div>
@endsection

