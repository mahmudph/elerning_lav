<script>
$(document).ready(function() {
  $('#datatable').DataTable({
		responsive: true,
		processing: true,
		serverSide: true,
		ajax: "{{ route('guru.data_pelajaran.data', $id_kelas) }}",
		columns: [
			{ data: 'DT_RowIndex', orderable: false, searchable: false},
			{ data: 'nama_pelajaran', name:'nama_pelajaran'},
            { data: 'detail', searchable: false, className:'dt-center'},
		],
	});
});
</script>
