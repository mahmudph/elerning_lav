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



$(document).on("click",".tambah",function() {
  /* get id target  */
  let id  = $(this).attr('id_target');

  /* change size modal */
  $('.modal-dialog').addClass('modal-lg');
  let url = `{{ config('app.url') }}/siswa/data_tugas/${id}/edit`;
  /* request modal */
  goAjaxGet(url).then(_ => {
   generateButton();
  });
});

$(document).on("click",".detail",function() {
  /* get id target  */
  let id  = $(this).attr('id_target');

  /* change size modal */
  $('.modal-dialog').addClass('modal-xs');
  let url = `{{ config('app.url') }}/siswa/data_tugas/${id}`;
  /* request modal */
  goAjaxGet(url).then(_ => {
    let button = `<button type="button" id="modal-close" class="btn btn-danger btn-sm" data-dismiss="modal">Close</button>`;
    $('#modal-footer').html(button);
  });
});

</script>
