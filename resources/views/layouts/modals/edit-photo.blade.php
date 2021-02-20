{{--Edit Photo Modal--}}
<div class="modal fade" id="editPhotoModal" tabindex="-1"
     aria-labelledby="editPhotoModalLabel" aria-hidden="true"
     data-bs-backdrop="static"
     data-bs-keyboard="false">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="editPhotoModalLabel">
                    Edit {{ $room->room_name }} Room Photos
                </h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal"
                        aria-label="Close">
                </button>
            </div>
            <form id="photoUpdateForm" action="" method="post" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="modal-body">
                    <label for="photoUpdate">Update Photo</label>
                    <div class="input-group mb-3">
                        <input class="form-control"
                               type="file"
                               id="photoUpdate" name="photo">
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-outline-secondary"
                            data-bs-dismiss="modal">
                        Close
                    </button>
                    <button type="submit" class="btn btn-primary">
                        Update
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>
{{--End Edit Photo Modal--}}
