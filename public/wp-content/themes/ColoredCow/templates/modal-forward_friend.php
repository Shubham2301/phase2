<!-- Modal -->
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title" id="myModalLabel">Forward this event to a friend via Email</h4>
              </div>
              <div class="modal-body">
                    <form class="forward-form" id="forward-form">
                           <input type="hidden" name="eventID" value="<?php the_ID(); ?>">
                            <input type="hidden" value="share_with_friend" name="action">
                        <div>
                            <label for="guest_name">YOUR NAME</label>
                            <input type="text" class="form-control" name="guest_name" id="guest_id" required>
                        </div>
                        <div>
                            <label for="guest_email">YOUR EMAIL</label>
                            <input type="email" class="form-control" name="guest_email" id="guest_id" required>
                        </div>
                        <div>
                            <label for="friend_name">FRIEND'S NAME</label>
                            <input type="text" class="form-control" name="friend_name" id="friend_id" required>
                        </div>
                        <div>
                            <label for="friend_email">FRIEND'S EMAIL</label>
                            <input type="email" class="form-control" name="friend_email" id="friend_id" required>
                        </div>
                    </form>
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary" id="forward2friend">Share</button>
              </div>
        </div>
    </div>
</div>  