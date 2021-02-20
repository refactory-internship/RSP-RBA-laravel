{{--Modal--}}
<div class="modal fade" id="staticBackdrop" data-bs-backdrop="static"
     data-bs-keyboard="false"
     tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title text-danger" id="staticBackdropLabel">Delete
                    Confirmation</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal"
                        aria-label="Close"></button>
            </div>
            <form id="permanentDelete" action="" method="post">
                @csrf
                @method('DELETE')
                <div class="modal-body">
                    Are you sure want to cancel this booking?
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-outline-secondary"
                            data-bs-dismiss="modal">
                        Close
                    </button>
                    <button type="submit" class="btn btn-outline-danger">
                        Yes, Cancel This Booking
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>
{{--End Modal--}}
