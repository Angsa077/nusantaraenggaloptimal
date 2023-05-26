<footer class="footer">
    <div class="container-fluid">
        <div class="row text-muted">
            <div class="col-12 text-end">
                <p class="mb-0">
                    <a class="text-muted" href="#" target="_blank"><strong>Nusantara Enggal Optimal</strong></a> &copy;
                </p>
            </div>
        </div>
    </div>
</footer>
</div>
</div>
<script src="{{ url('adminkit/static/js/feather-icons/feather.min.js') }}"></script>
<script src="{{ url('adminkit/static/js/app.js') }}"></script>
<script src="{{ url('adminkit/static/js/main.js') }}"></script>
<script src="{{ url('adminkit/static/js/vendors.js') }}"></script>
<script src="https://code.jquery.com/jquery-3.6.4.min.js"
    integrity="sha256-oP6HI9z1XaZNBrJURtCoUT5SUnxFr8s3BzRl+cbzUq8=" crossorigin="anonymous"></script>
<script src="//cdn.datatables.net/1.13.4/js/jquery.dataTables.min.js"></script>

<script>
    $(function(){
        $.ajaxSetup({
            headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') }
        });
        $(function(){

            //pilih kabupaten
            $('#provinsi').on('change',function(){
                let id_provinsi = $('#provinsi').val();
                $.ajax({
                    type : 'POST',
                    url : "{{ route('getkabupaten') }}",
                    data : {id_provinsi:id_provinsi},
                    cache : false,
                    success: function(msg){
                        $('#kabupaten').html(msg);
                        $('#kecamatan').html('');
                        $('#desa').html('');
                    },
                    error: function(data){
                        console.log('error:',data)
                    },
                })
            })

            //pilih kecamatan
            $('#kabupaten').on('change',function(){
                let id_kabupaten = $('#kabupaten').val();
                $.ajax({
                    type : 'POST',
                    url : "{{ route('getkecamatan') }}",
                    data : {id_kabupaten:id_kabupaten},
                    cache : false,
                    success: function(msg){
                        $('#kecamatan').html(msg);
                        $('#desa').html('');
                    },
                    error: function(data){
                        console.log('error:',data)
                    },
                })
            })

            //pilih desa
            $('#kecamatan').on('change',function(){
                let id_kecamatan = $('#kecamatan').val();
                $.ajax({
                    type : 'POST',
                    url : "{{ route('getdesa') }}",
                    data : {id_kecamatan:id_kecamatan},
                    cache : false,
                    success: function(msg){
                        $('#desa').html(msg);
                    },
                    error: function(data){
                        console.log('error:',data)
                    },
                })
            })
            
        })
    });
</script>

<script>
    $(document).ready(function() {
        $('#myTable').DataTable({
            "lengthMenu": [[10, 25, 50, 100, -1], [10, 25, 50, 100, "All"]],
            "language": {
                "paginate": {
                    "previous": '<i class="fas fa-chevron-left text-white"></i>',
                    "next": '<i class="fas fa-chevron-right text-white"></i>',
                }
            },
        });
    });
</script>