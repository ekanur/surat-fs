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
            <div class="col-sm-2">
                <div class="form-check form-check-radio">
                    <label class="form-check-label">
                      <input class="form-check-input" type="radio" name="status" value="setuju" id="exampleRadios1" value="option1">
                      <span class="form-check-sign"></span>
                      Setujui
                    </label>
                  </div>
              {{-- <select class="form-control" name="status" id="">
                <option value="setuju" selected>Setujui</option>
                <option value="tolak">Tolak</option>
              </select> --}}
            </div>
            <div class="col-sm-5">
                <div class="form-check form-check-radio">
                    <label class="form-check-label">
                      <input class="form-check-input" type="radio" name="status" value="tolak" id="exampleRadios1" value="option1">
                      <span class="form-check-sign"></span>
                      Tolak
                    </label>
                  </div>
            </div>
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Keluar</button>
        <button type="submit" class="btn btn-success" id="btn-simpan"  style="display: none" disabled>Simpan</button>
      </div>
      </form>
    </div>
  </div>
</div>