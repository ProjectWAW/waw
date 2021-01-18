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
      objXMLHttpRequest.send('{\"name\": \"".$_POST['name']."\",\"government\": \"".$_POST['government']."\",\"headOfState\": \"".$_POST['hos']."\",\"headOfGovernment\": \"".$_POST['hog']."\",\"party\": \"".$_POST['party']."\",\"status\": \"".$_POST['status']."\",\"capital\": \"".$_POST['capital']."\"}');
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
       objXMLHttpRequest.send('{\"country\": \"".$_POST['country']."\",\"cssClass\": \"".$_POST['icon']."\",\"date\": \"".$_POST['date']."\",\"location\": [".$_POST['location']."],\"marker\": \"".$_POST['colour_and_icon']."\",\"pageWeight\": ".$_POST['position'].",\"source\": \"".$_POST['source']."\",\"text\": \"".$_POST['information']."\"}');
     });
   }
 
   AjaxCall().then(
     data => { console.log('Success Response: ' + data) },
     error => { console.log(error) }
   );
   </script>";
 }

if (isset($_POST['submit3'])) {
  if ($_POST['source_type'] == "website") {
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
 
       objXMLHttpRequest.open('POST', 'api/sources/create.php');
       objXMLHttpRequest.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
       objXMLHttpRequest.send('{\"author\": \"".$_POST['source_author']."\",\"publishDate\": \"".$_POST['source_date_published']."\",\"publisher\": \"".$_POST['source_publisher']."\",\"title\": \"".$_POST['source_title']."\",\"type\": \"".$_POST['source_type']."\",\"url\": \"".$_POST['url']."\"}');
     });
   }
 
   AjaxCall().then(
     data => { console.log('Success Response: ' + data) },
     error => { console.log(error) }
   );
   </script>";
  } else {
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
 
       objXMLHttpRequest.open('POST', 'api/sources/create.php');
       objXMLHttpRequest.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
       objXMLHttpRequest.send('{\"author\": \"".$_POST['source_author']."\",\"publishDate\": \"".$_POST['source_date_published']."\",\"publisher\": \"".$_POST['source_publisher']."\",\"title\": \"".$_POST['source_title']."\",\"type\": \"".$_POST['source_type']."\",\"url\": \"/\"}');
     });
   }
 
   AjaxCall().then(
     data => { console.log('Success Response: ' + data) },
     error => { console.log(error) }
   );
   </script>";
  }
 }
?>
