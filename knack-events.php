<?php
//
// A very simple PHP example that sends a HTTP POST to a remote site
//

$ch = curl_init();

curl_setopt($ch, CURLOPT_URL,"https://api.knack.com/v1/objects/object_1/records");
//curl_setopt($ch, CURLOPT_POST, 1);
//curl_setopt($ch, CURLOPT_POSTFIELDS,
//    "postvar1=value1&postvar2=value2&postvar3=value3");
curl_setopt($ch, CURLOPT_HTTPHEADER, array(
    'X-Knack-Application-Id: 59ee2d1bc244864ba46607c3',
    'X-Knack-REST-API-KEY: 9cc01030-b81b-11e7-b2f7-fb01b75410e3',
    'content-type: application/json'
));
curl_setopt($ch, CURLOPT_HEADER, 0);

// in real life you should use something like:
// curl_setopt($ch, CURLOPT_POSTFIELDS,
//          http_build_query(array('postvar1' => 'value1')));

// receive server response ...
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

$server_output = curl_exec($ch);

curl_close ($ch);
//echo '<pre>';
//print_r($server_output);
//echo '</pre>';

$eventsArray = [];
$output = json_decode($server_output);
var_dump(gettype(json_decode($server_output)));

foreach($output->records as $record){
    array_push($eventsArray, $record);
}

echo '<pre>';
print_r($eventsArray);
echo '</pre>';

//// further processing ....
//if ($server_output == "OK") {
//    var_dump($server_output);
//} else {
//    var_dump('error');
//}

?>

<html>
<head>

</head>
<body>

<script>
//    var appId = '59ee2d1bc244864ba46607c3';
//    var apiKey = '9cc01030-b81b-11e7-b2f7-fb01b75410e3';
//
//    // Prep request for the Company with the name "BASCO"
//    var companyRequestUrl = 'https://api.knack.com/v1/objects/object_1/records';
//    var companyRequestFilters = [
//        {
//            'field':'field_1',
//            'operator':'is',
//            'value':'BASCO'
//        }
//    ];
//    var fullcompanyRequestUrl = companyRequestUrl + '?filters=' + encodeURIComponent(JSON.stringify(companyRequestFilters));
//
//    // Retrieve aforementioned Company
//    Knack.showSpinner();
//    $.ajax({
//        url: fullcompanyRequestUrl,
//        type: 'GET',
//        headers: {'X-Knack-Application-Id': appId, 'X-Knack-REST-API-Key': apiKey}
//    }).done(function(data) {
//        // Make sure we have only the one Company record we intended to get
//        if (data.records.length !== 1) {
//            Knack.hideSpinner();
//            throw new Error('Retrieved more than one record - try adding more filters!');
//            console.log(data.records);
//        }
//
//        // Now we can be certain that the first record - the only one - is the one we want
//        // Set up another AJAX request - this time for Contact records where the Company is BASCO
//        var companyRecordId = data.records[0].id;
//        contactsRequestUrl = 'https://api.knack.com/v1/objects/object_2/records';
//        contactsRequestFilters = [
//            {
//                'field':'field_19', // Company connection field on Contact object
//                'operator':'is',
//                'value':[companyRecordId]
//            }
//        ];
//        fullcontactsRequestUrl = contactsRequestUrl + '?filters=' + encodeURIComponent(JSON.stringify(contactsRequestFilters));
//
//        // Get all Contacts connected to BASCO
//        $.ajax({
//            url: fullcontactsRequestUrl,
//            type: 'GET',
//            headers: {'X-Knack-Application-Id': appId, "X-Knack-REST-API-Key": apiKey}
//        }).done(function(data) {
//            alert('Got the contacts! See browser\'s console for details');
//            console.log(data);
//            Knack.hideSpinner();
//        })
//    });

//    $(document).on('knack-record-create.view_1', function(event, view, record) {
//        // Do something after the record is created via form submission
//        alert('created a new record for view: ' + view.key);
//    });
</script>
</body>
</html>
