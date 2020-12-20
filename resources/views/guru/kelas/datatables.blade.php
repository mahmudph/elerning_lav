<script>
$(document).ready(function() {
  $('#datatable').DataTable({
		responsive: true,
		processing: true,
		serverSide: true,
		ajax: "{{ route('guru.data_kelas.data') }}",
		columns: [
			{ data: 'DT_RowIndex', orderable: false, searchable: false},
			{ data: 'nama_kelas', name:'nama_kelas'},
            { data: 'detail', orderable: false, searchable: false, className:'dt-center'}
		],
	});
});
</script>
