<div class="modal fade" id="{{ $id or null }}" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
	<div class="modal-dialog modal-lg modal-dialog-centered">
		<div class="modal-content">
			<div class="modal-header justify-content-center">
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true">
					<i class="now-ui-icons ui-1_simple-remove"></i>
				</button>
				<h4 class="title title-up">{{ $title or null }}</h4>
			</div>
			<div class="modal-body">

				{{ $content or null }}
				
			</div>
			<div class="modal-footer">
				{{-- <button type="button" class="btn btn-default" data-dismiss="modal">Keluar</button>
				<button type="button" class="btn btn-danger"  data-dismiss="modal">Proses</button> --}}
			</div>
		</div>
	</div>
</div>