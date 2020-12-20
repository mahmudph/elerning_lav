<script>
$(document).ready(function() {
  $('#datatable').DataTable({
		responsive: true,
		processing: true,
		serverSide: true,
        ajax: "{{ route('guru.data_mengerjakan.data', ($tugas->id ?? 0) ) }}",
        columnDefs: [
            {"className": "dt-center", "targets": ["detail", 'lihat_jawaban']}
        ],
		columns: [
			{ data: 'DT_RowIndex', orderable: false, searchable: false, className:'dt[-head|-body]-center'},
            { data: 'id_pelajaran', name:"id_pelajaran"},
            { data: 'id_siswa', name:'id_siswa'},
            { data: 'created_at', name: 'created_at', searchable: false},
            { data: 'lihat_jawaban', name: 'lihat_jawaban', searchable: false, className:'dt-center'},
            { data: 'nilai', name: 'nilai',searchable: false},
            { data: 'action', orderable: false, searchable: false}
		],
	});
});
</script>
