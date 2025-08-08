@if(session('success') || session('error'))
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            @if(session('success'))
                Swal.fire({
                    toast: true,
                    position: 'top-end',
                    icon: 'success',
                    title: @json(session('success')),
                    showConfirmButton: false,
                    timer: 3000,
                    timerProgressBar: true,
                });
            @endif

            @if(session('error'))
                Swal.fire({
                    toast: true,
                    position: 'top-end',
                    icon: 'error',
                    title: @json(session('error')),
                    showConfirmButton: false,
                    timer: 3000,
                    timerProgressBar: true,
                });
            @endif

            // @if($errors->any())
            //     Swal.fire({
            //         toast: true,
            //         position: 'top-end',
            //         icon: 'error',
            //         title: 'There are form errors.',
            //         showConfirmButton: false,
            //         timer: 3000,
            //         timerProgressBar: true,
            //     });
            // @endif
        });
    </script>
@endif
