<html>  
<head>  
<title> Pagination </title>  
</head>  
    <link rel="shortcut icon" type="image/jpg" href="http://54.201.160.69:9038/img/foodcosthero.ico"/>
    <!-- Vendors Min CSS -->
    <link rel="stylesheet" href="http://54.201.160.69:9038/css/vendors.min.css" />
    <!-- Style CSS -->
    <link rel="stylesheet" href="http://54.201.160.69:9038/css/style.css" />
    <!-- Responsive CSS -->
    <link rel="stylesheet" href="http://54.201.160.69:9038/css/responsive.css" />
    
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script>  
    <script src="https://cdn.datatables.net/1.10.21/js/jquery.dataTables.min.js"></script>


    <script src="http://54.201.160.69:9038/js/admin_customer.js"></script>
    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">

    <link rel="stylesheet"
        href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/css/toastr.min.css">
    <script
        src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js"
        integrity="sha256-3blsJd4Hli/7wCQ+bmgXfOdK7p/ZUMtPXY08jmxSSgk="
        crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@9"></script>

<body>  
  
<?php  
  
//     //database connection  
//     $conn = mysqli_connect('localhost', 'root', '','DMS');  
//     if (! $conn) {  
// die("Connection failed" . mysqli_connect_error());  
//     }  
//     else {  
// mysqli_select_db($conn, 'pagination');  
//     }  
  
//     //define total number of results you want per page  
//     $results_per_page = 10;  
  
//     //find the total number of results stored in the database  
//     $query = "select *from countries";  
//     $result = mysqli_query($conn, $query);  
//     $number_of_result = mysqli_num_rows($result);  
  
//     //determine the total number of pages available  
//     $number_of_page = ceil ($number_of_result / $results_per_page);  
  
//     //determine which page number visitor is currently on  
//     if (!isset ($_GET['page']) ) {  
//         $page = 1;  
//     } else {  
//         $page = $_GET['page'];  
//     }  
  
//     //determine the sql LIMIT starting number for the results on the displaying page  
//     $page_first_result = ($page-1) * $results_per_page;  
  
//     //retrieve the selected results from database   
//     $query = "SELECT *FROM countries LIMIT " . $page_first_result . ',' . $results_per_page;  
//     $result = mysqli_query($conn, $query);  
      
//     //display the retrieved result on the webpage  
//     while ($row = mysqli_fetch_array($result)) {  
//         echo $row['id'] . ' ' . $row['name'] . '</br>';  
//     }  
  
  
//     //display the link of the pages in URL  
//     for($page = 1; $page<= $number_of_page; $page++) {  
//         echo '<a href = "demo.php?page=' . $page . '">' . $page . ' </a>';  
//     } 

?>
<table>
    <tbody>
<?php

$select_data= "SELECT * FROM invoice_items where vInvoiceNo='99709' and iVendorsId='3' and iCustomerId='18' and is_upload='1'";

$conn = new mysqli("localhost","root","","test");

$countField=6;
    $result=$conn->query($select_data); 

    // print_r($result);
    if($result->num_rows != 0 )
    {
        foreach($result as $value)
        {
            
            print_r($value);
        }

    }
    else
    {
        echo "Record Not Found";
    }
  
?>  

</tbody>
</table>

          
</body>  
</html>