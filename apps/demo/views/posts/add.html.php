<?php if ( $success ): ?>
	<p>Post Successfully Saved</p>
<?php endif; ?>



	<form action="/posts/add" method="post">
        <fieldset>
          <legend>Add a new Post</legend>
          <div class="clearfix">
            <label for="title">Title</label>
            <div class="input">
              <input type="text" size="30" name="title" id="title" class="xlarge" />
            </div>
          </div><!-- /clearfix -->


          <div class="clearfix">
            <label for="body">Body</label>
            <div class="input">
              <textarea rows="3" name="body" id="body" class="xxlarge"></textarea>
              <span class="help-block">
                Block of help text to describe the field above if need be.
              </span>
            </div>
          </div><!-- /clearfix -->

          <div class="actions">
            <input type="submit" value="  Save  " class="btn primary" />&nbsp;<button class="btn" type="reset">Cancel</button>
          </div>
        </fieldset>
      </form>
