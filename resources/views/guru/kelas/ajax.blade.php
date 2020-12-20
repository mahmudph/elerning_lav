<script>



/* 
* options showuld be array with string type 
* return void
*/
function generateButton(type = 'save') {
  /* add custom button  */
  let button = [
    `<button type="button" id="modal-close" class="btn btn-danger btn-sm" data-dismiss="modal">Close</button>`,
    `<button type="button" id="modal-${type}"  class="btn btn-info btn-sm">Simpan</button>`
  ]; 

    /* add custom button */
    $('#modal-footer').html(button.join());
}

$(document).on("click",".edit",function() {
  /* get id target  */
  let id  = $(this).attr('id_target');

  /* change size modal */
  $('.modal-dialog').addClass('modal-lg');
  $('#msg-content').hide();
  /* url  */
  let url = `{{ config('app.url')}}/admin/kelas/${id}/edit`;
  /* request modal */
  goAjaxGet(url).then(_ => {
   generateButton('edit');
  });
});

$(document).on('click', '.delete', function() {
  let id  = $(this).attr('id_target');
  let url = `{{ config('app.url')}}/admin/kelas/${id}/delete`;

  /* request to api */
  goAjaxGet(url).then(_ => {
    let hapusButton = [
       `<button type="button" id="modal-hapus" class="btn btn-danger btn-sm" data-dismiss="modal" 
        onclick="event.preventDefault(); document.getElementById('form-delete').submit();"
       >Hapus</button>`,
    ];
    $('#modal-footer').html(hapusButton.join());
  });
  
});

$(document).on('click', '#tambah', function() {
  let url = `{{ route('admin.kelas.create') }}`;
  /* change size modal */
  $('.modal-dialog').addClass('modal-lg');
  $('#msg-content').hide();

  goAjaxGet(url).then(_ => {
    generateButton();
  });
})

</script>