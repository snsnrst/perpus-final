<div class="btn-group" role="group">
   <a href="{{ $edit_url }}" class="btn btn-sm btn-warning">Edit</a> &nbsp;&nbsp;
   <button type="button" class="btn btn-sm btn-danger" onclick="deleteData('{{ $form_url }}')">Delete</button>
</div>

<script>
function deleteData(url) {
   Swal.fire({
       title: 'Apakah Anda Yakin?',
       text: "Data yang dihapus tidak dapat dikembalikan!",
       icon: 'warning',
       showCancelButton: true,
       confirmButtonColor: '#3085d6',
       cancelButtonColor: '#d33',
       confirmButtonText: 'Ya, Hapus!'
   }).then((result) => {
       if (result.isConfirmed) {
           $.ajax({
               url: url,
               type: 'DELETE',
               dataType: 'json',
               success: function(data) {
                   if (data.status == 'success') {
                       Swal.fire({
                           title: 'Sukses!',
                           text: data.message,
                           icon: 'success',
                           timer: 1500
                       }).then((result) => {
                           location.reload();
                       });
                   } else {
                       Swal.fire({
                           title: 'Gagal!',
                           text: data.message,
                           icon: 'error',
                           timer: 1500
                       });
                   }
               }
           });
       }
   });
}
</script>
