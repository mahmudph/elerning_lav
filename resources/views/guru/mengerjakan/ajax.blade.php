<script>

/* add custom button  */
let button = [
  `<button type="button" id="modal-close" class="btn btn-danger btn-sm" data-dismiss="modal">Close</button>`,
  `<button type="button" id="modal-save"  class="btn btn-info btn-sm" data-dismiss="modal">Simpan</button>`
];

/*
* options showuld be array with string type
* return void
*/
function generateButton(options = button) {

    /* add custom button */
    $('#modal-footer').html(options.join());
}

$(document).on("click",".edit",function() {
  /* get id target  */
  let id  = $(this).attr('id_target');

  /* change size modal */
  $('.modal-dialog').addClass('modal-lg');
  /* url  */
  let url = `{{ config('app.url')}}/guru/data_mengerjakan/${id}/edit`;
  /* request modal */
  goAjaxGet(url).then(_ => {
   generateButton();
  });
});

$(document).on('click', '.delete', function() {
  let id  = $(this).attr('id_target');
  let url = `{{ config('app.url')}}/guru/data_mengerjakan/${id}/delete`;

  /* request to api */
  goAjaxGet(url).then(_ => {
    let hapusButton = [
       `<button type="button" id="modal-hapus" class="btn btn-danger btn-sm" data-dismiss="modal"
        onclick="event.preventDefault(); document.getElementById('form-delete').submit();"
       >Hapus</button>`,
    ];
    generateButton(hapusButton);
  });

});

$(document).on('click', '.detail', function() {
    let id = $(this).attr('id_target');
  let url = `{{ route('guru.data_mengerjakan.detail') }}/ ${id}`;
  /* change size modal */
  $('.modal-dialog').addClass('modal-lg');

  goAjaxGet(url).then(_ => {
    let tombol = `<button type="button" id="modal-close" class="btn btn-danger btn-sm" data-dismiss="modal">Close</button>`;

    /* add custom button */
    $('#modal-footer').html(tombol);
  });
})

</script>
