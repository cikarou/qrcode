<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8"> 
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Web QR</title>
  <link href="http://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
      <!--Import materialize.css-->
  <link type="text/css" rel="stylesheet" href="materialize/css/materialize.min.css"  media="screen,projection"/>
<style type="text/css">
#canvas{
    display:none;
}
#v{
  width: 470px;
  height: 352px;
}
@page :left {
  margin-left: 3cm;
}

@page :right {
  margin-left: 4cm;
}
  * {
      box-sizing: border-box;
      -moz-box-sizing: border-box;
  }
  .page {
      width: 15cm;
      min-height: 10cm;
      padding: 0cm;
      margin: 1cm auto;
      /*border: 1px #D3D3D3 solid;*/
      /*border-radius: 5px;*/
      background: white;
      /*box-shadow: 0 0 5px rgba(0, 0, 0, 0.1);*/
  }
  .subpage {
      padding: 1cm;
      border: 5px red solid;
      height: 256mm;
      outline: 2cm #FFEAEA solid;
  }
  
  @page {
      size: A4;
      margin: 0;
  }
  @media print {
      .page {
          margin: 0;
          border: initial;
          border-radius: initial;
          width: initial;
          min-height: initial;
          box-shadow: initial;
          background: initial;
          page-break-after: always;
      }
  }
 
  @media print
  {    
      .no-print, .no-print *
      {
          display: none !important;
      }
  }
  .qrcode{
    position: relative;
  }
  .logo{
   position:absolute;
   left:45%;
   top: 36%;
  transform: translateX(-50%);
  -webkit-transform: translateX(-50%);
  }

</style>

</head>

<body>
  <div class="row">
      <a href="readqr.php" class="no-print" style="float: right;">Read QR Code</a> 

      <div id="test2" class="col s12">
        <h4 style="color: blue; text-align: center;" class="no-print">Create QR Code</h4>
        <div class="container">
          <div class="row">   
            <div class="no-print">
            <div class="col s6">
              <div class="row">
                <div class="input-field col s12">
                  <input  type="text" class="validate" id="mapo">
                  <label for="password">PO Code</label>
                </div>
              </div>
              <div class="row">
                <div class="input-field col s12">
                  <input  type="text" class="validate" id="mact">
                  <label for="email">Detail Code</label>
                </div>
              </div>
              <div class="row">
                <div class="input-field col s12">
                  <input type="number" class="validate" id="soluong">
                  <label for="email">Amount</label>
                </div>
              </div>
              <div class="row" style="text-align: right;">
                <a class="waves-effect waves-light btn red" id="btntaoma"><i class="material-icons left">play_for_work</i>Generate Code</a> 
              </div>
            </div>  
            </div>  
            <div class="col s6">
              <div class="page" id="print">
                <div class="row">
                  <div class="col s12">
                    <div style="border: 2px solid #000; border-radius: 5px; width: 245px;">
                    <div id="qrcode" class="qrcode" style="margin-top: 10px; margin-left: 20px;">
                      <!--img src="lib/logo.png" class="logo"-->
                    </div>
                    
                      <div style="margin-top: 10px; margin-left: 20px;">
                        <p id="lblmapo">PO Code: </p>
                        <p id="lblmact">Detail Code: </p>
                        <p id="lblsoluong">Amount: </p>
                      </div>
                    </div>
                    <button class="waves-effect waves-light btn green no-print" id="btnin" style="margin-top: 10px; margin-left: 75px;"><i class="material-icons left">print</i>Print QR Code</button>
                  </div>
                  
                </div>  
              </div>              
            </div>
          </div>
        </div>
      </div>   
     

</body>
  <script type="text/javascript" src="createQR/jquery.min.js"></script>
  <script type="text/javascript" src="createQR/qrcode.js"></script>
  <script type="text/javascript" src="materialize/js/materialize.min.js"></script>
  <!-- create qr code -->
  <script type="text/javascript">
    var qrcode = new QRCode(document.getElementById("qrcode"), {
      width : 200,
      height : 200
    });

    function makeCode () {    
      var mapo = $("#mapo").val();      
      var mact = $("#mact").val();      
      var soluong = $("#soluong").val();      
      var elText = mapo + '|' + mact + '|' + soluong;
      qrcode.makeCode(elText);
    }

    makeCode();

    $("#btntaoma").
      on("click", function () {
        makeCode();
         //get information
        $("#lblmapo").empty();
        $("#lblmact").empty();
        $("#lblsoluong").empty();
        var mapo = $("#mapo").val();
        $("#lblmapo").text("Mã PO: " + mapo);
        var mact = $("#mact").val();
        $("#lblmact").text("Mã chi tiết: " + mact);
        var soluong = $("#soluong").val();
        $("#lblsoluong").text("Số lượng: " + soluong);
      }).
      on("keydown", function (e) {
        if (e.keyCode == 13) {
          makeCode();
        }
      });  
   
    $("#btnin").click(function(event) {
      window.print();
    });

  </script>
</html>