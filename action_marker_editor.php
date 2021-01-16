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
      objXMLHttpRequest.send('{\"name\": \"".$_POST['name']."\",\"government\": \"".$_POST['government']."\",\"headOfState\": \"".$_POST['hos']."\",\"headOfGovernment\": \"".$_POST['hog']."\",\"party\": \"".$_POST['party']."\",\"status\": \"".$_POST['status']."\",\"Capital\": \"".$_POST['capital']."\"}');
    });
  }

  AjaxCall().then(
    data => { console.log('Success Response: ' + data) },
    error => { console.log(error) }
  );
  </script>";
}

if (isset($_POST['submit2'])) {
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
 
       objXMLHttpRequest.open('POST', 'api/events/create.php');
       objXMLHttpRequest.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
       objXMLHttpRequest.send('{\"conflict\": \"".$_POST['conflict']."\",\"country\": \"".$_POST['country']."\",\"cssClass\": \"".$_POST['icon']."\",\"date\": \"".$_POST['date']."\",\"location\": [".$_POST['location']."],\"marker\": \"".$_POST['colour_and_icon']."\",\"pageWeight\": ".$_POST['position'].",\"source\": \"".$_POST['source']."\",\"text\": \"".$_POST['information']."\"}');
     });
   }
 
   AjaxCall().then(
     data => { console.log('Success Response: ' + data) },
     error => { console.log(error) }
   );
   </script>";
 }
?>
