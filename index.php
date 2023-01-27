<!DOCTYPE html>
<html>
    <head>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
        <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    </head>
	<body>
        <form name="assesment" action="#" method="post" onsubmit="return validateForm()">
            <div class="modal-dialog modal-lg modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-header justify-content-center">
                        <h2 class="text-secondary">ASSESMENT</h2>
                    </div>
                    <div class="modal-body">
                        <div class="form-group mb-3">
                            <label>SKU</label>
                            <input type="text" name="sku" id="sku" class="form-control">
                        </div>
                        <div class="form-group mb-3">
                            <label>Category</label>
                            <input type="text" name="category" id="category" class="form-control">
                        </div>
                        <div class="form-group mb-3">
                            <label>Design</label>
                            <input type="text" name="design" id="design" class="form-control">
                        </div>
                        <div class="form-group mb-3">
                            <label>Purity</label>
                            <input type="text" name="purity" id="purity" class="form-control">
                        </div>
                        <div class="form-group mb-3">
                            <label>Weight</label>
                            <input type="number" name="weight" id="weight" class="form-control" onchange="WorkCapital(); WorkSale();">
                        </div>
                        <div class="form-row mb-3">
                            <div class="form-group col-4">
                                <label>Workmanship Capital</label>
                                <input type="number" name="capital" id="capital" class="form-control" onchange="WorkCapital()">
                            </div>
                            <div class="form-group col-4">
                                <label>Choose a type</label>
                                <select class="form-control" name="capitaltype" id="capitaltype" onchange="WorkCapital()">
                                    <option value="" selected> -- Select -- </option>    
                                    <option value="gram">Per Gram</option>
                                    <option value="sale">Per Sale</option>
                                </select>
                            </div>
                            <div class="form-group col-4">
                                <label>Total Workmanship Capital</label>
                                <input id="total_capital" class="form-control" disabled>
                            </div>
                        </div>
                        <div class="form-row mb-3">
                            <div class="form-group col-4">
                                <label>Workmanship Sale</label>
                                <input type="number" name="sale" id="sale" class="form-control" onchange="WorkSale()">
                            </div>
                            <div class="form-group col-4">
                                <label>Choose a type</label>
                                <select class="form-control" name="saletype" id="saletype" onchange="WorkSale()">    
                                    <option value="" selected> -- Select -- </option>     
                                    <option value="gram">Per Gram</option>
                                    <option value="sale">Per Sale</option>
                                </select>
                            </div>
                            <div class="form-group col-4">
                                <label>Total Workmanship Sale</label>
                                <input id="total_sale" class="form-control" disabled>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button name="assesment" id="assesment" type="submit" class="btn btn-primary">Submit</button>
                    </div>
                </div>
            </div>
        </form>
	</body>
    <!-- Modal -->
    <div class="modal fade" id="myModal" role="dialog">
        <div class="modal-dialog">
        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">FIELD IS REQUIRED</h4>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
            <div class="modal-body">
                <p>You have left a field empty.</p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-primary" data-dismiss="modal">Close</button>
            </div>
        </div>
        </div>
    </div>
</html>
<script>
function validateForm() { 
  var sku = document.getElementById('sku').value;
  var category = document.getElementById('category').value;
  var design = document.getElementById('design').value;
  var purity = document.getElementById('purity').value;
  var weight = document.getElementById('weight').value;
  var capital = document.getElementById('capital').value;
  var capitaltype = document.getElementById('capitaltype').value;
  var sale = document.getElementById('sale').value;
  var saletype = document.getElementById('saletype').value;

  if (sku == "" || category == "" || design == "" || purity == "" || weight == "" || capital == "" || capitaltype == "" || sale == "" || saletype == "") {
    $("#myModal").modal();
    return false;
  }
}

function WorkCapital() {
    let weight = document.getElementById("weight").value;
    let capital = document.getElementById("capital").value;
    let capitaltype = document.getElementById("capitaltype").value;
    if(capitaltype == "gram")
    {
        document.getElementById("total_capital").value = weight*capital;
    }
    else if(capitaltype == "sale")
    {
        document.getElementById("total_capital").value = capital;
    }
    else
    {
        document.getElementById("total_capital").value = 0;
    }
}

function WorkSale() {
    let weight = document.getElementById("weight").value;
    let sale = document.getElementById("sale").value;
    let saletype = document.getElementById("saletype").value;
    if(saletype == "gram")
    {
        document.getElementById("total_sale").value = weight*sale;
    }
    else if(saletype == "sale")
    {
        document.getElementById("total_sale").value = sale;
    }
    else
    {
        document.getElementById("total_sale").value = 0;
    }
}
</script>