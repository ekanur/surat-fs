<div class="modal fade" id="{{ $id or null }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <form action="{{ $action or null }}" method="post">
        {{ csrf_field() }}
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">{{ $title or null }}</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        {{ $content or null }}
        <div class="form-group row" id="input-verifikasi" style="display: none">
            <label for="verifikasi" class="col-sm-2 col-form-label">Setuju/Tolak</label>
            <div class="col-sm-10">
              <select class="form-control" name="status" id="">
                <option value="setuju">Setujui</option>
                <option value="tolak">Tolak</option>
              </select>
            </div>
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Keluar</button>
        <button type="submit" class="btn btn-success" id="btn-simpan"  style="display: none">Simpan</button>
      </div>
      </form>
    </div>
  </div>
</div>