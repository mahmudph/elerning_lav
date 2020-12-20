<script>

/* add custom button  */
/*
* options showuld be array with string type
* return void
*/
function generateButton(type = 'save') {
    let button =
        `<button type="button" id="modal-close" class="btn btn-danger btn-sm" data-dismiss="modal">Close</button>
        <button type="button" id="modal-${type}" class="btn btn-info btn-sm">Simpan</button>`
    /* add custom button */
    $('#modal-footer').html(button);
}



$(document).on("click",".edit",function() {
  /* get id target  */
  let id  = $(this).attr('id_target');

  /* change size modal */
  $('.modal-dialog').addClass('modal-lg');
  /* url  */
  let url = `{{ config('app.url')}}/guru/data_pelajaran/${id}/edit`;
  /* request modal */
  goAjaxGet(url).then(_ => {
   generateButton('edit');
  });
});

$(document).on('click', '.delete', function() {
  let id  = $(this).attr('id_target');
  let url = `{{ config('app.url')}}/guru/data_pelajaran/${id}/delete`;

  /* request to api */
  goAjaxGet(url).then(_ => {
    let hapusButton =
       `<button type="button" id="modal-hapus" class="btn btn-danger btn-sm" data-dismiss="modal"
        onclick="event.preventDefault(); document.getElementById('form-delete').submit();"
       >Hapus</button>`;
    $('#modal-footer').html(hapusButton);
  });
});

$(document).on('click', '#tambah', function() {
  let url = `{{ route('guru.data_pelajaran.create') }}`;
  /* change size modal */
  $('.modal-dialog').addClass('modal-lg');
  goAjaxGet(url).then(_ => {
    generateButton();
  });
})

$(document).on('click', '.detail', function() {
  let id = $(this).attr('id_target');
  let url = `{{ route('guru.data_pelajaran.detail') }}/${id}`;
  $('.modal-dialog').addClass('modal-lg');
  goAjaxGet(url).then(_ => {
    let tombol = `<button type="button" id="modal-close" class="btn btn-danger btn-sm" data-dismiss="modal">Close</button>`;
    $('#modal-footer').html(tombol);
  });
})
</script>
