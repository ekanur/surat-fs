@extends("user.layout")

@section("content")


<div class="panel-header panel-header-lg">
	{{-- <canvas id="bigDashboardChart"></canvas> --}}
</div>
<div class="content">

	<div class="row">
		<div class="col-md-12">
			<div class="card card-tasks">
                <div class="card-header">
                    <h5 class="title">{{ ucfirst($pejabat->tipe) }} {{ usernameToJurusan($pejabat->username) }}</h5>
                </div>
                <div class="card-body">
                	<form action="{{ url("admin/pejabat") }}" method="post">
                		{{ csrf_field() }}
                	
                    <div class="form-group row">
                        <label for="" class="col-sm-2 col-form-label">Pilih</label>
                        <div class="col-sm-5">
                        	<select name="dosen_id" class="form-control">
                        		@foreach($dosen as $dosen)
	                        		<option value="{{ $dosen->id }}" @if($pejabat->dosen_id == $dosen->id) selected="" @endif>{{ $dosen->nama }}</option>
                        		@endforeach
                        	</select>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="" class="col-sm-2 col-form-label">Username</label>
                        <div class="col-sm-10">
                            <span>{{ $pejabat->username }}</span>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="" class="col-sm-2 col-form-label">Reset Password</label>
                        <div class="col-sm-10">
                            <a class="" href="">Reset</a>
                        </div>
                    </div>
                    <div class="form-group row text-center">
                        <div class="col-sm-12">
                        	<button class="btn btn-success">Simpan</button>
                        </div>
                    </div>
                   	</form>
                </div>
            </div>
		</div>

	</div>
</div>


@endsection

@section("menu")
	@if(Auth::user()->tipe == 'admin')
		@include("user.menus.admin")
	@else
		@include("user.menus.default")
	@endif
@endsection

