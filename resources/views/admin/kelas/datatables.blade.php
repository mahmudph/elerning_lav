<script>
$(document).ready(function() {
  $('#datatable').DataTable({
		responsive: true,
		processing: true,
		serverSide: true,
		ajax: "{{ route('admin.kelas.data') }}",
		columns: [
			{ data: 'DT_RowIndex', orderable: false, searchable: false},
			{ data: 'nama_kelas', name:'nama_kelas'},
			{ data: 'jumlah_bangku', name:'jumlah_bangku'},
      { data: 'jumlah_kursi', name:'jumlah_kursi'},
      { data: 'action', orderable: false, searchable: false}
		],
	});
});
</script>