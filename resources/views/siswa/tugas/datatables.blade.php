<script>
$(document).ready(function() {
  $('#datatable').DataTable({
		responsive: true,
		processing: true,
		serverSide: true,
		ajax: "{{ route('siswa.data_tugas.data',['id_kelas' => $id_kelas, 'id_pengajaran' => $id_pengajaran ]) }}",
		columns: [
			{ data: 'DT_RowIndex', orderable: false, searchable: false},
			{ data: 'nama_tugas', name:'nama_tugas'},
            { data: 'created_at', name: 'created_at'},
            { data: 'dikerjakan', name: 'dikerjakan', 'className': 'dt-center'},
            { data: 'nilai', name: 'nilai','className': 'dt-center'},
            { data: 'keterangan', searchable:false, 'className': 'dt-center'},
            { data: 'action', orderable: false, searchable: false}
		],
	});
});
</script>
