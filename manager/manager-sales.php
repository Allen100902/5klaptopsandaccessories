<?php
include "../config.php";
session_start();
$UID=$_SESSION['UID'];
$sql = "SELECT * from tbl_user WHERE UserID = $UID";
$result=mysqli_query($conn,$sql);
$num= mysqli_num_rows($result);
$user_data= mysqli_fetch_assoc($result);


$UID = $user_data['UserID'];
$lname = $user_data['Lastname'];
$fname = $user_data['Firstname'];


$sqltotal = "SELECT DAY(date) as dayss, SUM(total) AS total FROM tbl_sales where status='Delivered' GROUP BY DAY(date)";
$resultday=$conn->query($sqltotal);
 while($totalperday=$resultday->fetch_assoc()){
       $totalArray[] = $totalperday['total'];
    }
$sqlsales="Select * from tbl_sales where status='Delivered'";
$resultsales=$conn->query($sqlsales);
$rowCount = $resultsales->num_rows;
if($rowCount>=1){
    while($sales=$resultsales->fetch_assoc()){
       $dateArray[] = $sales['Date'];
      
    }
}else{
    $conn->error();
}

?>

<html>

<title>5k Gadget Shop</title>
<link rel="icon" href="icons/favicon.ico" /> 
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href='css/admin-customers.css'>

<script src="https://kit.fontawesome.com/42f0db2e3a.js" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<body>

<script type="text/javascript"> 
function display_c(){
var refresh=1000; // Refresh rate in milli seconds
mytime=setTimeout('display_ct()',refresh)
}

function display_ct() {
var x = new Date()
document.getElementById('ct').innerHTML = x;
display_c();
 }
</script>
<!-- ADMIN NAVIGATION -->
<div class=body-content>
	<div class=navigation>
		<div class=navigation-content>
			<img src='icons/RECSAILOGO.png'>
			
		</div>
		<ul>
		<li><i class="fas fa-box-open"></i><a href="manager-products.php" >PRODUCTS </a></li>
			<li><i class="fas fa-project-diagram"></i><a href="manager-archive-product.php" >ARCHIVED PRODUCTS</a></li>
			<li><i class="fas fa-desktop"></i><a href="Orders.php"  >WEB-ORDER</a></li>	
			         		
			<li><i class="fas fa-sign-out-alt"></i></i><a href="logout.php" >LOGOUT</a></li>
		</ul>
		
		
		

	</div>
	
	
	<div class=	>
	
	</div>
	
		<div class=panel-content>
		
			<div class=panel-nav>	
					<div class=panel-nav-holder>
						<body onload=display_ct();>
						<strong id='ct' ></strong>
						<span class=fontadmi><?php echo "$fname $lname"; ?></span>
						<span class=fontwel>Welcome:</span> 
						<div class=search-container>
							
						</div>	
						
					</div>
				</div>
		
				<div class=holder>
                <div>
                
				<a href='manager-sales-table.php'><button class=add-button-holder>Sales</Button> </a>
                
                
				</div>  

                    </div>

                    <div class=graph>
                    <table>

                    <td>
                        Starting Date:
                    </td>
                    <td>
                        <input type=date onchange="startDateFilter(this)" min="2022-05-05">
                    </td> 
                    <td>
                        Ending Date:
                    </td>            
                    <td>
                        <input type=date onchange="endDateFilter(this)" min="2022-06-03">
                    </td>   
                    </table>
                    <canvas id="myChart"></canvas>               
                    </div>

				</div>
				
			
		
			</div>
		</div>
	</div>		
</div>
	
</div>	
</body>

<?php 
$conn->close();
?>
<script src="https://cdn.jsdelivr.net/npm/chartjs-adapter-date-fns/dist/chartjs-adapter-date-fns.bundle.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/chartjs-plugin-datalabels/2.0.0/chartjs-plugin-datalabels.min.js" integrity="sha512-R/QOHLpV1Ggq22vfDAWYOaMd5RopHrJNMxi8/lJu8Oihwi4Ho4BRFeiMiCefn9rasajKjnx9/fTQ/xkWnkDACg==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script>
//setup
const ctx = document.getElementById('myChart').getContext('2d');
const datesArrayJS= <?php echo json_encode($dateArray);?>;
//console.log(datesArrayJS)
const dateChartJS = datesArrayJS.map((day,index)=>{
    let dayjs = new Date(day);
    return dayjs.setHours(0,0,0,0);
});
 const data= {
    labels: dateChartJS,
        datasets: [{ 
            label: 'Total Sales',         
            data: <?php echo json_encode($totalArray);?>,
            backgroundColor: [
                'rgba(255, 99, 132, 0.2)',
                
            ],
            borderColor: [
                'rgba(255, 99, 132, 1)'
            ],
            borderWidth: 1
        }]
    };

    //config
    const config= {
    type: 'bar',
    data,
    options: {
        scales: {
            x:{
                stacked: true,
                min: '2022-05-05',
                type: 'time',
                time:{
                    unit: 'day'
                }
            },
            y: {
                stacked: true,
                beginAtZero: true
            }
        }
        
    },
    plugins: [ChartDataLabels]
    };

    //render block
    const myChart = new Chart(
        document.getElementById('myChart'),
        config
    );
    
   function startDateFilter(date){
       const startDate = new Date(date.value);
       console.log(startDate.setHours(0,0,0,0));
       myChart.config.options.scales.x.min = startDate.setHours(0,0,0,0);
       myChart.update();
   }
   function endDateFilter(date){
       const endDate = new Date(date.value);
       console.log(endDate.setHours(0,0,0,0));
       myChart.config.options.scales.x.min = endDate.setHours(0,0,0,0);
       myChart.update();
   }


</script>
</html>