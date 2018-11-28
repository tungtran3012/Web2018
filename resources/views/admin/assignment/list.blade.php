@extends('admin.layout.index')
@section('content')
<div class="disDB col-sm-9">
			<br>
			<div class="labelList">
				<h1>Danh sách phân công nhiệm vụ  </h1>
			</div>
			<br>
			<div>
				<div class="row">
					<div class="chooseDB col-sm-8">
						<span>Show </span>
						<select>
							<option>1</option>
							<option>2</option>
							<option>3</option>
						</select>
						<span> entries</span>
					</div>
					<div class="searchDB col-sm-4">
						<span>Search : </span>
						<input type="text" name="">
					</div>
				</div>
				<br>
				<table class="table table-striped">
					<tr>
						<td>IdUSer</td>
						<td>IdCourse</td>
						<td>Time Start</td>
						<td>Time Finish</td>
						<td>Time Detail</td>
						<td>Classroom</td>
						<td>Delete</td>
						<td>Edit</td>
					</tr>
					<tbody>
                            @foreach($assignment as $ass )
                                <tr class="odd gradeX" align="center">
                                    <td>{{$ass->idUser}}</td>
                                    <td>{{$ass->idCourse}}</td>
                                    <td>{{$ass->timeStart}}</td>
                                    <td>{{$ass->timeFinish}}</td>
                                    <td>{{$ass->timeDetail}}</td>
                                    <td>{{$ass->classRoom}}</td>
                                    <td>
                                    	<img src="../../../images/delete.png">
										<a href="delete/{{$ass->idUser}}/{{$ass->idCourse}}">Delete</a>
									</td>
									<td>
										<img src="../../../images/edit.png">
										<a href="update/{{$ass->idUser}}/{{$ass->idCourse}}">Edit</a>
									</td>
                                </tr>
                            @endforeach
                        </tbody>
				</table>
			</div>
</div>
@endsection