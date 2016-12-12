 <!doctype html>
<html>

<head>
 
 <script src="<?php echo base_url()?>public/jquery/shared/util.js"></script>
  <script src="<?php echo base_url()?>public/jquery/display/api.js"></script>
  <script src="<?php echo base_url()?>public/jquery/display/metadata.js"></script>
  <script src="<?php echo base_url()?>public/jquery/display/canvas.js"></script>
  <script src="<?php echo base_url()?>public/jquery/display/webgl.js"></script>
  <script src="<?php echo base_url()?>public/jquery/display/pattern_helper.js"></script>
  <script src="<?php echo base_url()?>public/jquery/display/font_loader.js"></script>
  <script src="<?php echo base_url()?>public/jquery/display/annotation_helper.js"></script>

  <script>
    // Specify the main script used to create a new PDF.JS web worker.
    // In production, leave this undefined or change it to point to the
    // combined `pdf.worker.js` file.
    PDFJS.workerSrc = '<?php echo base_url()?>public/jquery/worker_loader.js';
    var pdf_file = "<?php echo base_url();?>files/ppt&pdf/<?php echo $pdf;?>";
  </script>
  <script src="<?php echo base_url()?>public/jquery/hello.js"></script>
  </head>

<body>
  <canvas id="the-canvas" style="border:1px solid black;"/>
  <script type="text/javascript">
  document.oncontextmenu = document.body.oncontextmenu = function() {return false;}
  document.onkeydown = function (e) {
        return false;
}
  </script>
</body>

</html>