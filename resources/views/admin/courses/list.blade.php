@extends('admin.layout.index')
@section('content')
<div class="disDB col-sm-9">
			<br>
			<div class="labelList">
				<h1>Danh sách giáo viên </h1>
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
						<td>ID</td>
						<td>NameCourse</td>
						<td>NumberOfCredits</td>
						<td>Delete</td>
						<td>Edit</td>
					</tr>
					<tbody>
                            @foreach($courses as $course )
                                <tr class="odd gradeX" align="center">
                                    <td>{{$course->id}}</td>
                                    <td>{{$course->nameCourse}}</td>
                                    <td>{{$course->numberOfCredits}}</td>
                                 
                                    <td>
										<img src="delete.png">
										<a href="delete/{{$course->id}}">Delete</a>
									</td>
									<td>
										<img src="edit.png">
										<a href="update/{{$course->id}}">Edit</a>
									</td>
                                </tr>
                            @endforeach
                        </tbody>
				</table>
			</div>
</div>
@endsection