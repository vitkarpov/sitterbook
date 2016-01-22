<?php include '_partials/header.php'; ?>

<h1>Поиск актеров по фамилии</h1>

<div class="jumbotron">
  <form id="actor-selection" class="dropdown" action="index.php" method="POST">
    <select class="btn btn-default dropdown-toggle" name="q" id="q">
      <?php
      $alphabet = str_split('abcdefghijklmnopqrstuvwxyz');
      foreach($alphabet as $letter) {
        echo "<option value='$letter'>$letter</option>";
      }
      ?>
    </select>

    <button class="btn btn-success" type="submit">Искать</button>
  </form>

  <hr>

  <div class="alert alert-success">
    <table class="table">
      <thead>
        <tr>
          <td><strong>Имя</strong></td>
          <td><strong>Фамилия</strong></td>
        </tr>
      </thead>
      <tbody>
        <?php
        if( isset($actors) ) {
          foreach( $actors as $a ) {
            echo "<tr>";

              echo "<td data-actor_id=\"{$a->actor_id}\">"
                    ."<a href=\"actor.php?actor_id={$a->actor_id}\">"
                    .$a->first_name
                    ."</a>"
                   ."</td>";

              echo "<td data-actor_id=\"{$a->actor_id}\">"
                   ."<a href=\"actor.php?actor_id={$a->actor_id}\">"
                   .$a->last_name
                   ."</a>"
                   ."</td>";

            echo "</tr>";
          }
        }
        ?>

        <script id="actor_list_template" type="text/x-handlebars-template">
          {{#each this}}
          <tr>
            <td data-actor_id="{{actor_id}}">
              <a href="actor.php?actor_id={{actor_id}}">
                {{first_name}}
              </a>
            </td>
            <td data-actor_id="{{actor_id}}">
              <a href="actor.php?actor_id={{actor_id}}">
                {{last_name}}
              </a>
            </td>
          </tr>
          {{/each}}
        </script>
      </tbody>
    </table>
  </div>

  <!-- <div class="alert alert-warning">
    <p>Ничего не найдено!</p>
  </div> -->

</div>

<?php include '_partials/footer.php'; ?>

<div class="modal fade" tabindex="-1" role="dialog">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title">Modal title</h4>
      </div>
      <div class="modal-body actor-info">
        <script id="actor_info_template" type="text/x-handlebars-template">
          <p>{{info}}</p>
        </script>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Save changes</button>
      </div>
    </div><!-- /.modal-content -->
  </div><!-- /.modal-dialog -->
</div><!-- /.modal -->
