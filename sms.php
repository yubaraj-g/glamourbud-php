<?php 

// this does not work because FAST2SMS has a transaction amount of 100rs before starting. We have to pay that first.

$curl = curl_init();

curl_setopt_array($curl, array(
  CURLOPT_URL => "https://www.fast2sms.com/dev/bulkV2?authorization=dQolENJRPqFTB5p3GyAHsxMhnKO9kw4uZi2UgD6XLjfCbz7at8u6xg7OPUdZiWQcHVpw92lojFSBAIkD&message=".urlencode('Message From GlamourBUD. Your booking has been Completed.')."&language=english&route=q&numbers=".urlencode('8721894413'),
  CURLOPT_RETURNTRANSFER => true,
  CURLOPT_ENCODING => "",
  CURLOPT_MAXREDIRS => 10,
  CURLOPT_TIMEOUT => 30,
  CURLOPT_SSL_VERIFYHOST => 0,
  CURLOPT_SSL_VERIFYPEER => 0,
  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
  CURLOPT_CUSTOMREQUEST => "GET",
  CURLOPT_HTTPHEADER => array(
    "cache-control: no-cache"
  ),
));

$response = curl_exec($curl);
$err = curl_error($curl);

curl_close($curl);

if ($err) {
  echo "cURL Error #:" . $err;
} else {
  echo $response;
}

?>