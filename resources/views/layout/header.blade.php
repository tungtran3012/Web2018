<header class="row">
	<div class="title col-sm-11">
			<h4>IAT-Quan Li Giao Vien</h4>
	</div>
	<div class="account dropdown col-sm-1">
		
		<button onclick="myFunction()" class="dropbtn dropdown-toggle">
			<!-- <i>{{Auth::user()->fullname}}</i> -->
		</button>
		
		<ul id="myItemNavL1" class="itemNavL1 dropdown-user dropdown-menu">
			@if (Auth::user()->level ==1)
                <li><a href="admin/users/list">Manage</a></li>
            @endif
            <li><a href="{{url('logout')}}"><i class="fa fa-sign-out fa-fw"></i> Logout</a>
		</ul>
	</div>
</header>
