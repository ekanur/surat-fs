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

                	<form action="{{ url("admin/pejabat") }}" method="post" enctype="multipart/form-data">
                		{{ csrf_field() }}
                        <input type="hidden" name="id" value="{{ $pejabat->id }}">
                        <input type="hidden" name="ttd_lama" value="{{ $pejabat->scan_ttd }}">
                	
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
                        <div class="col-sm-5">
                            <span>{{ $pejabat->username }}</span> 
                            
                        </div>
                    </div>
                    
                    <div class="form-group row">
                    	<label for="" class="col-sm-2 col-form-label">Tanda Tangan</label>
                    	<div class="col-sm-5">
                    		<img src="{{ Storage::url($pejabat->scan_ttd) }}" alt="" class="img img-thumbnail" style="width: 50%; height: 50%"><br/>
	                    	<input class="form-control" type="file" name="ttd" style="opacity: 0.95; position: initial;height: initial;margin-top: 10px">
	                    	{{-- <p class="help-block">Type:.jpg, .png | Maks. 700Kb</p> --}}
	                    </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-2">
                            <a class="btn btn-warning" data-toggle="modal" data-target="#reset_password">Reset Password</a></div>
                        <div class="col-sm-5">
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

@push('modal')
<div class="modal fade" id="reset_password" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-md modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header justify-content-center">
                <h4 class="title title-up">Reset Password</h4>
                
            </div>
            <div class="modal-body">
                <p>Apakah anda yakin akan mereset password <strong>{{ $pejabat->username }}</strong>?
                </p>

                <small class="help-block">Password akan berubah menjadi <blockquote>123456</blockquote>.</small>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Tidak</button>
                <form action="{{ url("/reset-password") }}" method="post">
                    {{ csrf_field() }}
                    <input type="hidden" name="id" value="{{ $pejabat->id }}">
                    <button type="submit" class="btn btn-success">Ya</button>
                </form>
            </div>
        </div>
    </div>
</div>
@endpush

@section("menu")
	@if(Auth::user()->tipe == 'admin')
		@include("user.menus.admin")
	@else
		@include("user.menus.default")
	@endif
@endsection

