<footer class="footer">
    <div class="container-fluid">
        <div class="row text-muted">
            <div class="col-12 text-end">
                <p class="mb-0">
                    <a class="text-muted" href="#" target="_blank"><strong>Nusantara Enggal Optimal</strong></a>
                    &copy;
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
<script src="https://code.jquery.com/jquery-3.4.1.slim.min.js"
    integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous">
</script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"
    integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous">
</script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/js/bootstrap.min.js"
    integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous">
</script>
<script src="https://code.jquery.com/jquery-3.6.4.min.js"
    integrity="sha256-oP6HI9z1XaZNBrJURtCoUT5SUnxFr8s3BzRl+cbzUq8=" crossorigin="anonymous"></script>
<script src="//cdn.datatables.net/1.13.4/js/jquery.dataTables.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"
    integrity="sha512-VEd+nq25CkR676O+pLBnDW09R7VQX9Mdiij052gVCp5yVH3jGtH70Ho/UUv4mJDsEdTvqRCFZg0NKGiojGnUCw=="
    crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>

@if (Session::has('success'))
    <script>
        toastr.options = {
            "progressBar": true,
            "closeButton": true,
        }
        toastr.success("{{ Session::get('success') }}")
    </script>
@endif

@if (Session::has('error'))
    <script>
        toastr.options = {
            "progressBar": true,
            "closeButton": true,
        }
        toastr.error("{{ Session::get('error') }}")
    </script>
@endif

<script>
    $(function() {
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        $(function() {

            //pilih kabupaten
            $('#provinsi').on('change', function() {
                let id_provinsi = $('#provinsi').val();
                $.ajax({
                    type: 'POST',
                    url: "{{ route('getkabupaten') }}",
                    data: {
                        id_provinsi: id_provinsi
                    },
                    cache: false,
                    success: function(msg) {
                        $('#kabupaten').html(msg);
                        $('#kecamatan').html('');
                        $('#desa').html('');
                    },
                    error: function(data) {
                        console.log('error:', data)
                    },
                })
            })

            //pilih kecamatan
            $('#kabupaten').on('change', function() {
                let id_kabupaten = $('#kabupaten').val();
                $.ajax({
                    type: 'POST',
                    url: "{{ route('getkecamatan') }}",
                    data: {
                        id_kabupaten: id_kabupaten
                    },
                    cache: false,
                    success: function(msg) {
                        $('#kecamatan').html(msg);
                        $('#desa').html('');
                    },
                    error: function(data) {
                        console.log('error:', data)
                    },
                })
            })

            //pilih desa
            $('#kecamatan').on('change', function() {
                let id_kecamatan = $('#kecamatan').val();
                $.ajax({
                    type: 'POST',
                    url: "{{ route('getdesa') }}",
                    data: {
                        id_kecamatan: id_kecamatan
                    },
                    cache: false,
                    success: function(msg) {
                        $('#desa').html(msg);
                    },
                    error: function(data) {
                        console.log('error:', data)
                    },
                })
            })

        })
    });
</script>

<script>
    $(document).ready(function() {
        $('#myTable').DataTable({
            "lengthMenu": [
                [10, 25, 50, 100, -1],
                [10, 25, 50, 100, "All"]
            ],
            "language": {
                "paginate": {
                    "previous": '<i class="fas fa-chevron-left text-white"></i>',
                    "next": '<i class="fas fa-chevron-right text-white"></i>',
                }
            },
        });
    });
</script>

<script>
    $(document).ready(function() {
        $('#barangTable').DataTable({
            "lengthMenu": [
                [10, 25, 50, 100, -1],
                [10, 25, 50, 100, "All"]
            ],
            "language": {
                "paginate": {
                    "previous": '<i class="fas fa-chevron-left text-white"></i>',
                    "next": '<i class="fas fa-chevron-right text-white"></i>',
                }
            },
        });
    });
</script>

<script>
    $(document).ready(function() {
        $('#customerTable').DataTable({
            "lengthMenu": [
                [10, 25, 50, 100, -1],
                [10, 25, 50, 100, "All"]
            ],
            "language": {
                "paginate": {
                    "previous": '<i class="fas fa-chevron-left text-white"></i>',
                    "next": '<i class="fas fa-chevron-right text-white"></i>',
                }
            },
        });
    });
</script>

<script>
    $(document).ready(function() {
        $('#penjualanTable').DataTable({
            "lengthMenu": [
                [10, 25, 50, 100, -1],
                [10, 25, 50, 100, "All"]
            ],
            "language": {
                "paginate": {
                    "previous": '<i class="fas fa-chevron-left text-white"></i>',
                    "next": '<i class="fas fa-chevron-right text-white"></i>',
                }
            },
        });
    });
</script>

<script>
    $(document).ready(function() {
        $('#ReviewPenjualanTable').DataTable({
            "lengthMenu": [
                [10, 25, 50, 100, -1],
                [10, 25, 50, 100, "All"]
            ],
            "language": {
                "paginate": {
                    "previous": '<i class="fas fa-chevron-left text-white"></i>',
                    "next": '<i class="fas fa-chevron-right text-white"></i>',
                }
            },
        });
    });
</script>

<script>
    function showNotification() {
        Swal.fire({
            title: 'Notifikasi',
            text: 'Data telah ditambahkan pada tabel',
            icon: 'success',
            showConfirmButton: false,
            timer: 2000 // Durasi tampilan notifikasi dalam milidetik (misal: 2000 untuk 2 detik)
        });
    }
</script>


<script>
    // Function to format number with thousands separators
    function formatNumberWithCommas(number) {
        return number.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ".");
    }

    // Function to remove commas and non-numeric characters
    function removeNonNumeric(inputValue) {
        return inputValue.replace(/[^0-9]/g, '');
    }

    $(document).ready(function() {
        // Listen for input changes
        $('#harga_jual').on('input', function() {
            // Get the input value
            let inputValue = $(this).val();

            // Remove non-numeric characters
            let numericValue = removeNonNumeric(inputValue);

            // Format the number with thousands separators
            let formattedValue = formatNumberWithCommas(numericValue);

            // Update the input field with the formatted value
            $(this).val(formattedValue);
        });

        // When the page loads, format the initial value (if any)
        let initialValue = $('#harga_jual').val();
        if (initialValue !== '') {
            let numericValue = removeNonNumeric(initialValue);
            let formattedValue = formatNumberWithCommas(numericValue);
            $('#harga_jual').val(formattedValue);
        }
    });
</script>

<script>
    // Function to format number with thousands separators
    function formatNumberWithCommas(number) {
        return number.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ".");
    }

    // Function to remove commas and non-numeric characters
    function removeNonNumeric(inputValue) {
        return inputValue.replace(/[^0-9]/g, '');
    }

    $(document).ready(function() {
        // Listen for input changes
        $('#harga_beli').on('input', function() {
            // Get the input value
            let inputValue = $(this).val();

            // Remove non-numeric characters
            let numericValue = removeNonNumeric(inputValue);

            // Format the number with thousands separators
            let formattedValue = formatNumberWithCommas(numericValue);

            // Update the input field with the formatted value
            $(this).val(formattedValue);
        });

        // When the page loads, format the initial value (if any)
        let initialValue = $('#harga_beli').val();
        if (initialValue !== '') {
            let numericValue = removeNonNumeric(initialValue);
            let formattedValue = formatNumberWithCommas(numericValue);
            $('#harga_beli').val(formattedValue);
        }
    });
</script>