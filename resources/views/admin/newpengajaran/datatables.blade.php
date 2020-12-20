<script>

$(document).ready(function() {
	$('#datatable').DataTable({
		responsive: true,
		processing: true,
		serverSide: true,
		ajax: "{{ route('admin.new-pengajaran.data')}}",
		columns: [
			{ data: 'DT_RowIndex', orderable: false, searchable: false},
			{ data: 'nama_kelas', name:'nama_kelas'},
            { data: 'nama_guru', name:'nama_guru'},
            { data: 'nama_pelajaran', name:'nama_pelajaran'},
			{ data: 'action',searchable: false, searchable: false},
		],
	});
});

</script>
