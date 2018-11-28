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
						<td>Email</td>
						<td>Fullname</td>
						<td>Level</td>
						<td>Show Detail</td>
						<td>Delete</td>
						<td>Edit</td>
					</tr>
					<tbody>
                            @foreach($users as $user )
                                <tr class="odd gradeX" align="center">
                                    <td>{{$user->id}}</td>
                                    <td>{{$user->email}}</td>
                                    <td>{{$user->fullname}}</td>
                                    <td>
                                        @if ($user->level==1)
                                            {{"Giáo vụ "}}
                                        @else
                                            {{"Lecturers"}}
                                        @endif

                                    </td>
                                    <td>
										<a href="showinfo/{{$user->id}}">Show Info</a>
									</td>
                                    <td>
                                    	<img src="../../../images/delete.png">
										<a href="delete/{{$user->id}}">Delete</a>
									</td>
									<td>
										<img src="../../../images/edit.png">
										<a href="update/{{$user->id}}">Edit</a>
									</td>
                                </tr>
                            @endforeach
                        </tbody>
				</table>
			</div>
</div>
@endsection