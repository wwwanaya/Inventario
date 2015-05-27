<?php
require_once 'inc/htmlhead.inc';
require_once 'inc/Query.class.php';

#Query for CPUs data
$cpusql = "SELECT cpu_id, cpu_lic, cpu_sn, cpu_ram, cpu_hd, cpu_brand, cpu_model, cpu_addedDate FROM inventario_cpu ORDER BY cpu_addedDate DESC;";
$cpuQ = new Query($cpusql);
$cpusql = $cpuQ->query_array_assoc();

#Query for Brand
$brandsql = "SELECT brand_id, brand_name FROM inventario_brands ORDER BY brand_name ASC;";
$brandQ = new Query($brandsql);
$brandsql = $brandQ->query_array_assoc();

/*#Query for model
$modelsql = "SELECT model_name FROM inventario_models ORDER BY model_name ASC;";
$modelQ = new Query($modelsql);
$modelsql = $modelQ->query_array_assoc();*/
?>
<body>
    <div id="debug"></div>
    <div id="addIO"></div>
    <div class="container-fluid">
        <nav class="navbar navbar-default">
            <div class="container-fluid">
                <!-- Brand and toggle get grouped for better mobile display -->
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse"
                    data-target="#bs-example-navbar-collapse-1">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="#">IT</a>
            </div>

            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <!-- Boton que dispara el modal -->
                <button type="button" class="btn btn-default navbar-btn" data-toggle="modal" data-target="#myModal">+</button>
                <!-- /Boton que dispara el modal -->
            </div>
            <!-- /.navbar-collapse -->
        </div>
        <!-- /.container-fluid -->
    </nav>
    <table class="ui table table-condensed table-bordered">
        <thead>
            <th>ID</th>
            <th>W-Serial</th>
            <th>S/N</th>
            <th>RAM</th>
            <th>HD</th>
            <th>Brand</th>
            <th>Model</th>
            <th>Date</th>
        </thead>
        <tbody>
            <?php
            for ($i = 0; $i < count($cpusql); $i++) {
                # Print results
                print '<tr><td>' . $cpusql[$i]['cpu_id'] . '</td>';
                print '<td>' . $cpusql[$i]['cpu_lic'] . '</td>';
                print '<td>' . $cpusql[$i]['cpu_sn'] . '</td>';
                print '<td>' . $cpusql[$i]['cpu_ram'] . '</td>';
                print '<td>' . $cpusql[$i]['cpu_hd'] . '</td>';
                print '<td>' . $cpusql[$i]['cpu_brand'] . '</td>';
                print '<td>' . $cpusql[$i]['cpu_model'] . '</td>';
                print '<td>' . $cpusql[$i]['cpu_addedDate'] . '</td></tr>';
            }
            ?>
        </tbody>
    </table>
</div>

<!-- Modal -->
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-sm">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="myModalLabel">Modal title</h4>
            </div>
            <div class="modal-body">
                <form action="">
                    <div class="form-group">
                        <label for="wlicence">Licencia</label>
                        <input type="text" class="form-control" id="wlicence" maxlength="29" placeholder="XXXX-XXXX-XXXX-XXXX-XXXX">
                    </div>
                    <div class="form-group">
                        <label for="snumber">Serial number</label>
                        <input type="text" class="form-control" id="snumber" maxlength="11" placeholder="ABCDEFGH">
                    </div>
                    <label for="ram">RAM</label>
                    <div class="input-group">
                        <input type="text" class="form-control" id="ram" maxlength="3" placeholder="i.e. 2">
                        <div class="input-group-addon">GB</div>
                    </div>
                    <label for="hd">Hard drive</label>
                    <div class="input-group">
                        <input type="text" class="form-control" id="hd" maxlength="3" placeholder="i.e. 160">
                        <div class="input-group-addon">GB</div>
                    </div>
                    <div class="form-group">
                        <label for="brand">Brand</label>
                        <select class="form-control" name="brand" id="brand">
                            <option value="0"></option>
                            <?php 
                            # Print brands names
                            for ($i=0; $i < count($brandsql); $i++) { 
                                print '<option value="' . $brandsql[$i]['brand_id'] . '">' . $brandsql[$i]['brand_name'] . '</option>';
                            }
                            ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="model">Model</label>
                        <select class="form-control" name="model" id="model">
                            <!-- Here I put the data with JS, NESTED MODELS TO BRANDS -->
                        </select>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary" id="sbmt">Save changes</button>
            </div>
        </div>
    </div>
</div>
<div id="debug"></div>
</body>
<?php require_once 'inc/js.inc' ?>
<script type="text/javascript">
$(document).ready(function(){

    /////////////////////////////
    /* NESTED MODELS TO BRANDS */
    /////////////////////////////

    // Listening when the user changes the brand option.
    $('#brand').change(function(e){ 
        $('#model').html('');
        // .getJSON parse from the file q.php, sending the values {type: 1, brand: this.value} which contains the value of the brand.
        $.getJSON("q.php", {type: 1, brand: this.value})
        .done(function(e){
            var json_data = e;
            for (var i = 0; i < json_data.length; i++) {
                $('#model').append('<option value="' + json_data[i]['model_id'] + '">' + json_data[i]['model_name'] +'</option>');
            };
        });
    });
    //////////////////////////////
    /* /NESTED MODELS TO BRANDS */
    //////////////////////////////

    /////////////////////////////
    /* POST DATA FROM ADD +1 */
    /////////////////////////////

    // Listening when the user changes the brand option.
    $('#sbmt').click(function(e){
        e.preventDefault();
        console.log('Se preventDefault ok');
        var data;
        var inputCount = document.getElementsByTagName('input').length;
        console.log(inputCount);
        /* Want I have to make here... Is:
        I have to count the inputs, and get these values and push it to the array...
        i.e. name of input = value of input
        then I sent it to php and simple as that.
        and remember to put data-dismiss="modal" to hide the modal before click save.
        */
    });
    //////////////////////////////
    /* /POST DATA FROM ADD +1 */
    //////////////////////////////

});
</script>
<script>

///////////////
/* Putting the Licence the character "-" */
///////////////

String.prototype.chunk = function(n) {
    var ret = [];
    for(var i=0, len=this.length; i < len; i += n) {
       ret.push(this.substr(i, n))
   }
   return ret
};

function insertSpace() {
  // Disregard everything bar digits and captals
  this.value = this.value.replace(/[^\dA-Z]/g, '')

  // Start with 6011 or 65
  var hit = this.value.match(/^(6011|65)/);
  
  if(hit){
    var part_1 = this.value.slice(0,5),
    part_2 = this.value.slice(5).chunk(6).join("-");

    if(part_1.length === 5){
      this.value = part_1 + " " + part_2;
  }
} else {
    this.value = this.value.chunk(5).join("-");
}
}

var el = document.getElementById('wlicence');
el.addEventListener('keyup', insertSpace, false);

///////////////
/* /Putting the Licence the character "-" */
///////////////

</script>
<?php require_once 'inc/htmlfoot.inc'; ?>0