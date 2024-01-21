<script src="{{ asset('assets/template/assets/node_modules/jquery/jquery.min.js') }}"></script>
<script src="{{ asset('assets/template/assets/node_modules/bootstrap/js/bootstrap.bundle.min.js') }} "></script>
<script src="{{ asset('assets/template/html/js/perfect-scrollbar.jquery.min.js') }} "></script>
<script src="{{ asset('assets/template/html/js/waves.js') }} "></script>
<script src="{{ asset('assets/template/html/js/sidebarmenu.js') }} "></script>
<script src="{{ asset('assets/template/html/js/custom.min.js') }} "></script>
<script src="{{ asset('assets/template/assets/node_modules/raphael/raphael-min.js') }} "></script>
<script src="{{ asset('assets/template/assets/node_modules/morrisjs/morris.min.js') }} "></script>
<script src="{{ asset('assets/template/assets/node_modules/d3/d3.min.js') }} "></script>
<script src="{{ asset('assets/template/assets/node_modules/c3-master/c3.min.js') }} "></script>
<script src="{{ asset('assets/template/html/js/dashboard1.js') }} "></script>

{{-- Script --}}
<script>
    // Confirmation Dialog for Deleting Books
    function showDeleteConfirmation(bookId) {
        Swal.fire({
            title: 'Confirm Delete',
            text: 'Are you sure you want to delete this book?',
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#d33',
            cancelButtonColor: '#3085d6',
            confirmButtonText: 'Delete'
        }).then((result) => {
            if (result.isConfirmed) {
                // Create a form element dynamically
                var deleteForm = document.createElement('form');
                deleteForm.method = 'POST';
                deleteForm.action = '/library/' + bookId +
                '/deleteBook'; // Replace with your actual delete route
                deleteForm.style.display = 'none'; // Hide the form

                // Create CSRF token input
                var csrfTokenInput = document.createElement('input');
                csrfTokenInput.type = 'hidden';
                csrfTokenInput.name = '_token';
                csrfTokenInput.value = '{{ csrf_token() }}';

                // Create method override input for DELETE request
                var methodOverrideInput = document.createElement('input');
                methodOverrideInput.type = 'hidden';
                methodOverrideInput.name = '_method';
                methodOverrideInput.value = 'DELETE';

                // Append inputs to the form
                deleteForm.appendChild(csrfTokenInput);
                deleteForm.appendChild(methodOverrideInput);

                // Append form to the body
                document.body.appendChild(deleteForm);

                // Submit the form
                deleteForm.submit();
            }
        });
    }
</script>
