<div class="container">
  <div class="row">
      <div class="col-md-3">&nbsp;</div>
      <div class="col-md-6">
          <select name="select_box" class="form-select" id="select_box">
              <option value="">Обери область</option>
              <?php 
              foreach($cities as $city)
              {
                  echo '<option value="'.$city["city"].'">'.$city["city"].'</option>';
              }
              ?>  
          </select>
      </div>
      <div class="col-md-3">&nbsp;</div>
  </div>      
  <br />
  <br />
</div>
</body>
</html>

<script>

var select_box_element = document.querySelector('#select_box');

dselect(select_box_element, {
search: true
});

</script>


