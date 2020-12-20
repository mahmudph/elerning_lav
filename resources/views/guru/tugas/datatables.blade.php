<script>
$(document).ready(function() {
  $('#datatable').DataTable({
		responsive: true,
		processing: true,
		serverSide: true,
		ajax: "{{ route('guru.data_tugas.data', $pelajaran->id) }}",
		columns: [
			{ data: 'DT_RowIndex', orderable: false, searchable: false},
			{ data: 'nama_tugas', name:'nama_tugas'},
            { data: 'lihat_soal', name:"lihat_soal", className:'dt-center'},
            { data: 'created_at', name: 'created_at'},
            { data: 'detail', searchable: false, className:'dt-center'},
            { data: 'action', orderable: false, searchable: false}
		],
	});
});
</script>
