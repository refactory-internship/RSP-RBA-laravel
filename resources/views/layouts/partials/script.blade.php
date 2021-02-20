<!-- Scripts -->
<script src="{{ asset('js/app.js') }}" defer></script>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-b5kHyXgcpbZJO/tY9Ul7kGkf1S0CWuKcCD38l8YkeH8z8QjE0GmW1gYU5S9FOnJ0"
        crossorigin="anonymous"></script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"
        integrity="sha512-bLT0Qm9VnAYZDflyKcBaQ2gg0hSYNQrJ8RilYldYQ1FxQYoCLtUjuuRuZo+fjqhx/qtq/1itJ0C2ejDxltZVFg=="
        crossorigin="anonymous"></script>

<script>
    if (document.getElementById('staticBackdrop')) {
        const exampleModal = document.getElementById('staticBackdrop');
        exampleModal.addEventListener('show.bs.modal', function (event) {
            const button = event.relatedTarget;
            const form = exampleModal.querySelector('#permanentDelete').action = button.getAttribute('data-bs-url');
            console.log(form, '(delete)');
        });
    }
    if (document.getElementById('editPhotoModal')) {
        const editPhotoModal = document.getElementById('editPhotoModal');
        editPhotoModal.addEventListener('show.bs.modal', function (event) {
            const button = event.relatedTarget;
            const form = editPhotoModal.querySelector('#photoUpdateForm').action = button.getAttribute('data-bs-url');
            console.log(form, '(update)');
        });
    }
</script>
