        </div> <!-- End admin-content -->
    </div> <!-- End admin-main -->

    <!-- Core Scripts -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

    <!-- Global Admin Scripts for AJAX Handling & Security -->
    <script>
        // Global Axios defaults for CSRF (if implemented later)
        // axios.defaults.headers.common['X-CSRF-TOKEN'] = '...';

        // Helper function for AJAX Form Submissions with Progress Bar
        function submitFormAjax(formId, endpoint, successRedirect) {
            const form = document.getElementById(formId);
            if (!form) return;

            form.addEventListener('submit', function(e) {
                e.preventDefault();
                
                // Show progress wrapper
                const progressWrapper = document.getElementById('upload-progress-wrapper');
                const progressBar = document.getElementById('upload-progress-bar');
                const submitBtn = form.querySelector('button[type="submit"]');
                
                if (progressWrapper) progressWrapper.style.display = 'block';
                if (submitBtn) {
                    submitBtn.disabled = true;
                    submitBtn.innerHTML = '<i class="fas fa-spinner fa-spin"></i> Processing...';
                }

                const formData = new FormData(form);

                axios.post(endpoint, formData, {
                    onUploadProgress: function(progressEvent) {
                        if (progressBar) {
                            const percentCompleted = Math.round((progressEvent.loaded * 100) / progressEvent.total);
                            progressBar.style.width = percentCompleted + '%';
                            progressBar.textContent = percentCompleted + '%';
                        }
                    }
                })
                .then(function(response) {
                    if (response.data.status === 'success') {
                        Swal.fire({
                            icon: 'success',
                            title: 'Success!',
                            text: response.data.message,
                            timer: 2000,
                            showConfirmButton: false
                        }).then(() => {
                            if(successRedirect) window.location.href = successRedirect;
                        });
                    } else {
                        Swal.fire('Error', response.data.message || 'An error occurred.', 'error');
                        if (submitBtn) {
                            submitBtn.disabled = false;
                            submitBtn.innerHTML = 'Save Changes';
                        }
                    }
                })
                .catch(function(error) {
                    Swal.fire('Error', 'Server communication failed.', 'error');
                    console.error(error);
                    if (submitBtn) {
                        submitBtn.disabled = false;
                        submitBtn.innerHTML = 'Save Changes';
                    }
                })
                .finally(function() {
                    if (progressWrapper) {
                        setTimeout(() => { progressWrapper.style.display = 'none'; }, 1000);
                    }
                });
            });
        }

        // Helper function for individual image deletion
        function deleteSingleImage(imageId, entityType, buttonElement) {
            Swal.fire({
                title: 'Delete Image?',
                text: "You won't be able to revert this!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#d33',
                cancelButtonColor: '#3085d6',
                confirmButtonText: 'Yes, delete it!'
            }).then((result) => {
                if (result.isConfirmed) {
                    axios.post('delete_single_image.php', {
                        id: imageId,
                        type: entityType
                    })
                    .then(function(response) {
                        if (response.data.status === 'success') {
                            // Remove the image element from the DOM
                            buttonElement.closest('.image-edit-item').remove();
                            Swal.fire('Deleted!', 'The image has been deleted.', 'success');
                        } else {
                            Swal.fire('Error', response.data.message, 'error');
                        }
                    })
                    .catch(function(error) {
                        Swal.fire('Error', 'Failed to delete image.', 'error');
                    });
                }
            });
        }
        
        // Helper function for generic record deletion
        function deleteRecord(id, endpoint, reloadUrl) {
            Swal.fire({
                title: 'Are you sure?',
                text: "This action cannot be undone!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#d33',
                cancelButtonColor: '#3085d6',
                confirmButtonText: 'Yes, delete it!'
            }).then((result) => {
                if (result.isConfirmed) {
                    axios.post(endpoint, { id: id })
                    .then(response => {
                        if (response.data.status === 'success') {
                            Swal.fire('Deleted!', response.data.message, 'success')
                            .then(() => window.location.href = reloadUrl);
                        } else {
                            Swal.fire('Error', response.data.message, 'error');
                        }
                    })
                    .catch(err => Swal.fire('Error', 'Server error.', 'error'));
                }
            });
        }
    </script>
</body>
</html>
