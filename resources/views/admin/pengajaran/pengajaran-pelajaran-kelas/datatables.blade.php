<script>
$(document).ready(function() {
  $('#datatable').DataTable({
		responsive: true,
		processing: true,
		serverSide: true,
		ajax: "{{ route('admin.pengajaran-pelajaran-kelas.data') }}",
		columns: [
			{ data: 'DT_RowIndex', orderable: false, searchable: false},
			{ data: 'nama_kelas', name:'nama_kelas'},
      { data: 'detail',searchable: false, searchable: false},
		],
	});
});
</script>