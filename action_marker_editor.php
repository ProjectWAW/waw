<?php
if (isset($_POST['submit1'])) {
 echo "<script>
  function AjaxCall() {
    return new Promise(function (resolve, reject) {
      const objXMLHttpRequest = new XMLHttpRequest();

      objXMLHttpRequest.onreadystatechange = function () {
        if (objXMLHttpRequest.readyState === 4) {
          if (objXMLHttpRequest.status === 200) {
            resolve(objXMLHttpRequest.responseText);
          } else {
            reject('Error Code: ' + objXMLHttpRequest.status + ' Error Message: ' + objXMLHttpRequest.statusText);
          }
        }
      };

      objXMLHttpRequest.open('POST', 'api/countries/create.php');
      objXMLHttpRequest.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
      objXMLHttpRequest.send('{\"government\": \"Da gobment\",\"headOfGovernment\": \"Sample\",\"name\": \"Boop\",\"party\": \"yadda yadda\",\"status\": \"Booping\"}');
    });
  }

  AjaxCall().then(
    data => { console.log('Success Response: ' + data) },
    error => { console.log(error) }
  );
  </script>";
}
?>
