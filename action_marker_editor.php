<?php
if (isset($_POST['submit1'])) {
  echo '<script>
  $.ajax({
    type: "POST", url: "api/countries/create.php", dataType:"json", data: {name: "test1"},
    success: function(data) {
    },
    error:function (xhr, ajaxOptions, thrownError) {
      document.write(xhr.status);
      document.write(thrownError);
    }
  });
  </script>';
}
?>