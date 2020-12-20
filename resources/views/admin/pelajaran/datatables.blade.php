<script>

/* default url  */
let defaultUrl = "{{ route('admin.pelajaran.data')}}";

function getDataTablesPelajaran(url = defaultUrl) {
	$(document).ready(function() {
		$('#datatable').DataTable({
			responsive: true,
			processing: true,
			serverSide: true,
			ajax: url,
			columns: [
				{ data: 'DT_RowIndex', orderable: false, searchable: false},
				{ data: 'nama_pelajaran', name:'nama_pelajaran'},
				{ data: 'action', orderable: false, searchable: false}
			],
		});
	});
}
</script>