<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
        <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="{{ asset('dashboard_style/dashboard9.css') }}">
    <title>Responsive Sidebar</title> 
</head>
<body id="myDiv">  
<div id="overlay" class="overlay"></div>
    <div class="container-fluid motherdiv">
        <div class="row">
            <div class="col-md-2 div2">
                @include('menu.sidebar')
            </div>
            <div class="col-md-12 div2 ">  
                <div class="containerbar mt-5">
            	  <div class="row d-flex">
                   <div class="col-mb-6 div3 d-flex mt-5" style="border:none;">
                    <div class="col-md-4 div3 t1" style="background-color:rgb(233, 30, 99);">
                    <div class="d-flex">  
                   <h4 style="left:20px;position:relative;top:10px;color:white;font-family:Snell Roundhand, cursive;letter-spacing:2px;"><span>&#x20B1;</span>45sd4534</h4>
                  </div>
               <h6 style="color:white;text-indent:20px; position:relative;top:30px;font-family:Snell Roundhand, cursive;letter-spacing:2px;">Capital</h6>
           <center><img class="totalimg" src="{{ asset('image/capital.png') }}" width="70px" height="70px"></center><br>
           <div class="downdiv"></div>
                    </div>
                    <div  class="col-md-4 div3 t2" style="background-color: rgb(138, 43, 226);">
                    <div class="d-flex">
                   <h4 style="left:20px;position:relative;top:10px;color:white;font-family:Snell Roundhand, cursive;letter-spacing:2px;"><span>&#x20B1;</span>45sd4534</h4>
               </div>
            <h6 style="color:white;text-indent:20px; position:relative;top:30px;font-family:Snell Roundhand, cursive;letter-spacing:2px;">Expenses</h6>
            <center><img class="totalimg" src="{{ asset('image/expenses.png') }}" width="70px" height="70px"></center><br>
                    <div class="downdiv"></div>
                    </div>
                    <div  class="col-md-4 div3 t3" style="background-color:  rgb(40, 167, 69);">
                        <div class="d-flex">
                        <h4 style="left:20px;position:relative;top:10px;color:white;font-family:Snell Roundhand, cursive;letter-spacing:2px;"><span>&#x20B1;</span>45sd4534</h4>
                    </div>
               <h6 style="color:white;text-indent:20px; position:relative;top:30px;font-family:Snell Roundhand, cursive;letter-spacing:2px;">Gross income</h6>
           <center><img class="totalimg" src="{{ asset('image/gross-removebg-preview.png') }}" width="70px" height="70px"></center><br>
           <div class="downdiv"></div>
                </div>
                    <div  class="col-md-4 div3 t4">
                    <div class="d-flex">
                        <h4 style="left:20px;position:relative;top:10px;color:white;font-family:Snell Roundhand, cursive;letter-spacing:2px;"><span>&#x20B1;</span>45sd4534</h4>
                    </div>
                    <h6 style="color:white;text-indent:20px; position:relative;top:30px;font-family:Snell Roundhand, cursive;letter-spacing:2px;">Net income</h6>
            <center><img class="totalimg" src="{{ asset('image/peso.png') }}" width="70px" height="70px"></center><br>
            <div class="downdiv"></div>
                </div>
                <div  class="col-md-2 div3 t4" style="background-color:  #e53935; ">
                    <div class="d-flex">
                        <h4 style="left:20px;position:relative;top:10px;color:white;font-family:Snell Roundhand, cursive;letter-spacing:2px;"> {{$itemLowest}} {{$minQuantity}}</h4>
                    </div>
                    <h6 style="color:white;text-indent:20px; position:relative;top:30px;font-family:Snell Roundhand, cursive;letter-spacing:2px;">Bottom item</h6>
            <center><img class="totalimg" src="{{ asset('image/peso.png') }}" width="70px" height="70px"></center><br>
            <div class="downdiv"></div>
                </div>
                <div  class="col-md-2 div3 t4" style="background-color:  #2ecc71;">
                    <div class="d-flex">
                        <h4 style="left:20px;position:relative;top:10px;color:white;font-family:Snell Roundhand, cursive;letter-spacing:2px;">{{$item}} {{$maxQuantity}}</h4>
                    </div>
                    <h6 style="color:white;text-indent:20px; position:relative;top:30px;font-family:Snell Roundhand, cursive;letter-spacing:2px;">Top item</h6>
            <center><img class="totalimg" src="{{ asset('image/peso.png') }}" width="70px" height="70px"></center><br>
            <div class="downdiv"></div>
                </div>
                <div  class="col-md-2 div3 t4"style="background-color: rgb(255, 0, 255);">
                    <div class="d-flex">
                        <h4 style="left:20px;position:relative;top:10px;color:white;font-family:Snell Roundhand, cursive;letter-spacing:2px;">{{ (empty($sumcat)) ? 'empty!' : $sumcat}}</h4>
                    </div>
                    <h6 style="color:white;text-indent:20px; position:relative;top:30px;font-family:Snell Roundhand, cursive;letter-spacing:2px;">Total category</h6>
            <center><img class="totalimg" src="{{ asset('image/peso.png') }}" width="70px" height="70px"></center><br>
            <div class="downdiv"></div>
                </div>
                <div  class="col-md-2 div3 t4" style="background-color:  #ff7043;">
                    <div class="d-flex">
                        <h4 style="left:20px;position:relative;top:10px;color:white;font-family:Snell Roundhand, cursive;letter-spacing:2px;">{{$total}}</h4>
                    </div>
                    <h6 style="color:white;text-indent:20px; position:relative;top:30px;font-family:Snell Roundhand, cursive;letter-spacing:2px;">Total item</h6>
            <center><img class="totalimg" src="{{ asset('image/item.png') }}" width="70px" height="70px"></center><br>
            <div class="downdiv"></div>
                </div>
            </div> 
        </div>
    </div>
</div>
    <div class="col-md-6 mt-5">
                        <!-- BAR CHART -->
                        <div class="card card-success">
                            <div class="card-header">
                                <h3 class="card-title" style="color:dodgerblue">Net Income Bar Chart (January to Current Month)</h3>

                            <div class="card-tools">
                                <button type="button" class="btn btn-tool" data-card-widget="collapse">
                                    <i class="fas fa-minus"></i>
                                </button>
                                <button type="button" class="btn btn-tool" data-card-widget="remove">
                                    <i class="fas fa-times"></i>
                                </button>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="chart">
                            <canvas id="barChart" style="min-height: 250px; height: 250px; max-height: 250px; max-width: 100%;"></canvas>
                        </div>
                    </div>
                </div>
            </div>  
            <div class="col-md-6 mt-5 divpie" >
            <!-- PIE CHART -->
            <div class="card card-danger">
                <div class="card-header">
                    <h3 class="card-title" style="color:dodgerblue">Category Pie Chart</h3>
                    <div class="card-tools">
                            <button type="button" class="btn btn-tool" data-card-widget="collapse">
                                <i class="fas fa-minus"></i>
                            </button>
                            <button type="button" class="btn btn-tool" data-card-widget="remove">
                                <i class="fas fa-times"></i>
                            </button>
                            </div>
                        </div>
                        <div class="card-body" style="display: flex; flex-direction: row;">
                        <div style="width: 20%;overflow:auto;height:250px">
                            <div id="legend"  style=" margin-right: 0px;font-size:12px;"></div>
                        </div>
                        <div style="width: 20%;overflow:auto;height:250px">
                        <center><p style="color:gray">{{ (! empty($totalcat)) ? 'Over all' : ''}}</p><h7 style="color:#333; width:30%">{{ (! empty($totalcat)) ? $totalcat : ''}}<h7></center>
                        </div>
                        <div style="width: 60%;">
                            <canvas class="ms-5"  id="pieChart" style="min-height: 250px; height: 250px; max-height: 250px; max-width: 80%;"></canvas> <!-- Chart on the right -->
                        </div>
                     </div>
                </div>    
                    </div>
                        <div class="bottomdiv d-flex"><img class="mt-2" src="{{ asset('image/wilfre.png') }}" width="50px" height="35px"><p class="mt-2" style="color: white;"> Develop by Wilfre</p></div>
                        </div>
                 @include('layout.barchartscript')
            @include('layout.piechartscript')
        @include('layout.script')
    </body>
</html>


    <style>
.chartcontainer{
    position: relative;
    top: 30px;
}
</style>

