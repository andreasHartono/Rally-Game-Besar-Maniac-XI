<form role="form" method="POST" action="{{ url('/admin/updateLinkZoom') }}">
   
   <div class="modal-header">
      <h4 class="modal-title">Update Link Zoom Pos - {{ $hasil[0]['nama'] }}</h4>
      <button type="button" class="btn-close" data-dismiss="modal" aria-hidden="true"></button>
   </div>
   <div class="modal-body">
      @csrf
      {{-- @method('PUT') --}}
      <div class="form-body">
         <div class="form-group">
            <label>Link Zoom</label>
            <input type="text" name="linkZoom" id="elinkZoom" class="form-control" value="{{ $hasil[0]['linkZoom2'] }}">
         </div>
         <div class="form-group">
            <label>ID Zoom</label>
            <input type="text" name="idZoom" id="eidZoom" class="form-control" value="{{ $hasil[0]['idZoom2'] }}">
         </div>
         <div class="form-group">
            <label>Password Zoom</label>
            <input type="text" name="passZoom" id="epassZoom" class="form-control" value="{{ $hasil[0]['passZoom2'] }}">
         </div>
      </div>
   </div>
   <div class="modal-footer">
      <button type="submit" class="btn btn-warning" data-dismiss="modal" onclick="updateLinkZoom({{ $hasil[0]['id_penjaga'] }}, 2)">
         Update
      </button>
      <button type="button" class="btn btn-outline-danger" data-dismiss="modal">Close</button>
   </div>
</form>